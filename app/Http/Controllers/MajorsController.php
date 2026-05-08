<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use App\Models\Student;
use App\Ai\Agents\AcademicAgent;
use Laravel\Ai\Enums\Lab;
use Illuminate\Support\Facades\DB;
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

    public function majorInsights()
    {
        $stats = Student::with('major')
            ->select('major_id', 'status', DB::raw('count(*) as total'))
            ->groupBy('major_id', 'status')
            ->get();

        $dataTeks = $stats->map(function ($item) {
            return "Jurusan {$item->major->name} (Status {$item->status}: {$item->total} orang)";
        })->implode(', ');

        $insight = AcademicAgent::make()->prompt(
            "Berikut adalah data statistik pada {$dataTeks}.
            Tolong berikan:
            1. Deskripsi singkat kondisi jurusan.
            2. Evaluasi akademik.
            3. Kritik dan saran untuk dosen.",
            provider: Lab::Gemini
        );

        return view('majors.insight', compact('insight', 'stats'));
    }
}