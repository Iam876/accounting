$(document).ready(function () {

    // AJAX CSRF TOKEN
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Add Billing Methods
    $("#billing_methods_add .customer-btn-save").click(function () {
        let formData = new FormData();

        formData.append("method_name", $("#methodName").val());

        $.ajax({
            url: "/billing/method/create",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.status,
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#billing_methods_add").modal("hide");
                fetchBillingMethods();
            },
            error: function () {
                alert("Error adding billing");
            },
        });
    });

    // Edit billing Method
    $(document).on("click", ".edit-bill-method-btn", function () {
        let bill_method = $(this).data("id");

        $.ajax({
            url: `/billing/method/edit/${bill_method}`,
            type: "GET",
            success: function (response) {

                $("#editmethodName").val(response.method_name);
                $("#edit-billing-modal").modal("show");
                $(".Update-Billing").data("id", bill_method);
            },
            error: function () {
                alert("Error fetching billing data");
            },
        });
    });

    // Update Billing Method
    $(".Update-Billing").click(function () {
        let bill_method_id = $(this).data("id");
        let formData = new FormData();

        formData.append("method_name", $("#editmethodName").val());

        $.ajax({
            url: `/billing/method/update/${bill_method_id}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.status,
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#edit-billing-modal").modal("hide");
                fetchBillingMethods();
            },
            error: function () {
                alert("Error updating BIlling Modal");
            },
        });
    });

 
    $(document).on('click', '.delete-bill-method-btn', function () {
        let delete_id = $(this).data("id");

        // Trigger SweetAlert confirmation
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            // If confirmed, proceed with the deletion
            if (result.isConfirmed) {
                $.ajax({
                    url: `/billing/method/destroy/${delete_id}`,
                    type: "DELETE",
                    success: function (response) {
                        // After successful deletion, show the success message
                        Swal.fire({
                            title: "Deleted!",
                            text: response.status,
                            icon: "success"
                        });

                        // Refresh the school list
                        fetchBillingMethods();
                    },
                    error: function () {
                        alert("Error deleting Data");
                    },
                });
            }
        });
    });

    // Fetch Billing Methods
    function fetchBillingMethods() {
        let currentPage = $(".datatable").DataTable().page();
        $.ajax({
            url: "/fetch/billing/method",
            type: "get",
            processData: false,
            contentType: false,
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) {
                    $(".datatable").DataTable().destroy();
                }

                let tableBody = "";
                response.forEach(function (bill_method) {
                    tableBody += `<tr>
                        <td>${bill_method.id}</td>
                        <td>${bill_method.method_name}</td>
                        <td class="d-flex align-items-center">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul>
                                        <li><a class="dropdown-item edit-bill-method-btn" data-id="${bill_method.id}"><i class="far fa-edit me-2"></i>${translations.edit}</a></li>
                                        <li><a class="dropdown-item delete-bill-method-btn" data-id="${bill_method.id}"><i class="far fa-trash-alt me-2"></i>${translations.delete}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>`;
                });

                $(".datatable tbody").html(tableBody);
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
            error: function () {
                alert("Error adding billing");
            },
        });
    }


    fetchBillingMethods();

});