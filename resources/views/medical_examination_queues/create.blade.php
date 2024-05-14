@extends('layouts.app')

@section('title', 'Create Medical Examination Queue')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Medical Examination Queue</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('medical_examination_queues.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="patient_name" class="form-label">Patient Name</label>
                            <input type="text" class="form-control" id="patient_name" name="patient_name" value="{{ old('patient_name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="examination_type" class="form-label">Examination Type</label>
                            <input type="text" class="form-control" id="examination_type" name="examination_type" value="{{ old('examination_type') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="examination_notes" class="form-label">Examination Notes</label>
                            <textarea class="form-control" id="examination_notes" name="examination_notes">{{ old('examination_notes') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="patient_type" class="form-label">Patient Type</label>
                            <select class="form-select" id="patient_type" name="patient_type" required>
                                <option value="rawat jalan" {{ old('patient_type') == 'rawat jalan' ? 'selected' : '' }}>Rawat Jalan</option>
                                <option value="rawat inap" {{ old('patient_type') == 'rawat inap' ? 'selected' : '' }}>Rawat Inap</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="examination_datetime" class="form-label">Examination Date and Time</label>
                            <input type="datetime-local" class="form-control" id="examination_datetime" name="examination_datetime" value="{{ old('examination_datetime') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
