<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Like;
use DB;
use Auth;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voteUp(Request $request)
    {
        $user_id = Auth::User()->id;
        $post_id = $request->post_id;
        $check = Like::where('user_id', $user_id)->where('post_id', $post_id)->get();

        if(count($check) > 0){
            $check[0]->delete();
            return 0;
        }       
        else{
            $likes = new Like();
            $likes->post_id = $post_id;
            $likes->user_id = Auth::User()->id;
            $likes->save();
        }
        return $post_id; // any value return as a response 
    }
    
    public function check_likes(Request $request)
    {
        $post_id = $request->post_id;
        $no_likes = Like::where('post_id', $post_id)->count();
        return  $no_likes;
    }

    public function getLike(Request $request){
        
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
