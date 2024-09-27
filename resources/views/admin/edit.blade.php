@extends('layouts.adminMain')

@section("content")
<div class="container">
    <!-- Edit Internship Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center" style="color: #333;">Edit Internship</h2>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('internship.update', $internship->id) }}" method="POST" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT') <!-- Use PUT method for updates -->

        <div class="mb-3">
            <label for="title" class="form-label">Internship Title</label>
            <input type="text" class="form-control" id="title" name="title" maxlength="50"  value="{{ old('title', $internship->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $internship->company_name) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Company Email</label>
            <input type="email" class="form-control" id="email" name="email"  value="{{ old('email', $internship->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <input type="text" class="form-control" id="short_description" name="short_description" maxlength="50" value="{{ old('short_description', $internship->short_description) }}" required>
            <small class="form-text text-muted">Maximum 50 characters.</small>
        </div>
        

       

        <div class="mb-3">
            <label for="deadline" class="form-label">Application Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline', $internship->deadline) }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $internship->location) }}" required>
        </div>

        <div class="mb-3">
            <label for="work_type" class="form-label">Work Type</label>
            <select class="form-select" id="work_type" name="work_type" required>
                <option value="Remote" {{ old($internship->work_type) == 'Remote' ? 'selected' : '' }}>Remote</option>
                <option value="Onsite" {{ old( $internship->work_type) == 'Onsite' ? 'selected' : '' }}>Onsite</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="job_type" class="form-label">Job Type</label>
            <select class="form-select" id="job_type" name="job_type" required>
                <option value="Full Time" {{ old($internship->job_type) == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                <option value="Part Time" {{ old($internship->job_type) == 'Part Time' ? 'selected' : '' }}>Part Time</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (in days)</label>
            <input type="number" class="form-control" id="duration" name="duration" max="365" min="5" value="{{ old('duration', $internship->duration) }}" required>
            <small class="form-text text-muted">Maximum 365 days.</small>
        </div>
        

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary', $internship->salary) }}">
        </div>

        <div class="mb-3">
            <label for="job_description" class="form-label">Job Description</label>
            <textarea class="form-control" id="job_description" name="job_description" rows="4" required>{{ old('job_description', $internship->job_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="responsibilities" class="form-label">Responsibilities</label>
            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4" required>{{ old('responsibilities', $internship->responsibilities) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Update Internship</button>
    </form>
</div>
@endsection
