<!-- Create data-->
@extends('layouts.app')

  @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">New Stock</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('stock.store') }}">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <label for="item_id" class="col-md-4 control-label">Item Name</label>

                                <div class="col-md-6">
                                      <select class="form-control" name="item_id" id="item_id">
                                        @foreach($items as $item)
                                          <option value='{{ $item->id }}'>{{ $item->description }}</option>
                                        @endforeach
                                      </select>
                                </div>
                          </div>

                          <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                              <label for="item_category" class="col-md-4 control-label">Quantity</label>

                              <div class="col-md-6">
                                  <input id="quantity" type="quantity" class="form-control" name="quantity" value="{{ old('quantity') }}" required>

                                  @if ($errors->has('quantity'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('quantity') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success pull-right">
                                      Add
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
      <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped">
          <tr>
            <th>No.</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Modified By</th>
            <th>Last Modified</th>
          </tr>

          <?php $no=1; ?>

          @foreach($stocks as $stock)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$stock->item->description}}</td>
              <td>{{$stock->quantity}}</td>
              <td>{{$stock->modified_by}}</td>
              <td>{{$stock->updated_at}}</td>
              <td>

              </td>
            </tr>
          @endforeach
        </table>

        <!-- Pagination -->

      </div>
    </div>
  </div>

@endsection
