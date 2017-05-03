@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Profile</div>
                <div class="panel-body">
            
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

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
                                <input id="password" type="password" class="form-control" name="password" required>

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
                            <label for="user_group" class="col-md-4 control-label">User Category</label>

                            <div class="col-md-6">
                                <select id="user_group" type="user_group" class="form-control" name="user_group" required>
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
        <table class="table table-striped">
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Password</th>
            <th>User Group</th>
            <th>Actions</th>
          </tr>

          <?php $no=1; ?>

          @foreach($profiles as $profile)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$profile->name}}</td>
              <td>{{$profile->email}}</td>
              <td>{{$profile->password}}</td>
              <td>{{$profile->user_group}}</td>
              <td>
                <form class="" action="{{ route('profile.destroy',$profile->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{ route('profile.edit',$profile->id) }}" class="btn btn-primary">Edit</a>
                  <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')"name="name" value="Delete">
                </form>
              </td>
            </tr>
          @endforeach
        </table>

        <!-- Pagination -->
        {!! $productions->links('production/pagination') !!}
      </div>
    </div>
  </div>
@endsection
