<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\User;

class UsersController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
      $user=User::findOrFail($id)->toJson();
      return $user;
    }

    /**
    * Register a user and add it in the database.
    *
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function register(Request $request){
        $data = $request->json()->all();

        $new_user              = new User;
        $new_user->first_name  = $data["first_name"];
        $new_user->last_name   = $data["last_name"];
        $new_user->email       = $data["email"];
        $new_user->password    = Hash::make($data["password"]);
        $new_user->phone       = $data["phone"];
        $new_user->bio         = $data["bio"];
        $new_user->avatar      = $data["avatar"];
        $new_user->post_code   = $data["post_code"];
        $new_user->zone        = substr($data["post_code"], 0, 2);
        $new_user->save();

        $user = User::findOrFail($new_user->id)->toJson();
        return $user;
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user == null){
            return response()->json([
                'success' => false,
            ]);
        }else{
            $user->delete();
            return response()->json([
                'success' => true,
            ]);
        }
    }
}
