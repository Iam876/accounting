@extends('layouts.header')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Room</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Filter"><span class="me-2"><img
                                            src="{{asset('assets')}}/img/icons/filter-icon.svg" alt="filter"></span>Filter </a>
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
                                    data-bs-toggle="modal" data-bs-target="#room_modal_add"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Room</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /Modal Start -->
            <div id="room_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="form-group-item">
                                    <h5 class="form-title">Basic Details</h5>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Room Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="roomNumber" placeholder="Enter Room Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Room Type<span class="text-danger"> (1K,LDK...)</span></label>
                                                <input type="text" class="form-control" id="roomType"
                                                    placeholder="Enter Room Type">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Initial Rent<span class="text-danger"> (1K,LDK...)</span></label>
                                                <input type="text" class="form-control" id="initialRoomRent"
                                                    placeholder="Enter Room Type">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Max Student<span class="text-danger"> (1K,LDK...)</span></label>
                                                <input type="text" class="form-control" id="maxStudent"
                                                    placeholder="Enter Room Type">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <label>Facilites <span class="text-danger">*</span></label>
                                            <select class="form-control tagging" id="roomFacilites" multiple="multiple">
                                            </select>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Choose Apartment <span class="text-danger">*</span></label>
                                                <select class="form-control" id="selectApartment">
                                                    <option selected="selected">orange</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save">Add room</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="room_modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog">
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
                                                <h5>Upload room Photo</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="img-upload d-flex">
                                            <label class="btn btn-upload">
                                                Upload <input id="editroomImage" type="file">
                                            </label>
                                            <a class="btn btn-remove">Remove</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Mansion Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="editmansionName" placeholder="Enter Mansion Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Address<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="editaddress"
                                                    placeholder="Enter Mansion Address">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <label>Room Number <span class="text-danger">*</span></label>
                                            <select class="form-control tagging" id="editroom" multiple="multiple">
                                            </select>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>PIC Name <span class="text-danger">*</span></label>
                                                <select class="form-control" id="editpic_name">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save room_edit_update">Add room</button>
                                </div>
                            </div>
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
                                                <th>Apartment</th>
                                                <th>Room Number</th>
                                                <th>Room Type</th>
                                                <th>Facilites</th>
                                                <th>Room Rent</th>
                                                <th>Max Student</th>
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
    <script src="{{ asset('ajax/roomAjax.js') }}"></script>
@endsection
