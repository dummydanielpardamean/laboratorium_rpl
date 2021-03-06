@extends('mahasiswa.partials._main')

@section('title', 'Ganti Gambar Profile')

@section('main')
    <div class="col-md-8">
        <div class="container-fluid main-content">
            <div class="col-md-4 col-md-offset-4 picture-form-container">
                <form 
                    action="{{ route('mahasiswa.picture') }}" 
                    method="post" 
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <span class="information">Pilih Gambar</span>
                    <input type="file" name="gambar_profile" class="form-file form-for-input-picture"> 
                    <button class="form-button form-button-primary" type="submit">Ganti Gambar Profile</button>
                </form>
            </div>
        </div>
    </div>
@endsection
