@extends('layouts.layouts')

@section('content')
    <div class="px-10">
        <a class="my-7" href="{{ route("create.mahasiswa") }}" class="block">
            <button class="py-2 my-7 rounded-full px-2 bg-blue-400 text-white">Tambah Mahasiswa</button>
        </a>
        <br>
        <table class="w-full">
            <thead>
                <tr class="w-full">
                    <th class="bg-blue-400 text-white p-2">#</th>
                    <th class="bg-blue-400 text-white">NIM</th>
                    <th class="bg-blue-400 text-white">Nama</th>
                    <th class="bg-blue-400 text-white">Jurusan</th>
                    <th class="bg-blue-400 text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr class="w-full">
                        <td class="bg-blue-100 p-2">{{$mahasiswa['id']}}</td>
                        <td class="bg-blue-100 p-2">{{$mahasiswa['NIM']}}</td>
                        <td class="bg-blue-100 p-2">{{$mahasiswa['name']}}</td>
                        <td class="bg-blue-100 p-2">{{$mahasiswa['jurusan']}}</td>
                        <td class="bg-blue-100 p-2 flex items-center gap-x-2">
                            <form action="{{ route('mahasiswa.delete', $mahasiswa->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-400 text-white rounded-md p-1 text-[0.8rem] cursor-pointer">Delete</button>
                            </form>
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">
                                <button class="bg-green-400 text-white p-1 rounded-md text-[0.8rem] cursor-pointer">Tambah
                                    MK</button>
                            </a>
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">
                                <button
                                    class="bg-yellow-400 text-white p-1 rounded-md text-[0.8rem] cursor-pointer">Edit</button>
                            </a>
                            <a href="">
                                <button class="bg-blue-400 text-white p-1 rounded-md text-[0.8rem] cursor-pointer">Lihat Absensi</button>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>

    </div>
@endsection()