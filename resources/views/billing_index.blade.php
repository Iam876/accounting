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
                <div class="content-page-header">
                    <h5>Invoices</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Filter"><span class="me-2"><img
                                            src="{{asset('assets')}}/img/icons/filter-icon.svg" alt="filter"></span>Filter </a>
                            </li>
                            <li>
                                <a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Settings"><span><i class="fe fe-settings"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-primary waves-effect waves-light mt-1"
                                data-bs-toggle="modal" data-bs-target="#billing_modal_update"><i class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>Add Billing</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /Modal Start -->
            <div id="billing_modal_update" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; --bs-modal-width: 1280px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <form id="billingUpdateForm">
                                <input type="hidden" id="billing_id" name="billing_id" value=""> <!-- Hidden field for billing id -->
                                <div class="row">
                                    <div class="form-group-item">
                                        <h5 class="form-title">Update Billing Details</h5>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>Student Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="student_name" name="student_name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>Payment Method <span class="text-danger">*</span></label>
                                                    <select class="select form-control" id="payment_method_id" name="payment_method_id" required>
                                                        <option value="">Select Payment Method</option>
                                                        <!-- Payment methods dynamically populated here -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>Amount Paid <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="amount_paid" name="amount_paid" placeholder="Enter Amount Paid" required min="0">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>Payment Date <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-block mb-3">
                                                    <label>Pending Dues</label>
                                                    <select class="select form-control" id="pending_dues" name="pending_dues[]" multiple>
                                                        <!-- Pending dues dynamically populated here -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-block mb-3 notes-form-group-info">
                                            <label>Notes</label>
                                            <textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes (optional)"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3 add-customer-btns text-end">
                                        <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn customer-btn-save" id="saveBillingUpdate">Update Billing</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- /Modal End -->
 

            <!-- All Invoice -->
            {{-- <div class="card invoices-tabs-card">
                <div class="invoices-main-tabs">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="invoices-tabs">
                                <ul>
                                    <li><a href="{{ route('billings.index') }}" class="{{ $currentStatus == 'all' ? 'active' : '' }}">All</a></li>
                                    <li><a href="{{ route('billings.status', 'paid') }}" class="{{ $currentStatus == 'paid' ? 'active' : '' }}">Paid</a></li>
                                    <li><a href="{{ route('billings.status', 'overdue') }}" class="{{ $currentStatus == 'overdue' ? 'active' : '' }}">Overdue</a></li>
                                    <li><a href="{{ route('billings.status', 'partially-paid') }}" class="{{ $currentStatus == 'partially-paid' ? 'active' : '' }}">Partially Paid</a></li>
                                    <li><a href="{{ route('billings.status', 'unpaid') }}" class="{{ $currentStatus == 'unpaid' ? 'active' : '' }}">Unpaid</a></li>
                                    <li><a href="{{ route('billings.status', 'draft') }}" class="{{ $currentStatus == 'draft' ? 'active' : '' }}">Draft</a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- /All Invoice -->

            <!-- Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- <h3>{{ ucfirst($currentStatus) }} Billings</h3> --}}
                                <table class="table table-stripped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Student Name</th>
                                            <th>School Name</th>
                                            <th>Apartment Name</th>
                                            <th>Payment Methods</th>
                                            <th>Billing Start</th>
                                            <th>Rent</th>
                                            <th>Utilities Fee</th>
                                            <th>Advance</th>
                                            <th>Rent Paid</th>
                                            <th>Advance Paid</th>
                                            <th>Overdue</th>
                                            <th>Total Amount</th>
                                            <th>Due Amount</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
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
            <!-- /Table -->

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
