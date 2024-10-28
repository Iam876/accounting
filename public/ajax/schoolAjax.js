$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Add School
    $("#school_modal_add .customer-btn-save").click(function () {
        let formData = new FormData();
        let fileInput = $("#schoolImage")[0].files;

        if (fileInput.length > 0) {
            formData.append("image", fileInput[0]); // Append file if selected
        }

        formData.append("school_name", $("#schoolName").val());
        formData.append("contact", $("#phone").val());
        formData.append("address", $("#address").val());
        formData.append("city", $("#city").val());

        $.ajax({
            url: "/schools/store",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "School added successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#school_modal_add").modal("hide");
                fetchSchools();
            },
            error: function () {
                alert("Error adding school");
            },
        });
    });

    // Fetch School data for editing
    $(document).on("click", ".edit-school-btn", function () {
        let schoolId = $(this).data("id");

        $.ajax({
            url: `/schools/edit/${schoolId}`,
            type: "GET",
            success: function (response) {
                let host = window.location.origin;
                let imageUrl = response.image
                    ? `${host}/${response.image}`
                    : "assets/img/profiles/avatar-14.jpg";

                $("#editschoolName").val(response.school_name);
                $("#editphone").val(response.contact);
                $("#editaddress").val(response.address);
                $("#editcity").val(response.city);
                $(".avatar").attr("src", imageUrl);

                $("#edit-school-modal").modal("show");
                $(".Edit-Update-School").data("id", schoolId);
            },
            error: function () {
                alert("Error fetching school data");
            },
        });
    });

    // Update School
    $(".Edit-Update-School").click(function () {
        let schoolId = $(this).data("id");
        let formData = new FormData();
        let fileInput = $("#editschoolImage")[0].files;

        if (fileInput.length > 0) {
            formData.append("image", fileInput[0]);
        }

        formData.append("school_name", $("#editschoolName").val());
        formData.append("contact", $("#editphone").val());
        formData.append("address", $("#editaddress").val());
        formData.append("city", $("#editcity").val());

        $.ajax({
            url: `/schools/update/${schoolId}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "School updated successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#edit-school-modal").modal("hide");
                fetchSchools();
            },
            error: function () {
                alert("Error updating school");
            },
        });
    });

    // Fetch and display schools
    function fetchSchools() {
        let currentPage = $(".datatable").DataTable().page();
        $.ajax({
            url: "/schools/fetch",
            type: "GET",
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) {
                    $(".datatable").DataTable().destroy(); 
                }
                
                let tableBody = "";
                response.schools.forEach(function (school) {
                    tableBody += `<tr>
                        <td>${school.id}</td>
                        <td><a href="${school.image || '{{ asset("default-image-path.jpg") }}'}" class="image-popup avatar avatar-md me-2 companies">
                            <img class="img-fluid avatar-img sales-rep" 
                                 src="${school.image || '{{ asset("default-image-path.jpg") }}'}" 
                                 alt="School Image" />
                            </a>
                        </td>
                        <td>${school.school_name}</td>
                        <td>${school.contact}</td>
                        <td>${school.address}</td>
                        <td>${school.city}</td>
                        <td class="d-flex align-items-center">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul>
                                        <li><a class="dropdown-item edit-school-btn" data-id="${school.id}"><i class="far fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item delete-school-btn" data-id="${school.id}"><i class="far fa-trash-alt me-2"></i>Delete</a></li>
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
                alert("Error fetching schools");
            },
        });
    }

    // Attach dynamic event handlers
    function attachEventHandlers() {
        // Use event delegation for dynamically added elements
        $(document).on('click', '.delete-school-btn', function () {
            let schoolId = $(this).data("id");
    
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
                        url: `/schools/destroy/${schoolId}`,
                        type: "DELETE",
                        success: function () {
                            // After successful deletion, show the success message
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
    
                            // Refresh the school list
                            fetchSchools();
                        },
                        error: function () {
                            alert("Error deleting school");
                        },
                    });
                }
            });
        });
    }
    // Call the function to attach event handlers
    attachEventHandlers();
    
    fetchSchools();
});
