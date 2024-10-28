@extends('layouts.header')
@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}"> --}}
    <!-- <div class="main-wrapper"> -->
    <style>
        .custom-file-container__image-multi-preview {
            height: 180px !important;
        }

        .select2-container {
            z-index: 9999 !important;
            /* Ensure select2 dropdown is on top */
        }

        .select2-dropdown {
            z-index: 99999 !important;
            /* Dropdown itself should have a high z-index */
        }

        .error-message {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }
    </style>

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
                                    data-bs-toggle="modal" data-bs-target="#student_modal_add"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Student</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <!-- /Modal Start -->
            <div id="student_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none; --bs-modal-width: 1280px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="form-group-item">
                                    <h5 class="form-title">Basic Details</h5>
                                    <div class="profile-picture">
                                        <div class="upload-profile">
                                            <div class="profile-img">
                                                <img id="blah" class="avatar" src="assets/img/profiles/avatar-14.jpg"
                                                    alt="profile-img">
                                            </div>
                                            <div class="add-profile">
                                                <h5>Upload a New Photo</h5>
                                                <span>Profile-pic.jpg</span>

                                            </div>
                                        </div>
                                        <div class="img-upload">
                                            <label class="btn btn-upload">
                                                Upload <input id="userPhoto" type="file">
                                                <div class="invalid-feedback"></div>
                                            </label>
                                            <a class="btn btn-remove">Remove</a>
                                        </div>
                                    </div>
                                    <div class="row form-group-bank mb-2" style="margin-left: 0px; margin-right:0px;">

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Student Name <span class="text-danger">*</span></label>
                                                <input type="text" id="studentName" class="form-control"
                                                    placeholder="Enter Student Name">
                                                <div class="invalid-feedback"></div>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Name Katakana<span class="text-danger">*</span></label>
                                                <input type="text" id="studentKatakana" class="form-control"
                                                    placeholder="Enter Name in Katakana">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" id="email" class="form-control"
                                                    placeholder="Enter Email Address">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input type="text" id="mobile_code" class="form-control"
                                                    placeholder="Phone Number" name="name">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>School Name <span class="text-danger">*</span></label>
                                                <select class="form-control" id="schoolName">
                                                    <option disabled>Select School</option>

                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Country <span class="text-danger">*</span></label>
                                                <select class="js-example-basic-single" id="country">
                                                    {{-- @foreach ($country as $name)
                                                        <option value="{{ $name }}">{{ $name }}</option>
                                                    @endforeach --}}
                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Package Type <span class="text-danger">*</span></label>
                                                <select class="select" id="packageType">
                                                    <option>Select Currency</option>

                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Choose Apartment <span class="text-danger">*</span></label>
                                                <select class="select" id="selectApartment">

                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Select Room <span class="text-danger">*</span></label>
                                                <select class="select" id="selectRoom">
                                                    {{-- <option>Select Currency</option>
                                                    <option>₹</option>
                                                    <option>$</option>
                                                    <option>£</option>
                                                    <option>€</option> --}}
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label for="notes">Notes</label>
                                                <textarea name="text" class="form-control" style="height: 45px;" id="notes" cols="80" rows="10"></textarea>
                                            </div>											
                                            </div> --}}

                                        {{-- </div> --}}


                                    </div>
                                    <div class="row form-group-bank p-2 mb-2" style="margin-left: 0px; margin-right:0px;">
                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label>Contract Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text" id="contractDate"
                                                        class="datetimepicker form-control" placeholder="Select Date">
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label>Terminition Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text" id="terminitionDate"
                                                        class="datetimepicker form-control" placeholder="Select Date">
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label>Billing Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text" id="billingDate"
                                                        class="datetimepicker form-control"
                                                        placeholder="Select Billing Date">
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        {{-- <div class="input-block mb-3 notes-form-group-info">
                                            <label>Notes</label>
                                            <textarea class="form-control" placeholder="Enter Notes"></textarea>
                                        </div> --}}
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Initial/Advance <span class="text-danger">*</span></label>
                                                <input type="number" id="initialFees" class="form-control"
                                                    placeholder="Initial Fees in Number" name="name">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>House Rent <span class="text-danger">*</span></label>
                                                <input type="number" id="houseRent" class="form-control"
                                                    placeholder="Rent Fees in Number" name="name">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Utility Fees <span class="text-danger">*</span></label>
                                                <input type="number" id="utilityFees" class="form-control"
                                                    placeholder="Utility Fees in Number" name="name">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group-bank p-2 mb-2" style="margin-left: 0px; margin-right:0px;">


                                        <div class="col-md-12 col-sm-12">
                                            <div class="card-header">
                                                <h5 class="card-title">Zyro (Front - Back) & Passport</h5>
                                            </div>
                                            {{-- zyroPassportImages --}}
                                            <div class="card-body">
                                                <div class="custom-file-container" data-upload-id="myFirstImage2">
                                                    <label>Upload Images (Front, Back, Passport)
                                                        <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a>
                                                    </label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input id="myFirstImage2" type="file"
                                                            class="custom-file-container__custom-file__custom-file-input"
                                                            accept="image/*" multiple>
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
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

            <div id="student_modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none; --bs-modal-width: 1280px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="form-group-item">
                                    <h5 class="form-title">Basic Details</h5>
                                    <div class="profile-picture">
                                        <div class="upload-profile">
                                            <div class="profile-img">
                                                <img id="editblah" class="avatar"
                                                    src="assets/img/profiles/avatar-14.jpg" alt="profile-img">
                                            </div>
                                            <div class="add-profile">
                                                <h5>Upload a New Photo</h5>
                                                <span>Profile-pic.jpg</span>
                                            </div>
                                        </div>
                                        <div class="img-upload">
                                            <label class="btn btn-upload">
                                                Upload <input id="edituserPhoto" type="file">
                                            </label>
                                            <div class="invalid-feedback"></div>
                                            <a class="btn btn-remove">Remove</a>
                                        </div>
                                    </div>
                                    <div class="row form-group-bank mb-2" style="margin-left: 0px; margin-right:0px;">

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Student Name <span class="text-danger">*</span></label>
                                                <input type="text" id="editstudentName" class="form-control"
                                                    placeholder="Enter Student Name">
                                                <div class="invalid-feedback"></div>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Name Katakana<span class="text-danger">*</span></label>
                                                <input type="text" id="editstudentKatakana" class="form-control"
                                                    placeholder="Enter Name in Katakana">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" id="editemail" class="form-control"
                                                    placeholder="Enter Email Address">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input type="text" id="editmobile_code" class="form-control"
                                                    placeholder="Phone Number" name="name">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>School Name <span class="text-danger">*</span></label>
                                                <select class="form-control" id="editschoolName">
                                                    <option disabled>Select School</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Country <span class="text-danger">*</span></label>
                                                <select class="js-example-basic-single" id="editcountry">

                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Package Type <span class="text-danger">*</span></label>
                                                <select class="select" id="editpackageType">
                                                    <option>Select Currency</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Choose Apartment <span class="text-danger">*</span></label>
                                                <select class="select" id="editselectApartment">
                                                    <option>Select Apartment</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Select Room <span class="text-danger">*</span></label>
                                                <select class="select" id="editselectRoom">
                                                    <option>Select Room</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row form-group-bank p-2 mb-2" style="margin-left: 0px; margin-right:0px;">
                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label>Contract Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text" id="editcontractDate"
                                                        class="datetimepicker form-control" placeholder="Select Date">
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label>Termination Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text" id="editterminitionDate"
                                                        class="datetimepicker form-control" placeholder="Select Date">
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label>Billing Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text" id="editbillingDate"
                                                        class="datetimepicker form-control"
                                                        placeholder="Select Billing Date">
                                                </div>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Initial/Advance <span class="text-danger">*</span></label>
                                                <input type="number" id="editinitialFees" class="form-control"
                                                    placeholder="Initial Fees in Number">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>House Rent <span class="text-danger">*</span></label>
                                                <input type="number" id="edithouseRent" class="form-control"
                                                    placeholder="Rent Fees in Number">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Utility Fees <span class="text-danger">*</span></label>
                                                <input type="number" id="editutilityFees" class="form-control"
                                                    placeholder="Utility Fees in Number">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group-bank p-2 mb-2" style="margin-left: 0px; margin-right:0px;">

                                        <div class="col-md-12 col-sm-12">
                                            <div class="card-header">
                                                <h5 class="card-title">Zyro (Front - Back) & Passport</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label>Upload Images (Front, Back, Passport)
                                                        <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a>
                                                    </label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input id="myFirstImage" type="file"
                                                            class="custom-file-container__custom-file__custom-file-input"
                                                            accept="image/*" multiple>
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn customer-btn-save update-student">Update
                                        Student</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Modal End -->

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
                                                <th>Student Image</th>
                                                <th>Student Name</th>
                                                <th>School Name</th>
                                                <th>Phone</th>
                                                <th>Apartment</th>
                                                <th>Room</th>
                                                <th>Initial Fees</th>
                                                <th>House Rent</th>
                                                <th>Utility</th>
                                                {{-- <th>Notes</th> --}}
                                                <!-- <th>Selling Price</th> -->
                                                <!-- <th>Purchase Price</th> -->
                                                <th class="no-sort">Action</th>
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
            </div>
            <!-- /Table -->

        </div>
    </div>
    <!-- /Page Wrapper -->
 
    <!-- /Main Wrapper -->

    <script src="{{ asset('ajax/studentAjax.js') }}"></script>
@endsection
