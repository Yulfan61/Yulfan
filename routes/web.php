<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalExaminationQueueController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('auth/login');
});

// Route untuk menampilkan daftar antrian pemeriksaan
Route::get('/medical-examination-queues', [MedicalExaminationQueueController::class, 'index'])->name('medical_examination_queues.index');

// Route untuk menampilkan form tambah antrian pemeriksaan
Route::get('/medical-examination-queues/create', [MedicalExaminationQueueController::class, 'create'])->name('medical_examination_queues.create');

// Route untuk menyimpan data antrian pemeriksaan baru
Route::post('/medical-examination-queues', [MedicalExaminationQueueController::class, 'store'])->name('medical_examination_queues.store');

// Route untuk menampilkan form edit antrian pemeriksaan
Route::get('/medical-examination-queues/{queue}/edit', [MedicalExaminationQueueController::class, 'edit'])->name('medical_examination_queues.edit');

// Route untuk menyimpan perubahan pada antrian pemeriksaan
Route::put('/medical-examination-queues/{queue}', [MedicalExaminationQueueController::class, 'update'])->name('medical_examination_queues.update');

// Route untuk menghapus antrian pemeriksaan
Route::delete('/medical-examination-queues/{queue}', [MedicalExaminationQueueController::class, 'destroy'])->name('medical_examination_queues.destroy');

Route::get('medical_examination_queues/{queue}', [MedicalExaminationQueueController::class, 'show'])->name('medical_examination_queues.show');
Route::get('/queues/{queue}/download', [MedicalExaminationQueueController::class, 'downloadQueue'])->name('downloadQueue');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

