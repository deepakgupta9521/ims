@extends('layouts.adminMain')

@section("content")
<div class="container">
    <!-- Create Internship Button at the top -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="text-center" style="color: #333;">Create Internship</h2>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('internships.store') }}" method="POST" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Internship Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Company Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <input type="text" class="form-control" id="short_description" name="short_description" maxlength="50" required>
            <small class="form-text text-muted">Maximum 50 characters.</small>
        </div>
        

        <div class="mb-3">
            <label for="deadline" class="form-label">Application Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <div class="mb-3">
            <label for="work_type" class="form-label">Work Type</label>
            <select class="form-select" id="work_type" name="work_type" required>
                <option value="Remote">Remote</option>
                <option value="Onsite">Onsite</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="job_type" class="form-label">Job Type</label>
            <select class="form-select" id="job_type" name="job_type" required>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration in days</label>
            <input type="text" class="form-control" id="duration" name="duration" min="5" max="365" required>
            
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary">
        </div>

        <div class="mb-3">
            <label for="job_description" class="form-label">Job Description</label>
            <textarea class="form-control" id="job_description" name="job_description" rows="4" maxlength="255"required></textarea>
            <small class="form-text text-muted">Maximum 50 characters.</small>
            
        </div>

        <div class="mb-3">
            <label for="responsibilities" class="form-label">Responsibilities</label>
            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4"maxlength="255" required></textarea>
        </div>
        

        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('deadline').setAttribute('min', today); 
       
    });
</script>

@endsection