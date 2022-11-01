<?php

namespace App\Http\Controllers;

use App\Models\Results;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function index()
    {
        $quizes = Results::all();

        return view('quizes.index', ['quizes' => $quizes]);
    }

    public function store()
    {
        $result = new Results();

    }
}
