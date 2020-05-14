@extends('layouts.left')
@section('content')
  <div class="full-height col-8 bg-white">
    <h3>Supprimer un objet</h3>
    <div class="alert alert-danger mt-2" role="alert">
      Attention: Vous allez supprimer <strong>{{ $object->title }}</strong>.
    </div>
    <form action="/objects/{{$object->id}}/delete" method="post">
      @csrf <!-- {{ csrf_field() }} -->
     <input type="hidden" name="objectId" value="{{$object->id}}"/>
     <a href="/objects" class="btn btn-secondary mr-2">Retour</a>
     <button type="submit" class="btn btn-primary">Supprimer l'objet</button>
    </form>
  </div>
@stop
