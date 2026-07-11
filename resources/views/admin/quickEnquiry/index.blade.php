@extends('admin.layouts.app')
@section('style')
    <style>
        
    </style>
@endsection  
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h5 class="py-2 mb-2">
        <span class="text-primary fw-light">Quick Enquiries</span>
    </h5>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="quickEnquiriesTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Gold Weight</th>
                                <th>Loan Amount</th>
                                <th>Submit Date</th>
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




@endsection
@section('script')
<script>
$('#quickEnquiriesTable').DataTable({
    processing: true,
    ajax: {
      url: "{{route('admin.quickEnquiry.getall')}}",
    },
    order: [],
    columns: [

        {
            data: "name",
            render: (data,type,row) => {
                return row.name || '';
            }
        },
        {
            data: "phone",
            render: (data,type,row) => {
                return row.phone || '';
            }
        },
        {
            data: "city",
            render: (data,type,row) => {
                return row.city || '';
            }
        },
        {
            data: "gold_net_weight",
            render: (data,type,row) => {
                return row.gold_net_weight ? row.gold_net_weight + 'g' : '';
            }
        },
        {
            data: "gold_loan_amount",
            render: (data,type,row) => {
                return row.gold_loan_amount ? '₹' + row.gold_loan_amount : '';
            }
        },
        {
            data: "submit_date",
            render: (data,type,row) => {
                let submit_date = moment(row.created_at, "YYYY-MM-DD HH:mm:ss").format('DD/MM/YYYY');
                return '<span>'+submit_date+'</span>';
            }
        },
        {
            data: "action",
            render: (data,type,row) => {
                    return '<button type="button" class="btn btn-sm btn-danger" onclick="deleteEnquiry('+row.id+')">Delete</button>';
            }
        }
        
    ],
});



function deleteEnquiry(userid){
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this enquiry!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if(result.isConfirmed == true) {
            var url = '{{ route("admin.quickEnquiry.destroy", ":userid") }}';
            url = url.replace(':userid', userid);
            $.ajax({
                type: "DELETE",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'_token': "{{ csrf_token() }}"},
                success: function(response) {
                    if(response.success){
                        setFlesh('success','Enquiry Deleted Successfully');
                        $('#quickEnquiriesTable').DataTable().ajax.reload();
                    }else{
                        setFlesh('error','There is some problem deleting this enquiry. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    setFlesh('error', 'Error: ' + error);
                }
            });
        }
    })
}






</script>
@endsection
