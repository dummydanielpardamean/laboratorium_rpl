@extends('mahasiswa.partials._main')

@section('title', 'Nilai praktikkum')

@section('main')
    <div class="col-md-8">
        <div class="container-fluid main-content">

            @foreach($mahasiswa->asAsisten as $praktikkum)

                <div class="col-md-4 each-content">
                    <div class="each-content-container">
                        <h4>
                            {{ $praktikkum->judul }}
                        </h4>
                        <span>
                            {{ date("d/m/Y" ,strtotime($praktikkum->tanggal_waktu_mulai_praktikkum)) }} 
                            {{ date("G:i" ,strtotime($praktikkum->tanggal_waktu_mulai_praktikkum)) }}-
                            {{ date("G:i" ,strtotime($praktikkum->tanggal_waktu_akhir_praktikkum)) }}
                        </span>
                        <span>
                            {{ $praktikkum->ruang->nama }} - {{ $praktikkum->ruang->lokasi }}
                        </span>
                        <span>
                            Peserta : {{ $praktikkum->peserta()->count() }}
                        </span>
                        <a class="more" 
                            href="{{ route('asisten.show', $praktikkum->id) }}">
                            <button>
                                More
                            </button>
                        </a>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection
