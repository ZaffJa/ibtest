<!-- Edit data-->
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
                  <div class="panel-heading">Edit User</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $users->id) }}">
                          <input name="_method" type="hidden" value="PATCH">
                          {{ csrf_field() }}


                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}" >

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                              <label for="role_id" class="col-md-4 control-label">User Category</label>

                              <div class="col-md-6">
                                  <select id="role_id" type="role_id" class="form-control" name="role_id" value="{{ $users->role_id }}">
                                    <option value="1">Manager</option>
                                    <option value="2">Engineer</option>
                                    <option value="3">Technician</option>
                                  </select>
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
