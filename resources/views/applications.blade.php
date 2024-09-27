@extends('layouts.userMain')

@section('content')
<div class="container d-flex flex-column min-vh-100"> <!-- Added Flexbox properties -->
    <div class="flex-grow-1"> <!-- This div allows the content to grow -->
        @if($applications->isEmpty())
        <p>You haven't applied for any internships yet.</p>
        @else
        <div class="row">
            @foreach($applications as $application)
            <div class="col-md-4">
                <div class="card mb-4" style="height: 350px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div class="card-header">
                        @if($application->internship)
                        <h4>{{ $application->internship->title }}</h4>
                        @else
                        <h4>Internship No longer Available</h4>
                        @endif
                    </div>
                    <div class="card-body" style="flex-grow: 1; overflow-y: auto;">
                        @if($application->internship)
                        <p><strong>Company:</strong> {{ $application->internship->company_name }}</p>
                        <p><strong>Location:</strong> {{ $application->internship->location }}</p>
                        @else
                        <p>The details of the internship are not available anymore.</p>
                        @endif
                        <p><strong>Applied On:</strong> {{ $application->created_at->format('d M, Y') }}</p>
                    </div>
                    <div class="card-footer text-center">
                        @if($application->cv)
                        <a href="{{ asset('storage/' . $application->cv) }}" class="btn btn-info" target="_blank">View CV</a>
                        @else
                        <p>No CV submitted</p>
                        @endif

                        @if($application->internship)
                        <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <!-- Footer -->
    
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this application? This action cannot be undone.");
}
</script>
@endsection
