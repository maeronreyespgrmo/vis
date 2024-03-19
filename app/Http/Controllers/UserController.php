<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = [
            'parent' => 'reference-libraries',
            'child'  => 'users',
            'title'  => 'User Management',
            'crumb'  => 'Users'
        ];

        $users = User::all();

        return view('users.index', compact( 'page','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = [
            'parent' => 'reference-libraries',
            'child'  => 'users',
            'title'  => 'User Management',
            'crumb'  => 'Users > Create'
        ];

        return view('users.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $vote = new User();
        $vote->name = $request->name;
        $vote->email = $request->email;
        $vote->password = $request->password;
        $vote->save();

        return back()->with('success', 'Successfuly added');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $page = [
            'parent' => 'reference-libraries',
            'child'  => 'users',
            'title'  => 'User Management',
            'crumb'  => 'Users > Update'
        ];
        $user = User::where('id', $id)->first();
        return view('users.edit', compact('page','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    //
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);

        User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        ]);
        return back()->with('success', 'Successfuly added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->deleted_at = Carbon::now('Asia/Manila');
        $user->save();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
