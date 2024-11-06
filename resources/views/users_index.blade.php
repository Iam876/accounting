@extends('layouts.header')
@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">				
        <!-- Page Header -->
        <div class="page-header">
            <div class="content-page-header ">
                <h5>Users</h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Filter">
                                <span class="me-2"><img src="assets/img/icons/filter-icon.svg" alt="filter"></span>Filter
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add_user">
                                <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add User
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="usersTableBody">
                                    <!-- Dynamic rows will be loaded here via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

<!-- Add User Modal -->
<div class="modal custom-modal modal-lg fade" id="add_user" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Add User</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Email Address" required>
                                        </div>											    
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="password" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">											    
                                        <div class="input-block mb-3">
                                            <label>Role</label>
                                            <select class="select" id="roles">
                                                <option>Select Role</option>
                                                <!-- Roles will be dynamically loaded here via AJAX -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">											    
                                        <div class="input-block">
                                            <label>Status</label>
                                            <select class="select" id="status">
                                                <option>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-back cancel-btn me-2">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal (similar structure) -->
<div class="modal custom-modal modal-lg fade" id="edit_user" role="dialog">
    <!-- Similar modal structure for editing user -->
</div>

<script src="{{ asset('ajax/usersAjax.js') }}"></script>
@endsection
