@extends('layouts.header')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="content-page-header">
                <h5>{{ __('roles.title') }}</h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        {{-- <li>
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
                        </li> --}}
                        <li>
                            <a href="#" class="btn btn-primary waves-effect waves-light mt-1"
                                data-bs-toggle="modal" data-bs-target="#role_modal_add">
                                <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>{{ __('roles.add_role') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal for Add Role -->
        <div id="role_modal_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-block mb-3">
                                    <label>{{ __('roles.modal.role_name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="roleName" placeholder="{{ __('roles.placeholder.role_name') }}">
                                </div>
                            </div>
                            {{-- <div class="input-block mb-3">
                                <label>{{ __('roles.modal.guard_name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="guardName" placeholder="Guard name (e.g., 'web')">
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3 add-customer-btns text-end">
                                <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">{{ __('roles.modal.close') }}</button>
                                <button type="button" class="btn customer-btn-save">{{ __('roles.modal.add_role') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Edit Role -->
        <div id="role_modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-block mb-3">
                                    <label>{{ __('roles.modal.role_name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="editRoleName" placeholder="{{ __('roles.placeholder.role_name') }}">
                                </div>
                            </div>
                            {{-- <div class="input-block mb-3">
                                <label>{{ __('roles.modal.guard_name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editGuardName" placeholder="Guard name (e.g., 'web')">
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3 add-customer-btns text-end">
                                <button type="button" class="btn customer-btn-cancel" data-bs-dismiss="modal">{{ __('roles.modal.close') }}</button>
                                <button type="button" class="btn customer-btn-save Edit-Update">{{ __('roles.modal.update_role') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="companies-table">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>{{ __('roles.table.id') }}</th>
                                            <th>{{ __('roles.table.role_name') }}</th>
                                            {{-- <th>{{ __('roles.table.guard_name') }}</th> --}}
                                            {{-- <th>{{ __('roles.table.created_at') }}</th> --}}
                                            {{-- <th>{{ __('roles.table.updated_at') }}</th> --}}
                                            <th class="no-sort">{{ __('roles.table.action') }}</th>
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
        edit: "{{ __('roles.table.edit') }}",
        delete: "{{ __('roles.table.delete') }}",
        paginate: {
            previous: "{{ __('datatable.paginate.previous') }}",
            next: "{{ __('datatable.paginate.next') }}"
        },
        search: "{{ __('datatable.search') }}",
        lengthMenu: "{{ __('datatable.lengthMenu') }}"
    };
    const defaultImagePath = "{{ asset('/assets/img/no-image.png') }}";
</script>
<script src="{{ asset('ajax/role.js') }}"></script>

@endsection
