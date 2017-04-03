@extends('dosen.partials._main')

@section('title', 'Buat Jadwal Praktikkum')

@section('main')
	<div class="col-md-9">
		<div class="create-container">
			<a class="create-button" 
				href="{{ route('admin.dosen.create') }}">Daftarkan Dosen</a>
		</div>
		<table class="table-block">
			<tr>
				<td class="coloumn-head coloumn-center coloumn-fatter">No</td>
				<td class="coloumn-head coloumn-center coloumn-fatter">NIM</td>
				<td class="coloumn-head coloumn-center coloumn-fatter">Nama</td>
				<td class="coloumn-head coloumn-center coloumn-fatter">Action</td>
			</tr>
			@foreach($dosens as $dosen)
				<tr>
					<td class="coloumn-center coloumn-fatter">
						{{ $loop->iteration }}
					</td>
					
					<td class="coloumn-center coloumn-fatter">
						{{ $dosen->nip }}
					</td>
					
					<td class="coloumn-fatter">
						{{ $dosen->nama_lengkap }}
					</td>
					
					<td class="coloumn-center coloumn-fatter">
						<a 
							href="{{ route('admin.dosen.destroy', $dosen->nip) }}">
							Delete
						</a>|
						<a 
							href="{{ route('admin.dosen.edit', $dosen->nip) }}">
							Edit
						</a>
					</td>
				</tr>
			@endforeach
		</table>
		<div class="text-center">
			{!! $dosens->links() !!}
		</div>
	</div>
@endsection