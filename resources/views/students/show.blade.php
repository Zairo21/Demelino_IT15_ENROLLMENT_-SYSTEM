@extends('layouts.app')

@section('content')
<h1>Student Profile</h1>

<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">{{ $student->first_name }} {{ $student->last_name }}</h5>
        <p><strong>Student Number:</strong> {{ $student->student_number }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
    </div>
</div>

<h3>Enrolled Courses</h3>
@if($student->courses->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Enrolled On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student->courses as $course)
            <tr>
                <td>{{ $course->course_code }}</td>
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->pivot->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No courses enrolled yet.</p>
@endif

<a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
@endsection