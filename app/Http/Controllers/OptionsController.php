<?php

namespace App\Http\Controllers;

use App\Models\Options;
use Illuminate\Http\Request;

class OptionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $options = Options::all();

        return view('options.index', ['options'=>$options]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $options = Options::find($id);

        return view('options.show', ['options'=>$options]);
    }
}
