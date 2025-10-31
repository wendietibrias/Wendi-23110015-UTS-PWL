@extends('layouts.layouts')

@section('content')
    <div class="px-10">
        <a href="{{ route("create.mahasiswa") }}"
        <br>
        <table class="w-full">
            <thead>
                <tr>
                <th class="bg-blue-400 text-white p-2">#</th>
                <th class="bg-blue-400 text-white">NIM</th>
                <th class="bg-blue-400 text-white">Nama</th>
                <th class="bg-blue-400 text-white">Tempat Lahir</th>
                <th class="bg-blue-400 text-white">Tanggal Lahir</th>
                <th class="bg-blue-400 text-white">Jurusan</th>
                <th class="bg-blue-400 text-white">Angkatan</th>
                <th class="bg-blue-400 text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                <tr>
                <td scope="row">{{$mahasiswa['id']}}</td>
                <td>{{$mahasiswa['NIM']}}</td>
                <td>{{$mahasiswa['name']}}</td>
                <td>{{$mahasiswa['tempat_lahir']}}</td>
                <td>{{$mahasiswa['tanggal_lahir']}}</td>
                <td>{{$mahasiswa['jurusan']}}</td>
                <td>{{$mahasiswa['angkatan']}}</td>
                <td>
         
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        
        <br>

    </div>
@endsection()