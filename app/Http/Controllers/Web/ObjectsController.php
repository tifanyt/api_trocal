<?php

namespace App\Http\Controllers\Web;
use DB;
use Illuminate\Http\Request;
use App\Objects;
use App\User;
use App\Http\Controllers\Controller;

class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(request $request)
    {
      if($request->session()->get('loggedToken') !== null) {
        $term = $request->input("term");

        if($term==null){
          $objects=Objects::get();
          return view('objects', ['objects' => $objects]);
        }
        else{
          $objects=Objects::where('key_words', 'like', '%'.$term.'%')->paginate(10)->toJson();
          return $objects;
        }
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
         $object = Objects::findOrFail($id);
         return view('objects-edit', ['object' => $object]);
       } else {
         return redirect()->route('login')->with('error', 'Please login to access dashboard.');
       }
     }

    /**
     * Edit object.
     *
     * @return View
     */
     public function update(Request $request, $id)
     {
       if($request->session()->get('loggedToken') !== null) {
         $object = Objects::findOrFail($id);
         $object->update($request->all());
         return view('objects-edit', ['object' => $object]);
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
        $object = Objects::findOrFail($id);

        if (isset($_POST['objectId'])) {
          $object->delete();
          $objects=Objects::get();
          return redirect()->route('dash-objects.index', ['objects' => $objects]);
        } else {
          return view('objects-delete', ['object' => $object]);
        }
      } else {
        return redirect()->route('login')->with('error', 'Please login to access dashboard.');
      }
    }

    /**
     * Add an object.
     *
     * @param  int  $id
     * @return View
     */
    public function add(Request $request)
    {
      if($request->session()->get('loggedToken') !== null) {
        if (isset($_POST['user_id'])) {
          $userId = $_POST['user_id'];
          $user = User::findOrFail($userId);
          $zone = substr($user->post_code, 0, 2);

          $new_object              = new Objects;
          $new_object->user_id     = $_POST["user_id"];
          $new_object->title       = $_POST["title"];
          $new_object->description = $_POST["description"];
          $new_object->key_words   = $_POST["key_words"];
          $new_object->category    = $_POST["category"];
          $new_object->photo       = $_POST["photo"];
          $new_object->zone        = $zone;
          $new_object->state       = "available";
          $new_object->save();

          $object = Objects::findOrFail($new_object->id);

          return redirect()->route('dash-objects.edit', ['object' => $object]);
        } else {
          return view('objects-add');
        }
      } else {
        return redirect()->route('login')->with('error', 'Please login to access dashboard.');
      }
  }
}
