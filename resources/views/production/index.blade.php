<!-- Create data-->
@extends('layouts.app')
  @section('stylesheets')
    {!! Html::style('css/select2.min.css')!!}
  @endsection
  @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">New Production</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('production.store') }}">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('prod_name') ? ' has-error' : '' }}">
                              <label for="prod_name" class="col-md-4 control-label">Production Name</label>

                              <div class="col-md-6">
                                  <input id="prod_name" type="text" class="form-control" name="prod_name" value="{{ old('prod_name') }}" required autofocus>

                                  @if ($errors->has('prod_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('prod_name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                              <label for="department" class="col-md-4 control-label">Department</label>

                              <div class="col-md-6">
                                <select class="form-control deparment" name="deparment" id="deparment">
                                  <option value="0" disabled="true" selected="true">-Select Department-</option>
                                  @foreach($deparments as $deparment)
                                    <option value='{{ $deparment->id }}'>{{ $deparment->depart_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="" class="col-md-4 control-label">Team Member</label>

                              <div class="col-md-6">
                                  <select class="form-control select2-multi" name="users[]" multiple="multiple">
                                    @foreach($users as $user)
                                      <option value='{{ $user->id }}'>{{ $user->name }}</option>
                                    @endforeach
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

<!-- Filter and Sort data-->
<div class="form-group">
  <div class="col-md-7">
    <form class="navbar-form navbar-right" action="" method="get" role="search">
      <input type="text" name="search" class="form-control">
      <span class="input-group-data">
        <button type="submit" class="btn btn-default-sm" >
          Search
        </button>
      </span>
    </form>
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
            <th>Production Name</th>
            <th>Department</th>
            <th>Team Member</th>
            <th>Actions</th>
          </tr>

          <?php $no=1; ?>

          @foreach($productions as $production)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$production->prod_name}}</td>
              <td>{{$production->depart->depart_name}}</td>
              <td>
                @foreach($production->users as $user)
                    <li>{{ $user->name}}</li>
                @endforeach
              </td>
              <td>
                <form class="" action="{{ route('production.destroy',$production->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{ route('production.edit',$production->id) }}" class="btn btn-primary">Edit</a>
                  <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')"name="name" value="Delete">
                </form>
              </td>
            </tr>
          @endforeach
        </table>

        <!-- Pagination -->
        {!! $productions->links('pagination') !!}
      </div>
    </div>
  </div>

@endsection

@section('script')
  {!! Html::script('js/select2.min.js')!!}

  <script type="text/javascript">
      $(".select2-multi").select2();
  </script>
@endsection
