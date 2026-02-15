@extends('layouts.app')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4">Welcome to Academic Portal</h1>
    <p class="lead">Enrollment System</p>
    
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text">Manage student records</p>
                    <a href="{{ route('students.index') }}" class="btn btn-primary">View Students</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Courses</h5>
                    <p class="card-text">Manage course offerings</p>
                    <a href="{{ route('courses.index') }}" class="btn btn-primary">View Courses</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Enrollment</h5>
                    <p class="card-text">Enroll students in courses</p>
                    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Enroll Student</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
