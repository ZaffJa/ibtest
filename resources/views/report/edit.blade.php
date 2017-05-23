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
                  <div class="panel-heading">Edit Report</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('report.update', '$report->id') }}">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <label for="prod_id" class="col-md-4 control-label">Production Name</label>

                                <div class="col-md-6" disabled>
                                      {{ $report->p_name }}
                                </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="{{ route('report.create') }}" class="btn btn-primary">View Item</a>
                              </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>


@endsection
