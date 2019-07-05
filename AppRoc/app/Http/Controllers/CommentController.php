<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Comment;
use App\User;
use App\Notifications\CreateComment;

class CommentController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('JWT', ['except' => ['index'] ]);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Card $card)
    {
        return Response ()->json($card->comments->all());
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Card $card)
    {
        $comment = $card->comments()->create([
            'content'=>$request->content,
            'card_id'=>$card->id,
            'user_id'=> 1,
            ]);

        $user = $card->user;
        $user -> notify(new CreateComment($comment));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card, Comment $comment)
    {
        $comment->update([
            'content'=>$request->content,
        ]);

        return Response (['comment' => $comment]); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card, Comment $comment)
    {
        $comment->delete();
        return  Response ('Deleted'); 
    }
}
