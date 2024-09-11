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

          <!-- /Page Header -->

          <div class="row">
            <div class="col-xl-3 col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="page-header">
                    <div class="content-page-header">
                      <h5>Settings</h5>
                    </div>
                  </div>
                  <!-- Settings Menu -->
                  <div class="widget settings-menu mb-0">
                    <ul>
                      <li class="nav-item">
                        <a href="#" class="nav-link active">
                          <i class="fe fe-user"></i>
                          <span>Account Settings</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-settings"></i>
                          <span>Company Settings</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-file"></i>
                          <span>Invoice Settings</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-layers"></i>
                          <span>Invoice Templates</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-credit-card"></i>
                          <span>Payment Methods</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-aperture"></i>
                          <span>Bank Settings</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-file-text"></i> <span>Tax Rates</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-credit-card"></i>
                          <span>Plan & Billing</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-aperture"></i> <span>Two Factor</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-file-text"></i>
                          <span>Custom Fields</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-mail"></i> <span>Email Settings</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-settings"></i>
                          <span>Preference Settings</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-airplay"></i>
                          <span>Email Templates</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-send"></i> <span>SEO Settings</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fe fe-target"></i>
                          <span>SaaS Settings</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- /Settings Menu -->
                </div>
              </div>
            </div>
            <div class="col-xl-9 col-md-8">
              <div class="card">
                <div class="card-body w-100">
                  <div class="content-page-header">
                    <h5 class="setting-menu">Account Settings</h5>
                  </div>
                  <div class="row">
                    <div class="profile-picture">
                      <div class="upload-profile me-2">
                        <div class="profile-img">
                          <img
                            id="blah"
                            class="avatar"
                            src="assets/img/profiles/avatar-10.jpg"
                            alt="profile-img"
                          />
                        </div>
                      </div>
                      <div class="img-upload">
                        <label class="btn btn-primary">
                          Upload new picture <input type="file" />
                        </label>
                        <a class="btn btn-remove">Delete</a>
                        <p class="mt-1">
                          Logo Should be minimum 152 * 152 Supported File format
                          JPG,PNG,SVG
                        </p>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-title">
                        <h5>General Information</h5>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>First Name</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter First Name"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>Last Name</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Last Name"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>Email</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Email Address"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>Mobile Number</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Mobile Number"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-0">
                        <label>Gender</label>
                        <select class="select">
                          <option>Select Gender</option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>Date of Birth</label>
                        <div class="cal-icon cal-icon-info">
                          <input
                            type="text"
                            class="datetimepicker form-control"
                            placeholder="Select Date"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-title">
                        <h5>Address Information</h5>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-block mb-3">
                        <label>Address</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter your Address"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>Country</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter your Country"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>State</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter your State"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>City</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter your City"
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="input-block mb-3">
                        <label>Postal Code</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Your Postal Code"
                        />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="btn-path text-end">
                        <a
                          href="#(0);"
                          class="btn btn-cancel bg-primary-light me-3"
                          >Cancel</a
                        >
                        <a href="#(0);" class="btn btn-primary"
                          >Save Changes</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Page Wrapper -->

    <!-- Add Asset -->
    <div class="toggle-sidebar">
        <div class="sidebar-layout-filter">
            <div class="sidebar-header">
                <h5>Filter</h5>
                <a href="#="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
            </div>
            <div class="sidebar-body">
                <form action="#" autocomplete="off">
                    <!-- Product -->
                    <div class="accordion" id="accordionMain1">
                        <div class="card-header-new" id="headingOne">
                            <h6 class="filter-title">
                                <a href="#(0);" class="w-100" data-bs-toggle="collapse"
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
                                                        <a href="#(0);" class="viewall-button-One"><span
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
                                <a href="#(0);" class="w-100 collapsed" data-bs-toggle="collapse"
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
                                                <a href="#(0);" class="viewall-button-Two"><span
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
                                <a href="#(0);" class="w-100 collapsed" data-bs-toggle="collapse"
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
                                <a href="#(0);" class="w-100 collapsed" data-bs-toggle="collapse"
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
                                                <a href="#(0);" class="viewall-button-Two"><span
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
