@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6 text-start">
            <h5 class="py-2 mb-2">
                <span class="text-primary fw-light">Branch</span>
            </h5>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Add Branch
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="branchTable">
                            <thead>
                                <tr>
                                    <th>Branch ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="branchId" class="form-label">Branch ID</label>
                    <input type="text" id="branchId" class="form-control" placeholder="Enter Branch ID" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Branch Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Enter Branch Name" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Branch Address</label>
                    <input type="text" id="location" class="form-control" placeholder="Enter Branch Address" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="location_url" class="form-label">Branch Location</label>
                    <input type="text" id="location_url" class="form-control" placeholder="Enter Branch Location" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Branch Phone</label>
                    <input type="text" id="phone" class="form-control" placeholder="Enter Branch Phone" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Branch Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter Branch Email" />
                    <small class="error-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="AddBranch">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <div class="mb-3">
                    <label for="editbranchId" class="form-label">Branch ID</label>
                    <input type="text" id="editbranchId" class="form-control" placeholder="Enter Branch ID" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editname" class="form-label">Branch Name</label>
                    <input type="text" id="editname" class="form-control" placeholder="Enter Branch Name" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editlocation" class="form-label">Branch Address</label>
                    <input type="text" id="editlocation" class="form-control" placeholder="Enter Branch Address" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editlocationurl" class="form-label">Branch Location</label>
                    <input type="text" id="editlocationurl" class="form-control" placeholder="Enter Branch Location" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editphone" class="form-label">Branch Phone</label>
                    <input type="text" id="editphone" class="form-control" placeholder="Enter Branch Phone" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editemail" class="form-label">Branch Email</label>
                    <input type="email" id="editemail" class="form-control" placeholder="Enter Branch Email" />
                    <small class="error-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="EditBranch">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    const table = $('#branchTable').DataTable({
        processing: true,
        ajax: {
            url: "{{ route('admin.branch.getall') }}",
            type: 'GET',
        },
        columns: [
            { data: "branchId" },
            { data: "name" },
            { data: "location" },
            {
                data: "location_url",
                render: function(data, type, row) {
                    if (data) {
                        return `
                            <iframe 
                                src="${data}" 
                                width="300" 
                                height="200" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>`;
                    } else {
                        return '<span class="text-muted">No Map Available</span>';
                    }
                }
            },
            { data: "phone" },
            { data: "email" },
            {
                data: "status",
                render: (data, type, row) => {
                    return row.status == "active"
                        ? '<span class="badge bg-label-success me-1">Active</span>'
                        : '<span class="badge bg-label-danger me-1">Inactive</span>';
                }
            },
            {
                data: "action",
                render: (data, type, row) => {
                    const statusBtn = row.status == 'inactive'
                        ? `<button type="button" class="btn btn-sm btn-success" onclick="updateBranchStatus(${row.id}, 'active')">Activate</button>`
                        : `<button type="button" class="btn btn-sm btn-danger" onclick="updateBranchStatus(${row.id}, 'inactive')">Deactivate</button>`;
                    const editBtn = `<button class="btn btn-sm btn-warning" onclick="editBranch(${row.id})">Edit</button>`;
                    const deleteBtn = `<button class="btn btn-sm btn-danger" onclick="deleteBranch(${row.id})">Delete</button>`;
                    return `${statusBtn} ${editBtn} ${deleteBtn}`;
                }
            }
        ],
    });

    // Add Branch
    $('#AddBranch').click(function() {
        const data = {
            name: $('#name').val(),
            location: $('#location').val(),
            location_url: $('#location_url').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
            branchId: $('#branchId').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $('.error-text').text('');
        $.post('{{ route("admin.branch.store") }}', data, function(response) {
            if (response.success) {
                setFlash("success", response.message);
                $('#addModal').modal('hide');
                $('#addModal').find('input').val('');
                table.ajax.reload();
            }
        }).fail(function(xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                for (let field in errors) {
                    $(`#${field}`).siblings('.error-text').text(errors[field][0]);
                }
            } else setFlash("error", "An unexpected error occurred.");
        });
    });

    // Edit Branch (load data)
    window.editBranch = function(id) {
        const url = '{{ route("admin.branch.get", ":id") }}'.replace(':id', id);
        $.get(url, function(data) {
            $('#id').val(data.id);
            $('#editbranchId').val(data.branchId);
            $('#editname').val(data.name);
            $('#editlocation').val(data.location);
            $('#editlocationurl').val(data.location_url);
            $('#editphone').val(data.phone);
            $('#editemail').val(data.email);
            $('#editModal').modal('show');
        }).fail(function() { setFlash("error","Branch not found."); });
    };

    // Save Edit
    $('#EditBranch').click(function() {
        const data = {
            id: $('#id').val(),
            branchId: $('#editbranchId').val(),
            name: $('#editname').val(),
            location: $('#editlocation').val(),
            location_url: $('#editlocationurl').val(),
            phone: $('#editphone').val(),
            email: $('#editemail').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $.post('{{ route("admin.branch.update") }}', data, function(response) {
            if (response.success) {
                setFlash("success", response.message);
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        }).fail(function(xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $('#editModal').find('.error-text').text('');
                for (let field in errors) {
                    $(`#edit${field}`).siblings('.error-text').text(errors[field][0]);
                }
            } else setFlash("error","An unexpected error occurred.");
        });
    });

    // Update Status
    window.updateBranchStatus = function(id,status) {
        const message = status == 'active' ? "Branch will be active." : "Branch will be inactive.";
        Swal.fire({
            title: "Are you sure?",
            text: message,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('{{ route("admin.branch.status") }}', { id, status, _token: $('meta[name="csrf-token"]').attr('content') }, function(response) {
                    if(response.success) setFlash("success", response.message);
                    table.ajax.reload();
                });
            }
        });
    };

    // Delete Branch
    window.deleteBranch = function(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to delete this branch?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
        }).then((result) => {
            if(result.isConfirmed){
                const url = '{{ route("admin.branch.destroy", ":id") }}'.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: function(response){
                        if(response.success) setFlash("success", response.message);
                        table.ajax.reload();
                    }
                });
            }
        });
    };

    function setFlash(type,message){
        Toast.fire({ icon:type, title:message });
    }
});
</script>
@endsection
