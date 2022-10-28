<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Create quiz</title>
</head>
<body>
@include('partials.header')

    <div class=" mx-auto container">
        <form id="quizes" action="{{route('quizes.store')}}" method="post">
            <div class="mt-3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-3xl text-center" >Create Quiz</h1>
            </div>

        @csrf
        <div class="form-group mt-5 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <label class="mt-3 block text-gray-700 text-lg font-bold mb-2" for="title">
                Quiz title
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   type="text"
                   name="title"
                   class="form-control"
                   placeholder="Title..."
                   required/>
        </div>

            <div class="form-group mt-5 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="questions_block">
                <div class="flex justify-end">
                    <button class="text-1lg text-gray-500 font-bold hover:text-gray-800">X</button>
                </div>
                    <label class=" block text-gray-700 text-lg font-bold mb-2" for="question_text">
                        Question
                    </label>
                @csrf
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text"
                       name="question_text"
                       class="form-control"
                       placeholder="Question..."
                       required/>
                <div>
                <label>Options</label>
                </div>
            </div>
            <input
                type="submit"
                name="submit"
                id="submit"
                class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"

                value="Create"/>
        </form>








</div>
<script>

</script>

</body>
</html>
