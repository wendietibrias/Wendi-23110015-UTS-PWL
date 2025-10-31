@extends('layouts.layouts')

@section('content')
    <div class="px-10">
        <a class="my-7" href="{{ route("create.mahasiswa") }}" class="block">
            <button class="py-2 my-7 rounded-full px-2 bg-blue-400 text-white">Tambah Mahasiswa</button>
        </a>
        <br>
        <table class="w-full">
            <thead>
                <tr>
                <th class="bg-blue-400 text-white p-2">#</th>
                <th class="bg-blue-400 text-white">NIM</th>
                <th class="bg-blue-400 text-white">Nama</th>
                <th class="bg-blue-400 text-white">Jurusan</th>
                <th class="bg-blue-400 text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                <tr>
                <td class="bg-blue-100 p-2">{{$mahasiswa['id']}}</td>
                <td class="bg-blue-100 p-2">{{$mahasiswa['NIM']}}</td>
                <td class="bg-blue-100 p-2">{{$mahasiswa['name']}}</td>
                <td class="bg-blue-100 p-2">{{$mahasiswa['tempat_lahir']}}</td>
                <td class="bg-blue-100 p-2">{{$mahasiswa['tanggal_lahir']}}</td>
                <td class="bg-blue-100 p-2">{{$mahasiswa['jurusan']}}</td>
                <td class="bg-blue-100 p-2">{{$mahasiswa['angkatan']}}</td>
                <td class="bg-blue-100 p-2">
         
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        
        <br>

    </div>
@endsection()