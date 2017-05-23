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
                  <div class="panel-heading">New Report</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('report.store') }}">
                          {{ csrf_field() }}
                          
                          <div class="form-group">
                              <label for="prod_id" class="col-md-4 control-label">Production Name</label>

                                <div class="col-md-6">
                                      <select class="form-control prod_id" name="prod_id" id="prod_id">
                                        <option value="0" disabled="true" selected="true">-Select Production-</option>
                                        @foreach($productions as $production)
                                          <option value='{{ $production->id }}'>{{ $production->prod_name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                          </div>


                          <div class="form-group{{ $errors->has('process') ? ' has-error' : '' }}">
                              <label for="process" class="col-md-4 control-label">Process</label>

                              <div class="col-md-6">
                                  <textarea id="process" type="process" class="form-control" name="process" value="{{ old('process') }}" required></textarea>

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
                                  <textarea id="achievement" type="achievement" class="form-control" name="achievement" value="{{ old('achievement') }}" required></textarea>

                                  @if ($errors->has('achievement'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('achievement') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('prob_cause') ? ' has-error' : '' }}">
                              <label for="prob_cause" class="col-md-4 control-label">Problem and Causes</label>

                              <div class="col-md-6">
                                  <textarea id="prob_cause" type="prob_cause" class="form-control" name="prob_cause" value="{{ old('prob_cause') }}" required></textarea>

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
                                  <textarea id="solution" type="solution" class="form-control" name="solution" value="{{ old('solution') }}" required></textarea>

                                  @if ($errors->has('solution'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('solution') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="{{ route('report.index') }}" class="btn btn-primary">View Report</a>
                              </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>


@endsection
