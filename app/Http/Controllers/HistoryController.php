<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
    	$stories = History::get();
    	return response()->json($stories,200);
    }

    public function store(Request $request){
    	$history = History::create([
    		'city_id' => $request->city_id,
    		'humedity' => $request->humedity
    	]);
    	return response()->json($history,201);
    }
}
