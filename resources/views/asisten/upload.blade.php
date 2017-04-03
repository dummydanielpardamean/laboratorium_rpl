@extends('mahasiswa.partials._main')

@section('title', 'Upload Nilai praktikkum')

@section('main')
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 nilai">
				<h2 class="judul">
					{{ $praktikkum->judul }}
				</h2>
				<span class="datetime">
					{{ date("d/m/Y" ,strtotime($praktikkum->tanggal_waktu_mulai_praktikkum)) }} 
					{{ date("G:i" ,strtotime($praktikkum->tanggal_waktu_mulai_praktikkum)) }}-
					{{ date("G:i" ,strtotime($praktikkum->tanggal_waktu_akhir_praktikkum)) }}
				</span>
				<div class="row picture-papa-container">
					<div class="picture-container">
						<img 
							src="{{ url('images/profile/'.$mahasiswa->gambar_profile) }}" alt="" class="picture">
					</div>
					<span class="mahasiswa-name">
						{{ $mahasiswa->nama_lengkap }}
					</span>
					<span class="mahasiswa-name">
						{{ $mahasiswa->nim }}
					</span>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="form-nilai">
							<form 
								action="{{ route('asisten.upload', [$praktikkum->id, $mahasiswa->nim]) }}" 
								class="nilai-form" method="post">

								@if(!is_null($nilai))
									<span class="nilai-form-label">Pre-test</span>
									<input type="text" class="form-field" name="pre_test" value="{{ $nilai->pre_test }}">

									<span class="nilai-form-label">Post-test</span>
									<input type="text" class="form-field" name="post_test" value="{{ $nilai->post_test }}">

									<span class="nilai-form-label">Perilaku</span>
									<input type="text" class="form-field" name="perilaku" value="{{ $nilai->perilaku }}">

									<span class="nilai-form-label">Laporan</span>
									<input type="text" class="form-field" name="laporan" value="{{ $nilai->laporan }}">

								@else
									<span class="nilai-form-label">Pre-test</span>
									<input type="text" class="form-field" name="pre_test" value="{{ old('pre_test') }}">
									
									<span class="nilai-form-label">Post-test</span>
									<input type="text" class="form-field" name="post_test" value="{{ old('post_test') }}">
									
									<span class="nilai-form-label">Perilaku</span>
									<input type="text" class="form-field" name="perilaku" value="{{ old('perilaku') }}">
									
									<span class="nilai-form-label">Laporan</span>
									<input type="text" class="form-field" name="laporan" value="{{ old('laporan') }}">
									
								@endif

								{{ csrf_field() }}
								<button class="form-button form-button-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						@if(count($errors) > 0)
							<div class="error-container" style="padding: 0 20px; margin-bottom: 40px">
								<h4>Errors :</h4>
								<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
								</ul>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
