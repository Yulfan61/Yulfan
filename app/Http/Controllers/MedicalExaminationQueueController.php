<?php

namespace App\Http\Controllers;

use App\Models\MedicalExaminationQueue;
use Illuminate\Http\Request;
use App\Mail\MedicalExaminationQueueMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;

class MedicalExaminationQueueController extends Controller
{
    public function index(Request $request)
    {
        $query = MedicalExaminationQueue::query();

        if ($request->has('search')) {
            $query->where('patient_name', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('examination_type')) {
            $query->where('examination_type', $request->input('examination_type'));
        }

        if ($request->has('date')) {
            $query->whereDate('examination_datetime', $request->input('date'));
        }

        $queues = $query->paginate(10);

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

    public function show(MedicalExaminationQueue $queue)
    {
        return view('queues.show', compact('queue'));
    }

    public function downloadQueue(MedicalExaminationQueue $queue)
    {
        $pdf = PDF::loadView('queues.download', compact('queue'));
        return $pdf->download('Laporan Pemeriksaan.pdf');
    }
}
