@extends('layouts.header')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>{{ __('apartment.title') }}</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a href="#" class="btn btn-primary waves-effect waves-light mt-1"
                                    data-bs-toggle="modal" data-bs-target="#apartment_modal_add"><i
                                        class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>{{ __('apartment.add_apartment') }}</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /Modal Start -->
            <div id="apartment_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="form-group-item">
                                    <h5 class="form-title">{{ __('apartment.modal.title_add') }}</h5>
                                    <div class="profile-picture">
                                        <div class="upload-profile">
                                            <div class="profile-img">
                                                <img id="blah" class="avatar" src="assets/img/profiles/avatar-14.jpg"
                                                    alt="profile-img">
                                            </div>
                                            <div class="add-profile">
                                                <h5>{{ __('apartment.modal.upload_button') }}</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="img-upload d-flex">
                                            <label class="btn btn-upload">
                                                {{ __('apartment.modal.upload_button') }} <input id="apartmentImage"
                                                    type="file">
                                            </label>
                                            <a class="btn btn-remove">{{ __('apartment.modal.remove_button') }}</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>{{ __('apartment.modal.mansion_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="mansionName"
                                                    placeholder="{{ __('apartment.placeholder.mansion_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>{{ __('apartment.modal.structure') }} <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="mansion_structure"
                                                    placeholder="{{ __('apartment.placeholder.structure') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>{{ __('apartment.modal.address') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="{{ __('apartment.placeholder.address') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>{{ __('apartment.modal.pic_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="pic_name">
                                                    <option selected="selected"></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>{{ __('apartment.modal.rooms') }}</label>
                                            {{-- <button type="button" id="add-room-btn" class="btn btn-primary mb-2">Add Room</button> --}}
                                            <button id="add-room-btn" class="btn btn-primary mb-2"
                                                data-target-template="#room-template"
                                                data-target-container="#rooms-container">{{ __('apartment.modal.rooms') }}</button>
                                            <div id="rooms-container"></div>
                                            <!-- Room Template (hidden) -->
                                            <div id="room-template" class="room-item mb-3" style="display: none;">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="room_number"
                                                            placeholder="{{ __('apartment.placeholder.room_number') }}">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="room_type"
                                                            placeholder="{{ __('apartment.placeholder.room_type') }}">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="initial_rent"
                                                            placeholder="{{ __('apartment.placeholder.initial_rent') }}">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="facilities"
                                                            placeholder="{{ __('apartment.placeholder.facilities') }}">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="number" class="form-control" name="max_student"
                                                            placeholder="{{ __('apartment.placeholder.max_students') }}">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="file" class="form-control" name="photos[]" multiple>
                                                    </div>
                                                    <div
                                                        class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex align-items-center">
                                                        <button type="button"
                                                            class="btn btn-danger remove-room-btn">{{ __('apartment.modal.remove_button') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">{{ __('apartment.modal.close') }}</button>
                                    <button type="button"
                                        class="btn customer-btn-save">{{ __('apartment.modal.add_apartment') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="apartment_modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="form-group-item">
                                    <h5 class="form-title">{{ __('apartment.modal.title_edit') }}</h5>
                                    <div class="profile-picture">
                                        <div class="upload-profile">
                                            <div class="profile-img">
                                                <img id="blah" class="avatar"
                                                    src="assets/img/profiles/avatar-14.jpg" alt="profile-img">
                                            </div>
                                            <div class="add-profile">
                                                <h5>{{ __('apartment.modal.upload_button') }}</h5>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="img-upload d-flex">
                                            <label class="btn btn-upload">
                                                {{ __('apartment.modal.upload_button') }} <input id="editapartmentImage"
                                                    type="file">
                                            </label>
                                            <a class="btn btn-remove">{{ __('apartment.modal.remove_button') }}</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>{{ __('apartment.modal.mansion_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="editmansionName"
                                                    placeholder="{{ __('apartment.placeholder.mansion_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>{{ __('apartment.modal.address') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="editaddress"
                                                    placeholder="{{ __('apartment.placeholder.address') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>{{ __('apartment.modal.structure') }} <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="edit_mansion_structure"
                                                    placeholder="{{ __('apartment.placeholder.structure') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="input-block mb-3">
                                                <label>{{ __('apartment.modal.pic_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="editpic_name"></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>{{ __('apartment.modal.rooms') }}</label>
                                            {{-- <button type="button" id="add-edit-room-btn" class="btn btn-primary mb-2">Add Room</button> --}}
                                            <button id="add-edit-room-btn" class="btn btn-primary mb-2"
                                                data-target-template="#edit-room-template"
                                                data-target-container="#edit-rooms-container">{{ __('apartment.modal.rooms') }}</button>
                                            <div id="edit-rooms-container"></div>
                                            <!-- Room Template (hidden) -->
                                            <div id="edit-room-template" class="room-item mb-3" style="display: none;">
                                                <div class="row">
                                                    <input type="hidden" name="id" value="null">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="room_number" placeholder="Room Number">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="room_type" placeholder="Room Type">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="initial_rent" placeholder="Initial Rent">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="text" class="form-control" name="facilities" placeholder="Facilities">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="number" class="form-control" name="max_student" placeholder="Max Students">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                                        <input type="file" class="form-control" name="photos[]" multiple>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex align-items-center">
                                                        <button type="button" class="btn btn-danger remove-room-btn">Remove Room</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel"
                                        data-bs-dismiss="modal">{{ __('apartment.modal.close') }}</button>
                                    <button type="button"
                                        class="btn customer-btn-save apartment_edit_update">{{ __('apartment.modal.update_apartment') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="view-room-images-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Room Images</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="room-images-container">
                                <!-- Images will be dynamically added here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Room Details Modal -->
            <div id="roomDetailsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('apartment.modal.room_details_title') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 mb-3 fs-5">
                                    <label>{{ __('apartment.modal.room_number') }}: </label><span style="color:#7539FF;"
                                        id="viewRoomNumber"></span>

                                </div>
                                <div class="col-lg-6 mb-3 fs-5">
                                    <label>{{ __('apartment.modal.room_type') }}: </label><span style="color:#7539FF;"
                                        id="viewRoomType"></span>

                                </div>
                                <div class="col-lg-6 mb-3 fs-5">
                                    <label>{{ __('apartment.modal.initial_rent') }}: </label><span style="color:#7539FF;"
                                        id="viewInitialRent"></span>

                                </div>
                                <div class="col-lg-6 mb-3 fs-5">
                                    <label>{{ __('apartment.modal.max_students') }}: </label><span style="color:#7539FF;"
                                        id="viewMaxStudent"></span>

                                </div>
                                <div class="col-lg-12 mb-3 fs-5">
                                    <label>{{ __('apartment.modal.facilities') }}: </label>
                                    <select class="form-control tagging" id="viewFacilities" name="facilities"
                                        multiple="multiple" disabled></select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('apartment.modal.close') }}</button>
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
                                                <th>{{ __('apartment.table.image') }}</th>
                                                <th>{{ __('apartment.table.mansion_name') }}</th>
                                                <th>{{ __('apartment.table.address') }}</th>
                                                <th>{{ __('apartment.table.room_number') }}</th>
                                                <th>{{ __('apartment.table.pic_name') }}</th>
                                                <th>{{ __('apartment.table.pic_contact') }}</th>
                                                <th class="no-sort">{{ __('apartment.table.action') }}</th>
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
    <script src="{{ asset('ajax/apartmentAjax.js') }}"></script>
@endsection
