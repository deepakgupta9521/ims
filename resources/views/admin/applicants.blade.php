@extends('layouts.adminMain')
@section('content')
<div class="container mt-5">
    <!-- Sorting Form -->
    <div class="col-md-12 d-flex justify-content-end">
        <form method="GET" action="{{ route('my.applicants') }}" class="d-flex align-items-center">
            <label for="sortBy" class="mb-0 mr-2" style="font-size: 1.3rem; white-space: nowrap;"><b>Sort By:</b> </label>
            <select name="sortBy" id="sortBy" class="form-control" style="max-width: 200px;" onchange="this.form.submit()">
                <option value="created_at_desc" {{ request('sortBy') === 'created_at_desc' ? 'selected' : '' }}>Newest First</option>
                <option value="created_at_asc" {{ request('sortBy') === 'created_at_asc' ? 'selected' : '' }}>Oldest First</option>
            </select>
        </form>
    </div>
    <br>

    @if($applications->isEmpty())
    <p>No applications for this internship yet.</p>
    @else
    <div class="row">
        @foreach($applications as $application)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>{{ $application->internship->title }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Company:</strong> {{ $application->internship->company_name }}</p>
                    <p><strong>Location:</strong> {{ $application->internship->location }}</p>
                    <p><strong>Applied On:</strong> {{ $application->created_at->format('d M, Y') }}</p>

                    <!-- Check if the CV file exists and display the link -->
                    @if($application->cv)
                    <div class="d-flex justify-content-between">
                        <a href="{{ asset('storage/' . $application->cv) }}" class="btn btn-info" target="_blank">View CV</a>
                        <!-- Delete Button -->
                        <form action="{{ route('application.delete', $application->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                    @else
                    <p>No CV submitted</p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection