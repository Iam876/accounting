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
                                data-bs-toggle="modal" data-bs-target="#billing_modal_add"><i class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>Add Billing</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /Modal Start -->
            <div id="billing_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none; --bs-modal-width: 1280px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="form-group-item">
                                    <h5 class="form-title">Basic Details</h5>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Student Name <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select Students</option>
                                                    <option>Students Name 1</option>
                                                    <option>Students Name 2</option>
                                                    <option>Students Name 3</option>
                                                    <option>Students Name 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>School Name <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select School</option>
                                                    <option>School Name 1</option>
                                                    <option>School Name 2</option>
                                                    <option>School Name 3</option>
                                                    <option>School Name 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Apartment Name <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select Apartment Name</option>
                                                    <option>Apartment Name 1</option>
                                                    <option>Apartment Name 2</option>
                                                    <option>Apartment Name 3</option>
                                                    <option>Apartment Name 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Payment Method<span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select Payment Method</option>
                                                    <option>Cash</option>
                                                    <option>Bank</option>
                                                    <option>Konbeni</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Packages<span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select Packages</option>
                                                    <option>Only House Rent</option>
                                                    <option>House + Utility</option>
                                                    <option>House + Utility + Home Appliances</option>
                                                    {{-- <option>€</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group-bank p-2" style="margin-left: 0px; margin-right:0px;">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>House Rent<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter House Rent">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Utility<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Utility">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Advance (Initial Fees)<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Advance (Initial Fees)">
                                            </div>
                                        </div>
                                        <div class="input-block mb-3 notes-form-group-info">
                                            <label>Notes</label>
                                            <textarea class="form-control" placeholder="Enter Notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save">Add Student</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal End -->

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

            <!-- All Invoice -->
            <div class="card invoices-tabs-card">
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
            </div>
            <!-- /All Invoice -->

            <!-- Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-table">
                        <div class="card-body">
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
