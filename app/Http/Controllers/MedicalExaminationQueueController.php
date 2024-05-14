<?php

namespace App\Http\Controllers;

use App\Models\MedicalExaminationQueue;
use Illuminate\Http\Request;

class MedicalExaminationQueueController extends Controller
{
    public function index()
    {
        $queues = MedicalExaminationQueue::all();
        return view('medical_examination_queues.index', compact('queues'));
    }

    public function create()
    {
        return view('medical_examination_queues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'examination_type' => 'required|string|max:255',
            'examination_notes' => 'nullable|string',
            'patient_type' => 'required|string|in:rawat jalan,rawat inap',
            'examination_datetime' => 'required|date_format:Y-m-d\TH:i',
        ]);

        MedicalExaminationQueue::create($request->only('patient_name', 'examination_type', 'examination_notes','patient_type', 'examination_datetime', 'gender' ));

        return redirect()->route('medical_examination_queues.index')->with('success', 'Medical examination queue created successfully.');
    }

    public function edit(MedicalExaminationQueue $queue)
    {
        return view('medical_examination_queues.edit', compact('queue'));
    }

    public function update(Request $request, MedicalExaminationQueue $queue)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'examination_type' => 'required|string|max:255',
            'examination_notes' => 'nullable|string',
            'patient_type' => 'required|string|in:rawat jalan,rawat inap',
            'examination_datetime' => 'required|date_format:Y-m-d H:i',
        ]);

        $queue->update($request->only('patient_name', 'examination_type', 'examination_notes','patient_type', 'examination_datetime', 'gender'));

        return redirect()->route('medical_examination_queues.index')->with('success', 'Medical examination queue updated successfully.');
    }

    public function destroy(MedicalExaminationQueue $queue)
    {
        $queue->delete();

        return redirect()->route('medical_examination_queues.index')->with('success', 'Medical examination queue deleted successfully.');
    }
}
