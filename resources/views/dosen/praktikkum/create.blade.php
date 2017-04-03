@extends('dosen.partials._main')

@section('title', 'Buat Jadwal Praktikkum')

@section('main')
	<div class="col-md-8">
        <div class="container-fluid main-content">
            <div class="col-md-10 col-md-offset-1">
                <form
                    id="praktikkum-form"
                    action="{{ route('dosen.praktikkum.create') }}"
                    method="post">

                    {{ csrf_field() }}
                    <span class="form-label">Judul Praktikkum</span>
                    <input type="text" name="judul" class="form-field"
                        value="{{ old('judul') }}">

                    <span class="form-label">Keterangan Praktikkum</span>
                    <textarea name="keterangan" class="form-textarea">{{ old('keterangan') }}</textarea>

                    <div class="row">
                        <div class="col-md-5">

                            <span class="form-label label-for-additional-information">Pilih Peserta dari Prodi :</span>
                            <select name="program_studi" class="form-select">
                                <option value="">Pilih Program Studi</option>

                                @foreach($ProgramStudis as $ProgramStudi)
                                    <option
                                        value="{{ $ProgramStudi->id }}" {{ (old("program_studi") == $ProgramStudi->id ? "selected":"") }} >
                                            {{ $ProgramStudi->nama_program_studi }}
                                    </option>
                                @endforeach

                            </select>

                            <span class="form-label label-for-additional-information">Angkatan</span>
                            <select name="angkatan" class="form-select">
                                <option value="">Pilih Angkatan</option>

                                @for($i = 12; $i<=16; $i++)
                                    <option
                                        value="20{{ $i }}" {{ (old("angkatan") == 2000+ (int)$i ? "selected":"") }}>
                                        20{{ $i }}
                                    </option>
                                @endfor

                            </select>

                            <div class="asisten">
                                <span label="asisten" class="form-label label-for-additional-information label-text-left">Asisten Praktikkum</span>
                                <select name="asisten[]" class="form-select select2" multiple="multiple"></select>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-push-1">
                            <span class="form-label label-for-additional-information label-text-right">Tanggal Praktikkum</span>
                            <input type="date" class="form-field form-for-additional-information" name="tanggal" value="{{ old('tanggal') }}">

                            <span class="form-label label-for-additional-information label-text-right">Waktu Praktikkum</span>
                            <input type="time" class="form-field form-for-additional-information" name="waktu" value="{{ old('waktu') }}">

                            <span class="form-label label-for-additional-information label-text-right">Ruang Praktikkum</span>
                            <select name="ruang" class="form-select">
                                <option value="">Pilih Ruang</option>

                                @foreach($ruangs as $ruang)
                                    <option 
                                        value="{{ $ruang->id }}"  {{ (old("ruang") == $ruang->id ? "selected":"") }}>
                                        {{ $ruang->nama }}
                                    </option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                    <button class="form-button form-button-primary" type="submit" style="margin-top: 10px">Buat</button>
                </form>
                @if(count($errors) > 0)

                <div class="row">
                    <div class="col-md-12 error-container" style="margin-bottom: 100px">
                        <h4>Errors :</h4>
                        <ul class="error">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('js/select2.min.js') }}"></script>
    <script>
        function checkAvailableRooms(){

            var _token = $("input[name='_token']").val(),
                program_studi = $("select[name='program_studi']").val(),
                angkatan = $("select[name='angkatan']").val(),
                ruang = $("select[name='ruang']").val(),
                tanggal = $("input[name='tanggal']").val(),
                waktu = $("input[name='waktu']").val();

            if (
                program_studi !== '' &&
                angkatan !== '' &&
                tanggal !== '' &&
                waktu !== '' &&
                ruang !== ''
            ) {
                $.ajax({
                    url: "{{ route('dosen.praktikkum.check') }}",
                    type: 'POST',
                    data: {
                        _token : _token,
                        program_studi : program_studi,
                        angkatan : angkatan,
                        ruang : ruang,
                        tanggal : tanggal,
                        waktu : waktu
                    },
                    success : function(e){
                        $('.error-container').remove();
                        $('.ruang').remove();
                        if(e.result){
                            $("select[name='program_studi']").removeClass('form-danger').addClass('form-success');
                            $("select[name='angkatan']").removeClass('form-danger').addClass('form-success');
                            $("input[name='tanggal']").removeClass('form-danger').addClass('form-success');
                            $("input[name='waktu']").removeClass('form-danger').addClass('form-success');
                            $("select[name='ruang']").removeClass('form-danger').addClass('form-success');
                            errorHandler(e.messages);
                            asistenForm(e.asisten);
                        }else{
                            $("select[name='program_studi']").removeClass('form-success').addClass('form-danger');
                            $("select[name='angkatan']").removeClass('form-success').addClass('form-danger');
                            $("input[name='tanggal']").removeClass('form-success').addClass('form-danger');
                            $("input[name='waktu']").removeClass('form-success').addClass('form-danger');
                            $("select[name='ruang']").removeClass('form-success').addClass('form-danger');
                            errorHandler(e.messages);
                            asistenForm(e.asisten);
                        }
                    }
                });
            }
        }

        function asistenForm(e) {
            if(e == null){
                return ;
            }
            element = '';
            for($index in e){
                element += '<option value="'+ e[$index].nim +'">'+ e[$index].nama_lengkap +' - '+ e[$index].angkatan +'</option>';
            }

            $("select[name='asisten[]']").html(element);
            $('.select2').select2();

        }

        function errorHandler(e){
            $("#error-row").remove();
            if(e == null){
                return ;
            }
            element = 
            '<div class="row" id="error-row">'+
                    '<div class="col-md-12 error-container" style="margin-bottom: 100px">'+
                        '<h4>Errors :</h4>'+
                        '<ul class="error">'+
                            '<li>' + e + '</li>'
                        '</ul>'+
                    '</div>'+
                '</div>';
            $(element).insertAfter("#praktikkum-form");
        }

        $("select[name='program_studi']").change(checkAvailableRooms);
        $("select[name='angkatan']").change(checkAvailableRooms);
        $("input[name='lama_praktikkum']").change(checkAvailableRooms);
        $("input[name='tanggal']").change(checkAvailableRooms);
        $("input[name='waktu']").change(checkAvailableRooms);
        $("select[name='ruang']").change(checkAvailableRooms);
        $('.select2').select2();
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--multiple{
            min-height: 10px !important;
        }
        .select2-selection__choice{
            font-size: 11px;
            margin-top: 3px !important;
        }
        .select2-search__field{
            margin-top: 1px !important;
        }
    </style>
@endsection
