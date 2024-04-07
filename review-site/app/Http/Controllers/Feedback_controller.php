<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\sendMailRequest;
use App\Mail\DemoEmail;
use App\Models\Feedback;
use http\Env\Request;
use Illuminate\Support\Facades\Mail;

class Feedback_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->paginate(10);
        $feedbacks->withPath('/admin/feedback');
        return view('admin/feedback.adminFeedback', ['feedbacks' => $feedbacks]);
    }

    public function reply($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $feedback = Feedback::find($id);
        return view('admin/feedback.adminFeedbackReply', ['feedback' => $feedback]);
    }

    public function send(sendMailRequest $request): \Illuminate\Http\RedirectResponse
    {
        $objDemo = new \stdClass();
        $objDemo->title = $request->title;
        $objDemo->text = $request->text;
        $objDemo->sender = $request->sender;
        $objDemo->receiver = $request->email;
        $result = Mail::to($request->email)->send(new DemoEmail($objDemo));

        if ($result) {
            return redirect()->route('feedback.index')->with('status_ok', 'Message sent successfully!');
        } else {
            return redirect()->back()->with('status_err', 'Something went wrong! Please try again!');
        }
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
            ->paginate(10);

        $feedbacks->withPath('?search=' . $request->search . '&date_from=' . $request->date_from . '&date_to=' . $request->date_to);
        return view('admin/feedback.adminFeedback', ['feedbacks' => $feedbacks]);
    }

    public function store(FeedbackRequest $request): \Illuminate\Http\RedirectResponse
    {
        Feedback::create($request->all());
        return redirect()->back()->with('success', 'Feedback created successfully.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect()->back()->with('status_ok', 'Feedback deleted successfully');
    }
}
