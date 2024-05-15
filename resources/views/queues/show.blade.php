
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemeriksaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Detail Pemeriksaan</h1>
        <p>Nama Pasien: {{ $queue->patient_name }}</p>
        <p>Tipe Pemeriksaan: {{ $queue->examination_type }}</p>
        <p>Catatan Pemeriksaan: {{ $queue->examination_notes }}</p>
        <p>Tipe Pasien: {{ $queue->patient_type }}</p>
        <p>Waktu Pemeriksaan: {{ \Carbon\Carbon::parse($queue->examination_datetime)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>

        <div>{!! DNS2D::getBarcodeHTML((string)$queue->id, 'QRCODE', 3, 3) !!}</div>

        <a href="{{ route('downloadQueue', $queue->id) }}" class="btn btn-primary mt-3">Download Info</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
