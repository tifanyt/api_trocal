<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Transactions;
use App\Objects;
use App\User;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
      $state = $request->input("state");

      $user = User::find($id);
     
      if(isset($user->id)){

        if($state==null){
          $transactions=Transactions::where('seller_id',$id)->orWhere('buyer_id',$id)->get();
        }
        else{
          $transactions=Transactions::where([['seller_id', '=', $id], ['state', '=', $state]])->orWhere([['buyer_id', '=', $id], ['state', '=', $state]])->get();
        }

      }else{
        $exception = array('message' => 'User inexistant', 'code' => 404);
          return json_encode($exception);
      }

      if(isset($transactions)){

        foreach ($transactions as $transaction) {
          $transaction->seller_object = null;
          $transaction->buyer_object = null;

          $buyerObject = Objects::find($transaction->buyer_object_id);
          $sellerObject = Objects::find($transaction->seller_object_id);

          if($buyerObject !== null) {
            $buyerObjectData = array(
              'id'    => $buyerObject->id,
              'title' => $buyerObject->title,
              'photo' => $buyerObject->photo
            );
            $transaction->buyer_object = $buyerObjectData;
          }
          if($sellerObject !== null){
            $sellerObjectData = array(
              'id'    => $sellerObject->id,
              'title' => $sellerObject->title,
              'photo' => $sellerObject->photo
            );
            $transaction->seller_object = $sellerObjectData;
          }

          unset($transaction["seller_object_id"]);
          unset($transaction["buyer_object_id"]);
        }

        $transactions->toJson();
      }

      return $transactions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->json()->all();

        $new_transaction                   = new Transactions;
        $new_transaction->buyer_id         = $data["buyer_id"];
        $new_transaction->seller_id        = $data["seller_id"];
        $new_transaction->seller_object_id = $data["seller_object_id"];
        $new_transaction->state            = "pending";

        $new_transaction->save();

        $transaction = Transactions::findOrFail($new_transaction->id)->toJson();
        return $transaction;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction=Transactions::findOrFail($id)->toJson();
        return $transaction;
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
      $data=$request->json()->all();
      $transaction = Transactions::findOrFail($id);

      if(isset($data["buyer_object_id"])){
           $transaction->update(['buyer_object_id' => $data["buyer_object_id"]]);
      }
      if(isset($data["seller_object_id"])){
           $transaction->update(['seller_object_id' => $data["seller_object_id"]]);
      }
      if(isset($data["state"])){
           $transaction->update(['state' => $data["state"]]);
      }
      if(isset($data["alternative_message"])){
           $transaction->update(['alternative_message' => $data["alternative_message"]]);
      }

      $transaction->seller_object = null;
      $transaction->buyer_object = null;

      $buyerObject = Objects::find($transaction->buyer_object_id);
      $sellerObject = Objects::find($transaction->seller_object_id);

      if($buyerObject !== null) {
        $buyerObjectData = array(
          'id'    => $buyerObject->id,
          'title' => $buyerObject->title,
          'photo' => $buyerObject->photo
        );
        $transaction->buyer_object = $buyerObjectData;
      }
      if($sellerObject !== null){
        $sellerObjectData = array(
          'id'    => $sellerObject->id,
          'title' => $sellerObject->title,
          'photo' => $sellerObject->photo
        );
        $transaction->seller_object = $sellerObjectData;
      };

      unset($transaction["seller_object_id"]);
      unset($transaction["buyer_object_id"]);

      return $transaction;
    }
}
