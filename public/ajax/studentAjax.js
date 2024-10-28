$(document).ready(function () {


    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#student_modal_add, #student_modal_edit").on("shown.bs.modal", function () {
        let modal = $(this); // Identify which modal is being opened

        // Initialize Select2 for School
        modal.find('#schoolName, #editschoolName').select2({
            placeholder: "Select School",
            width: "100%",
            allowClear: true,
            dropdownParent: modal // Ensure the dropdown stays inside the modal
        });

        // Initialize Select2 for Apartment
        modal.find('#selectApartment, #editselectApartment').select2({
            placeholder: "Select an Apartment",
            width: "100%",
            allowClear: true,
            dropdownParent: modal
        });

        // Initialize Select2 for Package Type
        modal.find('#packageType, #editpackageType').select2({
            placeholder: "Select Package Type",
            width: "100%",
            allowClear: true,
            dropdownParent: modal
        });

        // Initialize Select2 for Country
        modal.find('#country, #editcountry').select2({
            placeholder: "Select Country",
            width: "100%",
            allowClear: true,
            dropdownParent: modal
        });
        // Initialize Select2 for Room
        modal.find('#selectRoom, #editselectRoom').select2({
            placeholder: "Select Room",
            width: "100%",
            allowClear: true,
            dropdownParent: modal
        });

        // Fetch necessary data
        fetchSchools(); // Fetch school options
        fetchApartments(); // Fetch apartment options
        fetchPackageTypes(); // Fetch package type options
        fetchCountries();
        fetchRooms();
        // loadRooms();
    });

    $(document).on('change', '#selectApartment, #editselectApartment', function () {
        console.log("Dropdown value: ", $(this).val()); // Log the value directly
        
        let apartmentId = $(this).val();
        console.log("Apartment ID inside event listener: ", apartmentId); // Log after assigning it to the variable
        
        if (apartmentId) {
            fetchRooms(apartmentId); // Fetch and load rooms based on apartment ID
        }
    });
    
    

    function fetchSchools(selectedSchoolId = null) {
        $.ajax({
            url: `/get-schools`, // Correct URL for fetching schools
            type: "GET",
            success: function (data) {
                let options = '<option value="">Select school</option>';
                options += data.map(school => `<option value="${school.id}">${school.school_name}</option>`);
                $("#schoolName, #editschoolName").html(options);

                // Set the selected school for edit modal
                if (selectedSchoolId) {
                    $("#editschoolName").val(selectedSchoolId).trigger('change');
                }
            },
            error: function (error) {
                console.log("Error fetching schools: ", error);
            }
        });
    }

    // Fetch Apartments Data
    function fetchApartments(selectedApartmentId = null, selectedRoomId = null) {
        $.ajax({
            url: `/get-apartments`, // Correct URL for fetching apartments
            type: "GET",
            success: function (data) {
                // Add the placeholder as the first option
                let options = '<option value="">Select an Apartment</option>';
                options += data.map(apartment => `<option value="${apartment.id}">${apartment.mansion_name}</option>`).join('');
    
                // Update the dropdown with the options
                $("#selectApartment, #editselectApartment").html(options);
    
                // If editing, set the selected apartment but don't trigger the change event initially
                if (selectedApartmentId) {
                    $("#editselectApartment").val(selectedApartmentId);
                    // Manually call fetchRooms only if the dropdown value is already set
                    fetchRooms(selectedApartmentId, selectedRoomId);
                }
            },
            error: function (error) {
                console.log("Error fetching apartments: ", error);
            }
        });
    }
    

    // Fetch Package Types Data
    function fetchPackageTypes(selectedPackageId = null) {
        $.ajax({
            url: `/get-packages`, // Correct URL for fetching package types
            type: "GET",
            success: function (data) {
                let options = '<option value="">Select packages</option>';
                options += data.map(package => `<option value="${package.id}">${package.package_name}</option>`);
                $("#packageType, #editpackageType").html(options);

                // Set the selected package for edit modal
                if (selectedPackageId) {
                    $("#editpackageType").val(selectedPackageId).trigger('change');
                }
            },
            error: function (error) {
                console.log("Error fetching package types: ", error);
            }
        });
    }

    // Fetch Rooms Based on Apartment ID
    function fetchRooms(apartmentId, selectedRoomId = null) {
        $.ajax({
            url: `/get-rooms/${apartmentId}`, // Correct URL for fetching rooms
            type: "GET",
            success: function (data) {
                console.log('Rooms Data:', data); // Log the received data
                console.log(apartmentId); // Log the received data
    
                let options = data.map(room => `<option value="${room.id}">${room.room_number}</option>`);
                $("#selectRoom, #editselectRoom").html(options);
    
                // Set the selected room for edit modal
                if (selectedRoomId) {
                    $("#editselectRoom").val(selectedRoomId).trigger('change');
                }
            },
            error: function (error) {
                console.log("Error fetching rooms: ", error); // Log the error
            }
        });
    }
    
    // Add Student Data
    $("#student_modal_add .customer-btn-save").click(function () {
        let formData = new FormData();

        // Profile image
        let profileImage = $("#userPhoto")[0]?.files;
        if (profileImage && profileImage.length > 0) {
            formData.append("student_image", profileImage[0]);
        }

        // Zyro front, back, and passport images
        let myFirstImage = $("#myFirstImage2")[0]?.files;
        if (myFirstImage && myFirstImage.length > 0) {
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

        // Clear previous errors
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').text(''); // Clear previous error messages

        // AJAX request
        $.ajax({
            url: "/student/store", // Your backend route
            type: "POST",
            headers: {
                'Accept': 'application/json' // Ensure Laravel returns JSON errors
            },
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
                fetchStudent();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Laravel validation errors
                    let errors = xhr.responseJSON.errors;

                    // Map validation fields to match form IDs
                    for (let field in errors) {
                        let mappedField = mapFieldToInputId(field); // Use the mapping function
                        let inputField = $("#" + mappedField); // Find the input field by mapped ID

                        inputField.addClass('is-invalid'); // Add Bootstrap's invalid class
                        inputField.siblings('.invalid-feedback').text(errors[field][0]); // Show error message
                    }
                } else {
                    alert("Error adding student. Please check the form and try again.");
                }
            },
        });
    });

    // Helper function to map validation keys to your input IDs
    function mapFieldToInputId(field) {
        let fieldMap = {
            'student_name': 'studentName',
            'name_katakana': 'studentKatakana',
            'email': 'email',
            'phone': 'mobile_code',
            'school_id': 'schoolName',
            'package_id': 'packageType',
            'apartment_id': 'selectApartment',
            'room_id': 'selectRoom',
            'contract_date': 'contractDate',
            'termination_date': 'terminitionDate',
            'billing_date': 'billingDate',
            'initial_fees': 'initialFees',
            'house_rent': 'houseRent',
            'utility_fees': 'utilityFees',
            // Add more mappings as necessary
        };

        return fieldMap[field] || field; // Return the mapped field or fallback to original
    }


    // Fetch Student
    function fetchStudent() {
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
                    var url = window.location.protocol + '//' + window.location.host + '/'; // Make sure to include the protocol
                    tableBody += `<tr>
                        <td>${student.id}</td>
                       <td>
                            <a href="${student.student_image ? student.student_image : '{{ asset("default-image-path.jpg") }}'}" 
                            class="image-popup avatar avatar-md me-2 companies">
                                <img class="img-fluid avatar-img sales-rep" 
                                    src="${student.student_image ? url + student.student_image : '{{ asset("default-image-path.jpg") }}'}" 
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
                                        <li><a class="dropdown-item edit-student-btn" data-id="${student.id}"><i class="far fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item delete-student-btn" data-id="${student.id}"><i class="far fa-trash-alt me-2"></i>Delete</a></li>
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

    $(document).on("click", ".edit-student-btn", function () {
        let studentId = $(this).data("id");

        // Fetch the student data for editing
        $.ajax({
            url: `/students/edit/${studentId}`,
            type: "GET",
            success: function (response) {
                // console.log(response);
                let host = window.location.origin;
                let imageContainer = $('.custom-file-container__image-preview');
                imageContainer.empty();

                // Populate image and fields
                $("#editblah").attr("src", host + "/" + response.student_image);
                $("#editstudentName").val(response.student_name);
                $("#editstudentKatakana").val(response.name_katakana);
                $("#editemail").val(response.email);
                $("#editmobile_code").val(response.phone);
                $("#editcountry").val(response.country);
                $("#editcontractDate").val(response.contract_date);
                $("#editterminitionDate").val(response.termination_date);
                $("#editbillingDate").val(response.billing_date);
                $("#editinitialFees").val(response.initial_fees);
                $("#edithouseRent").val(response.house_rent);
                $("#editutilityFees").val(response.utility_fees);

                // Load school, apartment, and room data and set the selected values
                fetchSchools(response.school_id);
                fetchApartments(response.apartment_id, response.room_id);
                fetchPackageTypes(response.package_id);
                console.log(response.zyro_front);
                $('.custom-file-container__image-preview').html('');

                // Display zyro_front image
                if (response.zyro_front) {
                    let zyroFrontHtml = `
                        <div class="custom-file-container__image-multi-preview" id="zyro_front" style="background-image: url('${response.zyro_front}');">
                            <span class="custom-file-container__image-multi-preview__single-image-clear">
                                <span class="custom-file-container__image-multi-preview__single-image-clear__icon">×</span>
                            </span>
                        </div>
                    `;
                    $('.custom-file-container__image-preview').append(zyroFrontHtml);
                }

                // Display zyro_back image
                if (response.zyro_back) {
                    let zyroBackHtml = `
                        <div class="custom-file-container__image-multi-preview" id="zyro_back" style="background-image: url('${response.zyro_back}');">
                            <span class="custom-file-container__image-multi-preview__single-image-clear">
                                <span class="custom-file-container__image-multi-preview__single-image-clear__icon">×</span>
                            </span>
                        </div>
                    `;
                    $('.custom-file-container__image-preview').append(zyroBackHtml);
                }

                // Display passport_photo image
                if (response.passport_photo) {
                    let passportHtml = `
                        <div class="custom-file-container__image-multi-preview" id="passport_photo" style="background-image: url('${response.passport_photo}');">
                            <span class="custom-file-container__image-multi-preview__single-image-clear">
                                <span class="custom-file-container__image-multi-preview__single-image-clear__icon">×</span>
                            </span>
                        </div>
                    `;
                    $('.custom-file-container__image-preview').append(passportHtml);
                }

                // Show the modal
                $("#student_modal_edit").modal("show");

                // Store the student ID in the save button for future reference
                $(".update-student").data("id", studentId);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("Error fetching student data");
            }
        });
    });
    
    function fetchCountries(selectedCountry = null) {
        $.ajax({
            url: `/get-countries`,
            type: "GET",
            success: function (data) {
                console.log(data.countries);
                let options = '<option value="">Select an Apartment</option>';
                options += Object.entries(data.countries).map(([code, name]) => `<option value="${name}">${name}</option>`);
                $("#country, #editcountry").html(options);
    
                // Set the selected country for edit modal
                if (selectedCountry) {
                    $("#editcountry").val(selectedCountry).trigger('change');
                }
            },
            error: function (error) {
                console.log("Error fetching countries: ", error);
            }
        });
    }
    
    // Update Student
    $(document).on("click", ".update-student", function () {
        let studentId = $(this).data("id");
        let formData = new FormData();

        // Handle main student image upload
        let fileInput = $("#edituserPhoto")[0].files;
        if (fileInput.length > 0) {
            formData.append("student_image", fileInput[0]);
        }

        // Handle zyro_front, zyro_back, and passport_photo images
        let myFirstImage = $("#myFirstImage")[0]?.files; // Correct input field ID for multiple images
        if (myFirstImage && myFirstImage.length > 0) {
            if (myFirstImage[0]) {
                formData.append("zyro_front", myFirstImage[0]); // First file as zyro_front
            }
            if (myFirstImage[1]) {
                formData.append("zyro_back", myFirstImage[1]); // Second file as zyro_back
            }
            if (myFirstImage[2]) {
                formData.append("passport_photo", myFirstImage[2]); // Third file as passport_photo
            }
        }

        // Append other form data
        formData.append("student_name", $("#editstudentName").val());
        formData.append("name_katakana", $("#editstudentKatakana").val());
        formData.append("email", $("#editemail").val());
        formData.append("phone", $("#editmobile_code").val());
        formData.append("school_id", $("#editschoolName").val());
        formData.append("country", $("#editcountry").val());
        formData.append("package_id", $("#editpackageType").val());
        formData.append("apartment_id", $("#editselectApartment").val());
        formData.append("room_id", $("#editselectRoom").val());
        formData.append("contract_date", $("#editcontractDate").val());
        formData.append("termination_date", $("#editterminitionDate").val());
        formData.append("billing_date", $("#editbillingDate").val());
        formData.append("initial_fees", $("#editinitialFees").val());
        formData.append("house_rent", $("#edithouseRent").val());
        formData.append("utility_fees", $("#editutilityFees").val());

        // AJAX request to update student
        $.ajax({
            url: `/students/update/${studentId}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Student updated successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#student_modal_edit").modal("hide");
                fetchStudent(); // Refresh the students list after successful update
            },
            error: function () {
                alert("Error updating student");
            },
        });
    });


    // Function to load room data based on the selected apartment
    // function loadRooms(apartmentId, selectedRoomId = null) {
    //     $.ajax({
    //         url: `/get-rooms/${apartmentId}`, // Correct URL for fetching rooms
    //         type: 'GET',
    //         success: function (rooms) {
    //             console.log(rooms);
    //             let roomSelect = $("#selectRoom, #editselectRoom");
    //             roomSelect.empty();
    //             roomSelect.append('<option disabled selected>Select Room</option>');

    //             $.each(rooms, function (key, room) {
    //                 roomSelect.append(
    //                     `<option value="${room.id}" ${room.id == selectedRoomId ? 'selected' : ''}>${room.room_number}</option>`
    //                 );
    //             });
    //         },
    //         error: function () {
    //             alert("Error loading rooms");
    //         }
    //     });
    // }
    // loadRooms();

    // $(".update-student").click(function () {
    //     let studentId = $(this).data("id");
    //     let formData = new FormData();
    //     let fileInput = $("#userPhoto")[0].files;

    //     if (fileInput.length > 0) {
    //         formData.append("student_image", fileInput[0]);
    //     }

    //     formData.append("student_name", $("#studentName").val());
    //     formData.append("name_katakana", $("#studentKatakana").val());
    //     formData.append("email", $("#email").val());
    //     formData.append("phone", $("#mobile_code").val());
    //     formData.append("school_id", $("#schoolName").val());
    //     formData.append("country", $("#country").val());
    //     formData.append("package_id", $("#packageType").val());
    //     formData.append("apartment_id", $("#selectApartment").val());
    //     formData.append("room_id", $("#selectRoom").val());
    //     formData.append("contract_date", $("#contractDate").val());
    //     formData.append("termination_date", $("#terminitionDate").val());
    //     formData.append("billing_date", $("#billingDate").val());
    //     formData.append("initial_fees", $("#initialFees").val());
    //     formData.append("house_rent", $("#houseRent").val());
    //     formData.append("utility_fees", $("#utilityFees").val());

    //     $.ajax({
    //         url: `/students/update/${studentId}`,
    //         type: "POST",
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function () {
    //             Swal.fire({
    //                 position: "top-end",
    //                 icon: "success",
    //                 title: "Student updated successfully!",
    //                 showConfirmButton: false,
    //                 timer: 3000,
    //             });
    //             $("#student_modal_edit").modal("hide");
    //             fetchStudents();
    //         },
    //         error: function () {
    //             alert("Error updating student");
    //         },
    //     });
    // });


    // Attach dynamic event handlers
    function attachEventHandlers() {
        $(document).on('click', '.delete-student-btn', function () {
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
                        url: `/student/destroy/${schoolId}`,
                        type: "DELETE",
                        success: function () {
                            // After successful deletion, show the success message
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                            // Refresh the school list
                            fetchStudent();
                        },
                        error: function () {
                            alert("Error deleting Student");
                        },
                    });
                }
            });
        });
    }

    attachEventHandlers();
    fetchStudent();

});
