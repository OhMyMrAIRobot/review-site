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
        $reviews = Review::orderBy('created_at', 'desc')->get();
        foreach ($reviews as $review){
            $author = User::where('id', $review->user_id)->first()->username;
            $review->author = $author;
        }
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

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully');
    }

}
