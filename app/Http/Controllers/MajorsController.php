<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    public function index()
    {
        $majors = Majors::all();
        return view('majors.index', compact('majors'));
    }

    public function create()
    {
        return view('majors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:majors,code',
            'description' => 'required',
        ]);

        Majors::create($request->all());

        return redirect()->route('majors.index')->with('success', 'Major added successfully!');
    }

    public function show(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.show', compact('major'));
    }

    public function edit(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.edit', compact('major'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:majors,code,' . $id,
            'description' => 'required',
        ]);

        $major = Majors::findOrFail($id);
        $major->update($request->all());

        return redirect()->route('majors.index')->with('success', 'Major updated successfully!');
    }

    public function destroy(string $id)
    {
        $major = Majors::findOrFail($id);
        
        // Opsional: Cek apakah ada student di jurusan ini sebelum menghapus
        if ($major->student()->exists()) {
            return redirect()->route('majors.index')->with('error', 'Cannot delete major that has students!');
        }

        $major->delete();
        return redirect()->route('majors.index')->with('success', 'Major deleted successfully!');
    }
}