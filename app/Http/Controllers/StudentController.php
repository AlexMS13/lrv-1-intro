<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Group $group)
    {
        return view('students.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Group $group)
    {
        $validated = $request->validate([
            'surname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $group->students()->create($validated);

        return redirect()->route('groups.show', $group);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group, Student $student)
    {
        $student->load('group'); // Загружаем группу студента для отображения
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
