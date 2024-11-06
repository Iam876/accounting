@extends('layouts.header')
@section('content')
    <style>
        .badge-primary { background-color: #007bff; }
        .badge-danger { background-color: #dc3545; }
    </style>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h5>Student All Billings</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            <li>
                                <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Filter"><span class="me-2"><img
                                            src="{{ asset('assets') }}/img/icons/filter-icon.svg"
                                            alt="filter"></span>Filter </a>
                            </li>
                            <li>
                                <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal" 
                                   data-bs-target="#student_modal_add"><i
                                   class="fa fa-plus-circle me-2" aria-hidden="true"></i>{{ __('student.modal.add_student') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Months</th>
                                            <th class="no-sort">Print</th>
                                        </tr>
                                    </thead>
                                    <tbody id="studentBillingTableBody">
                                        {{-- @foreach ($studentBillingData as $index => $studentData)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $studentData['student_name'] }}</td>
                                                <td>
                                                    @foreach ($studentData['monthly_status'] as $month => $status)
                                                        <span class="badge badge-label {{ $status == 'paid' ? 'badge-primary' : 'badge-danger' }}">
                                                            {{ $month }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td><span class="btn btn-primary">Print</span></td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
    function fetchStudentBillingData() {
        $.ajax({
            url: '/student/all/billings',  // Endpoint for fetching data
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let tableBody = '';

                response.forEach((student, index) => {
                    let monthBadges = '';
                    
                    $.each(student.monthly_status, function (month, status) {
                        let badgeClass = status === 'paid' ? 'badge-primary' : 'badge-danger';
                        monthBadges += `<span class="badge badge-label ${badgeClass}">${month}</span> `;
                    });

                    tableBody += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${student.student_name}</td>
                            <td>${monthBadges}</td>
                            <td><span class="btn btn-primary">Print</span></td>
                        </tr>
                    `;
                });

                // Populate the table body with the fetched data
                $('#studentBillingTableBody').html(tableBody);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching student billing data:", error);
            }
        });
    }

    // Initial call to populate the table when the page loads
    fetchStudentBillingData();
});

    </script>
@endsection
