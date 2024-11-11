@extends('layouts.header')
@section('content')
    <!-- <div class="main-wrapper"> -->
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>{{ __('billing.title') }}</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            {{-- <li>
                                <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Filter"><span class="me-2"><img
                                            src="{{ asset('assets') }}/img/icons/filter-icon.svg"
                                            alt="filter"></span>Filter </a>
                            </li>
                            <li>
                                <a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Settings"><span><i class="fe fe-settings"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-primary waves-effect waves-light mt-1"
                                    data-bs-toggle="modal" data-bs-target="#billing_modal_update"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Billing</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <div class="invoices-main-tabs">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="invoices-tabs">
                                <ul>
                                    <li><a href="#" id="all_billing" class="filter-tab active">{{ __('billing.buttons.all_billing') }}</a></li>
                                    <li><a href="#" id="paid" class="filter-tab">{{ __('billing.buttons.paid') }}</a></li>
                                    <li><a href="#" id="unpaid" class="filter-tab">{{ __('billing.buttons.unpaid') }}</a></li>
                                    <li><a href="#" id="overdue" class="filter-tab">{{ __('billing.buttons.overdue') }}</a></li>
                                    <li><a href="#" id="partially_paid" class="filter-tab">{{ __('billing.buttons.partially') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>{{ __('billing.table.invoice_id') }}</th>
                                            <th>{{ __('billing.table.student_name') }}</th>
                                            <th>{{ __('billing.table.apartment') }}</th>
                                            <th>{{ __('billing.table.room') }}</th>
                                            <th>{{ __('billing.table.payment_method') }}</th>
                                            <th>{{ __('billing.table.rent') }}</th>
                                            <th>{{ __('billing.table.total_amount') }}</th>
                                            <th>{{ __('billing.table.due_amount') }}</th>
                                            <th>{{ __('billing.table.overdue') }}</th>
                                            <th>{{ __('billing.table.status') }}</th>
                                            <th class="text-end">{{ __('billing.table.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="billingData">
                                        <!-- Data populated by Ajax -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Modal Start -->
            <div id="billing_modal_update" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                style="display: none; --bs-modal-width: 1280px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <form id="billingUpdateForm">
                                <input type="hidden" id="billing_id" name="billing_id" value="">
                                <input type="hidden" id="total_dues" name="total_dues" value=""> <!-- Total Dues -->
                                <input type="hidden" id="house_rent" name="house_rent" value=""> <!-- House Rent -->

                                <div class="row">
                                    <h5 class="form-title">{{ __('billing.modal.update_billing_details') }}</h5>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>{{ __('billing.table.student_name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="student_name" name="student_name"
                                                readonly>
                                            <input type="hidden" id="student_id" name="student_id" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>{{ __('billing.table.payment_method') }} <span class="text-danger">*</span></label>
                                            <select class="select form-control" id="payment_method_id"
                                                name="payment_method_id" required>
                                                <option value="">Select Payment Method</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>{{ __('billing.modal.amount_paid') }} <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="amount_paid"
                                                name="amount_paid" placeholder="{{ __('billing.modal.placeholders.enter_amount_paid') }}" required
                                                min="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 payment-date-field">
                                        <div class="input-block mb-3">
                                            <label>{{ __('billing.modal.payment_date') }} <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="payment_date"
                                                name="payment_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>{{ __('billing.modal.payment_id') }}</label>
                                            <input type="text" class="form-control" id="payment_id" name="payment_id"
                                                placeholder="{{ __('billing.modal.placeholders.enter_payment_id') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>{{ __('billing.modal.house_rent_utility') }}</label>
                                            <input type="text" class="form-control" id="display_house_rent" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>{{ __('billing.modal.total_dues') }}</label>
                                            <input type="text" class="form-control" id="display_total_dues" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-block mb-3">
                                            <label>{{ __('billing.modal.pending_dues') }}</label>
                                            <select class="select form-control" id="pending_dues" name="pending_dues[]"
                                                multiple>
                                                <!-- Pending dues dynamically populated here -->
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="input-block mb-3 notes-form-group-info">
                                        <label>{{ __('billing.modal.notes') }}</label>
                                        <textarea class="form-control" id="notes" name="notes" placeholder="Enter Notes (optional)"></textarea>
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3 add-customer-btns text-end">
                                        <button type="button" class="btn customer-btn-cancel"
                                            data-bs-dismiss="modal">{{ __('billing.buttons.close') }}</button>
                                        <button type="submit" class="btn customer-btn-save"
                                            id="saveBillingUpdate">{{ __('billing.buttons.update_billing') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Billing History Modal -->
            <div id="billing_history_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('billing.history.billing_history') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('billing.history.date') }}</th>
                                        <th>{{ __('billing.history.total_amount') }}</th>
                                        <th>{{ __('billing.history.amount_paid') }}</th>
                                        <th>{{ __('billing.history.due_amount') }}</th>
                                        <th>{{ __('billing.history.status') }}</th>
                                        <th>{{ __('billing.history.payment_method') }}</th>
                                        <th>{{ __('billing.history.transaction_id') }}</th>
                                        <th>{{ __('billing.history.payment_date') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="billingHistoryData">
                                    <!-- History data populated via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Table -->

        </div>
    </div>
    <script>
        var translations = {
            edit: "{{ __('billing.table.edit') }}",
            delete: "{{ __('billing.table.delete') }}",
            history: "{{ __('billing.table.history') }}",
            paginate: {
                previous: "{{ __('datatable.paginate.previous') }}",
                next: "{{ __('datatable.paginate.next') }}"
            },
            search: "{{ __('datatable.search') }}",
            lengthMenu: "{{ __('datatable.lengthMenu') }}"
        };
        const defaultImagePath = "{{ asset('/assets/img/no-image.png') }}";
    </script>
    <script src="{{ asset('ajax/billings.js') }}"></script>
@endsection
