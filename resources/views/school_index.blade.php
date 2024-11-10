@extends('layouts.header')
@section('content')
    <!-- <div class="main-wrapper"> -->
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>{{ __('school.title') }} : The database Version {{ $databaseYear }}</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            {{-- <li>
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
                            </li> --}}
                            {{-- <li>
										<a class="btn btn-primary" href="add-products.html"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Product</a>
									</li> --}}
                            <li>
                                <a href="#" class="btn btn-primary waves-effect waves-light mt-1" data-bs-toggle="modal"
                                    data-bs-target="#school_modal_add"><i class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>{{ __('school.add_school') }}</a>
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
                                            <h5>{{ __('school.modal.title') }}</h5>
                                            <span>{{ __('school.modal.subtitle') }}</span>
                                        </div>
                                    </div>
                                    <div class="img-upload d-flex">
                                        <label class="btn btn-upload">
                                            {{ __('school.modal.upload_button') }} <input id="schoolImage" type="file">
                                        </label>
                                        <a class="btn btn-remove">{{ __('school.modal.remove_button') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('school.modal.school_name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="schoolName" class="form-control"
                                            placeholder="{{ __('school.placeholder.school_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('school.modal.phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="phone" class="form-control"
                                            placeholder="{{ __('school.placeholder.phone') }}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-3" class="form-label">{{ __('school.modal.address') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="address" class="form-control" id="field-3"
                                            placeholder="{{ __('school.placeholder.address') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-4" class="form-label">{{ __('school.modal.city') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="city" class="form-control" id="field-4"
                                            placeholder="{{ __('school.placeholder.city') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">{{ __('school.modal.close') }}</button>
                                    <button type="button"
                                        class="btn customer-btn-save">{{ __('school.modal.add_school') }}</button>
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
                                            <img id="blah" class="avatar" src="" alt="profile-img">
                                        </div>
                                        <div class="add-profile">
                                            <h5>{{ __('school.modal.title') }}</h5>
                                            <span>{{ __('school.modal.subtitle') }}</span>
                                        </div>
                                    </div>
                                    <div class="img-upload d-flex">
                                        <label class="btn btn-upload">
                                            {{ __('school.modal.upload_button') }} <input id="editschoolImage"
                                                type="file">
                                        </label>
                                        <a class="btn btn-remove">{{ __('school.modal.remove_button') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('school.modal.school_name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="editschoolName" class="form-control"
                                            placeholder="{{ __('school.placeholder.school_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('school.modal.phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="editphone" class="form-control"
                                            placeholder="{{ __('school.placeholder.phone') }}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-3" class="form-label">{{ __('school.modal.address') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="editaddress" class="form-control"
                                            placeholder="{{ __('school.placeholder.address') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-4" class="form-label">{{ __('school.modal.city') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="editcity" class="form-control"
                                            placeholder="{{ __('school.placeholder.city') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">{{ __('school.modal.close') }}</button>
                                    <button type="button"
                                        class="btn customer-btn-save Edit-Update-School">{{ __('school.modal.update') }}
                                        School</button>
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
                                                <th>{{ __('school.table.school_image') }}</th>
                                                <th>{{ __('school.table.school_name') }}</th>
                                                <th>{{ __('school.table.contact') }}</th>
                                                <th>{{ __('school.table.address') }}</th>
                                                <th>{{ __('school.table.prefecture') }}</th>
                                                <!-- <th>Selling Price</th> -->
                                                <!-- <th>Purchase Price</th> -->
                                                <th class="no-sort">{{ __('school.table.action') }}</th>
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

    <script>
        var translations = {
            edit: "{{ __('school.table.edit') }}",
            delete: "{{ __('school.table.delete') }}",
            paginate: {
                previous: "{{ __('datatable.paginate.previous') }}",
                next: "{{ __('datatable.paginate.next') }}"
            },
            search: "{{ __('datatable.search') }}",
            lengthMenu: "{{ __('datatable.lengthMenu') }}"
        };
        const defaultImagePath = "{{ asset('/assets/img/no-image.png') }}";
    </script>

    <script src="{{ asset('ajax/schoolAjax.js') }}"></script>
@endsection
