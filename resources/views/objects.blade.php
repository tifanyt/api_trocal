@extends('layouts.left')
@section('content')
  <div class="full-height col-10 bg-white">
    <h3>Liste des objets</h3>
    <div class="action-block">
      <a href="objects/add" class="btn btn-primary my-3">Ajouter un objet</a>
      <h6>Total: {{count($objects)}} objets</h6>
    </div>
    <table class="table">
      <thead>
        <tr class="heading">
          <th scope="col">ID</th>
          <th scope="col">Titre</th>
          <th scope="col">Status</th>
          <th scope="col">Catégorie</th>
          <th scope="col">UserID</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($objects as $object)
          <tr>
            <th class="violetRow">{{$object->id}}</th>
            <td class="violetRow">{{$object->title}}</td>
            <td class="violetRow">{{$object->state}}</td>
            <td class="violetRow">{{$object->category}}</td>
            <td class="violetRow">{{$object->user_id}}</td>
            <td class="violetRow">
              <a href="/objects/{{$object->id}}/edit" class="btn btn-primary mr-2 smallbtn">
                <img src="/public/crayon.png" />
              </a>
              <a href="/objects/{{$object->id}}/delete" class="btn btn-warning smallbtn">
                <img src="/public/delete.png" />
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@stop
