<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isProfessor() || Auth::user()->isEmployee()) {
            $students = User::all()->where('role', 's');
            $professors = User::all()->where('role', 'p');
            $employees = User::all()->where('role', 'e');

            return view('user.index', compact('students', 'professors', 'employees'));
        } else {
            flash('You are not permitted to view this!', 'danger');
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        flash('You are not permitted to view this!', 'danger');
        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        flash('You are not permitted to view this!', 'danger');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->isStudent() && Auth::user()->id == $id) {
            return view('user.show', ['user' => User::findOrFail($id)]);
        } elseif (Auth::user()->isProfessor() || Auth::user()->isEmployee()) {
            return view('user.show', ['user' => User::findOrFail($id)]);
        } else {
            flash('You are not permitted to view this!', 'danger');
            return redirect('/home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::user()->isEmployee()) {
            return view('user.edit_staff', ['user' => User::findOrFail($id)]);
        } elseif (Auth::user()->id == $id) {
            return view('user.edit', ['user' => User::findOrFail($id)]);
        } else {
            flash('You are not permitted to view this!', 'danger');
            return redirect('/home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Flag #5 - No check if user has permissions for request
        $user = User::findOrFail($id);
        $user->update($request->all());
        flash('User ' . $user->id . ' updated!', 'success');

        // Show Flag #5
        if ((Auth::user()->isStudent() || Auth::user()->isProfessor()) && Auth::user()->id != $id)
            flash('User ' . $user->id . ' updated!<br>⚑ Flag #5a ⚑ found!', 'warning');
        if ((Auth::user()->isStudent() || Auth::user()->isProfessor()) && !is_null($request->role))
            flash('User ' . $user->id . ' updated!<br>⚑ Flag #5b ⚑ found!', 'warning');

        return view('user.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->isEmployee()) {
            User::destroy($id);
            flash('The user has been deleted', 'success');
            return redirect('/user');
        } else {
            flash('You are not permitted to do this!', 'danger');
            return redirect('/home');
        }
    }
}
