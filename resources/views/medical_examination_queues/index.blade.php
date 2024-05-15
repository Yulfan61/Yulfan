<!-- resources/views/medical_examination_queues/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="mb-3">
    <form method="GET" action="{{ route('medical_examination_queues.index') }}">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari pasien...">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>
</div>
    <div class="container">
        <h1>Antrean Pemeriksaan Kesehatan</h1>
        <a href="{{ route('medical_examination_queues.create') }}" class="btn btn-primary">Tambah Pasien</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nomor Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Kelamin</th>
                    <th>Alamat</th>
                    <th>Keluhan</th>
                    <th>Perawatan</th>
                    <th>Tanggal Pendaftaran</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($queues as $queue)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $queue->patient_name }}</td>
                        <td>{{ $queue->examination_type }}</td>
                        <td>{{ $queue->gender }}</td>
                        <td>{{ $queue->examination_notes }}</td>
                        <td>{{ $queue->patient_type }}</td>
                        <td>{{ $queue->examination_datetime }}</td>
                        
                        <td>
                        <a href="{{ route('medical_examination_queues.show', $queue->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('medical_examination_queues.edit', $queue) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('medical_examination_queues.destroy', $queue) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
    {{ $queues->links() }}
</div>
@endsection
