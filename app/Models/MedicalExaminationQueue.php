<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExaminationQueue extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'gender',
        'examination_type',
        'examination_notes',
        'patient_type',
        'examination_datetime'
    ];
}

