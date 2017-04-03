@extends('dosen.partials._main')

@section('title', 'Buat Jadwal Praktikkum')

@section('main')
	<div class="col-md-9">
		<h3 class="text-center">Formulir daftar dosen</h3>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form 
					action="{{ route('admin.dosen.create') }}" method="post">
					{{ csrf_field() }}
					<span class="form-label">NIP</span>
					<input type="text" class="form-field" name="nip">
					<span class="form-label">Nama Lengkap</span>
					<input type="text" class="form-field" name="nama_lengkap">
					<span class="form-label">Password</span>
					<input type="password" class="form-field" name="password">
					<span class="form-label">Masukkan Ulang Password</span>
					<input type="password" class="form-field" name="password_confirmation">
					<button type="submit" class="form-button form-button-primary">Daftar</button>
				</form>
			</div>
		</div>
		@if(count($errors) > 0)

		<div class="row">
			<div class="col-md-6 col-md-offset-3 error-container">
				<h4>Errors :</h4>
				<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		</div>

		@endif
	</div>
@endsection