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
                <div class="panel-heading">New Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role_id" class="col-md-4 control-label">User Category</label>

                            <div class="col-md-6">
                                <select id="role_id" type="role_id" class="form-control" name="role_id" value="{{ old('role_id') }}" required>
                                  <option value="1">Manager</option>
                                  <option value="2">Engineer</option>
                                  <option value="3">Technician</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
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

<!-- Show data-->
  <div class="container">
    <div class="row">
      <!-- <div class="col-md-10 col-md-offset-1">-->
      <div class="col-md-8 col-md-offset-2">
        <table class="table" style="background-color:#E5E4E2">
          <tr style="background-color:#848482">
            <th>No.</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>User Group</th>
            <th>Actions</th>
          </tr>

          <?php $no=1; ?>

          @foreach($user as $users)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$users->name}}</td>
              <td>{{$users->email}}</td>
              <td>{{$users->roles['role']}}</td>
              <td>
                <form class="" action="{{ route('users.destroy',$users->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{ route('users.edit',$users->id) }}" class="btn btn-primary">Edit</a>
                  <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')"name="name" value="Delete">
                </form>
              </td>
            </tr>
          @endforeach
        </table>

        <!-- Pagination -->
        {!! $user->links('pagination') !!}

      </div>
    </div>
  </div>
@endsection
