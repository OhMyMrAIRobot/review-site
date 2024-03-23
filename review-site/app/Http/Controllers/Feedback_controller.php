<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;

class Feedback_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->paginate(6);
        $feedbacks->withPath('/admin/feedback');
        return view('admin/feedback.adminFeedback', ['feedbacks' => $feedbacks]);
    }

    public function getFeedbackBySearch(\Illuminate\Http\Request $request)
    {
        $date_from = date('Y-m-d', strtotime($request->date_from ?? "2021-01-01")) . ' 00:00:00';
        $date_to = date('Y-m-d', strtotime($request->date_to ?? date('Y-m-d'))) . ' 23:59:59';
        $feedbacks = Feedback::where(function($query) use ($request) {
            $query->where('description', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        })
            ->whereBetween('created_at', [$date_from, $date_to])
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        $feedbacks->withPath('?search=' . $request->search . '&date_from=' . $request->date_from . '&date_to=' . $request->date_to);
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
