$(document).ready(function () {
    // AJAX CSRF TOKEN
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Add Role
    $("#role_modal_add .customer-btn-save").click(function () {
        let formData = new FormData();
        formData.append("roles_name", $("#roleName").val());
        // formData.append("guard_name", $("#guardName").val());

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
                alert("Error adding role");
            },
        });
    });

    // Edit Role
    $(document).on("click", ".edit-roles-btn", function () {
        let roles = $(this).data("id");

        $.ajax({
            url: `/roles/edit/${roles}`,
            type: "GET",
            success: function (response) {
                $("#editRoleName").val(response.name);
                // $("#editGuardName").val(response.guard_name);
                $("#role_modal_edit").modal("show");
                $(".Edit-Update").data("id", roles);
            },
            error: function () {
                alert("Error fetching role data");
            },
        });
    });

    // Update Role
    $(".Edit-Update").click(function () {
        let roles_id = $(this).data("id");
        let formData = new FormData();
        formData.append("roles_name", $("#editRoleName").val());
        // formData.append("guard_name", $("#editGuardName").val());

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
                alert("Error updating role");
            },
        });
    });

    // Delete Role
    $(document).on('click', '.delete-roles-btn', function () {
        let delete_id = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/roles/destroy/${delete_id}`,
                    type: "DELETE",
                    success: function (response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.status,
                            icon: "success"
                        });
                        fetchRoles();
                    },
                    error: function () {
                        alert("Error deleting role");
                    },
                });
            }
        });
    });

    // Fetch Roles
    function fetchRoles() {
        let currentPage = $(".datatable").DataTable().page();
        $.ajax({
            url: "/fetch/roles",
            type: "GET",
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) {
                    $(".datatable").DataTable().destroy();
                }

                let tableBody = "";
                response.forEach(function (RoleAll) {
                    let statusButtonClass = RoleAll.guard_name === "web" ? "btn-success" : "btn-info";
                    tableBody += `<tr>
                        <td>${RoleAll.id}</td>
                        <td>${RoleAll.name}</td>
                  
                      
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
                    "pageLength": 10
                }).page(currentPage).draw(false);
            },
            error: function () {
                alert("Error fetching roles");
            },
        });
    }

    fetchRoles();
});
