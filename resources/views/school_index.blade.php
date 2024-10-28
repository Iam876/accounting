@extends('layouts.header')
@section('content')
    <!-- <div class="main-wrapper"> -->
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Schools</h5>
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
                            {{-- <li>
										<a class="btn btn-primary" href="add-products.html"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Product</a>
									</li> --}}
                            <li>
                                <a href="#" class="btn btn-primary waves-effect waves-light mt-1"
                                    data-bs-toggle="modal" data-bs-target="#school_modal_add"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Schools</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /Modal Start -->
            <div id="school_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4 form-group-bank">
                            <div class="row">
                                <div class="profile-picture">
                                    <div class="upload-profile">
                                        <div class="profile-img">
                                            <img id="blah" class="avatar" src="assets/img/profiles/avatar-14.jpg"
                                                alt="profile-img">
                                        </div>
                                        <div class="add-profile">
                                            <h5>Upload a New Photo</h5>
                                            <span>School Photo</span>
                                        </div>
                                    </div>
                                    <div class="img-upload d-flex">
                                        <label class="btn btn-upload">
                                            Upload <input id="schoolImage" type="file">
                                        </label>
                                        <a class="btn btn-remove">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>School <span class="text-danger">*</span></label>
                                        <input type="text" id="schoolName" class="form-control"
                                            placeholder="Enter School Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" id="phone" class="form-control" placeholder="Phone Number"
                                            name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-3" class="form-label">Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="address" class="form-control" id="field-3"
                                            placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-4" class="form-label">City <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="city" class="form-control" id="field-4"
                                            placeholder="Boston">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save">Add
                                        Schools</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="edit-school-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4 form-group-bank">
                            <div class="row">
                                <div class="profile-picture">
                                    <div class="upload-profile">
                                        <div class="profile-img">
                                            <img id="blah" class="avatar" src=""
                                                alt="profile-img">
                                        </div>
                                        <div class="add-profile">
                                            <h5>Upload a New Photo</h5>
                                            <span>School Photo</span>
                                        </div>
                                    </div>
                                    <div class="img-upload d-flex">
                                        <label class="btn btn-upload">
                                            Upload <input id="editschoolImage" type="file">
                                        </label>
                                        <a class="btn btn-remove">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>School <span class="text-danger">*</span></label>
                                        <input type="text" id="editschoolName" class="form-control"
                                            placeholder="Enter School Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" id="editphone" class="form-control"
                                            placeholder="Phone Number" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-3" class="form-label">Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="editaddress" class="form-control" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-4" class="form-label">City <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="editcity" class="form-control" placeholder="Boston">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save Edit-Update-School">Update
                                        School</button>
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
                                                <th>School Image</th>
                                                <th>School Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Prefecture</th>
                                                <!-- <th>Selling Price</th> -->
                                                <!-- <th>Purchase Price</th> -->
                                                <th class="no-sort">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="schoolTableBody">

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

    <script src="{{ asset('ajax/schoolAjax.js') }}"></script>
@endsection
