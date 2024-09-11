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
                                        <label>Package Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Package Name">
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4 col-md-6 col-sm-12"> --}}
                                    <div class="input-block mb-3">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select class="select">
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
            <!-- <div class="card invoices-tabs-card">
              <div class="invoices-main-tabs">
               <div class="row align-items-center">
                <div class="col-lg-12">
                 <div class="invoices-tabs">
                  <ul>
                   <li><a href="product-list.html" class="active">Product</a></li>
                   <li><a href="category.html">Category</a></li>
                   <li><a href="units.html">Units</a></li>
                  </ul>
                 </div>
                </div>
               </div>
              </div>
             </div> -->
            <!-- /All Invoice -->

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
                                            @foreach ($RolesData as $role)
                                                <tr>
                                                    <td>{{ $role->id }}</td>
                                                    <td>{{ $role->roles_name }}</td>
                                                    <td>{{ $role->status }}</td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class=" btn-action-icon "
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="edit-products.html"><i
                                                                                class="far fa-edit me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal"><i
                                                                                class="far fa-trash-alt me-2"></i>Delete</a>
                                                                    </li>
                                                                </ul>
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
            </div>
            <!-- /Table -->

        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- /Modal Start -->
    
    <!-- /Modal End -->

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
                                                <span><img src="{{ asset('assets') }}/img/icons/search.svg"
                                                        alt="img"></span>
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
                                            <span><img src="{{ asset('assets') }}/img/icons/search.svg"
                                                    alt="img"></span>
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
