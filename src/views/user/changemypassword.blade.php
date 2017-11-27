@extends('vendor.adminlte.layout')

@section('heading')
User
@endsection

@section('createButton')
<a href="{{ route('user.index') }}" class="btn btn-success">back</a>
@endsection

@section('content')

<div class="box box-default">
	<div class="box-header with-border">
		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('changemypassword') }}">

				{{ csrf_field() }}

				<!-- Email Form Input -->
				<div class="row">
					<div class="col-md-1"><span>Name :</span></div>
					<div class="col-md-10"><strong>{{Auth::user()->name}}</strong></div>
				</div>

				<div class="row">
					<div class="col-md-1"><span>Email :</span></div>
					<div class="col-md-10"><strong>{{Auth::user()->email}}</strong></div>
				</div>
				
			</br>

			<!-- Password Form Input -->
			<div class="well">

				<h4>Change Password</h4>

			</br>

			<div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">

				<label class="control-label">Old Password</label>

				<input type="password" class="form-control" name="old_password">

				@if ($errors->has('old_password'))

				<span class="help-block">
					<strong>{{ $errors->first('old_password') }}</strong>
				</span>

				@endif

			</div>

			<!-- Password Form Input -->

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

				<label class="control-label">New Password</label>

				<input type="password" class="form-control" name="password">

				@if ($errors->has('password'))

				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>

				@endif

			</div>

			<!-- Confirm Form Input -->

			<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

				<label class="control-label">Confirm Password</label>

				<input type="password" class="form-control" name="password_confirmation">

				@if ($errors->has('password_confirmation'))

				<span class="help-block">
					<strong>{{ $errors->first('password_confirmation') }}</strong>
				</span>

				@endif

			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-lg">
					Change
				</button>
			</div>
		</div>
	</form>
</div>
</div>
</div>



@endsection

@section('footer_js')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
	$('select').select2();
</script>
@endsection