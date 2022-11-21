<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request -> validate([
            'name' => 'required|min:4',
            'prodi' => 'required',
            'angkatan' => 'required',
            'profpic_url' => 'required',
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'prodi' => $request->prodi,
            'angkatan' => $request->angkatan,
            'profpic_url' => $request->profpic_url,
        ]);

        return back()->with('message', 'Profile updated successfully');
    }
}
