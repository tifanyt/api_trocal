<?php
 namespace App\Http\Controllers\Web;
 use DB;
 use Illuminate\Http\Request;
 use App\User;
 use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
      if($request->session()->get('loggedToken') !== null) {
        $users = User::get();
        return view('users', ['users' => $users]);
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
         $user = User::findOrFail($id);
         return view('users-edit', ['user' => $user]);
       } else {
         return redirect()->route('login')->with('error', 'Please login to access dashboard.');
       }
     }

     /**
      * Update user.
      *
      * @return View
      */
      public function update(Request $request, $id)
      {
        if($request->session()->get('loggedToken') !== null) {
          $user = User::findOrFail($id);
          $data = $request->all();
          $data["zone"] = substr($user->post_code, 0, 2);
          $user->update($data);

          return view('users-edit', ['user' => $user]);
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
          $user = User::findOrFail($id);

            if (isset($_POST['userId'])) {
              $user->delete();
              $users = User::get();
              return redirect()->route('dash-users.index', ['users' => $users]);
            } else {
              return view('users-delete', ['user' => $user]);
            }
        } else {
          return redirect()->route('login')->with('error', 'Please login to access dashboard.');
        }
      }

      /**
       * Add an user.
       *
       * @return View
       */
      public function add(Request $request)
      {
        if($request->session()->get('loggedToken') !== null) {
          if (isset($_POST['first_name'])) {
            $postcode = $_POST['post_code'];
            $zone = substr($postcode, 0, 2);

            $new_object             = new User;
            $new_object->first_name = $_POST["first_name"];
            $new_object->last_name  = $_POST["last_name"];
            $new_object->bio        = $_POST["bio"];
            $new_object->email      = $_POST["email"];
            $new_object->password   = Hash::make($_POST["password"]);
            $new_object->avatar     = $_POST["avatar"];
            $new_object->zone       = $zone;
            $new_object->post_code  = $postcode;
            $new_object->save();

            $user = User::findOrFail($new_object->id);

            return redirect()->route('dash-users.edit', ['user' => $user]);
          } else {
            return view('users-add');
          }
        } else {
          return redirect()->route('login')->with('error', 'Please login to access dashboard.');
        }
    }
}
