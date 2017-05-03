<!-- Edit data-->
@extends('layouts.app')
  @section('stylesheets')
    {!! Html::style('css/select2.min.css')!!}
  @endsection
  @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Edit Production</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('production.update', $production->id) }}">
                          <input name="_method" type="hidden" value="PATCH">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('prod_name') ? ' has-error' : '' }}">
                              <label for="prod_name" class="col-md-4 control-label">Production Name</label>

                              <div class="col-md-6">
                                  <input id="prod_name" type="text" class="form-control" name="prod_name" value="{{ $production->prod_name }}" required autofocus>

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
                                  <input id="department" type="department" class="form-control" name="department" value="{{ $production->department }}" required>

                                  @if ($errors->has('department'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('department') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          {{ Form::label('users', 'Team Member', ['class' => 'col-md-4 control-label']) }}
                          {{ Form::select('users[]', $users, null, ['class' => 'col-md-6 select2-multi', 'multiple' => 'multiple']) }}

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

@section('script')
  {!! Html::script('js/select2.min.js')!!}

  <script type="text/javascript">
      $(".select2-multi").select2();
      $(".select2-multi").select2().val({!! json_encode($production->users()->allRelatedIds())!!}).trigger('change');
  </script>
@endsection
