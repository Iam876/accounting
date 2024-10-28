$(document).ready(function () {

    // AJAX CSRF TOKEN
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Add Billing Methods
    $("#role_modal_add .customer-btn-save").click(function () {
        let formData = new FormData();

        formData.append("roles_name", $("#roleName").val());
        formData.append("status", $("#roleStatus").val());

        $.ajax({
            url: "/roles/create",
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
                $("#role_modal_add").modal("hide");
                fetchRoles();
            },
            error: function () {
                alert("Error adding billing");
            },
        });
    });

    // Edit billing Method
    $(document).on("click", ".edit-roles-btn", function () {
        let roles = $(this).data("id");

        $.ajax({
            url: `/roles/edit/${roles}`,
            type: "GET",
            success: function (response) {
                $("#editRoleName").val(response.roles_name);

                // Set the selected value for the status field
                $("#editRoleStatus").val(response.status).change();

                $("#role_modal_edit").modal("show");
                $(".Edit-Update").data("id", roles);
            },
            error: function () {
                alert("Error fetching Roles data");
            },
        });
    });


    // Update Billing Method
    $(".Edit-Update").click(function () {
        let roles_id = $(this).data("id");
        let formData = new FormData();

        formData.append("roles_name", $("#editRoleName").val());
        formData.append("status", $("#editRoleStatus").val());

        $.ajax({
            url: `/roles/update/${roles_id}`,
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
                $("#role_modal_edit").modal("hide");
                fetchRoles();
            },
            error: function () {
                alert("Error updating BIlling Modal");
            },
        });
    });


    $(document).on('click', '.delete-roles-btn', function () {
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
                    url: `/roles/destroy/${delete_id}`,
                    type: "DELETE",
                    success: function (response) {
                        // After successful deletion, show the success message
                        Swal.fire({
                            title: "Deleted!",
                            text: response.status,
                            icon: "success"
                        });

                        // Refresh the school list
                        fetchRoles();
                    },
                    error: function () {
                        alert("Error deleting Data");
                    },
                });
            }
        });
    });

    // Fetch Billing Methods
    function fetchRoles() {
        let currentPage = $(".datatable").DataTable().page();
        $.ajax({
            url: "/fetch/roles",
            type: "get",
            processData: false,
            contentType: false,
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) {
                    $(".datatable").DataTable().destroy();
                }

                let tableBody = "";
                response.forEach(function (RoleAll) {
                    // console.log(response);
                    let statusButtonClass = RoleAll.status === "active" ? "btn-success" : "btn-danger";
                    let statusButtonText = RoleAll.status === "active" ? "Active" : "Inactive";
                    tableBody += `<tr>
                        <td>${RoleAll.id}</td>
                        <td>${RoleAll.roles_name}</td>
                        <td>
                        <button type="button" class="btn ${statusButtonClass}">
                            ${statusButtonText}
                        </button>
                        </td>
                        <td class="d-flex align-items-center">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul>
                                        <li><a class="dropdown-item edit-roles-btn" data-id="${RoleAll.id}"><i class="far fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item delete-roles-btn" data-id="${RoleAll.id}"><i class="far fa-trash-alt me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>`;
                });

                $(".datatable tbody").html(tableBody);
                $(".datatable").DataTable({
                    "pageLength": 10 // Ensure this matches the number of rows per page you want
                }).page(currentPage).draw(false);
                // attachEventHandlers();
            },
            error: function () {
                alert("Error adding billing");
            },
        });
    }

    fetchRoles();

});