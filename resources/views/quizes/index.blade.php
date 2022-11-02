<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuizGames</title>
    @vite('resources/css/app.css')
</head>
<x-app-layout>
<body class="">
    <div class="container mx-auto">

        <div class="mt-5 text-gray-800 ">
            <h1 class="flex justify-center text-2xl text-gray-400 font-bold">Availiable Quiz's</h1>
            @if(!Auth::check())
            <div class="container sm:-ml-5 border rounded p-2 bg-blue-400/20 text-white">
                <h1 class="flex justify-center text-2xl text-gray-500 font-bold">To play quiz register or log in</h1>
            </div>
            @endif
                    <div class="grid grid-cols-4 gap-4">
                    @foreach($quizes as $quiz)
                    <div class="rounded-lg  m-5 bg-gray-200  p-5 shadow-xl">

                    <div class="text-gray-800 p-5">
                        <p class="text-lg font-bold">{{ $quiz->title }}</p>
                        <p>
                            {{ date($quiz->created_at) }} - {{date($quiz->updated_at)}}
                        </p>

                        <div class="flex">
                            @if(Auth::check())
                                <a class="mr-3 mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('quizes.show', $quiz->id)}}" type="submit">Start</a>
                            @endif
                                @if(Auth::check() && Auth::user()->role === 'admin')
                            <form class="mr-3" action="{{route('quizes.destroy', $quiz->id)}}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <button class="mt-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
                            </form>
                                @endif
                        </div>


                    </div>

                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
</html>
