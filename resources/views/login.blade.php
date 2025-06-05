<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#171C22] min-h-screen flex items-center justify-center">

      <div class="bg-[#0E0E0B] p-8 rounded-xl shadow-lg w-full max-w-md">
          @error('login_email')
          <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
          @enderror
        <h1 class="text-white text-4xl font-bold mb-6">Login</h1>
        <p class="text-white text-1xl mb-8 tracking-wide" >Welcome back to your account!</p>

        <form action="/login" method="POST" class="space-y-6">
          @csrf
          <div>
            <label for="login_email" class="block text-gray-300 mb-2">Email</label>
            <input type="email" id="email" name="login_email" required
                   class="w-full p-3 rounded-md bg-[#2d2d2d] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
          </div>

          <div>
            <label for="login_password" class="block text-gray-300 mb-2">Password</label>
            <input type="password" id="password" name="login_password" autocomplete="false" required
                   class="w-full p-3 rounded-md bg-[#2d2d2d] text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
          </div>

          <button type="submit"
                  class="w-full bg-yellow-400 text-black font-semibold py-3 rounded-md hover:bg-yellow-500 transition">
            Login
          </button>
        </form>

        <p class="text-gray-400 mt-6 text-center">
          Don’t have an account?
          <a href= "{{ url('/register') }}" class="text-yellow-400 hover:underline">Register here</a>
        </p>
      </div>
      <div class="absolute -z-10 inset-0 h-full w-full
      bg-[radial-gradient(circle,#ffffe020_1px,transparent_1px)]
      bg-[size:10px_10px]" />
    </body>

</html>
