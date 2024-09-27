@extends('layouts.userMain')

@section("content")


<div class="container mt-5" style="max-width: 90%;"> <!-- Increased width -->

    <!-- Filter Form -->
    <form action="{{ route('search.internships') }}" method="GET" class="mb-4">
        <div class="row">
            <!-- Location Filter -->
            <div class="col-md-4">
                <label for="location"><b>Location</b></label>
                <select name="location" id="location" class="form-control">
                    <option value="">-- Any Location --</option>
                    @foreach($locations as $location)
                    <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                        {{ $location }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Work Type Filter -->
            <div class="col-md-4">
                <label for="work_type"><b>Work Type</b></label>
                <select name="work_type" id="work_type" class="form-control">
                    <option value="">-- Any Work Type --</option>
                    @foreach($workTypes as $workType)
                    <option value="{{ $workType }}" {{ request('work_type') == $workType ? 'selected' : '' }}>
                        {{ $workType }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Job Type Filter -->
            <div class="col-md-4">
                <label for="job_type"><b>Part Time/Full time</b></label>
                <select name="job_type" id="job_type" class="form-control">
                    <option value="">-- Any Type --</option>
                    @foreach($jobTypes as $jobType)
                    <option value="{{ $jobType }}" {{ request('job_type') == $jobType ? 'selected' : '' }}>
                        {{ $jobType }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-secondary">Filter Internships</button>
            </div>
        </div>
    </form>

    <!-- Internship List -->
    <div class="row" id="internshipList">
        @foreach($internships as $internship)
        <div class="col-md-4 mb-4">
            <div class="card" style="height: 100%;"> <!-- Fixed height -->
                <div class="card-body">
                    <h5 class="card-title">{{ $internship->title }}</h5>
                    <p class="card-text">{{ $internship->short_description }}</p>
                    <div class="icon-text">
                        <i class="fas fa-clock"></i>
                        <span class="text-muted">{{ $internship->deadline }}</span>
                    </div>
                    <div class="icon-text">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="text-muted">{{ $internship->location }}</span>
                    </div>
                    <div class="icon-text">
                        <i class="fas fa-briefcase"></i>
                        <span class="text-muted">{{ $internship->work_type }}</span>
                    </div>
                    <a href="{{ route('internship.more', $internship->id) }}" class="btn btn-primary mt-3">Apply Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection