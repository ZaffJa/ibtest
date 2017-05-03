<!-- Create data-->
@extends('layouts.app')
  @section('content')

  @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      <strong>Success:</strong> {{ Session::get('success')}}
    </div>
  @endif

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">New Item</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('items.store') }}">
                          {{ csrf_field() }}
                          <div class="form-group">
                              <label for="category_id" class="col-md-4 control-label">Item Category</label>

                              <div class="col-md-6">
                                  <select id="category_id" type="category_id" class="form-control" name="category_id"  value="{{ old('category_id') }}" required>
                                    <option value="1">General</option>
                                    <option value="2">Chemical</option>
                                    <option value="3">Consumable</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                              <label for="description" class="col-md-4 control-label">Description</label>

                              <div class="col-md-6">
                                  <input id="description" type="description" class="form-control" name="description" value="{{ old('description') }}" required>

                                  @if ($errors->has('description'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('description') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="{{ route('items.index') }}" class="btn btn-primary">View Item</a>
                              </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>


@endsection
