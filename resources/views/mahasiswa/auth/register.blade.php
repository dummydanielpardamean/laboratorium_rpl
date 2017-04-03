@extends('mahasiswa.auth.partials/_main')

@section('title', 'Register for Mahasiswa')

@section('form')
<form 
	action="{{ route('mahasiswa.register') }}" 
	method="post">
	{{ csrf_field() }}
    <input type="text" class="form-field form-text-center" name="nim" placeholder="NIM" value="{{ old('nim') }}">
    <input type="text" class="form-field form-text-center" name="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}">
    <input type="password" class="form-field form-text-center" name="password" placeholder="Password">
    <input type="password" class="form-field form-text-center" name="password_confirmation" placeholder="Re-type Password">
    <button type="submit" class="form-button form-button-primary">Register</button>
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