@extends('layouts.header')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>{{ __('pic.title') }}</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Filter">
                                    <span class="me-2"><img src="{{ asset('assets') }}/img/icons/filter-icon.svg" alt="filter"></span>Filter
                                </a>
                            </li>
                            <li class="">
                                <div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Download">
                                    <a href="#" class="btn-filters" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span><i class="fe fe-download"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="d-block">
                                            <li>
                                                <a class="d-flex align-items-center download-item" href="javascript:void(0);" download>
                                                    <i class="far fa-file-pdf me-2"></i>PDF
                                                </a>
                                            </li>
                                            <li>
                                                <a class="d-flex align-items-center download-item" href="javascript:void(0);" download>
                                                    <i class="far fa-file-text me-2"></i>CSV
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Print">
                                    <span><i class="fe fe-printer"></i></span> 
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-primary waves-effect waves-light mt-1"
                                    data-bs-toggle="modal" data-bs-target="#pic_modal_add">
                                    <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>{{ __('pic.add_pic') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal for Add PIC Company -->
            <div id="pic_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4 form-group-bank">
                            <div class="row"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('pic.modal.pic_company') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="picCompany" class="form-control" placeholder="{{ __('pic.placeholder.pic_company') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('pic.modal.phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="phone" class="form-control" placeholder="{{ __('pic.placeholder.phone') }}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-3" class="form-label">{{ __('pic.modal.address') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="address" class="form-control" placeholder="{{ __('pic.placeholder.address') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">{{ __('pic.modal.close') }}</button>
                                    <button type="button" class="btn customer-btn-save Edit-Update-School">{{ __('pic.modal.add_pic') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Edit PIC Company -->
            <div id="edit-pic-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4 form-group-bank">
                            <div class="row"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('pic.modal.pic_company') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="editpicCompany" class="form-control" placeholder="{{ __('pic.placeholder.pic_company') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('pic.modal.phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="editphone" class="form-control" placeholder="{{ __('pic.placeholder.phone') }}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-3" class="form-label">{{ __('pic.modal.address') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="editaddress" class="form-control" placeholder="{{ __('pic.placeholder.address') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">{{ __('pic.modal.close') }}</button>
                                    <button type="button" class="btn customer-btn-save Edit-Update-Pic">{{ __('pic.modal.update_pic') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                                <th>{{ __('pic.table.id') }}</th>
                                                <th>{{ __('pic.table.name') }}</th>
                                                <th>{{ __('pic.table.contact') }}</th>
                                                <th>{{ __('pic.table.address') }}</th>
                                                <th class="no-sort">{{ __('pic.table.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Dynamic rows will be here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var translations = {
            edit: "{{ __('school.table.edit') }}",
            delete: "{{ __('school.table.delete') }}"
        };
    </script>
    <script src="{{ asset('ajax/picCompanyAjax.js') }}"></script>
@endsection
