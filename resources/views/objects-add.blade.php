@extends('layouts.left')
@section('content')
  <div class="full-height col-8 bg-white">
    <div class="m-1 mt-2 p-3 bg-white">
          <h3>Ajouter un objet</h3>
          <form action="/objects/add" method="post">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="form-group row">
              <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="user_id" id="user_id">
              </div>
            </div>
            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Titre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title">
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="key_words" class="col-sm-2 col-form-label">Mots clé</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="key_words" id="key_words">
                <small id="key_wordsHelp" class="form-text text-muted">Séparer les mots clé par une virgule.</small>
              </div>
            </div>
            <div class="form-group row">
              <label for="category" class="col-sm-2 col-form-label">Catégorie</label>
              <div class="col-sm-10">
                <select class="form-control" name="category" id="category">
                  <option value="home">home</option>
                  <option value="clothes">clothes</option>
                  <option value="high-tech">high-tech</option>
                  <option value="deco">deco</option>
                  <option value="hobbies">hobbies</option>
                  <option value="children">children</option>
                  <option value="other">other</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="photo" class="col-sm-2 col-form-label">Photos</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="photo" id="photos">
                <small id="key_wordsHelp" class="form-text text-muted">Ajouter les url des photos, séparées par une virgule.</small>
              </div>
            </div>
            <div class="row">
              <div class="buttons">
                <a href="/objects" class="btn btn-secondary btn-lg mr-3">Retour</a>
                <button type="submit" class="btn btn-primary btn-lg">+ Ajouter l'objet</button>
              </div>
            </div>
          </form>
        </div>
  </div>
@stop
