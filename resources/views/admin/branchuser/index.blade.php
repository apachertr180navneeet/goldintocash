@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6 text-start">
            <h5 class="py-2 mb-2">
                <span class="text-primary fw-light">Branch Users</span>
            </h5>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Add Branch User
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="branchUserTable">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Mobile</th>
                                    <th>Branch</th>
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
                <h5 class="modal-title">Add Branch User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Enter Username" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" id="mobile" class="form-control" placeholder="Enter Mobile" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="branch_id" class="form-label">Branch</label>
                    <select id="branch_id" class="form-control">
                        <option value="">Select Branch</option>
                        @foreach(\App\Models\Branch::where('status', 'active')->get() as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                    <small class="error-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="AddBranchUser">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Branch User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="userId">
                <div class="mb-3">
                    <label for="editusername" class="form-label">Username</label>
                    <input type="text" id="editusername" class="form-control" placeholder="Enter Username" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editmobile" class="form-label">Mobile</label>
                    <input type="text" id="editmobile" class="form-control" placeholder="Enter Mobile" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editbranch_id" class="form-label">Branch</label>
                    <select id="editbranch_id" class="form-control">
                        <option value="">Select Branch</option>
                        @foreach(\App\Models\Branch::where('status', 'active')->get() as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                    <small class="error-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="EditBranchUser">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    const table = $('#branchUserTable').DataTable({
        processing: true,
        ajax: {
            url: "{{ route('admin.branchUser.getall') }}",
            type: 'GET',
        },
        columns: [
            { data: "username" },
            { data: "mobile" },
            { data: "branch.name", defaultContent: "" },
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
                        ? `<button type="button" class="btn btn-sm btn-success" onclick="updateUserStatus(${row.id}, 'active')">Activate</button>`
                        : `<button type="button" class="btn btn-sm btn-danger" onclick="updateUserStatus(${row.id}, 'inactive')">Deactivate</button>`;
                    const editBtn = `<button class="btn btn-sm btn-warning" onclick="editUser(${row.id})">Edit</button>`;
                    const deleteBtn = `<button class="btn btn-sm btn-danger" onclick="deleteUser(${row.id})">Delete</button>`;
                    return `${statusBtn} ${editBtn} ${deleteBtn}`;
                }
            }
        ],
    });

    // Add Branch User
    $('#AddBranchUser').click(function() {
        const data = {
            username: $('#username').val(),
            mobile: $('#mobile').val(),
            branch_id: $('#branch_id').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $('.error-text').text('');
        $.post('{{ route("admin.branchUser.store") }}', data, function(response) {
            if(response.success){
                setFlash("success", response.message);
                $('#addModal').modal('hide');
                $('#addModal').find('input,select').val('');
                table.ajax.reload();
            }
        }).fail(function(xhr){
            if(xhr.status === 422){
                let errors = xhr.responseJSON.errors;
                for(let field in errors){
                    $(`#${field}`).siblings('.error-text').text(errors[field][0]);
                }
            } else setFlash("error","An unexpected error occurred.");
        });
    });

    // Edit Branch User (load data)
    window.editUser = function(id){
        const url = '{{ route("admin.branchUser.get", ":id") }}'.replace(':id', id);
        $.get(url, function(data){
            $('#userId').val(data.id);
            $('#editusername').val(data.username);
            $('#editmobile').val(data.mobile);
            $('#editbranch_id').val(data.branch_id);
            $('#editModal').modal('show');
        }).fail(function(){ setFlash("error","Branch user not found."); });
    };

    // Save Edit
    $('#EditBranchUser').click(function(){
        const data = {
            id: $('#userId').val(),
            username: $('#editusername').val(),
            mobile: $('#editmobile').val(),
            branch_id: $('#editbranch_id').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $.post('{{ route("admin.branchUser.update") }}', data, function(response){
            if(response.success){
                setFlash("success", response.message);
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        }).fail(function(xhr){
            if(xhr.status === 422){
                let errors = xhr.responseJSON.errors;
                $('#editModal').find('.error-text').text('');
                for(let field in errors){
                    $(`#edit${field}`).siblings('.error-text').text(errors[field][0]);
                }
            } else setFlash("error","An unexpected error occurred.");
        });
    });

    // Update Status
    window.updateUserStatus = function(id,status){
        const message = status == 'active' ? "User will be active." : "User will be inactive.";
        Swal.fire({
            title: "Are you sure?",
            text: message,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
        }).then((result)=>{
            if(result.isConfirmed){
                $.post('{{ route("admin.branchUser.status") }}', {id,status,_token:$('meta[name="csrf-token"]').attr('content')}, function(response){
                    if(response.success) setFlash("success", response.message);
                    table.ajax.reload();
                });
            }
        });
    };

    // Delete User
    window.deleteUser = function(id){
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to delete this user?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
        }).then((result)=>{
            if(result.isConfirmed){
                const url = '{{ route("admin.branchUser.destroy", ":id") }}'.replace(':id', id);
                $.ajax({
                    url:url,
                    type:'DELETE',
                    data:{_token:$('meta[name="csrf-token"]').attr('content')},
                    success:function(response){
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
