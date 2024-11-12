@extends('layouts.header')
@section('content')
@can('view dashboard')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid pb-0">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>Dashboard</h5>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="super-admin-dashboard"> 
                <div class="row">
                    {{-- <div class="col-xl-5 d-flex">
                    <div class="dash-user-card w-100">
                        <h4><i class="fe fe-sun"></i>Good Morning, John</h4>
                        <p>14 New Companies Subscribed Today</p>
                        <div class="dash-btns">
                            <a href="companies.html" class="btn view-company-btn">View Companies</a>
                            <a href="packages.html" class="btn view-package-btn">All Packages</a>
                        </div>
                        <div class="dash-img">
                            <img src="{{asset('assets')}}/img/dashboard-card-img.png" alt="">
                        </div>
                    </div>
                </div> --}}
                    <div class="col-xl-5 d-flex ">
                        <div class="dash-user-card w-100">
                            <h4><i class="fe fe-sun"></i> {{ $greeting }}, {{ $userName }}</h4>
                                <h2 class="text-white" id="live-clock"></h2>
                                <h6 class="text-white" id="live-date"></h6>
                            <div class="dash-btns">
                                <a href="companies.html" class="btn view-company-btn">View Companies</a>
                                <a href="packages.html" class="btn view-package-btn">All Packages</a>
                            </div>
                            <div class="dash-img">
                                <img src="{{ asset('assets/img/dashboard-card-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 d-flex p-0">
                        <div class="row dash-company-row w-100 m-0">
                            <div class="col-lg-3 col-sm-6 d-flex">
                                <div class="company-detail-card w-100">
                                    <div class="company-icon">
                                        <img src="{{ asset('assets') }}/img/icons/dash-card-icon-01.svg" alt="">
                                    </div>
                                    <div class="dash-comapny-info">
                                        <h6>Total Apartments</h6>
                                        <h5>{{ $totalApartments }}</h5>
                                        <!-- <p><span>14% <i class="fe fe-chevrons-up"></i></span>Last month</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 d-flex">
                                <div class="company-detail-card bg-info-light w-100">
                                    <div class="company-icon">
                                        <img src="{{ asset('assets') }}/img/icons/dash-card-icon-02.svg" alt="">
                                    </div>
                                    <div class="dash-comapny-info">
                                        <h6>Total Rooms</h6>
                                        <h5>{{ $totalRooms }}</h5>
                                        <!-- <p><span>1% <i class="fe fe-chevrons-up"></i></span>Last month</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 d-flex">
                                <div class="company-detail-card bg-pink-light w-100">
                                    <div class="company-icon">
                                        <img src="{{ asset('assets') }}/img/icons/dash-card-icon-03.svg" alt="">
                                    </div>
                                    <div class="dash-comapny-info">
                                        <h6>Total Students</h6>
                                        <h5>{{ $totalStudents }}</h5>
                                        <!-- <p><span>2% <i class="fe fe-chevrons-up"></i></span>Last month</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 d-flex">
                                <div class="company-detail-card bg-success-light w-100">
                                    <div class="company-icon">
                                        <img src="{{ asset('assets') }}/img/icons/dash-card-icon-04.svg" alt="">
                                    </div>
                                    <div class="dash-comapny-info">
                                        <h6>Total Students</h6>
                                        <h5>{{ $totalSchools }}</h5>
                                        <!-- <p><span>6% <i class="fe fe-chevrons-up"></i></span>Last month</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Total Students Card -->
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-2">
                                            <i class="fas fa-users"></i>
                                        </span>
                                        <div class="dash-count">
                                            <div class="dash-title">Total Students</div>
                                            <div class="dash-counts">
                                                <p>{{$totalStudents}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <!-- Example dynamic progress bar for total students -->
                                        <div class="progress-bar" role="progressbar" style="width: 65%; background-color: #28a745;" 
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Students Paid Card -->
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-3">
                                            <i class="fas fa-users"></i>
                                        </span>
                                        <div class="dash-count">
                                            <div class="dash-title">Students Paid</div>
                                            <div class="dash-counts">
                                                <p>{{$studentsPaidCount}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <!-- Dynamic progress bar for students paid -->
                                        <div class="progress-bar" role="progressbar" 
                                            style="width: {{ ($studentsPaidCount / $totalStudents) * 100 }}%; 
                                                background-color: {{ ($studentsPaidCount / $totalStudents) * 100 >= 75 ? '#28a745' : (($studentsPaidCount / $totalStudents) * 100 >= 50 ? '#ffc107' : '#dc3545') }};" 
                                            aria-valuenow="{{ ($studentsPaidCount / $totalStudents) * 100 }}" 
                                            aria-valuemin="0" 
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Total Amount Card -->
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-4">
                                            <i class="far fa-file"></i>
                                        </span>
                                        <div class="dash-count">
                                            <div class="dash-title">Total Amount</div>
                                            <div class="dash-counts">
                                                <p><span>&#165; </span>{{$totalBillingAmount}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <!-- Dynamic progress bar for total amount -->
                                        <div class="progress-bar" role="progressbar" 
                                            style="width: {{ ($totalBillingAmount / 100000) * 100 }}%; 
                                                background-color: {{ ($totalBillingAmount >= 75000) ? '#28a745' : (($totalBillingAmount >= 50000) ? '#ffc107' : '#dc3545') }};" 
                                            aria-valuenow="{{ ($totalBillingAmount / 100000) * 100 }}" 
                                            aria-valuemin="0" 
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Amount Due Card -->
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-1">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                        <div class="dash-count">
                                            <div class="dash-title">Amount Due</div>
                                            <div class="dash-counts">
                                                <p><span>&#165; </span>{{$remainingDueAmount}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <!-- Dynamic progress bar for amount due -->
                                        <div class="progress-bar" role="progressbar" 
                                            style="width: {{ ($remainingDueAmount / $totalBillingAmount) * 100 }}%; 
                                                background-color: {{ ($remainingDueAmount <= 5000) ? '#28a745' : (($remainingDueAmount <= 20000) ? '#ffc107' : '#dc3545') }};" 
                                            aria-valuenow="{{ ($remainingDueAmount / $totalBillingAmount) * 100 }}" 
                                            aria-valuemin="0" 
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{--  <!-- <div class="col-xl-5 d-flex">
                    <div class="card super-admin-dash-card">
                        <div class="card-header">
                            <div class="row align-center">
                                <div class="col">
                                    <h5 class="card-title">Latest Registered Companies</h5>
                                </div>
                                <div class="col-auto">
                                    <a href="companies.html" class="btn-right btn btn-sm btn-outline-primary">
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-01.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Hermann Groups <span
                                                            class="plane-type">Basic (Monthly)</span></a>

                                                </h2>
                                            </td>
                                            <td>24 Feb 2024</td>
                                            <td class="text-end"><a href="companies.html"
                                                    class="view-companies btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-02.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Skiles LLC <span
                                                            class="plane-type">Enterprise (Yearly)</span></a>

                                                </h2>
                                            </td>
                                            <td>23 Feb 2024</td>
                                            <td class="text-end"><a href="companies.html"
                                                    class="view-companies btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-03.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Kerluke Group <span
                                                            class="plane-type">Advanced (Monthly)</span></a>

                                                </h2>
                                            </td>
                                            <td>22 Feb 2024</td>
                                            <td class="text-end"><a href="companies.html"
                                                    class="view-companies btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-04.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Schowalter Group <span
                                                            class="plane-type">Basic (Yearly)</span></a>

                                                </h2>
                                            </td>
                                            <td>21 Feb 2024</td>
                                            <td class="text-end"><a href="companies.html"
                                                    class="view-companies btn">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-05.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Accentric Global <span
                                                            class="plane-type">Basic (Monthly)</span></a>

                                                </h2>
                                            </td>
                                            <td>20 Feb 2024</td>
                                            <td class="text-end"><a href="companies.html"
                                                    class="view-companies btn">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-xl-7 d-flex">
                    <div class="card super-admin-dash-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Earnings </h5>
                                <div class="d-flex align-center">
                                    <span class="earning-income-text"><i></i>Income</span>
                                    <div class="dropdown main">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            2024
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2023</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="earnings-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 d-flex">
                    <div class="card super-admin-dash-card flex-fill">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Most Ordered Plan</h5>

                                <div class="dropdown main">
                                    <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        This Month
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Today</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">This Week</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">This Year</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="dash-plane-list">
                                <div class="plane-info">
                                    <span class="icon-plane"><img src="{{asset('assets')}}/img/icons/dashboard-plane-icon.svg"
                                            alt=""></span>
                                    <div class="plane-name">Enterprise <span>(Monthly)</span>
                                        <h6>Total Order : 201</h6>
                                    </div>
                                </div>
                                <span class="plane-rate">$549.00</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-xl-4 d-flex">
                    <div class="card super-admin-dash-card flex-fill">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Top Company with Plan</h5>

                                <div class="dropdown main">
                                    <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                        Today
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">This Month</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">This Week</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">This Year</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="dash-plane-list">
                                <div class="plane-info">
                                    <span class="icon-company"><img src="{{asset('assets')}}/img/companies/company-01.svg"
                                            alt=""></span>
                                    <span class="name-company">Hermann Groups</span>
                                </div>
                                <span class="plane-rate">10 Plans</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 d-flex">
                    <div class="card super-admin-dash-card flex-fill">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Most Domains</h5>

                                <div class="dropdown main">
                                    <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                                        This Week
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">This Month</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Today</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">This Year</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="dash-plane-list">
                                <div class="plane-info">
                                    <span class="icon-company"><img src="{{asset('assets')}}/img/companies/company-04.svg"
                                            alt=""></span>
                                    <div class="plane-name"><span>Schowalter Group</span>
                                        <h6>sk.example.com</h6>
                                    </div>
                                </div>
                                <span class="plane-rate">150 Users</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-xl-6 d-flex">
                    <div class="card super-admin-dash-card">
                        <div class="card-header">
                            <div class="row align-center">
                                <div class="col">
                                    <h5 class="card-title">Recent Invoices</h5>
                                </div>
                                <div class="col-auto">
                                    <a href="invoices.html" class="btn-right btn btn-sm btn-outline-primary">
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <tbody>
                                        <tr>
                                            <td><a href="invoice-details.html"
                                                    class="invoice-link dash-incoice-table">#INV12454</a><span
                                                    class="dash-incoice-date">15 Feb 2024</span></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-01.svg"
                                                            alt="Company Image">
                                                    </a>
                                                    <a href="companies.html">Hermann Groups</a>
                                                </h2>
                                            </td>
                                            <td>Basic <br> <span class="plane-type">(Monthly)</span></td>
                                            <td><span class="badge bg-success-light d-inline-flex align-items-center"><i
                                                        class="fe fe-check me-1"></i>Paid</span></td>
                                            <td class="text-end"><a href="invoice-subscription.html"
                                                    class="invoice-detail"><i class="fe fe-file-text"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-details.html"
                                                    class="invoice-link dash-incoice-table">#INV45445</a><span
                                                    class="dash-incoice-date">14 Feb 2024</span></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-02.svg"
                                                            alt="Company Image">
                                                    </a>
                                                    <a href="companies.html">Skiles LLC</a>
                                                </h2>
                                            </td>
                                            <td>Enterprise <br> <span class="plane-type">(Yearly)</span></td>
                                            <td><span class="badge bg-danger-light d-inline-flex align-items-center"><i
                                                        class="fe fe-x me-1"></i>Unpaid</span></td>
                                            <td class="text-end"><a href="invoice-subscription.html"
                                                    class="invoice-detail"><i class="fe fe-file-text"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-details.html"
                                                    class="invoice-link dash-incoice-table">#INV78444</a><span
                                                    class="dash-incoice-date">13 Feb 2024</span></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-03.svg"
                                                            alt="Company Image">
                                                    </a>
                                                    <a href="companies.html">Kerluke Group</a>
                                                </h2>
                                            </td>
                                            <td>Advanced <br> <span class="plane-type">(Monthly)</span></td>
                                            <td><span class="badge bg-success-light d-inline-flex align-items-center"><i
                                                        class="fe fe-check me-1"></i>Paid</span></td>
                                            <td class="text-end"><a href="invoice-subscription.html"
                                                    class="invoice-detail"><i class="fe fe-file-text"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-details.html"
                                                    class="invoice-link dash-incoice-table">#INV31454</a><span
                                                    class="dash-incoice-date">12 Feb 2024</span></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-04.svg"
                                                            alt="Company Image">
                                                    </a>
                                                    <a href="companies.html">Schowalter Group</a>
                                                </h2>
                                            </td>
                                            <td>Basic <br> <span class="plane-type">(Yearly)</span></td>
                                            <td><span class="badge bg-success-light d-inline-flex align-items-center"><i
                                                        class="fe fe-check me-1"></i>Paid</span></td>
                                            <td class="text-end"><a href="invoice-subscription.html"
                                                    class="invoice-detail"><i class="fe fe-file-text"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="invoice-details.html"
                                                    class="invoice-link dash-incoice-table">#INV74878</a><span
                                                    class="dash-incoice-date">11 Feb 2024</span></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-05.svg"
                                                            alt="Company Image">
                                                    </a>
                                                    <a href="companies.html">Accentric Global</a>
                                                </h2>
                                            </td>
                                            <td>Basic <br> <span class="plane-type">(Monthly)</span></td>
                                            <td><span class="badge bg-success-light d-inline-flex align-items-center"><i
                                                        class="fe fe-check me-1"></i>Paid</span></td>
                                            <td class="text-end"><a href="invoice-subscription.html"
                                                    class="invoice-detail"><i class="fe fe-file-text"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 d-flex">
                    <div class="card super-admin-dash-card">
                        <div class="card-header">
                            <div class="row align-center">
                                <div class="col">
                                    <h5 class="card-title">Top Plans</h5>
                                </div>
                                <div class="col-auto">
                                    <a href="packages.html" class="btn-right btn btn-sm btn-outline-primary">
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="plane-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 d-flex">
                    <div class="card super-admin-dash-card">
                        <div class="card-header">
                            <div class="row align-center">
                                <div class="col">
                                    <h5 class="card-title">Recent Plan Expired</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-01.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Hermann Groups <span
                                                            class="plane-type">Basic (Monthly)</span></a>

                                                </h2>
                                            </td>
                                            <td class="expired-date">Expired On <br>24 Feb 2024</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-02.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Skiles LLC <span
                                                            class="plane-type">Enterprise (Yearly)</span></a>

                                                </h2>
                                            </td>
                                            <td class="expired-date">Expired On <br>24 Feb 2024</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-03.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Kerluke Group <span
                                                            class="plane-type">Advanced (Monthly)</span></a>

                                                </h2>
                                            </td>
                                            <td class="expired-date">Expired On <br>24 Feb 2024</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-04.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Schowalter Group <span
                                                            class="plane-type">Basic (Yearly)</span></a>

                                                </h2>
                                            </td>
                                            <td class="expired-date">Expired On <br>24 Feb 2024</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-05.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Accentric Global <span
                                                            class="plane-type">Basic (Monthly)</span></a>

                                                </h2>
                                            </td>
                                            <td class="expired-date">Expired On <br>24 Feb 2024</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 d-flex">
                    <div class="card super-admin-dash-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Companies Registered </h5>

                                <div class="dropdown main">
                                    <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">
                                        2024
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2023</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="companies_flow"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 d-flex">
                    <div class="card super-admin-dash-card">
                        <div class="card-header">
                            <div class="row align-center">
                                <div class="col">
                                    <h5 class="card-title">Recent Domain</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-01.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Hermann Groups <span
                                                            class="plane-type">Basic (Monthly)</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-end">
                                                <div class="active-inactive-btn">
                                                    <a href="#" class="active-domain"><i class="fe fe-check"></i></a>
                                                    <a href="#" class="inactive-domain"><i class="fe fe-x"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-02.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Skiles LLC <span
                                                            class="plane-type">Enterprise (Yearly)</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-end">
                                                <div class="active-inactive-btn">
                                                    <a href="#" class="active-domain"><i class="fe fe-check"></i></a>
                                                    <a href="#" class="inactive-domain"><i class="fe fe-x"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-03.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Kerluke Group <span
                                                            class="plane-type">Advanced (Monthly)</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-end">
                                                <div class="active-inactive-btn">
                                                    <a href="#" class="active-domain"><i class="fe fe-check"></i></a>
                                                    <a href="#" class="inactive-domain"><i class="fe fe-x"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-04.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Schowalter Group <span
                                                            class="plane-type">Basic (Yearly)</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-end">
                                                <div class="active-inactive-btn">
                                                    <a href="#" class="active-domain"><i class="fe fe-check"></i></a>
                                                    <a href="#" class="inactive-domain"><i class="fe fe-x"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html"
                                                        class="company-avatar avatar-md me-2 companies company-icon">
                                                        <img class="avatar-img rounded-circle company"
                                                            src="{{asset('assets')}}/img/companies/company-05.svg"
                                                            alt="Company Image"></a>
                                                    <a href="companies.html">Accentric Global <span
                                                            class="plane-type">Basic (Monthly)</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-end">
                                                <div class="active-inactive-btn">
                                                    <a href="#" class="active-domain"><i class="fe fe-check"></i></a>
                                                    <a href="#" class="inactive-domain"><i class="fe fe-x"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateClock() {
            const now = new Date();

            // Get date information
            const day = now.getDate().toString().padStart(2, '0');
            const month = (now.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
            const year = now.getFullYear();

            // Get time information
            let hours = now.getHours();
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';

            // Convert 24-hour format to 12-hour format
            hours = hours % 12;
            hours = hours ? hours : 12; // The hour '0' should be '12'
            const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;

            // Format date as MM/DD/YYYY
            const dateString = `${month}/${day}/${year}`;

            // Update clock and date elements
            document.getElementById('live-clock').textContent = `${timeString}`;
            document.getElementById('live-date').textContent = `${dateString}`;
        }

        // Update the clock every second
        setInterval(updateClock, 1000);

        // Initialize the clock immediately when the page loads
        updateClock();
    </script>
@endcan
@endsection
