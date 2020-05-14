@extends('layouts.left')
@section('content')
    <div class="full-height col-8 bg-light">
      <h3>Supprimer une transaction</h3>
      <div class="alert alert-danger mt-2" role="alert">
        Attention: Vous allez supprimer la transaction {{ $transaction->id }}.
      </div>
      <form action="/transactions/{{$transaction->id}}/delete" method="delete">
       <input type="hidden" name="transactionId" value="{{$transaction->id}}"/>
       <a href="/transactions" class="btn btn-secondary mr-2">Retour</a>
       <button type="submit" class="btn btn-primary">Supprimer</button>
      </form>
    </div>
@stop
