<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Qiuz</title>
</head>
<body>
@include('partials.header')

<div class=" mx-auto container">
    <form method="post">
        <div class="mt-5 bg-white shadow-xl rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-3xl text-center " >{{$quiz->title}}</h1>
        </div>
        <input type="hidden" name="topic_id" value="{{$quiz->id}}">
        @foreach($quiz->questions as $question)
            <div class=" block p-5 mt-5 bg-white shadow-xl rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-2xl font-bold text-gray-500">{{$question->question_text}}</h1>
                <input type="hidden" name="question_id[]" value="{{$question->id}}">
                <div class="text-xl mt-3">
                    @foreach($question->options as $option)
                        <div class="row">
                            <label>{{$option->option}}</label>
                            <input type="checkbox" name="option[{{$question->id}}][{{$option->id}}]"
                                   value="{{$option->correct}}">

                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </form>

</div>

</body>
</html>
