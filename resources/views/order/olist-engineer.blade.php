<!-- Create data-->
@extends('layouts.engineer')

  @section('content')
  @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      <strong>Success:</strong> {{ Session::get('success')}}
    </div>
  @endif

  <div class="container">
    <div class="row">
      <!-- <div class="col-md-10 col-md-offset-1">-->
      <div class="col-md-10 col-md-offset-1">
        <div class="panel-body">
        <table class="table" style="background-color:#E5E4E2">
          <tr style="background-color:#848482">
            <th>No.</th>
            <th>Order Id</th>
            <th>Request By</th>
            <th>Department</th>
            <th>Supplier</th>
            <th>Status</th>
            <th>Action</th>
          </tr>

          <?php $no=1; ?>

          @foreach($orders as $order)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$order->id}}</td>
              <td>{{$order->created_by}}</td>
              <td>{{$order->department->depart_name}}</td>
              <td>{{$order->supplier->comp_name}}</td>
              <td>{{$order->status}}</td>
              <td>
                <button type="submit" class="btn btn-info">View</button>
              </td>

            </tr>
          @endforeach
        </table>
      </div>
        <!-- Pagination -->

      </div>
    </div>
  </div>
  @endsection
