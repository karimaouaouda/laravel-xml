<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="w-screen h-screen flex items-center justify-center bg-slate-100">

    <div class="flex flex-col space-y-4 items-center">
        <h1 class="font-bold text-2xl text-slate-800 capitalize">
            continue as
        </h1>
        <div class="flex gap-4">
            <a href="{{ route('filament.student.auth.' . request('action', 'login')) }}" class="w-72 h-72 rounded-lg shadow border hover:scale-105 duration-300 ease-in-out flex flex-col items-center justify-center space-y-3">
                <img class="w-2/5 object-cover h-auto" src="{{ asset('images/student-svg.svg') }}" alt="logo">
                <h1 class="font-semibold uppercase tracking-wide text-slate-800">
                    student
                </h1>
            </a>
            @if(request('action', 'login') === 'login')
                <a href="{{ route('filament.teacher.auth.' . request('action', 'login')) }}" class="w-72 h-72 rounded-lg shadow border hover:scale-105 duration-300 ease-in-out flex flex-col items-center justify-center space-y-3">
                    <img class="w-2/5 object-cover h-auto" src="{{ asset('images/admin.svg') }}" alt="logo">
                    <h1 class="font-semibold uppercase tracking-wide text-slate-800">
                        Teacher
                    </h1>
                </a>
            @endif
        </div>

        <a href="{{ route('home') }}" class="mt-2 font-semibold">back</a>
    </div>

</body>

</html>
