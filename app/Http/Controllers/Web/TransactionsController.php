<?php

namespace App\Http\Controllers\Web;
use DB;
use Illuminate\Http\Request;
use App\Transactions;
use App\Http\Controllers\Controller;

class TransactionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(request $request)
    {
      if($request->session()->get('loggedToken') !== null) {
        $transactions=Transactions::get();
        return view('transactions', ['transactions' => $transactions]);
      } else {
        return redirect()->route('login')->with('error', 'Please login to access dashboard.');
      }
    }

    /**
     * Display the edit form.
     *
     * @return View
     */
     public function edit(Request $request, $id)
     {
       if($request->session()->get('loggedToken') !== null) {
         $transaction = Transactions::findOrFail($id);
         return view('transactions-edit', ['transaction' => $transaction]);
       } else {
         return redirect()->route('login')->with('error', 'Please login to access dashboard.');
       }
     }

      /**
     * Edit transactions.
     *
     * @return View
     */
     public function update(Request $request, $id)
     {
       if($request->session()->get('loggedToken') !== null) {
         $transaction = Transactions::findOrFail($id);
         $transaction->update($request->all());
         return view('transactions-edit', ['transaction' => $transaction]);
       } else {
         return redirect()->route('login')->with('error', 'Please login to access dashboard.');
       }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return View
     */
    public function destroy(Request $request, $id)
    {
      if($request->session()->get('loggedToken') !== null) {
        $transaction = Transactions::findOrFail($id);
        if (isset($_GET['transactionId'])) {
          $transaction->delete();
          $transactions=Transactions::get();
          return redirect()->route('dash-transactions.index', ['transactions' => $transactions]);
        } else {
          return view('transactions-delete', ['transaction' => $transaction]);
        }
      } else {
        return redirect()->route('login')->with('error', 'Please login to access dashboard.');
      }
    }


     /**
     * Add an transaction.
     *
     * @param  int  $id
     * @return View
     */
    public function add(Request $request)
    {
      if($request->session()->get('loggedToken') !== null) {
        if (isset($_POST['buyer_id'])) {

          $new_transaction                       = new Transactions;
          $new_transaction->buyer_id             = $_POST["buyer_id"];
          $new_transaction->seller_id            = $_POST["seller_id"];

          if($_POST["buyer_object_id"] == ''){
            $new_transaction->buyer_object_id  = NULL;
          }

          else{
            $new_transaction->buyer_object_id  = $_POST["buyer_object_id"];
          }

          $new_transaction->seller_object_id     = $_POST["seller_object_id"];
          $new_transaction->state                = $_POST["state"];

          if($_POST["alternative_message"] == ''){
            $new_transaction->alternative_message  = NULL;
          }

          else{
            $new_transaction->alternative_message  = $_POST["alternative_message"];
          }
          $new_transaction->save();
          $transaction = Transactions::findOrFail($new_transaction->id);

          return view('transactions-edit', ['transaction' => $transaction]);
        } else {
          return view('transactions-add');
        }
      } else {
        return redirect()->route('login')->with('error', 'Please login to access dashboard.');
      }
    }
}
