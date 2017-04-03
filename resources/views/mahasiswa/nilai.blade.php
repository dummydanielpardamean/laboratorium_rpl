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
							src="{{ url('images/profile/'.$mahasiswa->gambar_profile) }}" 
							alt="" class="picture">
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
						
							@if(!is_null($nilai))
								<span class="nilai-form-label">Pre-test</span>
								<span>
									{{ $nilai->pre_test }}
								</span>

								<span class="nilai-form-label">Post-test</span>
								<span>
									{{ $nilai->post_test }}
								</span>

								<span class="nilai-form-label">Perilaku</span>
								<span>
									{{ $nilai->perilaku }}
								</span>

								<span class="nilai-form-label">Laporan</span>
								<span>
									{{ $nilai->laporan }}
								</span>
							@else
								<span class="nilai-form-label">Pre-test</span>
								<span>--</span>
								<span class="nilai-form-label">Post-test</span>
								<span>--</span>
								<span class="nilai-form-label">Perilaku</span>
								<span>--</span>
								<span class="nilai-form-label">Laporan</span>
								<span>--</span>
							@endif
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						@if( count($errors) > 0 )
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
