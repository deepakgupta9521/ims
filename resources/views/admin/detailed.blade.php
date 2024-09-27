@extends('layouts.adminMain')

@section("content")
<div class="container">
    <div class="row">
       
        <div class="col-md-8">
            <div class="card-detail" style="margin-left: -15px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: none; padding: 20px;">
                    <div>
                        <h4 style="margin-bottom: 5px; font-weight: bold;">{{ $internship->title }}</h4>
                        <p style="margin-bottom: 0; font-family: 'Arial', sans-serif;  color: #555;">Offered by <strong>{{ $internship->company_name }}</strong></p>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
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
                                <span><b>Duration:</b> {{ $internship->duration }} Days</span>
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
                                <span><b>Application Ends at: </b> {{ $internship->deadline }}!</span>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-left: 0px; padding-right: 2px;"> <!-- Left alignment -->
                            <p><strong>Job Description:</strong></p>
                            <p>{{ $internship->job_description }}</p>
                            <p><strong>Responsibilities of the Candidate:</strong></p>
                            <ul>
                                @foreach(explode(',', $internship->responsibilities) as $responsibility)
                                    @php
                                        $responsibility = trim($responsibility);
                                        // If the responsibility does not end with a period, append one
                                        if (!empty($responsibility) && substr($responsibility, -1) !== '.') {
                                            $responsibility .= '.';
                                        }
                                    @endphp
                                    @if(!empty($responsibility))
                                        <li>{{ $responsibility }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->

    </div>
</div>


@endsection