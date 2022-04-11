<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarcharController extends Controller
{
   public function barchart(Request $request)
    {
       $completed = Todo::where('status','1')->get();
    	$uncompleted = Todo::where('status','0')->get();

    	$completed_count = count($completed);
    	$uncompleted_count = count($uncompleted);


    	return view('todos.analytics',compact('completed_count','uncompleted_count'));
    }
}
