<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Laravel' }}</title>
    
    {{-- Pastikan baris ini ada agar Tailwind CSS terbaca --}}
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">
    
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        {{-- Slot ini adalah tempat konten form login/register akan muncul --}}
        {{ $slot }}
    </div>

</body>
</html>