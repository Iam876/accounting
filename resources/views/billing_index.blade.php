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
                    <h5>Billing</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Filter"><span class="me-2"><img
                                            src="{{ asset('assets') }}/img/icons/filter-icon.svg"
                                            alt="filter"></span>Filter </a>
                            </li>
                            <li>
                                <a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Settings"><span><i class="fe fe-settings"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-primary waves-effect waves-light mt-1"
                                    data-bs-toggle="modal" data-bs-target="#billing_modal_update"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Billing</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <div class="invoices-main-tabs">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="invoices-tabs">
                                <ul>
                                    <li><a href="#" id="all_billing" class="filter-tab active">All Billing</a></li>
                                    <li><a href="#" id="paid" class="filter-tab">Paid</a></li>
                                    <li><a href="#" id="unpaid" class="filter-tab">Unpaid</a></li>
                                    <li><a href="#" id="overdue" class="filter-tab">Overdue</a></li>
                                    <li><a href="#" id="partially_paid" class="filter-tab">Partially Paid</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Student Name</th>
                                            <th>Apartment</th>
                                            <th>Room</th>
                                            <th>Payment Method</th>
                                            {{-- <th>Billing Start</th> --}}
                                            <th>Rent</th>
                                            {{-- <th>Utilities Fee</th> --}}
                                            {{-- <th>Advance</th> --}}
                                            {{-- <th>Rent Paid</th> --}}

                                            <th>Total Amount</th>
                                            <th>Due Amount</th>
                                            <th>Overdue</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="billingData">
                                        <!-- Data populated by Ajax -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Modal Start -->
            <div id="billing_modal_update" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none; --bs-modal-width: 1280px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <form id="billingUpdateForm">
                                <input type="hidden" id="billing_id" name="billing_id" value="">
                                <input type="hidden" id="total_dues" name="total_dues" value=""> <!-- Total Dues -->
                                <input type="hidden" id="house_rent" name="house_rent" value=""> <!-- House Rent -->

                                <div class="row">
                                    <h5 class="form-title">Update Billing Details</h5>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Student Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="student_name" name="student_name"
                                                readonly>
                                            <input type="hidden" id="student_id" name="student_id" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Payment Method <span class="text-danger">*</span></label>
                                            <select class="select form-control" id="payment_method_id"
                                                name="payment_method_id" required>
                                                <option value="">Select Payment Method</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Amount Paid <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="amount_paid"
                                                name="amount_paid" placeholder="Enter Amount Paid" required
                                                min="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 payment-date-field">
                                        <div class="input-block mb-3">
                                            <label>Payment Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="payment_date"
                                                name="payment_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Payment ID</label>
                                            <input type="text" class="form-control" id="payment_id" name="payment_id"
                                                placeholder="Enter Payment ID">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>House Rent + Utility</label>
                                            <input type="text" class="form-control" id="display_house_rent" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Total Dues</label>
                                            <input type="text" class="form-control" id="display_total_dues" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-block mb-3">
                                            <label>Pending Dues</label>
                                            <select class="select form-control" id="pending_dues" name="pending_dues[]"
                                                multiple>
                                                <!-- Pending dues dynamically populated here -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-block mb-3 notes-form-group-info">
                                        <label>Notes</label>
                                        <textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes (optional)"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3 add-customer-btns text-end">
                                        <button type="button" class="btn customer-btn-cancel"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn customer-btn-save"
                                            id="saveBillingUpdate">Update Billing</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Billing History Modal -->
            <div id="billing_history_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Billing History</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Total Amount</th>
                                        <th>Amount Paid</th>
                                        <th>Due Amount</th>
                                        <th>Status</th>
                                        <th>Payment Method</th>
                                        <th>Transaction Id</th>
                                        <th>Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody id="billingHistoryData">
                                    <!-- History data populated via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Table -->

        </div>
    </div>
    <script src="{{ asset('ajax/billings.js') }}"></script>
@endsection
