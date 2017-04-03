@extends('dosen.partials._main')

@section('title', 'Detail Jadwal Praktikkum')

@section('main')
	<div class="col-md-8">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="delete-container">
                    <a 
                        href="{{ route('dosen.praktikkum.destroy', $praktikkum->id) }}">
                        Hapus
                    </a>
                </div>
            </div>
        	<div class="col-md-10 col-md-offset-1 praktikkum-container">
        		<h1 class="judul">
                    {{ $praktikkum->judul }}
                </h1>
                <div class="row">
                    <div class="col-md-4 col-md-push-8 pembuat-praktikkum-container">
                        <div class="all-container">
                            <span class="pembuat-praktikkum-label">Diadakan oleh</span>
                            <div class="image-container">
                                <img class="photo" 
                                    src="{{ url('images/profile/'.$praktikkum->dosen->gambar_profile) }}">
                            </div>
                        </div>
                    </div>
                </div>
        		<div class="keterangan">
                    {{ $praktikkum->keterangan }}
                </div>
        		<span class="waktu-praktikkum">
                    {{ date("d/m/Y" ,strtotime($praktikkum->tanggal_waktu_mulai_praktikkum)) }} 
                    {{ date("G:i" ,strtotime($praktikkum->tanggal_waktu_mulai_praktikkum)) }}-
                    {{ date("G:i" ,strtotime($praktikkum->tanggal_waktu_akhir_praktikkum)) }} 
                    di {{ $praktikkum->ruang->nama }} {{ $praktikkum->ruang->lokasi }}
                </span>
        		<div class="col-md-9 photo-collection-container">
        			<span class="label">Peserta</span>
        			<div class="col-md-12 photo-collection">

        				@foreach($praktikkum->peserta as $peserta)
        					<div class="image-container">
        						
                                <a href="{{ route('dosen.praktikkum.nilai', [$praktikkum->id, $peserta->nim]) }}">
                                    <img class="photo" 
                                        src="{{ url('images/profile/'.$peserta->gambar_profile) }}" 
                                        title="{{ $peserta->nama_lengkap }}">
                                </a>
        					</div>
        				@endforeach

        			</div>
        		</div>
        		<div class="col-md-3 photo-collection-container">
        			<span class="label label-right">Asisten</span>
        			<div class="col-md-12 photo-collection">

        				@foreach($praktikkum->asisten as $asisten)
        					<div class="image-container image-container-right">
        						<img class="photo" 
                                    src="{{ url('images/profile/'.$asisten->gambar_profile) }}">
        					</div>
        				@endforeach

        			</div>
        		</div>
        	</div>
        </div>
    </div>
@endsection
