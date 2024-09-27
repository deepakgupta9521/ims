@extends('layouts.adminMain')

@section("content")
<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @elseif(session('deleted'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deleted') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row mb-4">
        <!-- Create Internship Button -->
        <div class="col-md-6 d-flex justify-content-start mb-3 mb-md-0">
            <a href="{{ route('internships.create') }}" class="btn btn-success" style="font-weight: bold;">Create Internship</a>
        </div>

        <!-- Search Form -->
        <div class="col-md-6 d-flex justify-content-end">
            <form action="{{ route('admin.index') }}" method="GET" class="d-flex align-items-center" style="max-width: 300px;">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control me-2" placeholder="Search internships">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <!-- Internship List -->
    <div class="container mt-5">
        <div class="row">
            @forelse($internships as $internship)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $internship->title }}</h5>
                        <p class="card-text">{{ $internship->short_description }}</p>

                        <!-- Internship Details -->
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-clock me-2"></i>
                            <span class="text-muted">Deadline: {{ $internship->deadline }}</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span class="text-muted">{{ $internship->location }}</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-briefcase me-2"></i>
                            <span class="text-muted">{{ $internship->work_type }}</span>
                        </div>

                        <!-- Action Icons -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('internship.detail', ['id' => $internship->id]) }}" class="me-3" title="View Details">
                                <i class="fas fa-eye text-primary"></i>
                            </a>
                            <a href="{{ route('internship.edit', ['id' => $internship->id]) }}" class="me-3" title="Edit">
                                <i class="fas fa-edit text-warning"></i>
                            </a>
                            <!-- Delete Button with Confirmation -->
                            <form class="delete-form" action="{{ route('internships.destroy', $internship->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-link p-0 delete-btn" title="Delete">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    No internships available at the moment.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500,
        background: '#d4edda', // Light green background
        iconColor: '#155724' // Dark green icon
    });
</script>
@elseif(session('deleted'))
<script>
    Swal.fire({
        icon: 'error', // Red icon
        title: 'Deleted!',
        text: "{{ session('deleted') }}",
        showConfirmButton: false,
        timer: 1500,
        background: '#f8d7da', // Light red background
        iconColor: '#721c24' // Dark red icon
    });
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default form submission

            const form = this.closest('form'); // Find the closest form element

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });
    });
</script>
@endsection
