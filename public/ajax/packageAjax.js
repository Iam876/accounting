$(document).ready(function () {
    // Set up AJAX headers with CSRF token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Save Package with Room Data
    $("#package_choose_add .customer-btn-save").click(function () {
        let formData = new FormData();

        formData.append("package_name", $("#packageName").val());
        formData.append("description", $("#description").val());
        formData.append("notes", $("#notes").val());

        $.ajax({
            url: "/package/store",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Package added successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#package_choose_add").modal("hide");
                fetchPackage();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("Error adding package");
            },
        });
    });
    
      // Fetch package data for editing
      $(document).on("click", ".edit-package-btn", function () {
        let packageId = $(this).data("id");

        $.ajax({
            url: `/package/edit/${packageId}`,
            type: "GET",
            success: function (response) {
                $("#editpackageName").val(response.package_name);
                $("#editDescription").val(response.description);
                $("#editNotes").val(response.notes);

                $("#edit-package-modal").modal("show");
                $(".Edit-Update-Package").data("id", packageId);
            },
            error: function () {
                alert("Error fetching Package data");
            },
        });
    });

    // Update package
    $(".Edit-Update-Package").click(function () {
        let packageId = $(this).data("id");
        let formData = new FormData();

        formData.append("package_name", $("#editpackageName").val());
        formData.append("description", $("#editDescription").val());
        formData.append("notes", $("#editNotes").val());

        $.ajax({
            url: `/package/update/${packageId}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Package updated successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#edit-package-modal").modal("hide");
                fetchPackage();
            },
            error: function () {
                alert("Error updating Package");
            },
        });
    });

    // Fetch and display apartments
    function fetchPackage() {
        let currentPage = $(".datatable").DataTable().page();
        $.ajax({
            url: "/package/fetch",
            type: "GET",
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) {
                    $(".datatable").DataTable().destroy(); 
                }
                let tableBody = "";
                response.packages.forEach(function (package) {
                    tableBody += `<tr>
                        <td>${package.id}</td>
                        <td>${package.package_name}</td>
                        <td>${package.description}</td>
                        <td>${package.notes}</td>
                        <td class="d-flex align-items-center">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul>
                                        <li><a class="dropdown-item edit-package-btn" data-id="${package.id}"><i class="far fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item delete-package-btn" data-id="${package.id}"><i class="far fa-trash-alt me-2"></i>Delete</a></li>
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
                attachEventHandlers();
            },
            error: function () {
                alert("Error fetching packages");
            },
        });
    }
    fetchPackage();

    // Attach dynamic event handlers
    function attachEventHandlers() {
        // Use event delegation for dynamically added elements
        $(document).on('click', '.delete-package-btn', function () {
            let packageId = $(this).data("id");
    
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
                        url: `/package/destroy/${packageId}`,
                        type: "DELETE",
                        success: function () {
                            // After successful deletion, show the success message
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
    
                            // Refresh the package list
                            fetchPackage();
                        },
                        error: function () {
                            alert("Error deleting package");
                        },
                    });
                }
            });
        });
    }
    // Call the function to attach event handlers
    attachEventHandlers();
});