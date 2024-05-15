<!-- resources/views/emails/medical_examination_queue.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Antrean Pemeriksaan Medis Baru</title>
</head>
<body>
    <h1>Antrean Pemeriksaan Medis Baru</h1>
    <p>Nama Pasien: {{ $queue->patient_name }}</p>
    <p>Tipe Pemeriksaan: {{ $queue->examination_type }}</p>
    <p>Catatan Pemeriksaan: {{ $queue->examination_notes }}</p>
    <p>Tipe Pasien: {{ $queue->patient_type }}</p>
    <p>Tanggal dan Waktu Pemeriksaan: {{ \Carbon\Carbon::parse($queue->examination_datetime)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>
</body>
</html>
