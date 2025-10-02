@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row mb-3">
        <div class="col-md-6 text-start">
            <h5 class="py-2 mb-2">
                <span class="text-primary fw-light">Gold Loans</span>
            </h5>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Add Gold Loan
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="goldLoanTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Bank/Branch</th>
                                    <th>Gold Net Weight</th>
                                    <th>Mobile No</th>
                                    <th>Loan Amount</th>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Gold Loan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bank/Branch</label>
                            <input type="text" name="bank_branch" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Customer Name</label>
                            <input type="text" name="name" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gold Net Weight</label>
                            <input type="number" step="0.01" name="gold_net_weight" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mobile No</label>
                            <input type="text" name="mobile_no" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Family Mobile No</label>
                            <input type="text" name="family_mobile_no" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gold Loan Amount</label>
                            <input type="number" step="0.01" name="gold_loan_amount" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Aadhar Card</label>
                            <input type="file" name="aadhar_card" class="form-control" accept=".jpg,.jpeg,.png,.pdf" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">PAN Card</label>
                            <input type="file" name="pan_card" class="form-control" accept=".jpg,.jpeg,.png,.pdf" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gold Loan Slip</label>
                            <input type="file" name="gold_loan_slip" class="form-control" accept=".jpg,.jpeg,.png,.pdf" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Branch</label>
                            <select name="branch" id="branch" class="form-select">
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Branch User</label>
                            <select name="branch_user" id="branch_user" class="form-select">
                                <option value="">Select Branch User</option>
                            </select>
                            <small class="error-text text-danger"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="AddGoldLoan">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Gold Loan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="goldLoanId" name="id">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" id="edit_date" name="date" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bank/Branch</label>
                            <input type="text" id="edit_bank_branch" name="bank_branch" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Customer Name</label>
                            <input type="text" id="edit_name" name="name" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gold Net Weight</label>
                            <input type="number" step="0.01" id="edit_gold_net_weight" name="gold_net_weight" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mobile No</label>
                            <input type="text" id="edit_mobile_no" name="mobile_no" class="form-control" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Family Mobile No</label>
                            <input type="text" id="edit_family_mobile_no" name="family_mobile_no" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Address</label>
                            <input type="text" id="edit_address" name="address" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">City</label>
                            <input type="text" id="edit_city" name="city" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Aadhar Card</label>
                            <input type="file" id="edit_aadhar_card" name="aadhar_card" class="form-control" accept=".jpg,.jpeg,.png,.pdf" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">PAN Card</label>
                            <input type="file" id="edit_pan_card" name="pan_card" class="form-control" accept=".jpg,.jpeg,.png,.pdf" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gold Loan Slip</label>
                            <input type="file" id="edit_gold_loan_slip" name="gold_loan_slip" class="form-control" accept=".jpg,.jpeg,.png,.pdf" />
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gold Loan Slip</label>
                            <input type="text" id="edit_gold_loan_slip" name="gold_loan_slip" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Branch</label>
                            <select id="edit_branch" name="branch" class="form-select">
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            <small class="error-text text-danger"></small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Branch User</label>
                            <select id="edit_branch_user" name="branch_user" class="form-select">
                                <option value="">Select Branch User</option>
                            </select>
                            <small class="error-text text-danger"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="EditGoldLoan">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function(){

    // Load branch users dynamically on change (Add Form)
    $('#branch').change(function(){
        let branchId = $(this).val();
        if(branchId){
            $.get(`/admin/branch-users/${branchId}`, function(users){
                $('#branch_user').empty().append('<option value="">Select Branch User</option>');
                users.forEach(user=>{
                    $('#branch_user').append(`<option value="${user.id}">${user.username}</option>`);
                });
            });
        } else {
            $('#branch_user').empty().append('<option value="">Select Branch User</option>');
        }
    });

    // Load branch users dynamically on change (Edit Form)
    $('#edit_branch').change(function(){
        let branchId = $(this).val();
        if(branchId){
            $.get(`/admin/branch-users/${branchId}`, function(users){
                $('#edit_branch_user').empty().append('<option value="">Select Branch User</option>');
                users.forEach(user=>{
                    $('#edit_branch_user').append(`<option value="${user.id}">${user.username}</option>`);
                });
            });
        } else {
            $('#edit_branch_user').empty().append('<option value="">Select Branch User</option>');
        }
    });

    const table = $('#goldLoanTable').DataTable({
        processing:true,
        ajax:{
            url:"{{ route('admin.goldLoan.getall') }}",
            type:"GET"
        },
        columns:[
            {
                data: "date",
                render: (data) => {
                    if (!data) return "";
                    let dateObj = new Date(data);
                    let day   = String(dateObj.getDate()).padStart(2, '0');
                    let month = String(dateObj.getMonth() + 1).padStart(2, '0');
                    let year  = dateObj.getFullYear();
                    return `${day}-${month}-${year}`;
                }
            },
            { data:"name" },
            { data:"bank_branch" },
            { data:"gold_net_weight" },
            { data:"mobile_no" },
            { data:"gold_loan_amount" },
            {
                data:"status",
                render:(data,type,row)=>{
                    let color = row.status==="pending"?"warning":row.status==="approved"?"success":"danger";
                    return `<span class="badge bg-label-${color}">${row.status}</span>`;
                }
            },
            {
                data:"action",
                render:(data,type,row)=>{
                    const statusSelect = `<select onchange="updateGoldLoanStatus(${row.id}, this.value)" class="form-select form-select-sm mb-2">
                        <option value="pending" ${row.status==='pending'?'selected':''}>Pending</option>
                        <option value="approved" ${row.status==='approved'?'selected':''}>Approved</option>
                        <option value="rejected" ${row.status==='rejected'?'selected':''}>Rejected</option>
                    </select>`;
                    const editBtn = `<button class="btn btn-sm btn-warning" onclick="editGoldLoan(${row.id})">Edit</button>`;
                    const delBtn = `<button class="btn btn-sm btn-danger" onclick="deleteGoldLoan(${row.id})">Delete</button>`;
                    return `${statusSelect} ${editBtn} ${delBtn}`;
                }
            }
        ]
    });

    // Add Gold Loan
    $('#AddGoldLoan').click(function(){
        let data = $('#addForm').serialize();
        $('.error-text').text('');
        $.post('{{ route("admin.goldLoan.store") }}', data, function(res){
            if(res.success){
                Toast.fire({icon:'success', title:res.message});
                $('#addModal').modal('hide');
                $('#addForm')[0].reset();
                table.ajax.reload();
            }
        }).fail(function(xhr){
            if(xhr.status===422){
                let errors = xhr.responseJSON.errors;
                for(let field in errors){
                    $(`[name=${field}]`).siblings('.error-text').text(errors[field][0]);
                }
            } else Toast.fire({icon:'error', title:'Unexpected error occurred.'});
        });
    });

    // Edit Gold Loan
    window.editGoldLoan = function(id){
        const url = '{{ route("admin.goldLoan.get", ":id") }}'.replace(':id', id);
        $.get(url, function(data){
            $('#goldLoanId').val(data.id);
            $('#edit_date').val(data.date);
            $('#edit_bank_branch').val(data.bank_branch);
            $('#edit_name').val(data.name);
            $('#edit_gold_net_weight').val(data.gold_net_weight);
            $('#edit_mobile_no').val(data.mobile_no);
            $('#edit_family_mobile_no').val(data.family_mobile_no);
            $('#edit_address').val(data.address);
            $('#edit_city').val(data.city);
            $('#edit_gold_loan_amount').val(data.gold_loan_amount);
            $('#edit_aadhar_card').val(data.aadhar_card);
            $('#edit_pan_card').val(data.pan_card);
            $('#edit_gold_loan_slip').val(data.gold_loan_slip);
            $('#edit_branch').val(data.branch);
            $('#edit_branch_user').val(data.branch_user);
            $('#edit_status').val(data.status);
            $('#editModal').modal('show');
        });
    };

    // Save Edit
    $('#EditGoldLoan').click(function(){
        let data = $('#editForm').serialize();
        $.post('{{ route("admin.goldLoan.update") }}', data, function(res){
            if(res.success){
                Toast.fire({icon:'success', title:res.message});
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        }).fail(function(xhr){
            if(xhr.status===422){
                let errors = xhr.responseJSON.errors;
                $('#editForm').find('.error-text').text('');
                for(let field in errors){
                    $(`#editForm [name=${field}]`).siblings('.error-text').text(errors[field][0]);
                }
            } else Toast.fire({icon:'error', title:'Unexpected error occurred.'});
        });
    });

    // Update status
    window.updateGoldLoanStatus = function(id,status){
        $.post('{{ route("admin.goldLoan.status") }}', {id,status,_token:$('meta[name="csrf-token"]').attr('content')}, function(res){
            if(res.success){
                Toast.fire({icon:'success', title:res.message});
                table.ajax.reload();
            }
        });
    };

    // Delete Gold Loan
    window.deleteGoldLoan = function(id){
        Swal.fire({
            title:"Are you sure?",
            text:"Do you want to delete this gold loan?",
            icon:"warning",
            showCancelButton:true,
            confirmButtonText:"Yes"
        }).then((result)=>{
            if(result.isConfirmed){
                const url = '{{ route("admin.goldLoan.destroy", ":id") }}'.replace(':id', id);
                $.ajax({
                    url:url,
                    type:'DELETE',
                    data:{_token:$('meta[name="csrf-token"]').attr('content')},
                    success:function(res){
                        if(res.success) Toast.fire({icon:'success', title:res.message});
                        table.ajax.reload();
                    }
                });
            }
        });
    };

});
</script>
@endsection
