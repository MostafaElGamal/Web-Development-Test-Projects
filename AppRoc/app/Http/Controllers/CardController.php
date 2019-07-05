<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Card\UpdateRequest;
use App\Http\Requests\Card\StoreRequest;

use App\Lists;
use App\Card;


class CardController extends Controller
{
  



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $card = Card::create([
            'title' => $request->title,
            'content' => $request->content,
            'lists_id' => 1,
            'user_id' => 1
        ]);
        return redirect()->back();
    }

    
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Card $card)
    {
        $card->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return response()->json($card);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return response("Deleted");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function dragUpdate(Request $request, Card $card, $list_id)
    {
        $card->update([
            'lists_id'=> $list_id
        ]);
        return response()->json($card);
 
    }
}
