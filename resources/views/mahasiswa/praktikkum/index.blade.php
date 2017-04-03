@extends('mahasiswa.partials._main')

@section('title', 'Jadwal Praktikkum')

@section('main')
    <div class="col-md-8">
        <div class="container-fluid main-content">

            @if($mahasiswa->praktikkum()->count() > 0)

                @foreach($mahasiswa->praktikkum as $praktikkum)
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
                            <span>
                                Asisten : {{ $praktikkum->asisten()->count() }}
                            </span>
                            <a class="more" 
                                href="{{ route('mahasiswa.praktikkum.show', $praktikkum->id) }}">
                                <button>More</button>
                            </a>
                        </div>
                    </div>
                @endforeach

            @else
                <h3 style="text-align: center; padding-top: 150px;">Anda Sedang tidak mengikuti praktikkum</h3>
            @endif

        </div>
    </div>
@endsection
