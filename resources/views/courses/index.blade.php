@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>All Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Capacity</th>
            <th>Enrolled</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->course_code }}</td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->capacity }}</td>
            <td>{{ $course->students->count() }}</td>
            <td>
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection