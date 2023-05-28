<?php

namespace App\Http\Controllers;

//Requests
use App\Http\Requests\ReviewStoreRequest;
//Resources
use App\Http\Resources\ReviewResource;
//Models
use App\Models\Review;
use App\Models\Room;
//Traits
use App\Http\Traits\HttpResponses;
//Libraries
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{

    use HttpResponses;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ReviewResource::collection(
            Review::where('user_id', Auth::user()->id)->get()
        );
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
    public function store(Room $room, ReviewStoreRequest $request)
    {
        $data = $request->validated();

        $review = DB::transaction(function() use ($room, $data){
            $review = Review::create([
                "user_id" => Auth::user()->id,
                "room_id" => $room->id,
                "rate" => $data["rate"],
                "comment" => $data["comment"]
    
            ]);
    
            $reviews = $room->reviews()->select(DB::raw('count(*) as review_count, avg(rate) as avg'))->get()->first();
            $room->update(['avg_reviews'=> $reviews->avg, 
                            'count_reviews'=> $reviews->review_count
                        ]);
            return $review;
        });
        return new ReviewResource($review);
      

    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        if(Auth::user()->id !== $review->user_id){
            return $this->onError(403,'You are not authorized to make this request');
        }
        return new ReviewResource($review);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewStoreRequest $request, Review $review)
    {
        if(Auth::user()->id !== $review->user_id){
            return $this->onError(403,'You are not authorized to make this request');
        }

        $data = $request->validated();

        $updatedReview = DB::transaction(function() use ($review, $data){
            $review->update($data);
    
            $reviews = $review->room->reviews()->select(DB::raw('count(*) as review_count, avg(rate) as avg'))->get()->first();
            $review->room->update(['avg_reviews'=> $reviews->avg, 
                            'count_reviews'=> $reviews->review_count
                        ]);
            return $review;
        });
        return new ReviewResource($updatedReview);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
