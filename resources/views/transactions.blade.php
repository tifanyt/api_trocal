@extends('layouts.left')

@section('content')
    <div class="full-height col-10 bg-white">
      <h3>Liste des transactions</h3>
      <div class="action-block">
        <a href="transactions/add" class="btn btn-primary my-3">Ajouter une transaction</a>
        <h6>Total: {{count($transactions)}} transactions</h6>
      </div>
      <table class="table">
        <thead>
          <tr class="heading">
            <th scope="col">ID</th>
            <th scope="col">Seller ID</th>
            <th scope="col">Buyer ID</th>
            <th scope="col">Seller object ID</th>
            <th scope="col">Buyer object ID</th>
            <th scope="col">Etat</th>
            <th scope="col">Message</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
            <tr>
              <th class="violetRow">{{$transaction->id}}</th>
              <td class="violetRow">{{$transaction->seller_id}}</td>
              <td class="violetRow">{{$transaction->buyer_id}}</td>
              <td class="violetRow">{{$transaction->seller_object_id}}</td>
              <td class="violetRow">{{$transaction->buyer_object_id}}</td>
              <td class="violetRow">{{$transaction->state}}</td>
              <td class="violetRow">{{$transaction->alternative_message}}</td>
              <td class="violetRow">
                <a href="/transactions/{{$transaction->id}}/edit" class="btn btn-primary mr-2 smallbtn">
                    <img src="/public/crayon.png" />
                </a>
                <a href="/transactions/{{$transaction->id}}/delete" class="btn btn-warning smallbtn">
                    <img src="/public/delete.png" />
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @stop
