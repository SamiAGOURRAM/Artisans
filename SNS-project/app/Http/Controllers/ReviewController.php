<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Artisan;
use App\Models\Review;

class ReviewController extends Controller
{
    public function getReview(ReviewRequest $request)
    {
        $validated_data = $request->validated();
        $artisanId = $validated_data['artisan_id'];
        // Calculate the mean rating for the specific artisan_id
        $meanRating = Review::where('artisan_id', $artisanId)->avg('rating');
        // Return the mean rating as a response
        $reviewCount = Review::where('artisan_id', $artisanId)->count();

        return response()->json([
        'mean_rating' => $meanRating,
        'review_count' => $reviewCount,
    ]);
    }
    public function create(ReviewRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Create a new review record
        $review = Review::create([
            'user_id' => $validatedData['user_id'],
            'artisan_id' => $validatedData['artisan_id'],
            'rating' => $validatedData['rating'],
            'review_text' => $validatedData['review_text'],
            'date_reviewed' => now()->toDateString(),
        ]);

        // Return a response indicating successful creation
        return response()->json([
            'message' => 'Review created successfully',
            'review' => $review
        ], 201);
    }

    public function update(ReviewRequest $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Find the review record by ID
        $review = Review::findOrFail($id);

        // Update the review record
        $review->update([
            'rating' => $validatedData['rating'],
            'review_text' => $validatedData['review_text'],
        ]);

        // Return a response indicating successful update
        return response()->json([
            'message' => 'Review updated successfully',
            'review' => $review
        ]);
    }

    public function delete($id)
    {
        // Find the review record by ID
        $review = Review::findOrFail($id);

        // Delete the review record
        $review->delete();

        // Return a response indicating successful deletion
        return response()->json([
            'message' => 'Review deleted successfully'
        ]);
    }

    public function getByArtisan($artisanId)
    {
        // Find the artisan by ID
        $artisan = Artisan::findOrFail($artisanId);

        // Retrieve all reviews for the artisan
        $reviews = $artisan->reviews;

        // Return a response with the reviews
        return response()->json([
            'reviews' => $reviews
        ]);
    }
}
