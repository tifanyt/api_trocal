@extends('layouts.left')
@section('content')
  <div class="full-height col-8 bg-white">
    <div class="m-1 mt-2 p-3">
      <h3>Éditer un objet</h3>
      <form action="/objects/{{$object->id}}/edit" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="row">
          <div class="col">
            <div class="form-group row">
              <label for="objectid" class="col-sm-4 col-form-label">Object ID</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="objectid" value="{{$object->id}}">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group row">
              <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="user_id" id="user_id" value="{{$object->user_id}}">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Titre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" value="{{$object->title}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description" rows="3">{{$object->description}}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="key_words" class="col-sm-2 col-form-label">Mots clé</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="key_words" id="key_words" value="{{$object->key_words}}">
            <small id="key_wordsHelp" class="form-text text-muted">Séparer les mots clé par une virgule.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="category" class="col-sm-2 col-form-label">Catégorie</label>
          <div class="col-sm-10">
            <select class="form-control" name="category" id="category">
              <option value="home" @if ($object->category == "home")
                  selected="selected"
              @endif>home</option>
              <option value="clothes" @if ($object->category == "clothes")
                  selected="selected"
              @endif>clothes</option>
              <option value="high-tech" @if ($object->category == "high-tech")
                  selected="selected"
              @endif>high-tech</option>
              <option value="deco" @if ($object->category == "deco")
                  selected="selected"
              @endif>deco</option>
              <option value="hobbies" @if ($object->category == "hobbies")
                  selected="selected"
              @endif>hobbies</option>
              <option value="children" @if ($object->category == "children")
                  selected="selected"
              @endif>children</option>
              <option value="other" @if ($object->category == "other")
                  selected="selected"
              @endif>other</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="zone" class="col-sm-2 col-form-label">Zone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="zone" id="zone" value="{{$object->zone}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="state" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <select class="form-control" name="state" id="state">
              <option value="available" @if ($object->state == "available")
                  selected="selected"
              @endif>Available</option>
              <option value="reserved" @if ($object->state == "reserved")
                  selected="selected"
              @endif>Reserved</option>
              <option value="unavailable" @if ($object->state == "unavailable")
                  selected="selected"
              @endif>Unavailable</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="photo" class="col-sm-2 col-form-label">Photos</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="photo" id="photos" value="{{$object->photo}}">
          </div>
          @php
              $photosUrls = explode (",",$object->photo);
          @endphp

          @foreach ($photosUrls as $url)
          <div class="w-25 m-3 objectPhoto" id="photo-{{$loop->index}}">
            <img src="{{$url}}" alt="{{$object->title}}" class="img-thumbnail">
            <button type="button" class="btn btn-delete mt-1 btn-sm" id="deleteButton-{{$loop->index}}"><i class="fas fa-times"></i></button>
          </div>
          @endforeach
        </div>
        <div class="row">
          <div class="buttons">
            <a href="/objects" class="btn btn-secondary text-light btn-lg mx-3">Retour</a>
            <button type="submit" class="btn btn-primary btn-lg mx-3">Mettre à jour l'objet</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    var pictures = document.querySelectorAll('.objectPhoto');
    var pictureUrls = document.getElementById('photos').value;
    var pictureUrlsTab = pictureUrls.split(',');
    var photoInput = document.getElementById("photos");

    for(let i = 0; i < pictures.length; i++) {
      var button = document.getElementById("deleteButton-"+i);
      button.addEventListener('click', function(){
        var image = document.getElementById("photo-"+i);
        pictureUrlsTab[0] = null;
        image.classList.add('hidden');
        pictureUrlsTab = pictureUrlsTab.filter((value) => value !== null)
        photoInput.value = pictureUrlsTab.toString();
      });
    };
  </script>
@stop
