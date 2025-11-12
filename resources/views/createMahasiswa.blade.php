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

            <h2 class="text-left text-white font-bold text-2xl uppercase">Create Mahasiswa</h2>
            <form method="POST" action="{{ route("store.mahasiswa") }}" class="flex flex-col mt-7 gap-y-3">
                @csrf

                @if(isset($mahasiswa) && $mahasiswa)
                    <input type="hidden" name="type" value="edit" />
                    <input type="hidden" name="id" value="{{ isset($mahasiswa) ? $mahasiswa->id : null }}">
                @endif
                <div class="flex items-center gap-x-4">
                    <label class="text-white text-sm d-block w-[100px]">Nama</label>
                    <input value="{{ (isset($mahasiswa) ? $mahasiswa->name : '') }}" name="name" placeholder="Nama"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]">
                    @error('nama')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center gap-x-4">
                    <label class="text-white text-sm d-block w-[100px]">Email</label>
                    <input value="{{ (isset($mahasiswa) ? $mahasiswa->email : '') }}" name="email" placeholder="Email"
                        type="email" class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]">
                    @error('email')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center mt-2 gap-x-4">
                    <label class="text-white text-sm w-[100px]">NIM</label>
                    <input value="{{ (isset($mahasiswa) ? $mahasiswa->NIM : '') }}" name="NIM" placeholder="NIM"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]">
                    @error('nim')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center mt-2 gap-x-4">
                    <label class="text-white text-sm w-[100px]">Tempat Lahir</label>
                    <input value="{{ (isset($mahasiswa) ? $mahasiswa->tempat_lahir : '') }}" name="tempat_lahir"
                        placeholder="Tempat Lahir"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]">
                    @error('tempat_lahir')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center mt-2 gap-x-4">
                    <label class="text-white text-sm w-[100px]">Jurusan</label>
                    <div class="flex flex-col">
                        <div>
                            @if(isset($mahasiswa) && $mahasiswa->jurusan === "Sistem Teknologi Informasi")
                                <input type="radio" checked name="jurusan" value="Sistem Teknologi Informasi" />

                            @else
                                <input type="radio" name="jurusan" value="Sistem Teknologi Informasi" />
                            @endif
                            <span class="text-white">Sistem Teknologi Informasi</span>
                        </div>
                        <div>
                            @if(isset($mahasiswa) && $mahasiswa->jurusan === "Bisnis Digital")
                                <input type="radio" checked name="jurusan" value="Bisnis Digital" />

                            @else
                                <input type="radio" name="jurusan" value="Sistem Teknologi Informasi" />
                            @endif
                            <span class="text-white">Bisnis Digital</span>
                        </div>
                        <div>
                            @if(isset($mahasiswa) && $mahasiswa->jurusan === "Kewirausahaan")
                                <input type="radio" checked name="jurusan" value="Kewirausahaan" />

                            @else
                                <input type="radio" name="jurusan" value="Kewirausahaan" />
                            @endif
                            <span class="text-white">Kewirausahaan</span>
                        </div>
                        @error('jurusan')
                            <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center mt-2 gap-x-4">
                    <label class="text-white text-sm w-[100px]">Tanggal Lahir</label>
                    <input value="{{ isset($mahassiwa) ? $mahasiswa->tanggal_lahir : null }}" name="tanggal_lahir"
                        type="date" class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]"
                        placeholder="Tanggal Lahir" />
                    @error('tanggal_lahir')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center mt-2 gap-x-4">
                    <label class="text-white text-sm w-[100px]">Angkatan</label>
                    <input type="number" value="2025" name="angkatan"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]"
                        placeholder="Angkatan" />
                    @error('angkatan')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center mt-2 gap-x-4">
                    <label class="text-white text-sm w-[100px]">Maksimal SKS</label>
                    <input type="number" value="0" name="maksimal_sks"
                        class="outline-none text-[0.85rem] rounded-sm bg-white border-none p-1 w-[60%]"
                        placeholder="Maksimal SKS Mahasiswa" />
                    @error('maksimal_sks')
                        <p class="text-red-400 text-[0.85rem] font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center gap-x-3 mt-7">
                    @if(isset($mahasiswa))
                        <button type="submit" class="outline-none text-white bg-blue-400 rounded-sm py-1 px-4">Simpan
                            Perubahan</button>
                    @else
                        <button type="submit" class="outline-none text-white bg-blue-400 rounded-sm py-1 px-4">Submit</button>
                    @endif
                    <a href="http://latihan1.test/mahasiswa">
                        <button type="button"
                            class="outline-none text-white bg-blue-400 rounded-sm py-1 px-4">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection