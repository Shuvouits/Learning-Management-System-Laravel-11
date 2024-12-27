<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\LectureRequest;
use App\Models\CourseLecture;
use App\Services\instructor\LectureService;
use Illuminate\Http\Request;

class LectureController extends Controller
{

    protected $lectureService;

    public function __construct(LectureService $lectureService)
    {
        $this->lectureService = $lectureService;
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LectureRequest $request)
    {
        $validatedData = $request->validated();

        $this->lectureService->createLecture($validatedData, $request->file('video'));


        return back()->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LectureRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $this->lectureService->updateLecture($validatedData, $request->file('video'), $id);


        return back()->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lecture = CourseLecture::findOrFail($id);

        // Delete associated image if exists
        // Delete the image file if it exists
        if ($lecture->video) {
            $videoPath = public_path(parse_url($lecture->video, PHP_URL_PATH));
            if (file_exists($videoPath)) {
                unlink($videoPath);
            }
        }

        $lecture->delete();

        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}