@extends('layouts.userMain')

@section('content')
<div class="container" style="padding-bottom: 100px;">
    <div class="row">
        <!-- Internship Details Section -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3>{{ $internship->title }}</h3>
                    <h5>Offered By: {{ $internship->company_name }} | {{ $internship->location }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Left column with icons and details -->
                        <div class="col-md-6">
                            <div class="icon-text">
                                <i class="fas fa-dollar-sign"></i>
                                <span><b>Salary: </b>Rs.{{ $internship->salary }}</span>
                            </div>
                            <div class="icon-text">
                                <i class="fas fa-laptop-house"></i>
                                <span><b>Work Type:</b> {{ $internship->work_type }}</span>
                            </div>
                            <div class="icon-text">
                                <i class="fas fa-level-up-alt"></i>
                                <span><b>Type:</b> {{ $internship->job_type }}</span>
                            </div>
                            <div class="icon-text">
                                <i class="fas fa-hourglass"></i>
                                <span><b>Duration:</b> {{ $internship->duration }}</span>
                            </div>
                            <div class="icon-text">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><b>Location:</b> {{ $internship->location }}</span>
                            </div>
                            <div class="icon-text">
                                <i class="fas fa-envelope"></i>
                                <span><b>Apply at:</b> {{ $internship->email }}</span>
                            </div>
                            <div class="icon-text">
                                <i class="fas fa-calendar-alt"></i>
                                <span><b>Application Ends at: </b> {{ \Carbon\Carbon::parse($internship->deadline)->format('d M Y') }}</span>
                            </div>
                        </div>

                        <!-- Right column for job description and responsibilities -->
                        <div class="col-md-6" style="padding-left: 0px; padding-right: 2px;">
                            <p><strong>Job Description:</strong></p>
                            <p>{{ $internship->job_description }}</p>

                            <p><strong>Responsibilities of the Candidate:</strong></p>
                            <ul>
                                @foreach(explode(',', $internship->responsibilities) as $responsibility)
                                <li>{{ trim($responsibility) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Buttons for application -->
                    <div class="mt-3">
                        <a href="mailto:{{ $internship->email }}" class="btn btn-primary">
                            <i class="fas fa-envelope"></i> Apply via Email
                        </a>

                        <a href="#applyWithCvModal" data-toggle="modal" class="btn btn-success">
                            <i class="fas fa-file-alt"></i> Apply with CV
                        </a>

                        <!-- Modal for CV Upload -->
                        <div class="modal fade" id="applyWithCvModal" tabindex="-1" role="dialog" aria-labelledby="applyWithCvLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="applyWithCvLabel">Apply with CV</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('internship.apply', $internship->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="cv">Upload Your CV (PDF, DOC, DOCX):</label>
                                                <input type="file" name="cv" id="cv" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit Application</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Internships Section -->
        <div class="col-md-4">
            <h4>Recommended Internships</h4>
            @foreach($sortedSimilarInternships as $similar)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $similar['title'] }}</h5>
                    <p class="card-text">{{ $similar['short_description'] }}</p>
                    <p>{{ $similar['company_name'] }} | {{ $similar['location'] }}</p>
                    <a href="{{ route('internship.more', $similar['id']) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Include SweetAlert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script>
    @if(session('success'))
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "OK",
        });
    @endif
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
