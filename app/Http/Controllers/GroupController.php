<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'start_from' => 'required|date',
        'is_active' => 'nullable',
    ]);

        $validated['is_active'] = $request->has('is_active');

        $group = Group::create($validated);

        if (!$group) {
            return back()->withErrors('Ошибка при создании группы');
        }

        return redirect()->route('groups.index')->with('success', 'Группа успешно создана');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $group->load('students'); // Загружаем связанных студентов для отображения
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
