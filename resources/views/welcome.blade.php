<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to My Notes App!</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#171C22] min-h-screen flex items-center justify-center">
        <div class=" p-6">
          <h1 class="dark:text-white text-7xl text-center m-8 font-bold">Welcome to <span class="text-yellow-400">Notes</span> App!</h1>
          <p class="dark:text-white text-center tracking-wide text-2xl mb-20">
            This is my first Laravel App! Let's get started
          </p>
          <div class="flex justify-center">
              <button type="button" class="rounded-md text-white cursor-pointer " onclick="window.location.href='{{ url('login') }}'">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 hover:stroke-[#f0d078]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                  </svg>
              </button>
          </div>
        </div>
        <div class="absolute -z-10 inset-0 h-full w-full
        bg-[radial-gradient(circle,#ffffe020_1px,transparent_1px)]
        bg-[size:10px_10px]" />

    </body>
</html>
