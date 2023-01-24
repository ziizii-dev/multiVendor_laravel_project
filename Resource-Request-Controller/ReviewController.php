<?php

namespace App\Http\Controllers\Mobile\User\V1\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\User\V1\ReviewRequest;
use App\Http\Resources\Mobile\User\V1\ReviewResource;
use App\Models\Review;
use App\Traits\ReviewTraits;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        $validated = $request->validated();

        $exists = Review::where([
            ['business_id', $validated['business_id']],
            ['user_id', $validated['user_id']]
        ])->exists();

        if ($exists) {
            return response()->json([
                'error' => true,
                'authorized' => true,
                'message' => 'You already reviewed'
            ]);
        }

        return new ReviewResource(Review::create($validated));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}