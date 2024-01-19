@extends('layouts.app')
@section('title', 'Employees')
@push('head')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
@endpush
@section('content')
	<div class="container">
		@include('messages')
		<h1>EMPLOYEES LIST</h1>
		<div class="mb-3">
	        <a href="{{ route('employees.create') }}" class="btn btn-success">Create Company</a>
	    </div>
		<table class="table table-bordered data-table">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Company Name</th>
	                <th>First Name</th>
	                <th>Last Name</th>
	                <th>Email</th>
	                <th>Phone</th>
	                <th width="105px">Action</th>
	            </tr>
	        </thead>
	        <tbody>
	        </tbody>
	    </table>
	</div>
	<script type="text/javascript">
        $(document).ready(function() {
            let $dtable = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('employees.index') }}',
                "columnDefs": [
		            {
		                "targets": 0,
		                "data": null,
		                "render": function (data, type, row, meta) {
		                    return meta.row + 1;
		                }
		            }
		        ],
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'companyname', name: 'companyname'},
                    {data: 'firstname', name: 'firstname'},
                    {data: 'lastname', name: 'lastname'},
		            {data: 'email', name: 'email'},
		            {data: 'phone', name: 'phone'},
		            {data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
            $('.data-table').on('click', '.delete-btn', function() {
                var employeeId = $(this).data('id');
                if (confirm('Are you sure you want to delete this employee?')) {
                    $.ajax({
                        url: '/laravelcrud/public/employees/' + employeeId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            // Refresh the DataTable after successful deletion
                            $dtable.ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
	</script>
@endsection