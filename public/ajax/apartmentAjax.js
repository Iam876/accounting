$(document).ready(function () {
    // Initialize select2 with tagging options
    $(".tagging, #editroom").select2({
        tags: true,
        tokenSeparators: [",", " "],
        placeholder: function () {
            return $(this).data("placeholder");
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

    // Set up AJAX headers with CSRF token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Save Apartment with Room Data
    $("#apartment_modal_add .customer-btn-save").click(function () {
        let formData = new FormData();
        let fileInput = $("#apartmentImage")[0].files;

        if (fileInput.length > 0) {
            formData.append("image", fileInput[0]);
        }

        formData.append("mansion_name", $("#mansionName").val());
        formData.append("address", $("#address").val());
        formData.append("pic_value", $("#pic_name").val());

        // Gather room data
        $("#rooms-container .room-item").each(function (index) {
            formData.append(
                `rooms[${index}][room_number]`,
                $(this).find('[name="room_number"]').val()
            );
            formData.append(
                `rooms[${index}][room_type]`,
                $(this).find('[name="room_type"]').val()
            );
            formData.append(
                `rooms[${index}][initial_rent]`,
                $(this).find('[name="initial_rent"]').val()
            );
            formData.append(
                `rooms[${index}][facilities]`,
                $(this).find('[name="facilities"]').val()
            );
            formData.append(
                `rooms[${index}][max_student]`,
                $(this).find('[name="max_student"]').val()
            );
        });

        $.ajax({
            url: "/apartment/store",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Apartment added successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#apartment_modal_add").modal("hide");
                fetchApartment();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("Error adding apartment");
            },
        });
    });

    // Fetch Apartment data for editing
    $(document).on("click", ".apartment_edit_btn", function () {
        const apartmentId = $(this).data("id");

        $.ajax({
            url: `/apartment/edit/${apartmentId}`,
            type: "GET",
            success: function (response) {
                const host = window.location.origin;
                const imageUrl = response.image
                    ? `${host}/${response.image}`
                    : "assets/img/profiles/avatar-14.jpg";

                // Populate form fields with response data
                $("#editmansionName").val(response.mansion_name);
                $("#editaddress").val(response.mansion_address);
                $("#editpic_name").val(response.pic_id);
                populatePicOptions(response.pic_id);
                // Populate room data
                if (response.rooms && Array.isArray(response.rooms)) {
                    populateRoomNumbers(response.rooms);
                } else {
                    populateRoomNumbers([]);
                }

                // Set the image source
                $(".avatar").attr("src", imageUrl);

                // Open the edit modal
                $("#apartment_modal_edit").modal("show");
                $(".apartment_edit_update").data("id", apartmentId);
            },
            error: function () {
                alert("Error fetching apartment data");
            },
        });
    });

    // Update Edited Apartment
    $(document).on("click", ".apartment_edit_update", function () {
        const apartmentId = $(this).data("id");
        const formData = new FormData();
        const fileInput = $("#editapartmentImage")[0].files;

        // Include the image if a new one was selected
        if (fileInput.length > 0) {
            formData.append("image", fileInput[0]);
        }

        // Add other apartment details to formData
        formData.append("mansion_name", $("#editmansionName").val());
        formData.append("mansion_address", $("#editaddress").val());
        formData.append("pic_id", $("#editpic_name").val());

        // Gather room data from the edit form
        $("#edit-rooms-container .room-item").each(function (index) {
            formData.append(
                `rooms[${index}][room_number]`,
                $(this).find('[name="room_number"]').val()
            );
            formData.append(
                `rooms[${index}][room_type]`,
                $(this).find('[name="room_type"]').val()
            );
            formData.append(
                `rooms[${index}][initial_rent]`,
                $(this).find('[name="initial_rent"]').val()
            );
            formData.append(
                `rooms[${index}][facilities]`,
                $(this).find('[name="facilities"]').val()
            );
            formData.append(
                `rooms[${index}][max_student]`,
                $(this).find('[name="max_student"]').val()
            );
        });

        // Send the updated data through AJAX
        $.ajax({
            url: `/apartment/update/${apartmentId}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Apartment updated successfully!",
                    showConfirmButton: false,
                    timer: 3000,
                });
                $("#apartment_modal_edit").modal("hide");
                fetchApartment(); // Refresh the apartment list or data
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("Error updating apartment");
            },
        });
    });

    // Fetch and display apartments
function fetchApartment() {
    const currentPage = $(".datatable").DataTable().page();
    $.ajax({
        url: "/apartment/fetch",
        type: "GET",
        success: function (response) {
            if ($.fn.DataTable.isDataTable(".datatable")) {
                $(".datatable").DataTable().destroy();
            }

            const tableBody = response.success
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
                                      `<button class="btn btn-primary m-1 room-details-btn" data-room-id="${apartment.rooms[index].id}" data-room="${encodeURIComponent(
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
                                <a href="${
                                    apartment.image ||
                                    '{{ asset("default-image-path.jpg") }}'
                                }" class="image-popup avatar avatar-md me-2 companies">
                                    <img class="img-fluid avatar-img sales-rep" src="${
                                        apartment.image ||
                                        '{{ asset("default-image-path.jpg") }}'
                                    }" alt="Apartment Image" />
                                </a>
                            </td>
                            <td>${apartment.mansion_name}</td>
                            <td>${apartment.mansion_address}</td>
                            <td>${roomButtons}</td>
                            <td>${
                                apartment.pic?.pic_company_name ||
                                "Not Available"
                            }</td>
                            <td>${
                                apartment.pic?.pic_company_contact ||
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
                                                <a class="dropdown-item apartment_edit_btn" data-id="${
                                                    apartment.id
                                                }">
                                                    <i class="far fa-edit me-2"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item delete-apartment-btn" data-id="${
                                                    apartment.id
                                                }">
                                                    <i class="far fa-trash-alt me-2"></i>Delete
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
            $(".datatable")
                .DataTable({ pageLength: 10 })
                .page(currentPage)
                .draw(false);
        },
        error: function () {
            alert("Error fetching apartments");
        },
    });
}

// Event handler for showing room details
// $(document).on("click", ".room-details-btn", function () {
//     const roomData = JSON.parse(decodeURIComponent($(this).data("room")));

//     // Populate the modal fields with room details
//     $("#viewRoomNumber").text(roomData.room_number || "N/A");
//     $("#viewRoomType").text(roomData.room_type || "N/A");
//     $("#viewInitialRent").text(roomData.initial_rent || "N/A");
//     $("#viewMaxStudent").text(roomData.max_student || "N/A");
//     $("#viewFacilities").text(roomData.facilities || "N/A");

//     // Show the modal
//     $("#roomDetailsModal").modal("show");
// });

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

// Function to populate room numbers into the edit modal
function populateRoomNumbers(rooms) {
    const container = $("#edit-rooms-container");
    container.empty();

    rooms.forEach((room) => {
        const newRoom = $("#edit-room-template").clone().removeAttr("id").show();
        newRoom.find('[name="room_number"]').val(room.room_number);
        newRoom.find('[name="room_type"]').val(room.room_type);
        newRoom.find('[name="initial_rent"]').val(room.initial_rent);
        newRoom.find('[name="max_student"]').val(room.max_student);

        // Populate facilities as tags using select2
        const facilitiesSelect = newRoom.find('[name="facilities"]');
        if (room.facilities) {
            try {
                const facilities = JSON.parse(room.facilities);
                facilities.forEach((facility) => {
                    // Add each facility as an option in the select box
                    const option = new Option(facility, facility, true, true);
                    facilitiesSelect.append(option);
                });
            } catch (error) {
                console.error("Error parsing facilities:", error);
            }
        }

        // Initialize select2 for the facilities select box
        facilitiesSelect.select2({
            tags: true,
            tokenSeparators: [",", " "],
            placeholder: "Select or add facilities",
        });

        container.append(newRoom);
    });
}



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
