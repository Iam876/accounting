$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#student_modal_add").on("show.bs.modal", function () {
        fetchSchools();
        fetchApartments();
        fetchPackageTypes();
    });

    function fetchSchools() {
        $.ajax({
            url: "/schools/fetch", // Update with your backend route
            type: "GET",
            success: function (data) {
                let options = data.schools.map(school => `<option value="${school.id}">${school.school_name}</option>`);
                $("#schoolName").html(options);
            },
            error: function (error) {
                console.log("Error fetching schools: ", error);
            },
        });
    }

    function fetchApartments() {
        $.ajax({
            url: "/apartment/fetch",
            type: "GET",
            success: function (data) {
                let options = data.apartments.map(apartment => `<option value="${apartment.id}">${apartment.mansion_name}</option>`);
                $("#selectApartment").html(options);
            },
            error: function (error) {
                console.log("Error fetching apartments: ", error);
            },
        });
    }

    function fetchPackageTypes() {
        $.ajax({
            url: "/package/fetch",
            type: "GET",
            success: function (data) {
                let options = data.packages.map(package => `<option value="${package.id}">${package.package_name}</option>`);
                $("#packageType").html(options);
            },
            error: function (error) {
                console.log("Error fetching package types: ", error);
            },
        });
    }

    $("#selectApartment").change(function () {
        let apartmentId = $(this).val();
        if (apartmentId) {
            $.ajax({
                url: `/apartments/${apartmentId}/rooms`,
                type: "GET",
                success: function (data) {
                    let options = data.rooms.map(room => `<option value="${room.id}">${room.room_number}</option>`);
                    $("#selectRoom").html(options);
                },
                error: function (error) {
                    console.log("Error fetching rooms: ", error);
                },
            });
        } else {
            $("#selectRoom").html('<option disabled>Select Room</option>');
        }
    });

    $("#student_modal_add .customer-btn-save").click(function () {
        let formData = new FormData();
    
        // Profile image
        let profileImage = $("#userPhoto")[0]?.files;
        if (profileImage && profileImage.length > 0) {
            formData.append("student_image", profileImage[0]);
        }
    
        // Zyro front, back, and passport images
        let myFirstImage = $("#myFirstImage")[0]?.files;
        if (myFirstImage && myFirstImage.length > 0) {
            // Assuming the first image is Zyro Front, second is Zyro Back, third is Passport
            if (myFirstImage[0]) {
                formData.append("zyro_front", myFirstImage[0]);
            }
            if (myFirstImage[1]) {
                formData.append("zyro_back", myFirstImage[1]);
            }
            if (myFirstImage[2]) {
                formData.append("passport_photo", myFirstImage[2]);
            }
        }
    
        // Gather other form data
        formData.append("student_name", $("#studentName").val());
        formData.append("name_katakana", $("#studentKatakana").val());
        formData.append("email", $("#email").val());
        formData.append("phone", $("#mobile_code").val());
        formData.append("school_id", $("#schoolName").val());
        formData.append("country", $("#country").val());
        formData.append("package_id", $("#packageType").val());
        formData.append("apartment_id", $("#selectApartment").val());
        formData.append("room_id", $("#selectRoom").val());
        formData.append("contract_date", $("#contractDate").val());
        formData.append("termination_date", $("#terminitionDate").val());
        formData.append("billing_date", $("#billingDate").val());
        formData.append("initial_fees", $("#initialFees").val());
        formData.append("house_rent", $("#houseRent").val());
        formData.append("utility_fees", $("#utilityFees").val());
    
        // AJAX request
        $.ajax({
            url: "/student/store", // Update with your backend route
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Student added successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#student_modal_add").modal("hide");
                // Optionally, refresh or fetch updated student list here
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("Error adding student. Please check the form and try again.");
            },
        });
    });

    function fetchSchools() {
        let currentPage = $(".datatable").DataTable().page();
        $.ajax({
            url: "/student/fetch",
            type: "GET",
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) {
                    $(".datatable").DataTable().destroy(); 
                }
                let tableBody = "";
                response.success.forEach(function (student) {
                    tableBody += `<tr>
                        <td>${student.id}</td>
                        <td><a href="${student.student_image || '{{ asset("default-image-path.jpg") }}'}" class="image-popup avatar avatar-md me-2 companies">
                                <img class="img-fluid avatar-img sales-rep" 
                                     src="${student.student_image || '{{ asset("default-image-path.jpg") }}'}" 
                                     alt="School Image" />
                                </a>
                            </td>
                        <td>${student.student_name}</td>
                        <td>${student.school.school_name}</td>
                        <td>${student.phone}</td>
                        <td>${student.apartment.mansion_name}</td>
                        <td>${student.room.room_number}</td>
                        <td>${student.initial_fees}</td>
                        <td>${student.house_rent}</td>
                        <td>${student.utility_fees}</td>
                        
                        
                        <td class="d-flex align-items-center">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul>
                                        <li><a class="dropdown-item edit-school-btn" data-id="${student.id}"><i class="far fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item delete-school-btn" data-id="${student.id}"><i class="far fa-trash-alt me-2"></i>Delete</a></li>
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

    fetchSchools();
 
});
