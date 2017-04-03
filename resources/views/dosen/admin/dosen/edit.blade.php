@extends('dosen.partials._main')

@section('title', 'Buat Jadwal Praktikkum')

@section('main')
	<div class="col-md-9">
		<div class="picture-container">
			<div class="picture img-circle">
				<img 
					src="{{ url('images/profile/'.$dosen->gambar_profile) }}">
			</div>
		</div>
		<div class="col-md-4 col-md-offset-4">
			<form 
				action="{{ route('admin.dosen.edit', $dosen->nip) }}" 
				method="post">
				{{ csrf_field() }}
				
				<span class="input-label">Masukkan Password Baru</span>
				<input type="password" class="form-field" name="new_password">
				
				<span class="input-label">Masukkan Ulang Password Baru</span>
				<input type="password" class="form-field" name="new_password_confirmation">
				
				<button type="submit" class="form-button form-button-primary">Submit</button>
			</form>
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