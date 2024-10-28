@extends('layouts.header')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Apartments</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Filter"><span class="me-2"><img
                                            src="{{ asset('assets') }}/img/icons/filter-icon.svg"
                                            alt="filter"></span>Filter </a>
                            </li>
                            <li class="">
                                <div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Download">
                                    <a href="#" class="btn-filters" data-bs-toggle="dropdown"
                                        aria-expanded="false"><span><i class="fe fe-download"></i></span></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="d-block">
                                            <li>
                                                <a class="d-flex align-items-center download-item"
                                                    href="javascript:void(0);" download><i
                                                        class="far fa-file-pdf me-2"></i>PDF</a>
                                            </li>
                                            <li>
                                                <a class="d-flex align-items-center download-item"
                                                    href="javascript:void(0);" download><i
                                                        class="far fa-file-text me-2"></i>CVS</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Print"><span><i
                                            class="fe fe-printer"></i></span> </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-primary waves-effect waves-light mt-1"
                                    data-bs-toggle="modal" data-bs-target="#apartment_modal_add"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Apartments</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /Modal Start -->
            <div id="apartment_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="form-group-item">
                                    <h5 class="form-title">Basic Details</h5>
                                    <div class="profile-picture">
                                        <div class="upload-profile">
                                            <div class="profile-img">
                                                <img id="blah" class="avatar" src="assets/img/profiles/avatar-14.jpg"
                                                    alt="profile-img">
                                            </div>
                                            <div class="add-profile">
                                                <h5>Upload Apartment Photo</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="img-upload d-flex">
                                            <label class="btn btn-upload">
                                                Upload <input id="apartmentImage" type="file">
                                            </label>
                                            <a class="btn btn-remove">Remove</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>Mansion Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="mansionName"
                                                    placeholder="Enter Mansion Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="Enter Mansion Address">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>PIC Name <span class="text-danger">*</span></label>
                                                <select class="form-control" id="pic_name">
                                                    <option selected="selected">orange</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Rooms</label>
                                            {{-- <button type="button" id="add-room-btn" class="btn btn-primary mb-2">Add Room</button> --}}
                                            <button id="add-room-btn" class="btn btn-primary mb-2"
                                                data-target-template="#room-template"
                                                data-target-container="#rooms-container">Add Room</button>
                                            <div id="rooms-container"></div>
                                            <!-- Room Template (hidden) -->
                                            <div id="room-template" class="room-item mb-3" style="display: none;">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="room_number"
                                                            placeholder="Room Number">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="room_type"
                                                            placeholder="Room Type">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="initial_rent"
                                                            placeholder="Initial Rent">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="facilities"
                                                            placeholder="Facilities">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="number" class="form-control" name="max_student"
                                                            placeholder="Max Students">
                                                    </div>
                                                    <div
                                                        class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex align-items-center">
                                                        <button type="button"
                                                            class="btn btn-danger remove-room-btn">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save">Add Apartment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="apartment_modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="form-group-item">
                                    <h5 class="form-title">Edit Apartment Details</h5>
                                    <div class="profile-picture">
                                        <div class="upload-profile">
                                            <div class="profile-img">
                                                <img id="blah" class="avatar"
                                                    src="assets/img/profiles/avatar-14.jpg" alt="profile-img">
                                            </div>
                                            <div class="add-profile">
                                                <h5>Upload Apartment Photo</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="img-upload d-flex">
                                            <label class="btn btn-upload">
                                                Upload <input id="editapartmentImage" type="file">
                                            </label>
                                            <a class="btn btn-remove">Remove</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>Mansion Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="editmansionName"
                                                    placeholder="Enter Mansion Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="editaddress"
                                                    placeholder="Enter Mansion Address">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>PIC Name <span class="text-danger">*</span></label>
                                                <select class="form-control" id="editpic_name"></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Rooms</label>
                                            {{-- <button type="button" id="add-edit-room-btn" class="btn btn-primary mb-2">Add Room</button> --}}
                                            <button id="add-edit-room-btn" class="btn btn-primary mb-2"
                                                data-target-template="#edit-room-template"
                                                data-target-container="#edit-rooms-container">Add Room</button>
                                            <div id="edit-rooms-container"></div>
                                            <!-- Room Template (hidden) -->
                                            <div id="edit-room-template" class="room-item mb-3" style="display: none;">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="room_number"
                                                            placeholder="Room Number">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="room_type"
                                                            placeholder="Room Type">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="initial_rent"
                                                            placeholder="Initial Rent">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <select class="form-control tagging" name="facilities" multiple="multiple"></select>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="number" class="form-control" name="max_student"
                                                            placeholder="Max Students">
                                                    </div>
                                                    <div
                                                        class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex align-items-center">
                                                        <button type="button"
                                                            class="btn btn-danger remove-room-btn">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save apartment_edit_update">Update
                                        Apartment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Room Details Modal -->
            <div id="roomDetailsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Room Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 mb-3 fs-5">
                                    <label>Room Number: </label><span style="color:#7539FF;" id="viewRoomNumber"></span>
                                    
                                </div>
                                <div class="col-lg-6 mb-3 fs-5">
                                    <label>Room Type: </label><span style="color:#7539FF;" id="viewRoomType"></span>
                                    
                                </div>
                                <div class="col-lg-6 mb-3 fs-5">
                                    <label>Initial Rent: </label><span style="color:#7539FF;" id="viewInitialRent"></span>
                                    
                                </div>
                                <div class="col-lg-6 mb-3 fs-5">
                                    <label>Max Students: </label><span style="color:#7539FF;" id="viewMaxStudent"></span>
                                    
                                </div>
                                <div class="col-lg-12 mb-3 fs-5">
                                    <label>Facilities: </label>
                                    <select  class="form-control tagging" id="viewFacilities" name="facilities" multiple="multiple" disabled></select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- /Modal End -->

            <!-- Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class=" card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="companies-table">
                                    <table class="table table-center table-hover datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Mansion Name</th>
                                                <th>Address</th>
                                                <th>Room Number</th>
                                                <th>PIC Name</th>
                                                <th>PIC Contact</th>
                                                <th class="no-sort">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->

        </div>
    </div>
    <!-- /Page Wrapper -->


    <!-- /Main Wrapper -->
    <script src="{{ asset('ajax/apartmentAjax.js') }}"></script>
@endsection
