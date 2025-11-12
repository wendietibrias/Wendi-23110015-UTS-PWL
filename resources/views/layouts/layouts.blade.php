<!DOCTYPE>
<html>

<head>
  <title>{{ $title }}</title>
  @vite('resources/css/app.css')
</head>

<body>
  <nav class="w-full bg-gray-700 py-3">
    <div class="w-[85%] mx-auto flex items-center justify-between">
      <a class="text-white font-bold" href="http://latihan1.test">KULIAH</a>
      <ul class="flex items-center gap-x-3">
        <li>
          <a href="{{ route("index.mahasiswa") }}" class="text-white">Mahasiswa</a>
        </li>
        <li>
          <a href="{{ route('mata_kuliah.view') }}" class="text-white">Mata Kuliah</a>
        </li>
        <li>
          <a href="{{ route('index.absensi') }}" class="text-white">Absensi</a>
        </li>
      </ul>
    </div>
  </nav>
  <main class="container">
    @yield('content')
  </main>
</body>

</html>