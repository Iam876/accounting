@extends('layouts.header')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>{{ __('package.title') }}</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Filter">
                                    <span class="me-2"><img src="{{ asset('assets') }}/img/icons/filter-icon.svg" alt="filter"/></span>Filter
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
                                data-bs-toggle="modal" data-bs-target="#package_choose_add">
                                    <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>{{ __('package.add_package') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal for Add Package -->
            <div id="package_choose_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-12">
									<div class="input-block mb-3">
										<label>{{ __('package.modal.package_name') }} <span class="text-danger">*</span></label>
										<input type="text" id="packageName" class="form-control" placeholder="{{ __('package.placeholder.package_name') }}">
									</div>											
								</div>
                                <div class="input-block mb-3">
                                    <label for="description">{{ __('package.modal.description') }}</label>
                                    <textarea name="text" id="description" class="form-control" style="height: 45px;" placeholder="{{ __('package.placeholder.description') }}" cols="80" rows="10"></textarea>
                                </div>
                                <div class="input-block mb-3">
                                    <label for="notes">{{ __('package.modal.notes') }}</label>
                                    <textarea name="text" id="notes" class="form-control" style="height: 80px;" placeholder="{{ __('package.placeholder.notes') }}" cols="80" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">{{ __('package.modal.close') }}</button>
                                    <button type="button" class="btn customer-btn-save">{{ __('package.modal.add_package') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Edit Package -->
            <div id="edit-package-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-12">
									<div class="input-block mb-3">
										<label>{{ __('package.modal.package_name') }} <span class="text-danger">*</span></label>
										<input type="text" id="editpackageName" class="form-control" placeholder="{{ __('package.placeholder.package_name') }}">
									</div>											
								</div>
                                <div class="input-block mb-3">
                                    <label for="description">{{ __('package.modal.description') }}</label>
                                    <textarea name="text" id="editDescription" class="form-control" style="height: 45px;" placeholder="{{ __('package.placeholder.description') }}" cols="80" rows="10"></textarea>
                                </div>
                                <div class="input-block mb-3">
                                    <label for="notes">{{ __('package.modal.notes') }}</label>
                                    <textarea name="text" id="editNotes" class="form-control" style="height: 80px;" placeholder="{{ __('package.placeholder.notes') }}" cols="80" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3 add-customer-btns text-end">
                                    <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">{{ __('package.modal.close') }}</button>
                                    <button type="button" class="btn customer-btn-save Edit-Update-Package">{{ __('package.modal.update_package') }}</button>
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
                                                <th>{{ __('package.table.id') }}</th>
                                                <th>{{ __('package.table.package_name') }}</th>
                                                <th>{{ __('package.table.description') }}</th>
                                                <th>{{ __('package.table.notes') }}</th>
                                                <th class="no-sort">{{ __('package.table.action') }}</th>
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

    <script src="{{ asset('ajax/packageAjax.js') }}"></script>

@endsection
