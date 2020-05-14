@extends('layouts.left')
@section('content')
  <div class="full-height col-8 bg-white">
    <div class="m-1 mt-2 p-3">
      <h3>Éditer une transaction</h3>
      <form action="/transactions/{{$transaction->id}}/edit" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="row">
          <div class="col">
            <div class="form-group row">
              <label for="transactionid" class="col-sm-2 col-form-label">Transaction ID</label>
              <div class="col-sm-2">
                <input type="text" readonly class="form-control" id="transactionid" value="{{$transaction->id}}">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group row">
              <label for="seller_id" class="col-sm-4 col-form-label">Seller ID</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="seller_id" id="seller_id" value="{{$transaction->seller_id}}">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group row">
              <label for="buyer_id" class="col-sm-3 offset-sm-1 col-form-label">Buyer ID</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="buyer_id" id="buyer_id" value="{{$transaction->buyer_id}}">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group row">
              <label for="seller_object_id" class="col-sm-4 col-form-label">Seller object ID</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="seller_object_id" id="seller_object_id" value="{{$transaction->seller_object_id}}">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group row">
              <label for="buyer_object_id" class="col-sm-3 offset-sm-1 col-form-label">Buyer object ID</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="buyer_object_id" id="buyer_object_id" value="{{$transaction->buyer_object_id}}">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="state" class="col-sm-2 col-form-label">Etat</label>
          <div class="col-sm-10">
            <select class="form-control" name="state" id="state">
              <option value="pending" @if ($transaction->state == "pending")
                  selected="selected"
              @endif>pending</option>
              <option value="accepted" @if ($transaction->state == "accepted")
                  selected="selected"
              @endif>accepted</option>
              <option value="completed" @if ($transaction->state == "completed")
                  selected="selected"
              @endif>completed</option>
              <option value="aborted" @if ($transaction->state == "aborted")
                  selected="selected"
              @endif>aborted</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="alternative_message" class="col-sm-2 col-form-label">Message</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="alternative_message" name="alternative_message" rows="3">{{$transaction->alternative_message}}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="buttons">
            <a href="/transactions" class="btn btn-secondary text-light btn-lg mx-3">Retour</a>
            <button type="submit" class="btn btn-primary btn-lg mx-3">Mettre à jour la transaction</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@stop
