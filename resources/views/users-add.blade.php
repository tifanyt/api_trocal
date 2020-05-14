@extends('layouts.left')
@section('content')
  <div class="full-height col-8 bg-white">
    <div class="m-1 mt-2 p-3">
      <h3>Ajouter un user</h3>
      <form action="/users/add" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="row">
          <div class="col">
            <div class="form-group row">
              <label for="firstname" class="col-sm-4 col-form-label">Firstname</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="first_name" id="first_name">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group row">
              <label for="lastname" class="col-sm-4 col-form-label">LastName</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="last_name" id="last_name">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="bio" class="col-sm-2 col-form-label">Bio</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password">
          </div>
        </div>
        <div class="form-group row">
          <label for="post_code" class="col-sm-2 col-form-label">Post code</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="post_code" id="post_code">
          </div>
        </div>
        <div class="form-group row">
          <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="avatar" id="avatar">
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-2 col-form-label">Phone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="phone" id="phone">
          </div>
        </div>
        <div class="row">
          <div class="buttons">
            <a href="/users" class="btn btn-secondary btn-lg mr-3">Retour</a>
            <button type="submit" class="btn btn-primary btn-lg">+ Ajouter un user</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@stop
