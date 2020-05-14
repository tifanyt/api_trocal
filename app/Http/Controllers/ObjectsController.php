<?php

namespace App\Http\Controllers;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Objects;
use App\User;


class ObjectsController extends Controller
{
  private function addUserData($object){
    $userData = array(
      'id'          => $object->user_id,
      'first_name'  => $object->first_name,
      'last_name'   => $object->last_name,
      'avatar'      => $object->avatar,
      'post_code'   => $object->post_code,
    );

    $object->user = $userData;
    unset($object['first_name']);
    unset($object['last_name']);
    unset($object['avatar']);
    unset($object['post_code']);
  }
    /**
     * Display all objects from a user
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function placard($id)
    {
      $user = User::find($id);
     
      if(isset($user->id)){
        $objects=Objects::where('user_id',$id)->paginate(10)->toJson();
        return $objects;
      }else{
        $exception = array('message' => 'User inexistant', 'code' => 404);
        return json_encode($exception);
      }
    }

    /**
     * Display all objects matching the research
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function research(Request $request)
    {
      $zone=$request->input("zone");
      $key_words=$request->input("key_words");
      $category=$request->input("category");
      $currentUser = auth()->user();

      //tous les objets
      if($zone == null){
        $objects = Objects::join('users', 'objects.user_id', '=', 'users.id')->select('objects.*','users.first_name', 'users.last_name','users.avatar','users.post_code')->where('user_id', '!=', $currentUser->id)->paginate(10);

        foreach ($objects as $object) {
          self::addUserData($object);
        };

        return $objects->toJson();
      }
      else{
        //zone + mot clé + catégorie
        if($key_words != null && $category != null){
          $objects=Objects::join('users', 'objects.user_id', '=', 'users.id')->select('objects.*','users.first_name', 'users.last_name','users.avatar', 'user.post_code')->where('user_id', '!=', $currentUser->id)->where('objects.zone',$zone)->where('objects.key_words', 'like', '%'.$key_words.'%')->where('objects.category',$category)->paginate(10)->toJson();
        }
        //zone + mot clé
        else if($key_words != null){
          $objects=Objects::join('users', 'objects.user_id', '=', 'users.id')->select('objects.*','users.first_name', 'users.last_name','users.avatar')->where('user_id', '!=', $currentUser->id)->where('objects.zone',$zone)->where('objects.key_words', 'like', '%'.$key_words.'%')->paginate(10)->toJson();
        }
        //zone + category
        else if($category != null){
          $objects=Objects::join('users', 'objects.user_id', '=', 'users.id')->select('objects.*','users.first_name', 'users.last_name','users.avatar')->where('user_id', '!=', $currentUser->id)->where('objects.zone',$zone)->where('objects.category',$category)->paginate(10)->toJson();
        }
        //zone
        else{
          $objects=Objects::join('users', 'objects.user_id', '=', 'users.id')->select('objects.*','users.first_name', 'users.last_name','users.avatar')->where('user_id', '!=', $currentUser->id)->where('objects.zone',$zone)->paginate(10)->toJson();
        }
      }

      foreach ($objects as $object) {
        self::addUserData($object);
      };

      return $objects;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data=$request->json()->all();

        $new_object              = new Objects;
        $new_object->user_id     = $data["user_id"];
        $new_object->title       = $data["title"];
        $new_object->description = $data["description"];
        $new_object->key_words   = $data["key_words"];
        $new_object->category    = $data["category"];
        $new_object->photo       = $data["photo"];
        $new_object->zone        = $data["zone"];
        $new_object->state       = $data["state"];
        $new_object->save();

        $object = Objects::findOrFail($new_object->id)->toJson();
        return $object;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($userId, $objectId)
    {
        $user=User::find($userId);
        $object=Objects::findOrFail($objectId);
        if(!isset($user)){
          $exception = array('message' => 'User inexistant', 'code' => 404);
          return json_encode($exception);
        }
        else if($user->id == $object->user_id){
          $object_and_user = Objects::join('users', 'objects.user_id', '=', 'users.id')->select('objects.*','users.first_name', 'users.last_name','users.avatar')->findOrFail($objectId);
          $userData = array(
            'id'          => $object_and_user->user_id,
            'first_name'  => $object_and_user->first_name,
            'last_name'   => $object_and_user->last_name,
            'avatar'      => $object_and_user->avatar,
          );
          $userObjectData = array(
            'id'          => $object_and_user->id,
            'title'       => $object_and_user->title,
            'description' => $object_and_user->description,
            'key_words'   => $object_and_user->key_words,
            'category'    => $object_and_user->category,
            'zone'        => $object_and_user->zone,
            'photo'       => $object_and_user->photo,
            'state'       => $object_and_user->state,
            'created_at'  => $object_and_user->created_at,
            'updated_at'  => $object_and_user->updated_at,
            'user'        => $userData,
          );
          return $userObjectData;
        }
        else{
          $exception = array('message' => "Cet objet n'appartient à ce user", 'code' => 409);
          return json_encode($exception);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $object = Objects::findOrFail($id);
        $object->update($request->all());
        return $object;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
      $object = Objects::find($id);

      if($object == null){
        return response()->json([
            'success' => false,
        ]);
      }else{
        $object->delete();
        return response()->json([
            'success' => true,
        ]);
      }
  }
}
