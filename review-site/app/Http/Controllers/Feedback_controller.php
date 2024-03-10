<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;

class Feedback_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $feedbacks = Feedback::all();
        return view('admin/feedback.adminFeedback', ['feedbacks' => $feedbacks]);
    }

    public function store(FeedbackRequest $request): \Illuminate\Http\RedirectResponse
    {
        Feedback::create($request->all());
        return redirect()->route('main.index')->with('success', 'Feedback created successfully.');
    }

    public function read($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $feedback = Feedback::find($id);
        return view('admin/feedback.adminFeedbackRead', ['feedback' => $feedback]);
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully');
    }
}
