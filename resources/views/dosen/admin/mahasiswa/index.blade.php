@extends('dosen.partials._main')

@section('title', 'Buat Jadwal Praktikkum')

@section('main')
	<div class="col-md-9">
		<table class="table-block">
			<tr>
				<td class="coloumn-head coloumn-center coloumn-fatter">No</td>
				<td class="coloumn-head coloumn-center coloumn-fatter">NIM</td>
				<td class="coloumn-head coloumn-center coloumn-fatter">Nama</td>
				<td class="coloumn-head coloumn-center coloumn-fatter">Program Studi</td>
				<td class="coloumn-head coloumn-center coloumn-fatter">Angkatan</td>
				<td class="coloumn-head coloumn-center coloumn-fatter">Action</td>
			</tr>
			@foreach($mahasiswas as $mahasiswa)
				<tr>
					<td class="coloumn-center coloumn-fatter">
						{{ $loop->iteration }}
					</td>
					
					<td class="coloumn-center coloumn-fatter">
						{{ $mahasiswa->nim }}
					</td>
					
					<td class="coloumn-fatter">
						{{ $mahasiswa->nama_lengkap }}
					</td>
					
					<td class="coloumn-center coloumn-fatter">
						{{ $mahasiswa->ProgramStudi->nama_program_studi }}
					</td>
					
					<td class="coloumn-center coloumn-fatter">
						{{ $mahasiswa->angkatan }}
					</td>
					
					<td class="coloumn-center coloumn-fatter">
						<a 
							href="{{ route('admin.mahasiswa.destroy', $mahasiswa->nim) }}">
							Delete
						</a>|
						<a 
							href="{{ route('admin.mahasiswa.edit', $mahasiswa->nim) }}">
							Edit
						</a>
					</td>
				</tr>
			@endforeach
		</table>
		<div class="text-center">
			{!! $mahasiswas->links() !!}
		</div>
	</div>
@endsection