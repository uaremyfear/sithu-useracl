@extends('vendor.adminlte.layout')

@section('heading')
Role
@endsection

@section('content')

<div class="box box-default">
	<div class="box-header with-border">
	<form class="form" role="form" method="POST" action="{{ route('role.update',$role->id) }}">
			<input type="hidden" name="_method" value="patch">
			{{ csrf_field() }}

			<div class="box-body">
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label class="control-label">Role</label>
					<input type="text" class="form-control" name="name" value="{{ $role->name }}">
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<label class="control-label" style="margin-top:10px;">Permission</label><br>
					<div class="row" style="margin-top:10px;">
						@foreach ($permissions as $permission)
						<div class="col-md-3">							
							<label class="form-group" for="vehicle" style="text-transform: capitalize;">{{$permission->name}}</label>
							@if($role->hasPermissionTo($permission->name))
							<input class="form-group" type="checkbox" name="permissions[]" value="{{$permission->name}}" checked>
							@else
							<input class="form-group" type="checkbox" name="permissions[]" value="{{$permission->name}}" >
							@endif
						</div>
						@endforeach						
					</div>
				</div>

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>			
		</form>		
	</div>
</div>

@endsection