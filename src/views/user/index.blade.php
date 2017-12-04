@extends('vendor.adminlte.layout')

@section('heading')
User
@endsection

@section('createButton')
<a href="{{ route('user.create') }}" class="btn btn-success">Create</a>
@endsection

@section('content')

<div class="box">
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Role</th>								
					<th>Action</th>								
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
						@foreach ($user->roles()->get() as $role)
						{{$role->name}} ,
						@endforeach
					</td>
					<td><a href="{{ route('user.edit',$user->id) }}">Edit</a>  &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="changepassword/user/{{ $user->id }}">Change Password</a></td>
					</tr> 
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Action</th>		
					</tr>
				</tfoot>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

	@endsection

	@section('footer_js')

	<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	</script>

	@endsection