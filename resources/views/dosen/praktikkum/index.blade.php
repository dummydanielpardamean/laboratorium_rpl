@extends('dosen.partials._main')

@section('title', 'Jadwal Praktikkum')
@section('main')
    <div class="col-md-8">
        <div class="container-fluid main-content">
            @if($praktikkums->count() > 0)
                @foreach($praktikkums as $praktikkum)
                <div class="col-md-4 each-content">
                    <div class="each-content-container">
                        <h4>
                            {{ $praktikkum->judul }}
                        </h4>
                        <span>
                            {{ $praktikkum->ruang->nama }} {{ $praktikkum->ruang->lokasi }}
                        </span>
                        <span>
                            Peserta - {{ $praktikkum->peserta()->count() }}
                        </span>
                        <span>
                            Asisten - {{ $praktikkum->asisten()->count() }}
                        </span>
                        <a class="more" 
                            href="{{ route('dosen.praktikkum.show', $praktikkum->id) }}">
                            <button>More</button>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <h3 class="text-center" style="padding-top: 150px;"">Tidak ada Jadwal Praktikkum</h3>
            @endif
        </div>
    </div>
@endsection
