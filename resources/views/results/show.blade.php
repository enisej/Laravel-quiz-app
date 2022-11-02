
<x-app-layout>
@vite('resources/css/app.css')
    <div class="container mx-auto mt-5" id="wrapper">
        <div class="flex justify-start mb-5"
            @if($result)
                <div class="">
                    <div class="">
                        <table class="m-5 text-xl text-gray-500 bg-gray-200 rounded-lg shadow-xl">
                            <tr>
                                <th class="p-5">User</th>
                                <td class="p-5">{{$result->user->name}} ({{$result->user->email}})</td>
                            </tr>
                            <tr>
                                <th class="p-5">Date</th>
                                <td class="p-5">{{$result->created_at}}</td>
                            </tr>
                            <tr>
                                <th class="p-5">Score</th>
                                <td class="p-5">{{$result->correct_answers}}/{{$result->questions_count}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex justify-center">
                        <table class="border text-xl shadow-xl mt-5 ">
                            <?php $n = 0 ?>
                            @foreach($result->quiz->questions as $question)
                                <?php $n++ ?>
                                <tr class="border bg-gray-200">
                                    <th class="p-5" >Question #{{$n}}</th>
                                    <th class="p-5 italic underline" >{{$question->question_text}}</th>
                                </tr>
                                <tr>
                                    <td class="p-5 italic">Options</td>
                                    <td>
                                        <ol class="p-5 ">
                                            @foreach($question->options as $option)
                                                @if($option->correct == 1)
                                                    <li class="font-bold p-3">{{$option->option}}
                                                        <em>(correct answer)</em>
                                                        @foreach($result->options as $user_option)
                                                            @if($user_option->option_id == $option->id)
                                                                <em class="italic hover:underline p-3">(your answer)</em>
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                @else
                                                    <li class=" p-3">
                                                        {{$option->option}}
                                                        @foreach($result->options as $user_option)
                                                            @if($user_option->option_id == $option->id)
                                                                <em class="italic hover:underline p-3">(your answer)</em>
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    </div>
                </div>
            @else
                <h1>No Result</h1>
            @endif
    </div>
</x-app-layout>
