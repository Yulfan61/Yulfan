<?php

// app/Mail/MedicalExaminationQueueCreated.php

namespace App\Mail;

use App\Models\MedicalExaminationQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MedicalExaminationQueueCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $queue;

    public function __construct(MedicalExaminationQueue $queue)
    {
        $this->queue = $queue;
    }

    public function build()
    {
        return $this->subject('Pendaftaran Pemeriksaan Berhasil')
                    ->view('emails.medical_examination_queue_created');
    }
}
