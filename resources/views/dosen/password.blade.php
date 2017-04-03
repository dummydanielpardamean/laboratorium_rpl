@extends('dosen.partials._main')

@section('title', 'Buat Jadwal Praktikkum')


@section('main')
	<div class="col-md-9">
		<div class="row">
			<h2 class="text-center">Ubah Password</h2>
			<div class="col-md-4 col-md-offset-4">
				<form 
					action="{{ route('dosen.password') }}" 
					method="post">
					{{ csrf_field() }}
					<span class="form-label">Masukkan Password Lama</span>
					<input type="password" class="form-field" name="old_password">
					
					<span class="form-label">Masukkan Password Baru</span>
					<input type="password" class="form-field" name="new_password">
					
					<span class="form-label">Masukkan Ulang Password Baru</span>
					<input type="password" class="form-field" name="new_password_confirmation">
					
					<button type="submit" class="form-button form-button-primary">Ubah</button>
				</form>
			</div>
		</div>
		@if(count($errors) > 0)

		<div class="row">
			<div class="col-md-8 col-md-offset-2 error-container">
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