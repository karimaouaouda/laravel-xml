<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML Exercise Platform</title>
    @vite('resources/css/app.css') <!-- Assuming you're using Vite -->
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-blue-700 text-white shadow-md">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold">XML Exercise Platform</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#hero" class="hover:text-blue-200 transition">Home</a></li>
                    <li><a href="#about" class="hover:text-blue-200 transition">About Us</a></li>
                    <li><a href="#contact" class="hover:text-blue-200 transition">Contact</a></li>
                    <li><a href="#faq" class="hover:text-blue-200 transition">FAQ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Learn and Share XML Exercises</h1>
            <p class="text-xl mb-10 max-w-2xl mx-auto">A platform for teachers to share XML exercises and for students to practice and improve their skills.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('filament.student.pages.dashboard') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition shadow-lg">Continue as Student</a>
                <a href="{{ route('filament.teacher.pages.dashboard') }}" class="bg-blue-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-900 transition shadow-lg">Continue as Teacher</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-12">About Us</h2>
            <div class="max-w-3xl mx-auto text-lg">
                <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-12">Contact</h2>
            <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
                <p class="mb-4">If you have any questions, feel free to reach out to us at:</p>
                <p class="mb-2"><span class="font-semibold">Email:</span> info@xmlexerciseplatform.com</p>
                <p><span class="font-semibold">Phone:</span> (123) 456-7890</p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-12">FAQ</h2>
            <div class="max-w-3xl mx-auto space-y-6">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">How can I sign up as a teacher?</h3>
                    <p>You can sign up by clicking the "Continue as Teacher" button on the homepage.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">Is this platform free?</h3>
                    <p>Yes, the platform is currently free to use.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold text-blue-600 mb-2">How can I submit an exercise as a teacher?</h3>
                    <p>Once logged in as a teacher, you will have an option to upload new exercises.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2023 XML Exercise Platform. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 