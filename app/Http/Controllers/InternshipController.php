<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Internship;
use App\Models\Application;
use App\Models\Category;


class InternshipController extends Controller
{
    private function mergeSort(array $array, string $key): array
    {
        if (count($array) <= 1) {
            return $array;
        }

        $mid = count($array) / 2;
        $left = $this->mergeSort(array_slice($array, 0, $mid), $key);
        $right = $this->mergeSort(array_slice($array, $mid), $key);

        return $this->merge($left, $right, $key);
    }

    private function merge(array $left, array $right, string $key): array
    {
        $sorted = [];
        $i = $j = 0;

        while ($i < count($left) && $j < count($right)) {
            if (strcasecmp($left[$i][$key], $right[$j][$key]) < 0) {
                $sorted[] = $left[$i++];
            } else {
                $sorted[] = $right[$j++];
            }
        }

        while ($i < count($left)) {
            $sorted[] = $left[$i++];
        }

        while ($j < count($right)) {
            $sorted[] = $right[$j++];
        }

        return $sorted;
    }
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function services()
    {
        return view('services');
    }


    public function community()
    {
        return view('community');
    }

    public function view()
    {
        return view('form');
    }

    public function home()
    {
        return view('home');
    }
    //
    public function create()
    {
        $categories = Internship::all(); // Adjust the model name to your actual category model
        return view('admin.form', compact('categories'));
    }
    //VIEW ALL INTERNSHIPS FOR USERS
    // app/Http/Controllers/InternshipController.php


    public function searchInternships(Request $request)
    {
        // Fetch filter options dynamically from the database
        $locations = Internship::select('location')->distinct()->pluck('location');
        $workTypes = Internship::select('work_type')->distinct()->pluck('work_type');
        $jobTypes = Internship::select('job_type')->distinct()->pluck('job_type');

        // Apply filters based on user input
        $query = Internship::query();

        // Apply search by title or company name
        if ($request->filled('query')) {
            $queryString = $request->input('query'); // Use input() method to retrieve the query string
            $query->where(function ($q) use ($queryString) {
                $q->where('title', 'LIKE', '%' . $queryString . '%')
                    ->orWhere('company_name', 'LIKE', '%' . $queryString . '%');
            });
        }

        // Apply filters
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('work_type')) {
            $query->where('work_type', $request->work_type);
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }

        // Fetch internships based on filters
        $internships = $query->get();

