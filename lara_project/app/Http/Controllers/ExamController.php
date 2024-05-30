<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AuthMiddleware;
use App\Models\Book;
use App\Models\Exam;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Polyfill\Intl\Idn\Idn;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function __construct()
    {
        // $this->middleware(AuthMiddleware::class);
        // $this->middleware('MyAuth');

    }

    public function index()
    {
        $exams = Exam::all(); // Retrieve all exams from the database
        return view('exams.index', compact('exams'));
        // Pass exams data to the 'exams.index' view    }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return "Create";
        return view("exams.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $validate = $request->validate([
                'title' => 'required|string|max:25',
                'description' => 'required|string|max:500',
                'image' => 'required', // Example validation rules
                // Add validation rules for other fields as needed
            ]);


            $image = $request->file('image');

            // Generate a unique filename for the image
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Store the image in the public folder
            $image->move(public_path('storage'), $filename);

            // $path = $request->file('image')->store('images', 'public');


            $exam = new Exam();
            $exam->title = $request->title;
            $exam->description = $request->description;
            $exam->image = $filename;
            $exam->save();

            // Redirect to the index page or show success message
            // return redirect()->route('exam.index')->with('success', 'Exam created successfully.');
            return redirect()->back()->with('success', 'Exam created successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view("exams.show", compact("exam"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'exam_name' => 'required|string|max:255',
            'exam_date' => 'required|date',
            'duration' => 'required|integer|min:1',
        ]);

        $exam = Exam::findOrFail($exam->id);
        $exam->update($request->all());

        return redirect()->back()->with('success', 'Exam updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroye($id)
    {

        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('exam.index')->with('success', 'Exam deleted successfully.');

    }
}
