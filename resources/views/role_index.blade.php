@extends('layouts.header')
@section('content')
    <!-- <div class="main-wrapper"> -->

    <!-- Header -->

    <!-- /Header -->

    <!-- Sidebar -->

    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Students</h5>
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
                                data-bs-toggle="modal" data-bs-target="#role_modal_add"><i class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>Add Roles</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div id="role_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>Role Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="roleName" placeholder="Enter Role Name">
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4 col-md-6 col-sm-12"> --}}
                                    <div class="input-block mb-3">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select class="select" id="roleStatus">
                                            <option>Choose a Status</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>	
                                    </div>
                                {{-- </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save">Add Roles</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="role_modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>Role Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="editRoleName" placeholder="Enter Role Name">
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4 col-md-6 col-sm-12"> --}}
                                    <div class="input-block mb-3">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select class="select" id="editRoleStatus">
                                            <option>Choose a Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>	
                                    </div>
                                {{-- </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save Edit-Update">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                                <th>Role Name</th>
                                                <th>Status</th>
                                                <!-- <th>Selling Price</th> -->
                                                <!-- <th>Purchase Price</th> -->
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
    <script src="{{ asset('ajax/role.js') }}"></script>
@endsection
