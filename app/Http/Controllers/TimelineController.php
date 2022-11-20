<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request->has('search')){
            $data = Post::where('body', 'like', '%'.$request->search.'%')->withCount('comments')->get();
        } else {
            $data = Post::with('user')->withCount('comments')->latest('id')->get();
        }

        return view('dashboard', [
            'posts' => $data
        ]);
    }
}
