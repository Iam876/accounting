$(document).ready(function () {

    // AJAX setup to include the CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    

    // Fetch and display users
    function fetchUsers() {
        $.ajax({
            url: "/fetch/users",
            type: "GET",
            success: function (response) {
                let tableBody = "";
                response.forEach(function (user) {
                    let roles = user.roles.map(role => role.name).join(', ');
                    tableBody += `<tr>
                        <td>${user.id}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${roles}</td>
                        <td>
                            <button class="btn btn-sm btn-warning edit-user" data-id="${user.id}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-user" data-id="${user.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#usersTableBody').html(tableBody);
            }
        });
    }

    // Fetch roles for the dropdown in Add User modal
    function fetchRoles() {
        $.ajax({
            url: "/fetch/roles",
            type: "GET",
            success: function (response) {
                let roleOptions = "<option>Select Role</option>";
                response.forEach(function (role) {
                    roleOptions += `<option value="${role.name}">${role.name}</option>`;
                });
                $('#roles').html(roleOptions);
            }
        });
    }

    // Initialize
    fetchUsers();
    fetchRoles();

    // Add User
    $("#addUserForm").on("submit", function (e) {
        e.preventDefault();

        let formData = {
            first_name: $("#firstName").val(),
            last_name: $("#lastName").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            roles: $("#roles").val(),
            status: $("#status").val()
        };

        $.ajax({
            url: "/users/store",
            type: "POST",
            data: formData,
            success: function (response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.status,
                    showConfirmButton: false,
                    timer: 3000,
                });
                $('#add_user').modal('hide');
                fetchUsers();  // Refresh the users list
            },
            error: function () {
                alert("Error creating user");
            }
        });
    });

    // Edit User (similarly, you can implement the logic here)

    // Delete User
    $(document).on('click', '.delete-user', function () {
        let userId = $(this).data("id");

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
                    url: `/users/destroy/${userId}`,
                    type: "DELETE",
                    success: function (response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.status,
                            icon: "success"
                        });
                        fetchUsers();  // Refresh the users list
                    },
                    error: function () {
                        alert("Error deleting user");
                    }
                });
            }
        });
    });

    // Additional functionality for editing users can be added similarly to the Add User functionality
});
