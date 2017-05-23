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
                  <div class="panel-heading">New Financial</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('prod_name') ? ' has-error' : '' }}">
                              <label for="prod_name" class="col-md-4 control-label">Order Id</label>

                              <div class="col-md-6">
                                  <input id="prod_name" type="text" class="form-control" name="prod_name" value="" required autofocus>


                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                              <label for="department" class="col-md-4 control-label">Total Expenses</label>

                              <div class="col-md-6">
                                  <input id="prod_name" type="text" class="form-control" name="prod_name" value="" required autofocus>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success pull-right">
                                      Submit
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">New Monthly Fund</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('prod_name') ? ' has-error' : '' }}">
                              <label for="prod_name" class="col-md-4 control-label">Month</label>

                              <div class="col-md-6">
                                  <input id="prod_name" type="text" class="form-control" name="prod_name" value="" required autofocus>


                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                              <label for="department" class="col-md-4 control-label">Amount of Fund</label>

                              <div class="col-md-6">
                                  <input id="prod_name" type="text" class="form-control" name="prod_name" value="" required autofocus>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success pull-right">
                                      Submit
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
  </script>
@endsection
