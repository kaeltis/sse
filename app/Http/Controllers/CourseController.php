<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
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
            $courses = Course::all();
        } else {
            $courses = Auth::user()->courses()->get();
        }

        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->isProfessor() || Auth::user()->isEmployee()) {
            return view('course.create');
        } else {
            flash('You are not permitted to view this!', 'danger');
            return redirect('/course');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course($request->all());
        $course->save();

        flash('Course Created!', 'success');
        return redirect('/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->isProfessor() || Auth::user()->isEmployee()) {
            $course = Course::findOrFail($id);
        } else {
            $course = Auth::user()->courses()->findOrFail($id);
        }

        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->isProfessor() || Auth::user()->isEmployee()) {
            $course = Course::findOrFail($id);
            return view('course.edit', compact('course'));
        } else {
            flash('You are not permitted to view this!', 'danger');
            return redirect('/course');
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
        if (Auth::user()->isProfessor() || Auth::user()->isEmployee()) {
            $course = Course::findOrFail($id);
            $course->update($request->all());
            flash('Course ' . $course->name . ' updated!', 'success');
        } else {
            flash('You are not permitted to do this!', 'danger');
        }

        return redirect('/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->isProfessor() || Auth::user()->isEmployee()) {
            $course = Course::findOrFail($id);
            $course->delete();
            flash('Course ' . $course->name . ' deleted!', 'success');
        } else {
            flash('You are not permitted to do this!', 'danger');
        }

        return redirect('/course');
    }
}