        // Pass internships and filter options to the view
        return view('internships', [
            'internships' => $internships,
            'locations' => $locations,
            'workTypes' => $workTypes,
            'jobTypes' => $jobTypes
        ]);
    }




    //VIEW INTERNSHIP DETAIL BY USERS
    public function internshipMore($id)
    {
        $internship = Internship::findOrFail($id);

        // Find similar internships based on company name and title
        $similarInternships = Internship::where('id', '!=', $id)
            ->where(function ($query) use ($internship) {
                $query->where('company_name', $internship->company_name)
                    ->orWhere('title', 'LIKE', '%' . $internship->title . '%');
            })
            ->get();

        // Sort similar internships using Merge Sort
        $sortedSimilarInternships = $this->mergeSort($similarInternships->toArray(), 'title');

        return view('details', compact('internship', 'sortedSimilarInternships'));
    }
    // VIEW INTERNSHIP DETAIL BY ADMIN
    public function internshipDetail($id)
    {
        // Fetch the internship by ID
        $internship = Internship::findOrFail($id);

        // Pass the internship data to the view
        return view('admin.detailed', compact('internship'));
    }

    // STORE INTERNSHIPS
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'short_description' => 'required|string|max:500',
            'deadline' => 'required|date',
            'location' => 'required|string|max:255',
            'work_type' => 'required|in:Remote,Onsite',
            'job_type' => 'required|in:Full Time,Part Time',
            'duration' => 'required|string|max:255',
            'salary' => 'nullable|string|max:255',
            'job_description' => 'required|string',
            'responsibilities' => 'required|string',

        ]);

        // Create and store the internship
        Internship::create([
            'admin_id' => Auth::id(),  // Assuming the authenti cated user is an admin
            'title' => $validatedData['title'],
            'company_name' => $validatedData['company_name'],
            'email' => $validatedData['email'],
            'short_description' => $validatedData['short_description'],
            'deadline' => $validatedData['deadline'],
            'location' => $validatedData['location'],
            'work_type' => $validatedData['work_type'],
            'job_type' => $validatedData['job_type'],
            'duration' => $validatedData['duration'],
            'salary' => $validatedData['salary'],
            'job_description' => $validatedData['job_description'],
            'responsibilities' => $validatedData['responsibilities'],

        ]);

        // Redirect or return a response
        return redirect()->route('admin.index')->with('success', 'Internship created successfully!');
    }

    // EDIT INTERNSHIP
    public function edit($id)
    {
        // Fetch the internship by ID
        $internship = Internship::findOrFail($id);

        // Pass the internship data to the edit form view
        return view('admin.edit', compact('internship'));
    }

    //UPDATE INTERNSHIPS
    public function update(Request $request, $id)
    {
        // Validate the form inputs
        $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'short_description' => 'required|string',
            'deadline' => 'required|date',
            'location' => 'required|string|max:255',
            'work_type' => 'required|string|in:Remote,Onsite',
            'job_type' => 'required|string|in:Full Time,Part Time',
            'duration' => 'required|string|max:100',
            'salary' => 'nullable|string|max:100',
            'job_description' => 'required|string',
            'responsibilities' => 'required|string',

        ]);

        // Find the internship by ID
        $internship = Internship::findOrFail($id);

        // Update the internship data
        $internship->update($request->all());

        // Redirect back to the admin dashboard or a confirmation page
        return redirect()->route('admin.index', $internship->id)->with('success', 'Internship updated successfully!');
    }

    //Delete internshipsS
    public function destroy($id)
    {
        // Find the internship by its ID
        $internship = Internship::findOrFail($id);

        // Soft delete the internship
        $internship->delete();

        // Redirect or return a response
        return redirect()->route('admin.index')->with('deleted', 'Internship deleted successfully!');
    }

    //SUBMIT CV
    public function applyWithCv(Request $request, $id)
    {
        // Validate the file
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',  // Allow only PDF, DOC, DOCX files
        ]);

        // Get the internship
        $internship = Internship::findOrFail($id);

        // Get the current authenticated user
        $user = Auth::user();

        // Handle the CV file upload
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('cvs', $fileName, 'public'); // Store in 'public/cvs' directory

            // Store the application in the database
            Application::create([
                'internship_id' => $internship->id,
                'user_id' => $user->id,
                'cv' => $filePath,
            ]);

            return redirect()->back()->with('success', 'Application submitted successfully!');
        }

        return redirect()->back()->with('error', 'CV upload failed!');
    }

    //VIEW MY APPLICATION
    public function myApplications()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Fetch all applications belonging to the logged-in user
        $applications = Application::where('user_id', $userId)->with('internship')->get();

        return view('applications', compact('applications'));
    }

    //DELETE MY APPLICATION
    public function destroyApplication($id)
    {
        // Find the application by ID and delete it
        $application = Application::findOrFail($id);

        // Delete the application
        $application->delete();

        // Redirect back with a success message
        return redirect()->route('applications.my')->with('success', 'Application deleted successfully.');
    }

    public function showMyApplications(Request $request)
    {
        // Get the current authenticated admin
        $adminId = Auth::id();

        // Get all internships posted by this admin
        $internships = Internship::where('admin_id', $adminId)->get();

        // Get all applications for these internships
        $query = Application::whereIn('internship_id', $internships->pluck('id'));

        // Handle sorting
        if ($request->has('sortBy')) {
            $sortBy = $request->get('sortBy');
            if ($sortBy === 'created_at_desc') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sortBy === 'created_at_asc') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $applications = $query->get();

        return view('admin.applicants', compact('applications'));
    }

    public function deleteApplication($id)
    {
        $application = Application::findOrFail($id);

        // Delete the application
        $application->delete();

        return redirect()->route('my.applicants')->with('success', 'Application deleted successfully!');
    }
}
