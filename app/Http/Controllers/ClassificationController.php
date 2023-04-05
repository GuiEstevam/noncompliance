<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    public function list()
    {
        $classifications = Classification::all();
        return view('classifications.show', ['classifications' => $classifications]);
    }

    public function create()
    {

        return view('classifications.create');
    }

    public function store(Request $request)
    {
        $classifications = new Classification;

        $classifications->name = trim($request->name);
        $classifications->disponibility = $request->disponibility;

        $classifications->save();

        return back();
    }
}
