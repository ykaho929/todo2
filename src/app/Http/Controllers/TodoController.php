<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function store(Request $request)
  {
    $todo = $request->only(['content']);
    Todo::create($todo);

    return redirect('/');
  }
}