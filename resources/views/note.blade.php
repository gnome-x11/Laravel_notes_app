<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Notes</title>
           @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#171C22] min-h-screen ">

        <div class="flex items-center justify-between w-full px-4">
        <h1 class="text-6xl text-white tracking-wide m-10 font-bold">
            Hello <span class="text-yellow-400">{{ Auth::user()->name }}</span>,
        </h1>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 px-4 py-2 cursor-pointer m-4 ">Logout</button>
            </form>
        </div>

        <div class="flex items-center ml-15 mb-25 gap-4">
            <p class="text-white text-2xl tracking-widest">
                Create note list today!
            </p>


            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button"
                class="rounded-md text-white cursor-pointer" data-tooltip-target="tooltip-default">
                <div id="tooltip-default" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                    Create a note
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor"
                    class="size-10 hover:stroke-[#f0d078]">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </button>
        </div>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-black">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                            Create New Note
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="/create-note" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Notes Title" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Notes description here"></textarea>
                            </div>
                        </div>
                        <button type="submit"
                                class="w-full bg-yellow-400 text-black font-semibold py-3 rounded-md hover:bg-yellow-500 transition">
                          Add Note
                        </button>
                    </form>
                </div>
            </div>
        </div>


        @isset($notes)
        <div class="flex flex-wrap gap-4 px-10 mt-6">
            @foreach($notes as $note)
            <div class="w-full sm:w-[48%] md:w-[30%] lg:w-[23%] p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-[#333] dark:border-white-700 break-words whitespace-normal">
                <h5 class="mb-2 text-5xl font-bold tracking-tight text-yellow-400 dark:text-yellow mb-3">{{ $note['title'] }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> added : {{ $note->created_at->diffForHumans() }}</p>
                <p class="mb-3 font-normal text-white dark:text-white mb-10">{{ $note['body'] }}</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-green-900 rounded-lg hover:bg-green-700 place-items-end">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                      <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                    </svg>
                </a>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-red-900 rounded-lg hover:bg-red-700 place-items-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                      <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
        @endisset


        <div class="absolute -z-10 inset-0 h-full w-full
        bg-[radial-gradient(circle,#ffffe020_1px,transparent_1px)]
        bg-[size:10px_10px]" />



    </body>
</html>
