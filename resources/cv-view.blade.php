@extends('layouts.userMain')

@section('content')
<div class="container mt-5">
    <h1>View CV</h1>
    <div class="card">
        <div class="card-body">
            @if (Str::endsWith($fileUrl, '.pdf'))
            <iframe src="{{ $fileUrl }}" width="100%" height="600px"></iframe>
            @else
            <p>Cannot display the file type. <a href="{{ $fileUrl }}" class="btn btn-success">Download CV</a></p>
            @endif
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Back</a>
</div>
@endsection