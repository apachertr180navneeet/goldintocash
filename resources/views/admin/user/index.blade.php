@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6 text-start">
            <h5 class="py-2 mb-2">
                <span class="text-primary fw-light">Users</span>
            </h5>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Add User
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="userTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" class="form-control" placeholder="Enter First Name" />
                        <small class="error-text text-danger"></small>
                    </div>
                    <div class="col-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" class="form-control" placeholder="Enter Last Name" />
                        <small class="error-text text-danger"></small>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter Email" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" class="form-control" placeholder="Enter Phone" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter Password" />
                    <small class="error-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="AddUser">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="userId">
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="editfirst_name" class="form-label">First Name</label>
                        <input type="text" id="editfirst_name" class="form-control" placeholder="Enter First Name" />
                        <small class="error-text text-danger"></small>
                    </div>
                    <div class="col-6">
                        <label for="editlast_name" class="form-label">Last Name</label>
                        <input type="text" id="editlast_name" class="form-control" placeholder="Enter Last Name" />
                        <small class="error-text text-danger"></small>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="editemail" class="form-label">Email</label>
                    <input type="email" id="editemail" class="form-control" placeholder="Enter Email" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editphone" class="form-label">Phone</label>
                    <input type="text" id="editphone" class="form-control" placeholder="Enter Phone" />
                    <small class="error-text text-danger"></small>
                </div>
                <div class="mb-3">
                    <label for="editpassword" class="form-label">Password (leave blank to keep current)</label>
                    <input type="password" id="editpassword" class="form-control" placeholder="Enter Password" />
                    <small class="error-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="EditUser">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    const table = $('#userTable').DataTable({
        processing: true,
        ajax: {
            url: "{{ route('admin.user.getall') }}",
            type: 'GET',
        },
        columns: [
            { data: "full_name" },
            { data: "email" },
            { data: "phone" },
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

    // Add User
    $('#AddUser').click(function() {
        const data = {
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            password: $('#password').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $('.error-text').text('');
        $.post('{{ route("admin.user.store") }}', data, function(response) {
            if(response.success){
                setFlash("success", response.message);
                $('#addModal').modal('hide');
                $('#addModal').find('input').val('');
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

    // Edit User (load data)
    window.editUser = function(id){
        const url = '{{ route("admin.user.get", ":id") }}'.replace(':id', id);
        $.get(url, function(data){
            $('#userId').val(data.id);
            $('#editfirst_name').val(data.first_name);
            $('#editlast_name').val(data.last_name);
            $('#editemail').val(data.email);
            $('#editphone').val(data.phone);
            $('#editpassword').val('');
            $('#editModal').modal('show');
        }).fail(function(){ setFlash("error","User not found."); });
    };

    // Save Edit
    $('#EditUser').click(function(){
        const data = {
            id: $('#userId').val(),
            first_name: $('#editfirst_name').val(),
            last_name: $('#editlast_name').val(),
            email: $('#editemail').val(),
            phone: $('#editphone').val(),
            password: $('#editpassword').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $.post('{{ route("admin.user.update") }}', data, function(response){
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
                $.post('{{ route("admin.user.status") }}', {id,status,_token:$('meta[name="csrf-token"]').attr('content')}, function(response){
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
                const url = '{{ route("admin.user.destroy", ":id") }}'.replace(':id', id);
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
