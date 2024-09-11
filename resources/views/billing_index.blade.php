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
                                <a class="btn btn-primary" href="add-invoice.html"><i class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>New Invoice</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div id="filter_inputs" class="card filter-card">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3">
                                <label>Phone</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Search Filter -->

            <!-- Inovices card -->
            {{-- <div class="row">
                <div class="col-xl-2 col-lg-4 col-sm-6 col-12 d-flex">
                    <div class="card inovices-card w-100">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="inovices-widget-icon bg-info-light">
                                    <img src="{{asset('assets')}}/img/icons/receipt-item.svg" alt="invoice">
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Total Invoice</div>
                                    <div class="dash-counts">
                                        <p>$298</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="inovices-all">No of Invoice <span class="rounded-circle bg-light-gray">02</span>
                                </p>
                                <p class="inovice-trending text-success-light">02 <span class="ms-2"><i
                                            class="fe fe-trending-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-sm-6 col-12 d-flex">
                    <div class="card inovices-card w-100">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="inovices-widget-icon bg-primary-light">
                                    <img src="{{asset('assets')}}/img/icons/transaction-minus.svg" alt="invoice">
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Outstanding</div>
                                    <div class="dash-counts">
                                        <p>$325,215</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="inovices-all">No of Invoice <span class="rounded-circle bg-light-gray">03</span>
                                </p>
                                <p class="inovice-trending text-success-light">04 <span class="ms-2"><i
                                            class="fe fe-trending-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-sm-6 col-12 d-flex">
                    <div class="card inovices-card w-100">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="inovices-widget-icon bg-warning-light">
                                    <img src="{{asset('assets')}}/img/icons/archive-book.svg" alt="archivebook">
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Total Overdue</div>
                                    <div class="dash-counts">
                                        <p>$7825</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="inovices-all">No of Invoice <span class="rounded-circle bg-light-gray">01</span>
                                </p>
                                <p class="inovice-trending text-danger-light">03 <span class="ms-2"><i
                                            class="fe fe-trending-down"></i></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-sm-6 col-12 d-flex">
                    <div class="card inovices-card w-100">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="inovices-widget-icon bg-primary-light">
                                    <img src="{{asset('assets')}}/img/icons/clipboard-close.svg" alt="clipboard">
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Cancelled</div>
                                    <div class="dash-counts">
                                        <p>100</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="inovices-all">No of Invoice <span class="rounded-circle bg-light-gray">04</span>
                                </p>
                                <p class="inovice-trending text-danger-light">05 <span class="ms-2"><i
                                            class="fe fe-trending-down"></i></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-sm-6 col-12 d-flex">
                    <div class="card inovices-card w-100">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="inovices-widget-icon bg-green-light">
                                    <img src="{{asset('assets')}}/img/icons/message-edit.svg" alt="message">
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Draft</div>
                                    <div class="dash-counts">
                                        <p>$125,586</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="inovices-all">No of Invoice <span class="rounded-circle bg-light-gray">06</span>
                                </p>
                                <p class="inovice-trending text-danger-light">02 <span class="ms-2"><i
                                            class="fe fe-trending-down"></i></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-sm-6 col-12 d-flex">
                    <div class="card inovices-card w-100">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="inovices-widget-icon bg-danger-light">
                                    <img src="{{asset('assets')}}/img/icons/3d-rotate.svg" alt="invoice">
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Recurring</div>
                                    <div class="dash-counts">
                                        <p>$86,892</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="inovices-all">No of Invoice <span class="rounded-circle bg-light-gray">03</span>
                                </p>
                                <p class="inovice-trending text-success-light">02 <span class="ms-2"><i
                                            class="fe fe-trending-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- /Inovices card -->

            <!-- All Invoice -->
            <div class="card invoices-tabs-card">
                <div class="invoices-main-tabs">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="invoices-tabs">
                                {{-- <ul>
                                    <li><a href="{{ route('billings.index', 'all') }}" class="{{ $currentStatus == 'all' ? 'active' : '' }}">All</a></li>
                                    <li><a href="{{ route('billings.index', 'paid') }}" class="{{ $currentStatus == 'paid' ? 'active' : '' }}">Paid</a></li>
                                    <li><a href="{{ route('billings.index', 'overdue') }}" class="{{ $currentStatus == 'overdue' ? 'active' : '' }}">Overdue</a></li>
                                    <li><a href="{{ route('billings.index', 'partially-paid') }}" class="{{ $currentStatus == 'partially-paid' ? 'active' : '' }}">Partially Paid</a></li>
                                    <li><a href="{{ route('billings.index', 'unpaid') }}" class="{{ $currentStatus == 'unpaid' ? 'active' : '' }}">Unpaid</a></li>
                                    <li><a href="{{ route('billings.index', 'draft') }}" class="{{ $currentStatus == 'draft' ? 'active' : '' }}">Draft</a></li>
                                </ul> --}}

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
            </div>
            <!-- /All Invoice -->

            <!-- Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-table">
                        <div class="card-body">
                             {{-- <div class="table-responsive">
                                <h3>All Billings</h3>
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
                                        @foreach($allBillings as $billing)
                                        <tr>
                                            <td>
                                                <a href="invoice-details/{{ $billing->id }}" class="invoice-link">#{{ $billing->id }}</a>
                                            </td>
                                            <td>{{ $billing->student->student_name }}</td>
                                            <td>{{ $billing->student->school->school_name }}</td>
                                            <td>{{ $billing->apartment->mansion_name ?? 'N/A' }}</td>
                                            <td>{{ $billing->paymentMethod->method_name ?? 'N/A' }}</td>
                                            <td>{{ $billing->billing_start_month->format('Y-m') }}</td>
                                            <td>${{ number_format($billing->rent, 2) }}</td>
                                            <td>${{ number_format($billing->utility_fees, 2) ?? 'N/A' }}</td>
                                            <td>${{ number_format($billing->initial_costs, 2) ?? 'N/A' }}</td>
                            
                                            <!-- Rent Paid: Check if rent payment exists and show status -->
                                            <td>
                                                @if($billing->payments->where('payment_type_id', 1)->sum('amount') >= $billing->rent)
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-warning">Not Paid</span>
                                                @endif
                                            </td>
                            
                                            <!-- Advance Paid: Check if advance payment exists and show status -->
                                            <td>
                                                @if($billing->payments->where('payment_type_id', 3)->sum('amount') >= $billing->initial_costs)
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-warning">Not Paid</span>
                                                @endif
                                            </td>
                            
                                            <!-- Overdue: Display overdue status -->
                                            <td>
                                                @if($billing->isOverdue())
                                                    <span class="badge bg-danger">Yes</span>
                                                @else
                                                    <span class="badge bg-success">No</span>
                                                @endif
                                            </td>
                            
                                            <!-- Total Amount (Rent + Utilities + Advance) -->
                                            <td>${{ number_format($billing->total_amount, 2) }}</td>
                            
                                            <!-- Due Amount -->
                                            <td>${{ number_format($billing->due_amount, 2) }}</td>
                            
                                            <td>
                                                <span class="badge {{ $billing->status == 'Paid' ? 'bg-success' : ($billing->status == 'Overdue' ? 'bg-danger' : ($billing->status == 'Unpaid' ? 'bg-warning' : 'bg-info')) }}">
                                                    {{ $billing->status }}
                                                </span>
                                            </td>
                            
                                            <!-- Actions -->
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="btn-action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end customer-dropdown">
                                                        <a class="dropdown-item" href="edit-billing/{{ $billing->id }}">
                                                            <i class="far fa-edit me-2"></i>Edit
                                                        </a>
                                                        <a class="dropdown-item" href="view-billing/{{ $billing->id }}">
                                                            <i class="far fa-eye me-2"></i>View
                                                        </a>
                                                        <a class="dropdown-item" href="delete-billing/{{ $billing->id }}">
                                                            <i class="far fa-trash-alt me-2"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}

                            <div class="table-responsive">
                                <h3>{{ ucfirst($currentStatus) }} Billings</h3>
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
                                        @foreach($allBillings as $billing)
                                        <tr>
                                            <td><a href="invoice-details/{{ $billing->id }}" class="invoice-link">#{{ $billing->id }}</a></td>
                                            <td>{{ $billing->student->student_name }}</td>
                                            <td>{{ $billing->student->school->school_name }}</td>
                                            <td>{{ $billing->apartment->mansion_name ?? 'N/A' }}</td>
                                            <td>{{ $billing->paymentMethod->method_name ?? 'N/A' }}</td>
                                            <td>{{ $billing->billing_start_month->format('Y-m') }}</td>
                                            <td>${{ number_format($billing->rent, 2) }}</td>
                                            <td>${{ number_format($billing->utility_fees, 2) ?? 'N/A' }}</td>
                                            <td>${{ number_format($billing->initial_costs, 2) ?? 'N/A' }}</td>
                                            <td>
                                                @if($billing->payments->where('payment_type_id', 1)->sum('amount') >= $billing->rent)
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-warning">Not Paid</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                @if($billing->isRentPaid())
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-warning">Not Paid</span>
                                                @endif
                                            </td> --}}

                                            {{-- <td>
                                                @php
                                                    $rentPaid = $billing->payments->where('payment_type_id', 1)->sum('amount');
                                                @endphp
                                                Rent Paid: ${{ number_format($rentPaid, 2) }} <br>
                                                Rent: ${{ number_format($billing->rent, 2) }}
                                            </td> --}}
                                            
                                            
                                            <td>
                                                @if($billing->payments->where('payment_type_id', 3)->sum('amount') >= $billing->initial_costs)
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-warning">Not Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($billing->isOverdue())
                                                    <span class="badge bg-danger">Yes</span>
                                                @else
                                                    <span class="badge bg-success">No</span>
                                                @endif
                                            </td>
                                            <td>${{ number_format($billing->total_amount, 2) }}</td>
                                            <td>${{ number_format($billing->due_amount, 2) }}</td>
                                            <td>
                                                <span class="badge {{ $billing->status == 'Paid' ? 'bg-success' : ($billing->status == 'Overdue' ? 'bg-danger' : ($billing->status == 'Unpaid' ? 'bg-warning' : 'bg-info')) }}">
                                                    {{ $billing->status }}
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="btn-action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end customer-dropdown">
                                                        <a class="dropdown-item" href="edit-billing/{{ $billing->id }}">
                                                            <i class="far fa-edit me-2"></i>Edit
                                                        </a>
                                                        <a class="dropdown-item" href="view-billing/{{ $billing->id }}">
                                                            <i class="far fa-eye me-2"></i>View
                                                        </a>
                                                        <a class="dropdown-item" href="delete-billing/{{ $billing->id }}">
                                                            <i class="far fa-trash-alt me-2"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            
                            
                            {{-- <!-- Paid Billings Table -->
                            <h3>Paid Billings</h3>
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Student Name</th>
                                            <th>School Name</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($paidBillings as $billing)
                                        <tr>
                                            <td><a href="invoice-details/{{ $billing->id }}" class="invoice-link">#{{ $billing->id }}</a></td>
                                            <td>{{ $billing->student->student_name }}</td>
                                            <td>{{ $billing->student->school->school_name }}</td>
                                            <td>${{ number_format($billing->total_amount, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Unpaid Billings Table -->
                            <h3>Unpaid Billings</h3>
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Student Name</th>
                                            <th>School Name</th>
                                            <th>Total Amount</th>
                                            <th>Due Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($unpaidBillings as $billing)
                                        <tr>
                                            <td><a href="invoice-details/{{ $billing->id }}" class="invoice-link">#{{ $billing->id }}</a></td>
                                            <td>{{ $billing->student->student_name }}</td>
                                            <td>{{ $billing->student->school->school_name }}</td>
                                            <td>${{ number_format($billing->total_amount, 2) }}</td>
                                            <td>${{ number_format($billing->due_amount, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Partially Paid Billings Table -->
                            <h3>Partially Paid Billings</h3>
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Student Name</th>
                                            <th>School Name</th>
                                            <th>Total Amount</th>
                                            <th>Due Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($partiallyPaidBillings as $billing)
                                        <tr>
                                            <td><a href="invoice-details/{{ $billing->id }}" class="invoice-link">#{{ $billing->id }}</a></td>
                                            <td>{{ $billing->student->student_name }}</td>
                                            <td>{{ $billing->student->school->school_name }}</td>
                                            <td>${{ number_format($billing->total_amount, 2) }}</td>
                                            <td>${{ number_format($billing->due_amount, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Overdue Billings Table -->
                            <h3>Overdue Billings</h3>
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Student Name</th>
                                            <th>School Name</th>
                                            <th>Total Amount</th>
                                            <th>Due Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($overdueBillings as $billing)
                                        <tr>
                                            <td><a href="invoice-details/{{ $billing->id }}" class="invoice-link">#{{ $billing->id }}</a></td>
                                            <td>{{ $billing->student->student_name }}</td>
                                            <td>{{ $billing->student->school->school_name }}</td>
                                            <td>${{ number_format($billing->total_amount, 2) }}</td>
                                            <td>${{ number_format($billing->due_amount, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->

        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Add Asset -->
    <div class="toggle-sidebar">
        <div class="sidebar-layout-filter">
            <div class="sidebar-header">
                <h5>Filter</h5>
                <a href="#" class="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
            </div>
            <div class="sidebar-body">
                <form action="#" autocomplete="off">
                    <!-- Product -->
                    <div class="accordion" id="accordionMain1">
                        <div class="card-header-new" id="headingOne">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Product Name
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample1">
                            <div class="card-body-chat">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="checkBoxes1">
                                            <div class="form-custom">
                                                <input type="text" class="form-control" id="member_search1"
                                                    placeholder="Search Product">
                                                <span><img src="{{asset('assets')}}/img/icons/search.svg" alt="img"></span>
                                            </div>
                                            <div class="selectBox-cont">
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Lenovo 3rd Generation
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Nike Jordan
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Apple Series 5 Watch
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Amazon Echo Dot
                                                </label>
                                                <!-- View All -->
                                                <div class="view-content">
                                                    <div class="viewall-One">
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Lobar Handy
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Woodcraft Sandal
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Black Slim 200
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Red Premium Handy
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Bold V3.2
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Iphone 14 Pro
                                                        </label>
                                                    </div>
                                                    <div class="view-all">
                                                        <a href="javascript:void(0);" class="viewall-button-One"><span
                                                                class="me-2">View All</span><span><i
                                                                    class="fa fa-circle-chevron-down"></i></span></a>
                                                    </div>
                                                </div>
                                                <!-- /View All -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product -->

                    <!-- Product Code -->
                    <div class="accordion" id="accordionMain2">
                        <div class="card-header-new" id="headingTwo">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Product Code
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample2">
                            <div class="card-body-chat">
                                <div id="checkBoxes3">
                                    <div class="selectBox-cont">
                                        <div class="form-custom">
                                            <input type="text" class="form-control" id="member_search2"
                                                placeholder="Search Invoice">
                                            <span><img src="{{asset('assets')}}/img/icons/search.svg" alt="img"></span>
                                        </div>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="product-code">
                                            <span class="checkmark"></span> P125389
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="product-code">
                                            <span class="checkmark"></span> P125390
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="product-code">
                                            <span class="checkmark"></span> P125391
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="product-code">
                                            <span class="checkmark"></span> P125392
                                        </label>
                                        <!-- View All -->
                                        <div class="view-content">
                                            <div class="viewall-Two">
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="product-code">
                                                    <span class="checkmark"></span> P125393
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="product-code">
                                                    <span class="checkmark"></span> P125394
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="product-code">
                                                    <span class="checkmark"></span> P125395
                                                </label>
                                            </div>
                                            <div class="view-all">
                                                <a href="javascript:void(0);" class="viewall-button-Two"><span
                                                        class="me-2">View All</span><span><i
                                                            class="fa fa-circle-chevron-down"></i></span></a>
                                            </div>
                                        </div>
                                        <!-- /View All -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Code -->

                    <!-- Unts -->
                    <div class="accordion" id="accordionMain3">
                        <div class="card-header-new" id="headingThree">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    Units
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample3">
                            <div class="card-body-chat">
                                <div id="checkBoxes2">
                                    <div class="selectBox-cont">
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Inches
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Pieces
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Hours
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Box
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Kilograms
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Meter
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Units -->

                    <!-- Category -->
                    <div class="accordion accordion-last" id="accordionMain4">
                        <div class="card-header-new" id="headingFour">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Category
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample4">
                            <div class="card-body-chat">
                                <div id="checkBoxes4">
                                    <div class="selectBox-cont">
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="category">
                                            <span class="checkmark"></span> Laptop
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="category">
                                            <span class="checkmark"></span> Shoes
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="category">
                                            <span class="checkmark"></span> Accessories
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="category">
                                            <span class="checkmark"></span> Electronics
                                        </label>
                                        <!-- View All -->
                                        <div class="view-content">
                                            <div class="viewall-Two">
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Furnitures
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Bags
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Phone
                                                </label>
                                            </div>
                                            <div class="view-all">
                                                <a href="javascript:void(0);" class="viewall-button-Two"><span
                                                        class="me-2">View All</span><span><i
                                                            class="fa fa-circle-chevron-down"></i></span></a>
                                            </div>
                                        </div>
                                        <!-- /View All -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Category -->

                    <div class="filter-buttons">
                        <button type="submit"
                            class="d-inline-flex align-items-center justify-content-center btn w-100 btn-primary">
                            Apply
                        </button>
                        <button type="submit"
                            class="d-inline-flex align-items-center justify-content-center btn w-100 btn-secondary">
                            Reset
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /Add Asset -->
    <!-- </div> -->
    <!-- /Main Wrapper -->
@endsection
