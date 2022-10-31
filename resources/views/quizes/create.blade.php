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
<body class="bg-gray-300/50">
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

            <div id="questions_block">
                <div class="form-group mt-5 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <label class=" block text-gray-700 text-lg font-bold mb-2" for="question_text[]">
                        Question
                    </label>
                @csrf
                <div class="flex" id="question_inputs_1">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text"
                       name="question_text[]"
                       class="form-control"
                       placeholder="Question..."
                       required/>
                <button id="myAnchor" onclick="addMore()" class="ml-3 px-2 bg-blue-500 hover:bg-blue-700 text-white font-bold  rounded focus:outline-none focus:shadow-outline">+</button>
                </div>
                <div id="options_block_1" class="ml-4 mt-5 ">
                    <label class=" block text-gray-700 text-lg font-bold mb-2">Options</label>
                    <div class="flex">
                        <input name="correct[option]" type="radio" class="mt-4 mr-4" />
                        <input class="mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text"
                           name="option[]"
                           class="form-control"
                           placeholder="Option..."

                           required/>

                    </div>
                    <div class="flex">
                        <input name="correct[option]" type="radio" class="mt-4 mr-4" />
                        <input class="mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               type="text"
                               name="option[]"
                               class="form-control"
                               placeholder="Option..."
                               required/>
                    </div>
                    <div class="flex"><input name="correct[option]" type="radio" class="mt-4 mr-4" />
                        <input class="mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               type="text"
                               name="option[]"
                               class="form-control"
                               placeholder="Option..."
                               required/>
                    </div>
                    <div class="flex">
                        <input type="radio" name="correct[option]" class="mt-4 mr-4" />
                        <input class="mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               type="text"
                               name="option[]"
                               class="form-control"
                               placeholder="Option..."
                               required/>
                    </div>
                </div>
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
</body>
<script>

    let id = 1;

    function addMore(){

        id++;
            var objTo = document.getElementById('questions_block')
            var divtest = document.createElement("div");
            divtest.innerHTML = '<div class="form-group mt-5 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"><label class="mt-5 block text-gray-700 text-lg font-bold mb-2" for="question_text[]">Question </label><div class="flex mt-5" id="question_inputs"><input type="text" ' +
                'class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" ' +
                'name="question_text[]" ' +
                'placeholder="Question..." /><button id="myAnchor" onclick="addMore()" class="ml-3  px-2 bg-blue-500 hover:bg-blue-700 text-white font-bold  rounded focus:outline-none focus:shadow-outline">+</button></div>' +
                '<div id="options_block" class="ml-4 mt-5 ">'+
                '<label class=" block text-gray-700 text-lg font-bold mb-2">Options</label>' +
        '<div >'+
            '<div class="flex"><input name="correct[]" type="checkbox" class="mt-4 mr-4" /><input class="mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text"name="option[]"class="form-control"placeholder="Option..."required/></div>'+
            '<div class="flex"><input name="correct[]" type="checkbox" class="mt-4 mr-4" /><input class="mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text"name="option[]"class="form-control"placeholder="Option..."required/></div>'+
                '<div class="flex"><input name="correct[]" type="checkbox" class="mt-4 mr-4" /><input class="mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text"name="option[]"class="form-control"placeholder="Option..."required/></div>'+
                '<div class="flex"><input name="correct[]" type="checkbox" class="mt-4 mr-4" /><input class="mt-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text"name="option[]"class="form-control"placeholder="Option..."required/></div>'+
                '</div></div>';

            objTo.appendChild(divtest)


    }

</script>
</html>
