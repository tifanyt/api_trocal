@extends('layouts.left')
@section('content')
  <div class="full-height col-8 bg-white">
    <div class="m-1 mt-2 p-3">
      <h3>Éditer les informations de {{$user->first_name}} {{$user->last_name}}</h3>
      <form action="/users/{{$user->id}}/edit" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="row">
          <div class="col">
            <div class="form-group row">
              <label for="userid" class="col-sm-4 col-form-label">User ID</label>
              <div class="col-sm-2">
                <input type="text" readonly class="form-control" id="userid" value="{{$user->id}}">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group row">
              <label for="note" class="col-sm-4 col-form-label">Note</label>
              <div class="col-sm-2">
                <input type="text" readonly class="form-control" id="note" value="{{$user->note}}">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group row">
              <label for="firstname" class="col-sm-4 col-form-label">Prénom</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user->first_name}}">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group row">
              <label for="lastname" class="col-sm-4 col-form-label">Nom</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user->last_name}}">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="bio" class="col-sm-2 col-form-label">Bio</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="bio" name="bio" rows="3">{{$user->bio}}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="post_code" class="col-sm-2 col-form-label">Code postal</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="post_code" id="post_code" value="{{$user->post_code}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-2 col-form-label">Téléphone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="avatar" id="avatar" value="{{$user->avatar}}">
          </div>
          <div class="mx-auto my-3 w-25">
            <img src="{{$user->avatar}}" id="avatarImage" class="w-100"/>
          </div>
        </div>
        <div class="row">
          <div class="buttons">
            <a href="/users" class="btn btn-secondary text-light btn-lg mx-3">Retour</a>
            <button type="submit" class="btn btn-primary btn-lg mx-3">Mettre à jour le user</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    var avatarUrl = document.getElementById('avatar').value;
    var input = document.getElementById('avatar');
    var avatar = document.getElementById('avatarImage');

    input.addEventListener('input', (event) => {
      var value = event.target.value;
      avatar.setAttribute("src", value);
    });
  </script>
@stop
