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
                                    <button type="button" class="btn customer-btn-save Edit-Update-School">Add
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

    <script src="{{ asset('ajax/schoolAjax.js') }}"></script>
@endsection
