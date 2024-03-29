<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class Review_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(6);
        $reviews->withPath('/admin/reviews');
        foreach ($reviews as $review){
            $author = User::where('id', $review->user_id)->first()->username;
            $review->author = $author;
        }
        return view('admin/reviews.adminReviews', ['reviews' => $reviews]);
    }

    public function getReviewsBySearch(\Illuminate\Http\Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $date_from = date('Y-m-d', strtotime($request->date_from ?? "2021-01-01")) . ' 00:00:00';
        $date_to = date('Y-m-d', strtotime($request->date_to ?? date('Y-m-d'))) . ' 23:59:59';
        $user_id = User::where('username', $request->search)->first()->id ?? -1;

        $reviews = Review::where(function($query) use ($request, $user_id) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('user_id', $user_id);
            })
            ->whereBetween('created_at', [$date_from, $date_to])
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        foreach ($reviews as $review){
            $author = User::where('id', $review->user_id)->first()->username;
            $review->author = $author;
        }
        $reviews->withPath('?search=' . $request->search . '&date_from=' . $request->date_from . '&date_to=' . $request->date_to);
        return view('admin/reviews.adminReviews', ['reviews' => $reviews]);
    }

    public function store(ReviewRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Review::create($request->all());
        return redirect(route('shop.index', $request->shop_id));
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $review = Review::find($id);
        $author = User::where('id', $review->user_id)->first()->username;
        $review->author = $author;
        return view('admin/reviews.editReview', ['review' => $review]);
    }

    public function update(ReviewRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $review = Review::find($id);
        $review->update($request->all());
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully');
    }

}
