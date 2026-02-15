@extends('layouts.app')

@section('content')
<h1>Add New Course</h1>

<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label class="form-label">Course Code</label>
        <input type="text" name="course_code" class="form-control @error('course_code') is-invalid @enderror" value="{{ old('course_code') }}">
        @error('course_code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Course Name</label>
        <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{ old('course_name') }}">
        @error('course_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Capacity</label>
        <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity') }}">
        @error('capacity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create Course</button>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection