@extends('layouts.header')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        
        <!-- Page Header -->
        <div class="page-header">
            <div class="content-page-header">
                <h5>Permission</h5>
            </div>
            <div class="role-testing d-flex align-items-center justify-content-between">
                <h6>Role Name:<span class="ms-1">{{ $roleName }}</span></h6>
                <p>
                    <label class="custom_check">
                        <input type="checkbox" onclick="toggleAllModules()">
                        <span class="checkmark"></span>
                    </label>
                    Allow All Modules
                </p>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Table -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-table"> 
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Modules</th>
                                        <th>Sub Modules</th>
                                        <th>Create</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>View</th>
                                        <th>Allow all</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modules as $module)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="role-data">{{ ucfirst($module->name) }}</td>
                                            <td>{{ ucfirst($module->name) }}</td>
                                            <td>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="permissions[]" value="{{ $module->name }} create"
                                                           {{ $user->can('create ' . $module->name) ? 'checked' : '' }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="permissions[]" value="{{ $module->name }} edit"
                                                           {{ $user->can('edit ' . $module->name) ? 'checked' : '' }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="permissions[]" value="{{ $module->name }} delete"
                                                           {{ $user->can('delete ' . $module->name) ? 'checked' : '' }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="permissions[]" value="{{ $module->name }} view"
                                                           {{ $user->can('view ' . $module->name) ? 'checked' : '' }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom_check">
                                                    <input type="checkbox" onclick="toggleAllPermissions('{{ $module->name }}')">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Table -->

        <div class="btn-center my-4">
            <button type="button" class="btn btn-primary cancel me-2">Back</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </div>
</div>

<script>
    function toggleAllPermissions(module) {
        document.querySelectorAll(`input[name="permissions[]"][value^="${module}"]`).forEach(checkbox => {
            checkbox.checked = !checkbox.checked;
        });
    }

    function toggleAllModules() {
        document.querySelectorAll('input[name="permissions[]"]').forEach(checkbox => {
            checkbox.checked = true;
        });
    }
</script>
@endsection
