$(document).ready(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    fetchBillingData();

    $('.invoices-tabs a').on('click', function (e) {
        e.preventDefault();

        const status = $(this).attr('id');
        $('.invoices-tabs a').removeClass('active');
        $(this).addClass('active');

        fetchBillingData(status === 'all_billing' ? '' : status);  // Pass the status to the function
    });

    function fetchBillingData(status = '') {
        let currentPage = $(".datatable").DataTable().page();
        const url = `/billings/fetch/${status}`;  // Pass the status to the controller

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) $(".datatable").DataTable().destroy();

                let billingHtml = '';
                response.forEach(billing => {
                    const student = billing.student;
                    const roomNumber = student.room ? student.room.room_number : 'N/A';
                    const apartmentName = student.apartment ? student.apartment.mansion_name : 'N/A';
                    const overdue = billing.overdue === 'Yes' ? '<span class="text-danger">Overdue</span>' : 'No';

                    billingHtml += `
                        <tr>
                            <td>${billing.id}</td>
                            <td>${student ? student.student_name : 'N/A'}</td>
                            <td>${apartmentName}</td>
                            <td>${roomNumber}</td>
                            <td>${billing.payment_method_id ?? 'N/A'}</td>
                            <td>${billing.total_amount ?? 'N/A'}</td>
                            <td>${billing.total_amount ?? 'N/A'}</td>
                            <td>${billing.total_dues ?? 'N/A'}</td>
                            <td>${overdue}</td>
                            <td>${billing.payment_status ?? 'N/A'}</td>
                            <td class="text-end">
                                <button class="btn btn-primary btn-sm" onclick="openEditModal(${billing.id})">${translations.edit}</button>
                                <a onclick="openHistoryModal(${billing.student_id})" class="btn btn-greys bg-history-light me-2" >
															<i class="far fa-eye me-1"></i> ${translations.history}
														</a> 
                            </td>
                        </tr>`;
                });

                $('#billingData').html(billingHtml);
                $(".datatable").DataTable({
                    pageLength: 10,
                    language: {
                        paginate: {
                            previous: translations.paginate.previous,
                            next: translations.paginate.next
                        },
                        search: translations.search,
                        lengthMenu: translations.lengthMenu
                    }
                }).page(currentPage).draw(false);
            },
            error: function (xhr) {
                console.error("Error fetching billing data:", xhr.responseText);
            }
        });
    }


    // Open modal for editing the billing data
    window.openEditModal = function (billingId) {
        $.ajax({
            url: `/billings/${billingId}`,
            type: 'GET',
            success: function (response) {
                const billing = response.billing;
                const unpaidMonths = response.unpaidMonths;
                const paymentMethods = response.paymentMethods;

                if (billing) {
                    $('#billing_id').val(billing.id);
                    $('#student_id').val(billing.student.id);
                    $('#student_name').val(billing.student.student_name);
                    $('#payment_method_id').val(billing.payment_method_id);
                    $('#amount_paid').val(billing.amount_paid);
                    $('#payment_id').val(billing.payment_id);
                    $('#house_rent').val(response.houseRent);
                    $('#total_dues').val(response.totalDues);
                    $('#display_house_rent').val(response.houseRent);
                    $('#display_total_dues').val(response.totalDues);
                }

                // Populate unpaid months and payment methods
                $('#pending_dues').empty();
                if (unpaidMonths) {
                    Object.entries(unpaidMonths).forEach(([month, totalAmount]) => {
                        $('#pending_dues').append(new Option(`${month} - Rent: ${totalAmount}`, month));
                    });
                }

                $('#payment_method_id').empty();
                $('#payment_method_id').append(new Option("Select Payment Method", ""));
                paymentMethods.forEach(method => {
                    $('#payment_method_id').append(new Option(method.method_name, method.id));
                });

                $('#billing_modal_update').modal('show');
            },
        });
    };

    // Automatically fetch the total dues amount when selecting pending dues
    $('#pending_dues').on('change', function () {
        let totalAmount = 0;
        const selectedDues = $(this).val(); // Get selected due months

        // Calculate total amount for selected dues
        selectedDues.forEach(due => {
            const amount = parseFloat($(this).find(`option[value='${due}']`).text().split(':')[1].trim());
            totalAmount += amount;
        });

        $('#amount_paid').val(totalAmount);  // Set the total amount in the input field
    });

    // $('#billingUpdateForm').submit(function (event) {
    //     event.preventDefault();
    //     const billingId = $('#billing_id').val();
    //     const formData = {
    //         billing_id: billingId,
    //         student_id: $('#student_id').val(),
    //         payment_method_id: $('#payment_method_id').val(),
    //         amount_paid: $('#amount_paid').val(),
    //         payment_date: $('#payment_date').val(),
    //         transaction_id: $('#payment_id').val(),  // Payment ID
    //         pending_dues: $('#pending_dues').val(),  // Multiple dues selected
    //     };

    //     $.ajax({
    //         url: '/payments/store',  // Route to PaymentController
    //         type: 'POST',
    //         data: formData,
    //         success: function (response) {
    //             $('#billing_modal_update').modal('hide');
    //             fetchBillingData();  // Refresh the billing data
    //             alert("Payment processed successfully!");
    //         },
    //         error: function (xhr) {
    //             console.error("Error processing payment:", xhr.responseText);
    //             alert("Failed to process payment.");
    //         }
    //     });
    // });


    // Function to open the history modal and fetch billing history

    $('#billingUpdateForm').submit(function (event) {
        event.preventDefault();

        const billingId = $('#billing_id').val();
        console.log("Billing ID:", billingId); // Log billing ID for debugging

        const formData = {
            billing_id: billingId,
            student_id: $('#student_id').val(),
            payment_method_id: $('#payment_method_id').val(),
            amount_paid: $('#amount_paid').val(),
            payment_date: $('#payment_date').val(),
            transaction_id: $('#payment_id').val(),
            pending_dues: $('#pending_dues').val() || []  // Ensures it's always an array
        };

        $.ajax({
            url: '/payments/store',  // Ensure this route points to your controller correctly
            type: 'POST',
            data: formData,
            success: function (response) {
                $('#billing_modal_update').modal('hide');
                fetchBillingData();  // Refresh the billing data
                alert("Payment processed successfully!");
            },
            error: function (xhr) {
                console.error("Error processing payment:", xhr.responseText);
                alert("Failed to process payment.");
            }
        });
    });



    window.openHistoryModal = function (studentId) {
        $.ajax({
            url: `/billings/history/${studentId}`, // Route to fetch the billing history
            type: 'GET',
            success: function (response) {
                let historyHtml = '';

                // Loop through each billing record and append rows
                response.forEach(billing => {
                    historyHtml += `
                    <tr>
                        <td>${billing.billing_month}</td>
                        <td>${billing.total_amount}</td>
                        <td>${billing.amount_paid}</td>
                        <td>${billing.total_due_amount}</td>
                        <td>${billing.payment_status}</td>
                        <td>${billing.payment_method_name ?? 'N/A'}</td>
                        <td>${billing.transaction_id ?? 'N/A'}</td>
                        <td>${billing.payment_date ?? 'N/A'}</td>
                    </tr>`;
                });

                $('#billingHistoryData').html(historyHtml);
                $('#billing_history_modal').modal('show');
            },
            error: function (xhr) {
                console.error("Error fetching billing history:", xhr.responseText);
            }
        });
    };

});
