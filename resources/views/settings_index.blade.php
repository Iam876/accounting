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
    <!-- /Main Wrapper -->
@endsection
