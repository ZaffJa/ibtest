<!-- Create data-->
@extends('layouts.app')
  @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">New Report</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('report.store') }}">
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

                          <br>
                          <br>
                          Result :
                          <br>
                          <div class="form-group{{ $errors->has('process') ? ' has-error' : '' }}">
                              <label for="process" class="col-md-4 control-label">Process</label>

                              <div class="col-md-6">
                                  <input id="process" type="textbox" class="form-control" name="process" value="{{ old('team_member') }}" required>

                                  @if ($errors->has('process'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('process') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('achievement') ? ' has-error' : '' }}">
                              <label for="achievement" class="col-md-4 control-label">Achievement</label>

                              <div class="col-md-6">
                                  <input id="achievement" type="textbox" class="form-control" name="achievement" value="{{ old('achievement') }}" required>

                                  @if ($errors->has('achievement'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('achievement') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('prob_cause') ? ' has-error' : '' }}">
                              <label for="prob_cause" class="col-md-4 control-label">Problems and Causes</label>

                              <div class="col-md-6">
                                  <input id="prob_cause" type="textbox" class="form-control" name="prob_cause" value="{{ old('prob_cause') }}" required>

                                  @if ($errors->has('prob_cause'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('prob_cause') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('solution') ? ' has-error' : '' }}">
                              <label for="solution" class="col-md-4 control-label">Solution</label>

                              <div class="col-md-6">
                                  <input id="solution" type="textbox" class="form-control" name="solution" value="{{ old('solution') }}" required>

                                  @if ($errors->has('solution'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('solution') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('added_by') ? ' has-error' : '' }}">
                              <label for="solution" class="col-md-4 control-label">Added By</label>

                              <div class="col-md-6">
                                  <input id="added_by" type="textbox" class="form-control" name="added_by" value="{{ old('added_by') }}" required>

                                  @if ($errors->has('added_by'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('added_by') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success pull-right">
                                      Send
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
