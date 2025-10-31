@extends('layouts.layouts')

@section('content')

<div class="w-full px-20 mt-7">
  <form method="POST" >
       <div class="flex items-center mb-7 gap-x-3">
          <select name="matakuliah_id" class="w-[250px] bg-blue-100 p-2 rounded-full">
             @foreach ($matakuliahs as $matakuliah)
                 <option value="{{ $matakuliah->id }}">{{ $matakuliah->kode }} - {{ $matakuliah->nama_matakuliah }}</option>
             @endforeach
          </select>
          <input type="date" name="tanggal_absensi" class="w-[250px] bg-blue-100 p-2 rounded-full" />
       </div>
 
      <table class="w-full">
          <thead>
              <tr class="border-b border-gray-300">
                  <th>No</th>
                  <th>Mahasiswa</th>
                  <th>Kehadiran</th>
                  <th>
                      Status
                      <div class="flex items-center justify-center">
                          <div class="flex items-center gap-x-1">
                              <label>H</label>
                              <input type="radio" name="status" value="H" />
                            </div>
                            <div class="flex items-center gap-x-1">
                                <label>I</label>
                        <input type="radio" name="status" value="H" />
                    </div>
                     <div class="flex items-center gap-x-1">
                        <label>S</label>
                        <input type="radio" name="status" value="H" />
                    </div>
                    <div class="flex items-center gap-x-1">
                        <label>A</label>
                        <input type="radio" name="status" value="H" />
                    </div>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswas as $no => $mahasiswa)
        <tr class="@if($no % 2 == 0) 'bg-blue-100' @else 'bg-gray-100' @endif">
            <td class="text-center p-3 border-b border-gray-200 @if($no % 2 == 0) bg-blue-100 @else bg-gray-100 @endif">{{ $no + 1 }}</td>
            <td class="text-center p-3 border-b border-gray-200 @if($no % 2 == 0) bg-blue-100 @else bg-gray-100 @endif">
                <input type="hidden" name="mahasiswa_id[]" value="{{ $mahasiswa->id }}">
                <p>{{ $mahasiswa->name }}</p>
                <p>{{ $mahasiswa->nim }}</p>
            </td>
            <td class="text-center p-3 border-b border-gray-200 @if($no % 2 == 0) bg-blue-100 @else bg-gray-100 @endif">Isi Absen Terlebih Dahulu</td>
            <td class="text-center p-3 border-b border-gray-200 @if($no % 2 == 0) bg-blue-100 @else bg-gray-100 @endif">
                  <div class="flex items-center justify-center">
                    <div class="flex items-center gap-x-1">
                        <label>H</label>
                        <input type="radio" name="status_absen[]" value="H" />
                    </div>
                     <div class="flex items-center gap-x-1">
                        <label>I</label>
                        <input type="radio" name="status_absen[]" value="I" />
                    </div>
                     <div class="flex items-center gap-x-1">
                        <label>S</label>
                        <input type="radio" name="status_absen[]" value="S" />
                    </div>
                     <div class="flex items-center gap-x-1">
                        <label>A</label>
                        <input type="radio" name="status_absen[]" value="A" />
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-7">
    <button type="submit" class="bg-blue-400 text-[0.75rem] font-bold text-white rounded-full p-2">Submit Absen</button>
</div>
</form>
</div>

@endsection