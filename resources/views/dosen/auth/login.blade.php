@extends('dosen.auth.partials/_main')

@section('title', 'Login for Dosen')

@section('form')
<form 
	action="{{ route('dosen.login') }}" 
	method="post">
	{{ csrf_field() }}
    <input type="text" class="form-field form-text-center" name="nip" placeholder="NIP" value="{{ old('nip') }}">
    <input type="password" class="form-field form-text-center" name="password" placeholder="Password">
    <button type="submit" class="form-button form-button-primary">Login</button>
</form>

@endsection

@section('errors')

@if(count($errors) > 0)

<div class="row">
	<div class="col-md-8 col-md-offset-1 error-container">
		<h4>Errors :</h4>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
</div>

@endif

@endsection
