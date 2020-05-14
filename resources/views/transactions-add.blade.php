@extends('layouts.left')
@section('content')
          <div class="full-height col-8 bg-white">
            <div class="m-1 mt-2 p-3">
              <h3>Ajouter une transaction</h3>
              <form action="/transactions/add" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="form-group row">
                  <label for="buyer_id" class="col-sm-2 col-form-label">Buyer ID</label>
                  <div class="col-sm-10">
                    <input type="text" required class="form-control" name="buyer_id" id="buyer_id">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="seller_id" class="col-sm-2 col-form-label">Seller ID</label>
                  <div class="col-sm-10">
                    <input type="text" required class="form-control" name="seller_id" id="seller_id">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="buyer_object_id" class="col-sm-2 col-form-label">Buyer Object ID</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="buyer_object_id" name="buyer_object_id"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="seller_object_id" class="col-sm-2 col-form-label">Seller Object ID</label>
                  <div class="col-sm-10">
                    <input class="form-control" required id="seller_object_id" name="seller_object_id"></input>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="state" class="col-sm-2 col-form-label">Etat</label>
                  <div class="col-sm-10">
                    <select class="form-control" required name="state" id="state">
                      <option value="pending">pending</option>
                      <option value="accepted">accepted</option>
                      <option value="completed">completed</option>
                      <option value="aborted">aborted</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="alternative_message" class="col-sm-2 col-form-label">Message Alternatif</label>
                  <div class="col-sm-10">
                    <textarea rows="3" class="form-control" id="alternative_message" name="alternative_message"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="buttons">
                    <a href="/transactions" class="btn btn-secondary btn-lg mr-3">Retour</a>
                    <button type="submit" class="btn btn-primary btn-lg">+ Ajouter une transaction</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
       @stop
