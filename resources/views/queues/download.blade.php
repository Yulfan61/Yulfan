<!-- resources/views/medical_examination_queues/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Detail Pemeriksaan Medis</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Detail Pemeriksaan Medis</h1>
    <p>Nama Pasien: {{ $queue->patient_name }}</p>
    <p>Tipe Pemeriksaan: {{ $queue->examination_type }}</p>
    <p>Catatan Pemeriksaan: {{ $queue->examination_notes }}</p>
    <p>Tipe Pasien: {{ $queue->patient_type }}</p>
    <p>Tanggal dan Waktu Pemeriksaan: {{ \Carbon\Carbon::parse($queue->examination_datetime)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>
    <div>{!! DNS2D::getBarcodeHTML((string) $queue->id, 'QRCODE', 3, 3) !!}</div>
</body>
</html>
