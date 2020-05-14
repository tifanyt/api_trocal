@extends('layouts.left')
@section('content')
  <div class="full-height col-8 bg-white">
    <h3>Supprimer un user</h3>
    <div class="alert alert-danger mt-2" role="alert">
      Attention: Vous allez supprimer {{ $user->first_name }} {{ $user->last_name }}.
    </div>
    <form action="/users/{{$user->id}}/delete" method="post">
      @csrf <!-- {{ csrf_field() }} -->
     <input type="hidden" name="userId" value="{{$user->id}}"/>
     <a href="/users" class="btn btn-secondary mr-2">Retour</a>
     <button type="submit" class="btn btn-primary">Supprimer</button>
    </form>
  </div>
@stop
