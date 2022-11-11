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
<x-app-layout>
<body class="bg-gray-300/50">
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    function incTimer() {
        var currentMinutes = Math.floor(totalSecs / 60);
        var currentSeconds = totalSecs % 60;
        if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
        if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
        totalSecs++;
        $("#timer").text(currentMinutes + ":" + currentSeconds);
        setTimeout('incTimer()', 1000);
    }

    totalSecs = 0;

    $(document).ready(function() {
        $("#start").click(function(e) {
            e.preventDefault()
            incTimer();
        });
    });
    incTimer()
</script>

<div class=" mx-auto container">
    <form method="post" action="{{route('results.store')}}" >
        @csrf
        <div class="mt-5 bg-white shadow-xl rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-3xl text-center ">{{$quiz->title}}</h1>
            <div id="timer" class="text-2xl font-bold text-center">00:00</div>
        </div>
        @csrf
        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
        @foreach($quiz->questions as $question)
            <div class=" block p-5 mt-5 bg-white shadow-xl rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-2xl font-bold text-gray-500">{{$question->question_text}}</h1>
                @csrf
                <input type="hidden" name="question_id[]" value="{{$question->id}}">
                <div class="text-xl mt-3">
                    @foreach($question->options as $option)
                        <div class="row" name="radioGroup">
                            <label>{{$option->option}}</label>
                            @csrf
                            <input type="checkbox" name="option[{{$question->id}}][{{$option->id}}]"
                                   value="{{$option->correct}}">

                        </div>

                    @endforeach

                </div>

            </div>
        @endforeach
        <div class="flex justify-center">
        <button class="mt-3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </div>
    </form>

</div>

</body>

</x-app-layout>
</html>
