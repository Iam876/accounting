$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#pic_modal_add .customer-btn-save").click(function () {
        let formData = new FormData();
        formData.append("pic_company_name", $("#picCompany").val());
        formData.append("contact", $("#phone").val());
        formData.append("address", $("#address").val());

        $.ajax({
            url: "/pic/store",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "PIC added successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#pic_modal_add").modal("hide");
                fetchPic();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);  // Log the error message from the server
                alert("Error adding data");
            }
            
        });
    });

    function fetchPic() {
        let currentPage = $(".datatable").DataTable().page();
        $.ajax({
            url: "/pic/fetch",
            type: "GET",
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) {
                    $(".datatable").DataTable().destroy(); 
                }
                let tableBody = "";
                response.success.forEach(function (pic) {
                    tableBody += `<tr>
                        <td>${pic.id}</td>
                        <td>${pic.pic_company_name}</td>
                        <td>${pic.pic_company_contact}</td>
                        <td>${pic.pic_company_address}</td>
                        <td class="d-flex align-items-center">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul>
                                        <li><a class="dropdown-item edit-pic-btn" data-id="${pic.id}"><i class="far fa-edit me-2"></i>${translations.edit}</a></li>
                                        <li><a class="dropdown-item delete-pic-btn" data-id="${pic.id}"><i class="far fa-trash-alt me-2"></i>${translations.delete}</a></li>
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
                alert("Error fetching pic data");
            },
        });
    }
    fetchPic();

    $(document).on("click", ".edit-pic-btn", function () {
        let picId = $(this).data("id");

        $.ajax({
            url: `/pic/edit/${picId}`,
            type: "GET",
            success: function (response) {
                $("#editpicCompany").val(response.pic_company_name);
                $("#editphone").val(response.pic_company_contact);
                $("#editaddress").val(response.pic_company_address);
                $("#editcity").val(response.city);


                $("#edit-pic-modal").modal("show");
                $(".Edit-Update-Pic").data("id", picId);
            },
            error: function () {
                alert("Error fetching Pic data");
            },
        });
    });

    $(".Edit-Update-Pic").click(function () {
        let picId = $(this).data("id");
        let formData = new FormData();

        formData.append("pic_company_name", $("#editpicCompany").val());
        formData.append("contact", $("#editphone").val());
        formData.append("address", $("#editaddress").val());

        $.ajax({
            url: `/pic/update/${picId}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "PIC updated successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#edit-pic-modal").modal("hide");
                fetchPic();
            },
            error: function () {
                alert("Error updating PIC");
            },
        });
    });

    function attachEventHandlers() {
        // Use event delegation for dynamically added elements
        $(document).on('click', '.delete-pic-btn', function () {
            let picId = $(this).data("id");
    
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
                        url: `/pic/destroy/${picId}`,
                        type: "DELETE",
                        success: function () {
                            // After successful deletion, show the success message
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                            fetchPic();
                        },
                        error: function () {
                            alert("Error deleting PIC");
                        },
                    });
                }
            });
        });
    }
    // Call the function to attach event handlers
    attachEventHandlers();
});