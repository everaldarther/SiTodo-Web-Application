<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sessionId = auth()->user()->id;
        $profile = User::all()->where('id','=',$sessionId)->first();

        $photo = $profile->encrypted_filename;

        return view('profile', [
            'profile' => $profile,
            'photo' => $photo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sessionId = auth()->user()->id;

        $file = $request->file('profile');

        if ($file != null){
            $photo = User::find($id);
            $encryptedFilename = 'public/files/'.$photo->encrypted_filename;
            Storage::delete($encryptedFilename);
        }
        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();

            // Store File
            $file->Store('public/files');
        }

        $messages = [
            'required' => 'This column cannot be empty',
            'email' => 'Please enter a valid email address',
        ];

        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'email' => 'required | email',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $profile =  User::find($id);
        $profile->id = $sessionId;
        $profile->name = $request->fullName;
        $profile->email = $request->email;

        if ($request->filled('password')) {
            // Jika user mengisi input password baru, maka hash password baru.
            $profile->password = bcrypt($request->password);
        }

        if ($file != null) {
            $profile->original_filename = $originalFilename;
            $profile->encrypted_filename = $encryptedFilename;
        }
        $profile->save();

        Alert::toast('Profile Updated','success');

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
