<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
           @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#171C22] min-h-screen ">
        <!-- Main modal -->

                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="/edit_note/{{$note->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$note->title}}">
                            </div>
                            <div class="col-span-2">
                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$note->body}}</textarea>
                            </div>
                        </div>
                        <button class="w-full bg-yellow-400 text-black font-semibold py-3 rounded-md hover:bg-yellow-500 transition">
                          Save Changes
                        </button>
                    </form>

    </body>
</html>
