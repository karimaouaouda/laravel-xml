<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-slate-100 flex items-center justify-center space-x-8 h-screen w-screen">
        {{-- card that indicate the role of a user (student) when click it redirect the user to login page, the card must have title and image, and description and button --}}
        <div class="bg-white shadow-md rounded-lg p-6 w-80 flex flex-col items-center">
            <img src="{{ asset('images/student.png') }}" alt="Student" class="w-16 h-16 mx-auto mb-4">
            <h2 class="text-xl font-bold text-center mb-2">Student</h2>
            <p class="text-gray-600 text-center mb-4">As a student, you can access your courses and track your progress.</p>
            <a href="{{ route('filament.student.pages.dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">Login</a>
        </div>

        {{-- card that indicate the role of a user (teacher) when click it redirect the user to login page, the card must have title and image, and description and button --}}
        <div class="bg-white shadow-md rounded-lg p-6 w-80 flex flex-col items-center">
            <img src="{{ asset('images/teacher.png') }}" alt="Teacher" class="w-16 h-16 mx-auto mb-4">
            <h2 class="text-xl font-bold text-center mb-2">Teacher</h2>
            <p class="text-gray-600 text-center mb-4">As a teacher, you can manage your courses and students.</p>
            <a href="{{ route('filament.teacher.pages.dashboard') }}" class="bg-blue-500 mx-auto text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">Login</a>
        </div>
    </body>
</html>
