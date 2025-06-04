<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="bg-[#232525] min-h-screen flex items-center justify-center">
  <div class="bg-black p-8 rounded-xl shadow-lg w-full max-w-md">
    <h1 class="text-white text-4xl font-bold mb-6">Register</h1>

    <form class="space-y-6" action="/register" method="POST">
        @csrf
      <div>
        <label for="name" class="block text-gray-300 mb-2">Full Name</label>
        <input type="text" id="name" name="name" required
               class="w-full p-3 rounded-md bg-[#2d2d2d] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
      </div>

      <div>
        <label for="email" class="block text-gray-300 mb-2">Email</label>
        <input type="email" id="email" name="email" required
               class="w-full p-3 rounded-md bg-[#2d2d2d] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
      </div>

      <div>
        <label for="password" class="block text-gray-300 mb-2">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full p-3 rounded-md bg-[#2d2d2d] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
      </div>

      @error('email')
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error</strong>
        <span class="block sm:inline">{{ $message }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
          </svg>
        </span>
      </div>
      @enderror


      <button type="submit"
              class="w-full bg-yellow-400 text-black font-semibold py-3 rounded-md hover:bg-yellow-500 transition">
        Register
      </button>
    </form>

    <p class="text-gray-400 mt-6 text-center">
      Already have an account?
      <a href="{{ url('/login') }}" class="text-yellow-400 hover:underline">Login here</a>
    </p>
  </div>
  <div class="absolute -z-10 inset-0 h-full w-full
  bg-[radial-gradient(circle,#ffffe020_1px,transparent_1px)]
  bg-[size:10px_10px]" />
</body>
</html>
