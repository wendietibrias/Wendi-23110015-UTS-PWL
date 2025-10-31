@extends('layouts.layouts')

@section('content')
    <div class="w-full bg-gray-800 p-7">
        <div class="w-[90%] mx-auto">
            @if(isset($messageError))
                <div class="bg-red-100 text-red-400">
                    <p>{{ $messageError }}</p>
                </div>

            @elseif(isset($message))
                <div class="bg-green-100 text-green-400">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <h2 class="text-left text-white font-bold text-2xl uppercase">Create matakuliah</h2>
            <form method="POST" action="{{ route("mata_kuliah.create") }}" class="flex flex-col mt-7 gap-y-3">
                @csrf

                @if(isset($matakuliah) && $matakuliah)
                    <input type="hidden" name="type" value="edit" />
                    <input type="hidden" name="id" value="{{ isset($matakuliah) ? $matakuliah->id : null }}">
                @endif
                <div class="flex items-center gap-x-4">
                    <label class="text-white text-sm d-block w-[100px]">Nama</label>
                    <input value="{{ (isset($matakuliah) ? $matakuliah->nama_matakuliah : '') }}" name="nama_matakuliah" placeholder="Nama"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]">
                    @error('nama')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center gap-x-4">
                    <label class="text-white text-sm d-block w-[100px]">Kode MK</label>
                    <input value="{{ (isset($matakuliah) ? $matakuliah->kode : '') }}" name="kode"
                        placeholder="Kode Mata Kuliah" type="text"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]">
                    @error('kode_mk')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="flex items-center gap-x-4">
                    <label class="text-white text-sm d-block w-[100px]">SKS</label>
                    <input value="{{ (isset($matakuliah) ? $matakuliah->sks : '') }}" name="sks"
                        placeholder="SKS" type="number" value="0"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]">
                    @error('sks')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div> --}}
                {{-- <div class="flex items-center gap-x-4">
                    <label class="text-white text-sm d-block w-[100px]">Dosen Pengampu</label>
                    <select value="{{ (isset($matakuliah) ? $matakuliah->kode_mk : '') }}" name="dosen_id"
                        placeholder="Dosen Pengampu" type="text"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]">
                        @foreach($dosens as $dosen)
                            <option value="{{ $dosen->id }}" @if(isset($matakuliah) && $matakuliah->dosen_id == $dosen->id)
                            selected @endif>{{ $dosen->nama }} - {{ $dosen->nip }} </option>
                        @endforeach
                    </select>
                    @error('dosen_id')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div> --}}

                <div class="flex items-center gap-x-3 mt-7">
                    @if(isset($matakuliah))
                        <button type="submit" class="outline-none text-white bg-blue-400 rounded-sm py-1 px-4">Simpan
                            Perubahan</button>
                    @else
                        <button type="submit" class="outline-none text-white bg-blue-400 rounded-sm py-1 px-4">Submit</button>
                    @endif
                    <a href="http://latihan1.test/mata-kuliah">
                        <button type="button"
                            class="outline-none text-white bg-blue-400 rounded-sm py-1 px-4">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection