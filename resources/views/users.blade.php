@extends('layouts.left')
@section('content')
  <div class="full-height col-10 bg-white">
    <h3>Liste des utilisateurs</h3>
    <div class="action-block">
      <a href="users/add" class="btn btn-primary my-3">Ajouter un utilisateur</a>
      <h6>Total: {{count($users)}} utilisateurs</h6>
    </div>
    <table class="table">
      <thead>
        <tr class="heading">
          <th scope="col">ID</th>
          <th scope="col">Prénom</th>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          @if ($user->admin !== 1)
            <tr>
              <th class="violetRow">{{$user->id}}</th>
              <td class="violetRow">{{$user->first_name}}</td>
              <td class="violetRow">{{$user->last_name}}</td>
              <td class="violetRow">{{$user->email}}</td>
              <td class="violetRow">
                <a href="/users/{{$user->id}}/edit" class="btn btn-primary mr-2 smallbtn">
                  <img src="/public/crayon.png" />
                </a>
                <a href="/users/{{$user->id}}/delete" class="btn btn-warning smallbtn">
                  <img src="/public/delete.png" />
                </a>
              </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
@stop
