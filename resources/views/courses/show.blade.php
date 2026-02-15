@extends('layouts.app')

@section('content')
<h1>Course Details</h1>

<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">{{ $course->course_name }}</h5>
        <p><strong>Course Code:</strong> {{ $course->course_code }}</p>
        <p><strong>Capacity:</strong> {{ $course->capacity }}</p>
        <p><strong>Enrolled Students:</strong> {{ $course->students->count() }}</p>
    </div>
</div>

<h3>Enrolled Students</h3>
@if($course->students->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Student Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Enrolled On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course->students as $student)
            <tr>
                <td>{{ $student->student_number }}</td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->pivot->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No students enrolled yet.</p>
@endif

<a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
@endsection