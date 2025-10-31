@extends('layouts.layouts')

@section('content')

<div class="w-full min-h-screen bg-gray-100 py-5">
    <div class="w-[85%] mx-auto">
        <div class="flex items-center justify-between">
            <h4 class="text-2xl font-bold">Mata Kuliah</h4>
            <a href="{{ route("mata_kuliah.create.view") }}"> <button
                    class="bg-blue-400 cursor-pointer text-white text-[0.85rem] rounded-full p-2 font-bold">Tambah
                    Mata Kuliah</button></a>
        </div>
        <div class="mt-7">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-center bg-blue-400 text-white text-sm font-normal py-2">ID</th>
                        <th class="text-center bg-blue-400 text-white text-sm font-normal py-2">Nama</th>
                        <th class="text-center bg-blue-400 text-white text-sm font-normal py-2">Kode MK</th>
                        {{-- <th class="text-center bg-blue-400 text-white text-sm font-normal py-2">SKS</th>
                        <th class="text-center bg-blue-400 text-white text-sm font-normal py-2">Dosen</th> --}}
                        <th class="text-center bg-blue-400 text-white text-sm font-normal py-2">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($matakuliahs as $matakuliah)
                        <tr>
                            <td class="bg-blue-100 py-3 text-center">{{ $matakuliah->id }}</td>
                            <td class="bg-blue-100 py-3 text-center">{{ $matakuliah->kode }}</td>
                            <td class="bg-blue-100 py-3 text-center">{{ $matakuliah->nama_matakuliah }}</td>
                            {{-- <td class="bg-blue-100 py-3 text-center">{{ $matakuliah->sks }}</td>
                            <td class="bg-blue-100 py-3 text-center">{{ $matakuliah->dosen->nama }} - {{ $matakuliah->dosen->nip }}</td> --}}
                            <td class="bg-blue-100 py-3 text-center">
                                <form action="{{ route('mata_kuliah.delete', $matakuliah->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-400 text-white rounded-md p-2 text-[0.85rem] cursor-pointer">Delete</button>
                                </form>
                                <a href="{{ route('mata_kuliah.edit', $matakuliah->id) }}">
                                    <button
                                        class="bg-yellow-400 text-white p-2 rounded-md text-[0.85rem] cursor-pointer">Edit</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endSection()