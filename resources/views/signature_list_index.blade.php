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
                    <h5>Signature </h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#add_modal"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add
                                    Signature</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->





            <!-- Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class=" card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center datatable signature-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Signature Name</th>
                                            <th>Signature</th>
                                            <th>Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Allen</td>
                                            <td>
                                                <div class="table-avatar">
                                                    <img class="img-fluid light-color-logo" width="80" height="30"
                                                        src="assets/img/user-signature.png" alt="User Image">
                                                    <img class="img-fluid dark-white-logo" width="80" height="30"
                                                        src="assets/img/user-signature-white.png" alt="User Image">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input id="rating_1" class="check" type="checkbox" checked="">
                                                    <label for="rating_1" class="checktoggle checkbox-bg">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <a class=" btn-action-icon active me-2" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" title="Remove default"
                                                    data-bs-placement="left"><i class="fe fe-star"></i></a>
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#edit_modal"><i
                                                        class="fe fe-edit"></i></a>
                                                <a class=" btn-action-icon" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#warning_modal"><i
                                                        class="fe fe-trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Raymond</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <img class="img-fluid light-color-logo" width="80" height="30"
                                                        src="assets/img/user-signature.png" alt="User Image">
                                                    <img class="img-fluid dark-white-logo" width="80" height="30"
                                                        src="assets/img/user-signature-white.png" alt="User Image">
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input id="rating_2" class="check" type="checkbox" checked="">
                                                    <label for="rating_2" class="checktoggle checkbox-bg">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" title="Make as default"
                                                    data-bs-placement="left"><i class="fe fe-star"></i></a>
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#edit_modal"><i
                                                        class="fe fe-edit"></i></a>
                                                <a class=" btn-action-icon" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#warning_modal"><i
                                                        class="fe fe-trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Ralph</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <img class="img-fluid light-color-logo" width="80" height="30"
                                                        src="assets/img/user-signature.png" alt="User Image">
                                                    <img class="img-fluid dark-white-logo" width="80" height="30"
                                                        src="assets/img/user-signature-white.png" alt="User Image">
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input id="rating_3" class="check" type="checkbox">
                                                    <label for="rating_3" class="checktoggle checkbox-bg">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" title="Make as default"
                                                    data-bs-placement="left"><i class="fe fe-star"></i></a>
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#edit_modal"><i
                                                        class="fe fe-edit"></i></a>
                                                <a class=" btn-action-icon" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#warning_modal"><i
                                                        class="fe fe-trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Ruth</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <img class="img-fluid light-color-logo" width="80" height="30"
                                                        src="assets/img/user-signature.png" alt="User Image">
                                                    <img class="img-fluid dark-white-logo" width="80" height="30"
                                                        src="assets/img/user-signature-white.png" alt="User Image">
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input id="rating_4" class="check" type="checkbox" checked="">
                                                    <label for="rating_4" class="checktoggle checkbox-bg">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" title="Make as default"
                                                    data-bs-placement="left"><i class="fe fe-star"></i></a>
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#edit_modal"><i
                                                        class="fe fe-edit"></i></a>
                                                <a class=" btn-action-icon" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#warning_modal"><i
                                                        class="fe fe-trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Steven</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <img class="img-fluid light-color-logo" width="80" height="30"
                                                        src="assets/img/user-signature.png" alt="User Image">
                                                    <img class="img-fluid dark-white-logo" width="80" height="30"
                                                        src="assets/img/user-signature-white.png" alt="User Image">
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input id="rating_5" class="check" type="checkbox" checked="">
                                                    <label for="rating_5" class="checktoggle checkbox-bg">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" title="Make as default"
                                                    data-bs-placement="left"><i class="fe fe-star"></i></a>
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#edit_modal"><i
                                                        class="fe fe-edit"></i></a>
                                                <a class=" btn-action-icon" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#warning_modal"><i
                                                        class="fe fe-trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Earnes</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <img class="img-fluid light-color-logo" width="80" height="30"
                                                        src="assets/img/user-signature.png" alt="User Image">
                                                    <img class="img-fluid dark-white-logo" width="80" height="30"
                                                        src="assets/img/user-signature-white.png" alt="User Image">
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input id="rating_6" class="check" type="checkbox" checked="">
                                                    <label for="rating_6" class="checktoggle checkbox-bg">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" title="Make as default"
                                                    data-bs-placement="left"><i class="fe fe-star"></i></a>
                                                <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#edit_modal"><i
                                                        class="fe fe-edit"></i></a>
                                                <a class=" btn-action-icon" href="javascript:void(0);"
                                                    data-bs-toggle="modal" data-bs-target="#warning_modal"><i
                                                        class="fe fe-trash-2"></i></a>
                                            </td>
                                        </tr>
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