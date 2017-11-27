@extends('vendor.adminlte.layout')

@section('heading')
Permission
@endsection

@section('content')

<div class="box box-default">
	<div class="box-header with-border">

		<form class="form" role="form" method="POST" action="{{ route('permission.store') }}">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label class="control-label">Permission</label>
					<input type="text" class="form-control" name="name" value="{{ old('name') }}">
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>			
		</form>		
	</div>
</div>

<div class="box">
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="col-md-9">Name</th>
					<th class="col-md-3"></th>					
				</tr>
			</thead>
			<tbody>
				@foreach ($permissions as $permission)
				<tr>
					<td>{{$permission->name}}</td>	
					<td>
						<div class="row">
							<div class="col-md-4">
								<a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
							</div>
							<div class="col-md-8">
								<form action="{{ route('permission.destroy', $permission->id) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button class="btn btn-danger">Delete</button>
								</form>
							</div>
						</div>
					</td>				
				</tr>
				@endforeach                
			</tbody>
			<tfoot>
				<tr>
					<th>Name</th>					
				</tr>
			</tfoot>
		</table>
	</div>
</div>
		
@endsection