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

<body>
@include('partials.header')
<div class="container mx-auto">
<h1 class="text-3xl ">
    Quizes
</h1>

<div class="mt-5 text-gray-800 ">
    <a class="mt-5 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{route('quizes.create')}}" >Create +</a>


    <div class="grid grid-cols-4 gap-4">
    @foreach($quizes as $quiz)
    <div class="rounded-lg  m-5 bg-slate-200  p-5 shadow-1xl">

    <div class="text-gray-800 p-5">
        <p class="text-lg font-bold">{{ $quiz->title }}</p>
        <p>
            {{ date($quiz->created_at) }} - {{date($quiz->updated_at)}}
        </p>
        <div class="flex">
                <a class="mr-3 mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('quizes.show', $quiz->id)}}" type="submit">Start</a>
            <form class="mr-3" action="{{route('quizes.destroy', $quiz->id)}}"
                  method="post">
                @csrf
                @method('delete')
                <button class="mt-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
            </form>
        </div>
    </div>

</div>
    @endforeach
</div>
</div>
</div>
</body>
</html>
