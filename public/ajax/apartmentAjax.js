$(document).ready(function () {
    // Set up AJAX headers with CSRF token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Add and remove room functionality
    $(document).on("click", "#add-room-btn, #add-edit-room-btn", function () {
        const roomTemplate = $(this).data("target-template");
        $(roomTemplate)
            .clone()
            .removeAttr("id")
            .show()
            .appendTo($(this).data("target-container"));
    });

    $(document).on("click", ".remove-room-btn", function () {
        $(this).closest(".room-item").remove();
    });

    $("#editpic_name").select2({
        placeholder: "Select PIC",
    });


    function updateSweetAlertProgress(percent) {
        const progressBar = $(".swal2-progress-bar");
        progressBar.css("width", percent + "%");
        $(".swal2-title").text(`Uploading... ${percent}%`);
    }

    function uploadPhoto(file, roomNumber, mansionName) {
        return new Promise((resolve, reject) => {
            let photoData = new FormData();
            photoData.append("photo", file);
            photoData.append("room_number", roomNumber);
            photoData.append("mansion_name", mansionName);

            $.ajax({
                url: "/apartment/upload-photo",
                type: "POST",
                data: photoData,
                processData: false,
                contentType: false,
                xhr: function () {
                    let xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener(
                        "progress",
                        function (evt) {
                            if (evt.lengthComputable) {
                                const percentComplete = Math.round(
                                    (evt.loaded / evt.total) * 100
                                );
                                updateSweetAlertProgress(percentComplete);
                            }
                        },
                        false
                    );
                    return xhr;
                },
                success: function (response) {
                    resolve(response.filePath);
                },
                error: function (xhr) {
                    reject(xhr.responseText);
                },
            });
        });
    }

    function checkUploadStatus(filePath) {
        let progress = 0; // Start progress at 0
        const interval = setInterval(() => {
            progress += 5; // Simulate incremental progress
            updateProgressBar(progress);

            $.get("/apartment/upload-status", { filePath: filePath }, function (response) {
                if (response.status === "completed") {
                    clearInterval(interval);
                    updateProgressBar(100); // Ensure it reaches 100%
                    console.log("Upload complete!");
                }
            }).fail(() => {
                clearInterval(interval);
                updateProgressBar(100); // Ensure it finishes on failure
                console.error("Error checking upload status");
            });
        }, 1000); // Check every second
    }

    $("#apartment_modal_add .customer-btn-save").click(function () {
        const modal = $("#apartment_modal_add");
        const formData = new FormData();
        const fileInput = $("#apartmentImage")[0].files;

        // Close the modal immediately
        modal.modal("hide");

        // Show SweetAlert with progress bar positioned in the top-right
        Swal.fire({
            title: "Uploading... 0%",
            html: `
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar swal2-progress-bar" 
                         role="progressbar" 
                         style="width: 0%; height: 100%; background-color: #7539FF;">
                    </div>
                </div>
            `,
            position: "top-end",
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                popup: "swal2-top-right-popup",
            },
            backdrop: false, // Remove background overlay for unobtrusive behavior
        });

        // Add image to formData if present
        if (fileInput.length > 0) {
            formData.append("image", fileInput[0]);
        }

        // Add other form fields to formData
        formData.append("mansion_name", $("#mansionName").val());
        formData.append("address", $("#address").val());
        formData.append("mansion_structure", $("#mansion_structure").val());
        formData.append("pic_value", $("#pic_name").val());
        formData.append("notes", $("#apartmentNotes").val());

        const roomData = [];
        const uploadPromises = [];

        // Collect room data
        $("#rooms-container .room-item").each(function () {
            const roomForm = {
                room_number: $(this).find('[name="room_number"]').val(),
                room_type: $(this).find('[name="room_type"]').val(),
                initial_rent: $(this).find('[name="initial_rent"]').val(),
                facilities: $(this).find('[name="facilities"]').val(),
                max_student: $(this).find('[name="max_student"]').val(),
                photos: [],
                notes: $(this).find('[name="room_notes"]').val(),
            };

            const photoFiles = $(this).find(".photos-input")[0]?.files || [];
            Array.from(photoFiles).forEach((file) => {
                const uploadPromise = uploadPhoto(file, roomForm.room_number, $("#mansionName").val());
                uploadPromises.push(
                    uploadPromise.then((filePath) => {
                        roomForm.photos.push(filePath);
                    })
                );
            });

            roomData.push(roomForm);
        });

        // Wait for all photo uploads to complete
        Promise.all(uploadPromises).then(() => {
            formData.append("rooms", JSON.stringify(roomData));

            // Submit the apartment and room data
            $.ajax({
                url: "/apartment/store",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    Swal.fire({
                        icon: "success",
                        title: "Apartment added successfully!",
                        timer: 3000,
                        position: "top-end",
                        showConfirmButton: false,
                    });
                    fetchApartment(); // Refresh the apartment list
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: xhr.responseText,
                        position: "top-end",
                    });
                },
            });
        });
    });



    $(document).on("click", ".apartment_edit_btn", function () {
        const apartmentId = $(this).data("id");

        $.ajax({
            url: `/apartment/edit/${apartmentId}`,
            type: "GET",
            success: function (response) {
                const host = window.location.origin;
                const imageUrl = response.image ? `${host}/${response.image}` : "assets/img/profiles/avatar-14.jpg";

                $("#editmansionName").val(response.mansion_name);
                $("#editaddress").val(response.mansion_address);
                $("#edit_mansion_structure").val(response.mansion_structure);
                $("#editpic_name").val(response.pic_id);
                $(".apartment_edit_update").data("id", response.id);
                $("#edit-rooms-container").empty();
                $("#editapartmentNotes").val(response.notes);
                populatePicOptions(response.pic_id);
                response.rooms.forEach((room) => {
                    console.log('Type of notes:', typeof room.notes);

                    const roomTemplate = $("#edit-room-template").clone().removeAttr("id").show();
                    roomTemplate.find('[name="id"]').val(room.id);
                    roomTemplate.find('[name="room_number"]').val(room.room_number);
                    roomTemplate.find('[name="room_type"]').val(room.room_type);
                    roomTemplate.find('[name="initial_rent"]').val(room.initial_rent);
                    roomTemplate.find('[name="facilities"]').val(room.facilities);
                    roomTemplate.find('[name="max_student"]').val(room.max_student);
                    roomTemplate.find('[name="room_notes"]').val(room.notes);

                    room.photo_urls.forEach((url) => {
                        roomTemplate.find(".uploaded-photos").append(`<img src="${url}" class="img-thumbnail" />`);
                    });
                    $("#edit-rooms-container").append(roomTemplate);
                    populateRoomNumbers(response.rooms);
                });

                $(".avatar").attr("src", imageUrl);
                $("#apartment_modal_edit").modal("show");
            },
            error: function () {
                alert("Error fetching apartment data");
            },
        });
    });


    $(document).on("click", ".apartment_edit_update", function () {
        const apartmentId = $(this).data("id");

        // Debug apartmentId


        if (!apartmentId) {
            console.error("Error: Apartment ID is undefined!");
            return;
        }

        const formData = new FormData();
        const fileInput = $("#editapartmentImage")[0].files;

        if (fileInput.length > 0) {
            formData.append("image", fileInput[0]);
        } else {
            console.log("No Main Image Provided");
        }

        formData.append("mansion_name", $("#editmansionName").val());
        formData.append("mansion_address", $("#editaddress").val());
        formData.append("mansion_structure", $("#edit_mansion_structure").val());
        formData.append("pic_id", $("#editpic_name").val());
        formData.append("notes", $("#editapartmentNotes").val());


        $("#edit-rooms-container .room-item").each(function (index) {
            const roomId = $(this).find('[name="id"]').val();
        
            // Only append the ID if it's a valid integer
            if (roomId && roomId !== "null") {
                formData.append(`rooms[${index}][id]`, parseInt(roomId, 10));
            }
        
            formData.append(`rooms[${index}][room_number]`, $(this).find('[name="room_number"]').val());
            formData.append(`rooms[${index}][room_type]`, $(this).find('[name="room_type"]').val());
            formData.append(`rooms[${index}][initial_rent]`, $(this).find('[name="initial_rent"]').val());
            formData.append(`rooms[${index}][facilities]`, $(this).find('[name="facilities"]').val());
            formData.append(`rooms[${index}][max_student]`, $(this).find('[name="max_student"]').val());
            formData.append(`rooms[${index}][notes]`, $(this).find('[name="room_notes"]').val());
        
            const photoFiles = $(this).find('[name="photos[]"]')[0]?.files || [];
            for (let i = 0; i < photoFiles.length; i++) {
                formData.append(`rooms[${index}][photos][]`, photoFiles[i]);
            }
        });
        


        $.ajax({
            url: `/apartment/update/${apartmentId}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {

                Swal.fire({
                    icon: "success",
                    title: "Apartment updated successfully!",
                    timer: 3000,
                });
                $("#apartment_modal_edit").modal("hide");
                fetchApartment(); // Reload apartment list
            },
            error: function (xhr) {
                console.error("Error Response:", xhr.responseText);
                alert("Error updating apartment");
            },
        });
    });


    function fetchApartment() {
        const currentPage = $(".datatable").DataTable().page();
        $.ajax({
            url: "/apartment/fetch",
            type: "GET",
            success: function (response) {
                if ($.fn.DataTable.isDataTable(".datatable")) {
                    $(".datatable").DataTable().destroy();
                }

                const tableBody = response.apartments
                    .map((apartment) => {
                        // Extract room numbers from the `rooms` array if present
                        const roomNumbers = apartment.rooms
                            ? apartment.rooms.map((room) => room.room_number)
                            : [];

                        // Create buttons for each room number
                        const roomButtons = roomNumbers.length
                            ? roomNumbers
                                .map(
                                    (room, index) =>
                                        `<button class="btn btn-primary m-1 room-details-btn" data-room-id="${apartment.rooms[index].id
                                        }" data-room="${encodeURIComponent(
                                            JSON.stringify(
                                                apartment.rooms[index]
                                            )
                                        )}" style="font-size:11px;">${room}</button>`
                                )
                                .join("")
                            : "No Room";

                        // Generate the table row for each apartment
                        return `<tr>
                            <td>${apartment.id}</td>
                            <td>
                                <a href="${apartment.image ? apartment.image : defaultImagePath}" class="image-popup avatar avatar-md me-2 companies">
                                <img class="img-fluid avatar-img sales-rep" 
                                    src="${apartment.image ? apartment.image : defaultImagePath}" 
                                    alt="School Image" />
                            </a>
                            </td>
                            <td>${apartment.mansion_name}</td>
                            <td>${apartment.mansion_address}</td>
                            <td>${roomButtons}</td>
                            <td>${apartment.pic?.pic_company_name ||
                            "Not Available"
                            }</td>
                            <td>${apartment.pic?.pic_company_contact ||
                            "Not Available"
                            }</td>
                            <td class="d-flex align-items-center">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul>
                                            <li>
                                                <a class="dropdown-item apartment_edit_btn" data-id="${apartment.id
                            }">
                                                    <i class="far fa-edit me-2"></i>${translations.edit}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item delete-apartment-btn" data-id="${apartment.id
                            }">
                                                    <i class="far fa-trash-alt me-2"></i>${translations.delete}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                    })
                    .join("");

                // Update the table body and reinitialize DataTable
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
                alert("Error fetching apartments");
            },
        });
    }

    // Event handler for showing room details
    $(document).on("click", ".room-details-btn", function () {
        const roomData = JSON.parse(decodeURIComponent($(this).data("room")));

        // Populate the modal fields with room details
        $("#viewRoomNumber").text(roomData.room_number || "N/A");
        $("#viewRoomType").text(roomData.room_type || "N/A");
        $("#viewInitialRent").text(roomData.initial_rent || "N/A");
        $("#viewMaxStudent").text(roomData.max_student || "N/A");

        // Populate facilities as tags in the select2 element
        const facilitiesSelect = $("#viewFacilities");
        facilitiesSelect.empty(); // Clear previous options

        if (roomData.facilities) {
            try {
                const facilities = JSON.parse(roomData.facilities);
                facilities.forEach((facility) => {
                    // Add each facility as a selected option
                    const option = new Option(facility, facility, true, true);
                    facilitiesSelect.append(option);
                });
            } catch (error) {
                console.error("Error parsing facilities:", error);
            }
        }

        // Initialize select2 for the facilities select box with disabled interaction
        facilitiesSelect.select2({
            tags: true,
            tokenSeparators: [",", " "],
            placeholder: "Facilities",
        });

        // Disable the select2 input to make it read-only
        facilitiesSelect.prop("disabled", true);

        // Show the modal
        $("#roomDetailsModal").modal("show");
    });

    function fetchPicNames() {
        $.ajax({
            url: "/pic/names",
            type: "GET",
            success: function (response) {
                const options = response
                    .map(
                        (pic) =>
                            `<option value="${pic.id}">${pic.pic_company_name}</option>`
                    )
                    .join("");
                $("#pic_name").html(
                    `<option value="">Select PIC</option>${options}`
                );
            },
            error: function () {
                alert("Error fetching PIC names");
            },
        });
    }

    function populateRoomNumbers(rooms) {
        const container = $("#edit-rooms-container");
        container.empty();

        rooms.forEach((room, index) => {


            const newRoom = $("#edit-room-template")
                .clone()
                .removeAttr("id")
                .show();

            // Populate room data
            newRoom.find('[name="room_number"]').val(room.room_number);
            newRoom.find('[name="room_type"]').val(room.room_type);
            newRoom.find('[name="initial_rent"]').val(room.initial_rent);
            newRoom.find('[name="max_student"]').val(room.max_student);
            newRoom.find('[name="id"]').val(room.id);
            newRoom.find('[name="room_notes"]').val(room.notes);

            // Handle facilities
            if (room.facilities) {
                try {
                    const facilitiesArray = JSON.parse(room.facilities);
                    newRoom.find('[name="facilities"]').val(facilitiesArray.join(", "));
                } catch (error) {
                    console.error("Error parsing facilities:", error);
                    newRoom.find('[name="facilities"]').val(room.facilities);
                }
            }

            // Assign photo URLs to the "View Images" button
            const photoUrls = room.photo_urls || [];


            newRoom.find(".view-room-images-btn").attr("data-room-images", JSON.stringify(photoUrls));


            container.append(newRoom);
        });
    }

    $(document).on("click", ".view-room-images-btn", function () {
        // Use .attr() to retrieve the raw attribute value
        const roomImages = $(this).attr("data-room-images");

        // Parse the JSON string
        let parsedRoomImages = [];
        try {
            parsedRoomImages = JSON.parse(roomImages);
        } catch (error) {
            console.error("Error parsing room images:", error);
        }

        // Clear existing images in the gallery and carousel
        const galleryContainer = $("#room-images-container");
        const carouselContainer = $("#carousel-images-container");
        galleryContainer.empty();
        carouselContainer.empty();

        if (Array.isArray(parsedRoomImages) && parsedRoomImages.length > 0) {
            parsedRoomImages.forEach((imageUrl, index) => {
                // Create a gallery placeholder with spinner
                const galleryImageWrapper = $(`
                    <div class="col-md-3 d-flex justify-content-center align-items-center" style="min-height: 150px;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                `);

                // Append the spinner placeholder to the gallery
                galleryContainer.append(galleryImageWrapper);

                // Create the actual image element
                const galleryImage = $(`
                    <img src="${imageUrl}" class="img-fluid rounded gallery-image col-md-3" alt="Room Image" style="display: none;" data-index="${index}">
                `);

                // Handle image loading
                galleryImage.on("load", function () {
                    galleryImageWrapper.replaceWith(galleryImage); // Replace spinner with the loaded image
                    galleryImage.fadeIn(); // Fade-in effect for a smoother transition
                });

                // Handle image load errors
                galleryImage.on("error", function () {
                    galleryImageWrapper.replaceWith('<p class="text-danger">Failed to load image</p>');
                });

                // Add image to the carousel
                const carouselItem = $(`
                    <div class="carousel-item ${index === 0 ? "active" : ""}">
                        <img src="${imageUrl}" class="d-block w-100" alt="Room Image">
                    </div>
                `);
                carouselContainer.append(carouselItem);
            });

            // Show the gallery modal
            $("#room-images-modal").modal("show");

            // Set up click event for gallery images to open carousel
            $(document).on("click", ".gallery-image", function () {
                const startIndex = $(this).data("index");
                $("#room-images-modal").modal("hide"); // Close the gallery modal
                $("#image-carousel-modal").modal("show"); // Show the carousel modal
                $("#image-carousel").carousel(startIndex); // Start carousel at the clicked image
            });

            // Reopen the gallery modal when the carousel modal is closed
            $("#image-carousel-modal").on("hidden.bs.modal", function () {
                $("#room-images-modal").modal("show"); // Reopen gallery modal
            });
        } else {
            galleryContainer.append('<p>No images available for this room.</p>');
        }
    });

    function populatePicOptions(selectedPicId) {
        $.ajax({
            url: "/path-to-fetch-pic-options",
            type: "GET",
            success: function (response) {
                const options = response.pics
                    .map(
                        (pic) =>
                            `<option value="${pic.id}">${pic.pic_company_name}</option>`
                    )
                    .join("");
                $("#editpic_name").html(
                    `<option value="">Select PIC</option>${options}`
                );
                if (selectedPicId) {
                    $("#editpic_name")
                        .val(selectedPicId)
                        .trigger("change.select2");
                }
            },
            error: function () {
                alert("Error fetching PIC options");
            },
        });
    }

    $("#apartment_modal_add").on("shown.bs.modal", fetchPicNames);
    fetchApartment();

    // Attach dynamic event handlers
    function attachEventHandlers() {
        // Use event delegation for dynamically added elements
        $(document).on("click", ".delete-apartment-btn", function () {
            let apartmentId = $(this).data("id");

            // Trigger SweetAlert confirmation
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                // If confirmed, proceed with the deletion
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/apartment/destroy/${apartmentId}`,
                        type: "DELETE",
                        success: function () {
                            // After successful deletion, show the success message
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                            });

                            // Refresh the apartment list
                            fetchApartment(); // Corrected function name
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                            Swal.fire({
                                title: "Error!",
                                text: "An error occurred while deleting the apartment.",
                                icon: "error",
                            });
                        },
                    });
                }
            });
        });
    }
    attachEventHandlers();
});
