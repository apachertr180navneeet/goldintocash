@extends('admin.layouts.app')

@section('style')@endsection

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row mb-3">
        <div class="col-md-6"><h5>Reports</h5></div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Report</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="reportTable">
                    <thead>
                        <tr>
                            <th>Application No</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Total Loan</th>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addReportForm" enctype="multipart/form-data">@csrf
                    @foreach(['date','application_no','name','address','phone','city','gold_net_weight','gold_loan_amount','silver_net_weight','silver_loan_amount','total_loan_amount','settelment_amount','cash_payment','online_payment'] as $field)
                    <div class="mb-3">
                        <label for="{{ $field }}">{{ ucwords(str_replace('_',' ',$field)) }}</label>
                        <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" />
                        <small class="error-text text-danger"></small>
                    </div>
                    @endforeach
                    <div class="mb-3">
                        <label for="gold_image">Gold Image</label>
                        <input type="file" name="gold_image" id="gold_image" class="form-control" />
                        <small class="error-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="silver_image">Silver Image</label>
                        <input type="file" name="silver_image" id="silver_image" class="form-control" />
                        <small class="error-text text-danger"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="AddReport">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Edit Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editReportForm" enctype="multipart/form-data">@csrf
                    <input type="hidden" id="id">
                    @foreach(['date','application_no','name','address','phone','city','gold_net_weight','gold_loan_amount','silver_net_weight','silver_loan_amount','total_loan_amount','settelment_amount','cash_payment','online_payment'] as $field)
                    <div class="mb-3">
                        <label for="edit{{ $field }}">{{ ucwords(str_replace('_',' ',$field)) }}</label>
                        <input type="text" id="edit{{ $field }}" name="{{ $field }}" class="form-control" />
                        <small class="error-text text-danger"></small>
                    </div>
                    @endforeach
                    <div class="mb-3">
                        <label for="editgold_image">Gold Image</label>
                        <input type="file" id="editgold_image" name="gold_image" class="form-control" />
                        <div id="goldImagePreview" class="mt-2"></div>
                        <small class="error-text text-danger"></small>
                    </div>

                    <div class="mb-3">
                        <label for="editsilver_image">Silver Image</label>
                        <input type="file" id="editsilver_image" name="silver_image" class="form-control" />
                        <div id="silverImagePreview" class="mt-2"></div>
                        <small class="error-text text-danger"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="EditReport">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function(){

    // 1️⃣ CSRF token setup
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // 2️⃣ Initialize DataTable
    const table = $('#reportTable').DataTable({
        ajax: "{{ route('admin.report.getall') }}",
        columns: [
            { data: 'application_no' },
            { data: 'name' },
            { data: 'city' },
            { data: 'phone' },
            { data: 'total_loan_amount' },
            { 
                data: 'status',
                render: function(data){
                    const status = (data || '').toLowerCase().trim();
                    if(status === 'pending') return '<span class="badge bg-warning">Pending</span>';
                    else if(status === 'completed') return '<span class="badge bg-success">Completed</span>';
                    else return '<span class="badge bg-secondary">Unknown</span>';
                }
            },
            { 
                data: null,
                orderable: false,
                searchable: false,
                render: function(data){
                    const status = (data.status || '').toLowerCase().trim();
                    let statusBtn = '';
                    if(status === 'pending'){
                        statusBtn = `<button class="btn btn-sm btn-success" onclick="updateReportStatus(${data.id}, 'completed')">Mark Completed</button>`;
                    } else if(status === 'completed'){
                        statusBtn = `<button class="btn btn-sm btn-warning" onclick="updateReportStatus(${data.id}, 'pending')">Mark Pending</button>`;
                    }
                    return `${statusBtn} 
                            <button class="btn btn-sm btn-warning" onclick="editReport(${data.id})">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteReport(${data.id})">Delete</button>`;
                }
            }
        ]
    });

    // 3️⃣ Add Report
    $('#AddReport').click(function(){
        $('.error-text').text('');
        var formData = new FormData($('#addReportForm')[0]);
        $.ajax({
            url: "{{ route('admin.report.store') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
                $('#addModal').modal('hide');
                $('#addReportForm')[0].reset();
                table.ajax.reload();
            },
            error: function(xhr){
                if(xhr.status === 422){
                    const errors = xhr.responseJSON.errors;
                    for(let f in errors){
                        $(`#${f}`).siblings('.error-text').text(errors[f][0]);
                    }
                }
            }
        });
    });

    // 4️⃣ Edit Report - populate modal
    window.editReport = function(id){
        $.get("{{ url('admin/report/get') }}/" + id, function(res){
            $('#id').val(res.id);

            @foreach(['date','application_no','name','address','phone','city','gold_net_weight','gold_loan_amount','silver_net_weight','silver_loan_amount','total_loan_amount','settelment_amount','cash_payment','online_payment','status'] as $field)
            $('#edit{{ $field }}').val(res.{{ $field }});
            @endforeach

            // ✅ Gold image preview
            if(res.gold_image_url){
                $('#goldImagePreview').html(`<a href="${res.gold_image_url}" target="_blank">View Gold Image</a>`);
            } else {
                $('#goldImagePreview').html('');
            }

            // ✅ Silver image preview
            if(res.silver_image_url){
                $('#silverImagePreview').html(`<a href="${res.silver_image_url}" target="_blank">View Silver Image</a>`);
            } else {
                $('#silverImagePreview').html('');
            }

            $('#editModal').modal('show');
        });
    }

    // 5️⃣ Update Report
    $('#EditReport').click(function(){
        $('.error-text').text('');
        var formData = new FormData($('#editReportForm')[0]);
        formData.append('id', $('#id').val());
        $.ajax({
            url: "{{ route('admin.report.update') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
                $('#editModal').modal('hide');
                table.ajax.reload();
            },
            error: function(xhr){
                if(xhr.status === 422){
                    const errors = xhr.responseJSON.errors;
                    for(let f in errors){
                        $(`#edit${f}`).siblings('.error-text').text(errors[f][0]);
                    }
                }
            }
        });
    });

    // 6️⃣ Delete Report
    window.deleteReport = function(id){
        if(confirm('Are you sure?')){
            $.ajax({
                url: "{{ url('admin/report/destroy') }}/" + id,
                type: 'DELETE',
                data: {_token: "{{ csrf_token() }}"},
                success: function(){ table.ajax.reload(); }
            });
        }
    }

    // 7️⃣ Status Change
    window.updateReportStatus = function(id, status){
        $.post("{{ route('admin.report.status') }}", {id, status}, function(res){
            if(res.success){
                Toast.fire({icon: 'success', title: res.message});
                table.ajax.reload();
            } else {
                Toast.fire({icon: 'error', title: res.message});
            }
        });
    }

});
</script>
@endsection
