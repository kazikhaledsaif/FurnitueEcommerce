<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviewing(Request $request){
        $pid = $request->input('pid');
        $uid = $request->input('uid');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $rating = $request->input('rating');
        $review = $request->input('comment');
        $created_at = $request->input('created_at');
        $updated_at = $request->input('updated_at');

        DB::table('reviews')->insertGetId([
            'pid'=>$pid,
            'uid'=>$uid,
            'rating'=>$rating,
            'comment'=>$review,
            'fname' => $fname,
            'lname' => $lname

//            'created_at'=>$created_at,
//            'updated_at'=>$updated_at

        ]);
        return \Redirect::back()->with('success', 'Thank you for reviewing us.');

    }


    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
