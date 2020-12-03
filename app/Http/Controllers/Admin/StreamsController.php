<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StreamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function index()
    {
        //Get all streams from the database
        $streams = Stream::all();

        return view('admin.streams.index', compact('streams'));
    }
}
