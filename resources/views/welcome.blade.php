@extends('layouts.left')
@section('content')
  <div class="full-height col-10 home bg-white">
    <h3>Bonjour !</h3>
    <div class="cards">
      <div class="block">
        <div class="card">
          <span class="number">{{count($objects)}}</span>
          <span class="resource">objets</span>
          <img class="resource-icon" src="/public/object.png" />
        </div>
        <a href="/objects/add" class="btn btn-primary btn-home">+ Ajouter un objet</a>
      </div>
      <div class="block">
        <div class="card">
          <span class="number">{{count($users)}}</span>
          <span class="resource">utilisateurs</span>
          <img class="resource-icon" src="/public/avatar_users.png" />
        </div>
        <a href="/users/add" class="btn btn-primary btn-home">+ Ajouter un utilisateur</a>
      </div>
      <div class="block">
        <div class="card">
          <span class="number">{{count($transactions)}}</span>
          <span class="resource">transactions</span>
          <img class="resource-icon" src="/public/transaction.png" />
        </div>
        <a href="/transactions/add" class="btn btn-primary btn-home">+ Ajouter une transaction</a>
      </div>
    </div>
  </div>
@stop
