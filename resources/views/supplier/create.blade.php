@extends('layouts.engineer')

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
                <div class="panel-heading">New Supplier</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('supplier.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('comp_name') ? ' has-error' : '' }}">
                            <label for="comp_name" class="col-md-4 control-label">Company's Name</label>

                            <div class="col-md-6">
                                <input id="comp_name" type="text" class="form-control" name="comp_name" value="{{ old('comp_name') }}" required autofocus>

                                @if ($errors->has('comp_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comp_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address" value="{{ old('address') }}" required autofocus ></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel_no') ? ' has-error' : '' }}">
                            <label for="tel_no" class="col-md-4 control-label">Telephone Number</label>

                            <div class="col-md-6">
                                <input id="tel_no" type="text" class="form-control" name="tel_no" value="{{ old('tel_no') }}" required>

                                @if ($errors->has('tel_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('office_no') ? ' has-error' : '' }}">
                            <label for="office_no" class="col-md-4 control-label">Office Number</label>

                            <div class="col-md-6">
                                <input id="office_no" type="text" class="form-control" name="office_no" value="{{ old('office_no') }}" required>

                                @if ($errors->has('office_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('office_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group{{ $errors->has('pic') ? ' has-error' : '' }}">
                             <label for="pic" class="col-md-4 control-label">Person In Charge</label>

                             <div class="col-md-6">
                                 <input id="pic" type="text" class="form-control" name="pic" value="{{ old('pic') }}" required>

                                 @if ($errors->has('pic'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('pic') }}</strong>
                                     </span>
                                 @endif
                             </div>
                          </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('supplier.index') }}" class="btn btn-warning">View Suppliers</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
