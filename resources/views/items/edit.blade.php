<!-- Edit data-->
@extends('layouts.app')
  @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Edit Item</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('items.update', $items->id) }}">
                          <input name="_method" type="hidden" value="PATCH">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                              <label for="category_id" class="col-md-4 control-label">Item Category</label>

                              <div class="col-md-6">
                                  <select id="category_id" type="category_id" class="form-control" name="category_id"  value="{{ $items->category_id }}" required>
                                    <option value="1">General</option>
                                    <option value="2">Chemical</option>
                                    <option value="3">Consumable</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                              <label for="description" class="col-md-4 control-label">Description</label>

                              <div class="col-md-6">
                                  <input id="description" type="description" class="form-control" name="description" value="{{ $items->description }}" required>

                                  @if ($errors->has('description'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('description') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success pull-right">
                                      Save
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
