@extends('layouts.header')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>{{ __('billing_methods.title') }}</h5>
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
                                    data-bs-toggle="modal" data-bs-target="#billing_methods_add">
                                    <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>{{ __('billing_methods.add_billing_method') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal for Add Billing Method -->
            <div id="billing_methods_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4 form-group-bank">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('billing_methods.modal.method_name') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="methodName" class="form-control" placeholder="{{ __('billing_methods.placeholder.method_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">{{ __('billing_methods.modal.close') }}</button>
                                    <button type="button" class="btn customer-btn-save">{{ __('billing_methods.modal.add_billing_method') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Edit Billing Method -->
            <div id="edit-billing-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4 form-group-bank">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label>{{ __('billing_methods.modal.method_name') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="editmethodName" class="form-control" placeholder="{{ __('billing_methods.placeholder.method_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">{{ __('billing_methods.modal.close') }}</button>
                                    <button type="button" class="btn customer-btn-save Update-Billing">{{ __('billing_methods.modal.update_billing_method') }}</button>
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
                                                <th>{{ __('billing_methods.table.id') }}</th>
                                                <th>{{ __('billing_methods.table.method_name') }}</th>
                                                <th class="no-sort">{{ __('billing_methods.table.action') }}</th>
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

    <script src="{{ asset('ajax/billingMethod.js') }}"></script>
@endsection
