@extends('layouts.engineer')

@section('content')

@if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    <strong>Success:</strong> {{ Session::get('success')}}
  </div>
@endif
<!-- Filter and Sort data-->
<div class="form-group">
  <div class="col-md-4 col-md-offset-6">
    <form class="navbar-form navbar-right" action="" method="get" role="search">
      <input type="text" name="search" class="form-control">
      <span class="input-group-data">
        <button type="submit" class="btn btn-default-sm" >
          Search Item
        </button>
      </span>
    </form>

  </div>
</div>


<!-- Show data-->
  <div class="container">
    <div class="row">
      <!-- <div class="col-md-10 col-md-offset-1">-->
      <div class="col-md-12 ">
        <table class="table table-striped">
          <tr>
            <th>No.</th>
            <th style="width:10%">Company's Name</th>
            <th style="width:23%">Address</th>
            <th style="width:12%">Telephone No.</th>
            <th style="width:12%">Office No.</th>
            <th style="width:15%">Person In Charge</th>
            <th style="width:15%">Modified By</th>
            <th style="width:15%">Actions</th>
          </tr>

          <?php $no=1; ?>

          @foreach($suppliers as $supplier)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$supplier->comp_name}}</td>
              <td>{{$supplier->address}}</td>
              <td>{{$supplier->tel_no}}</td>
              <td>{{$supplier->office_no}}</td>
              <td>{{$supplier->pic}}</td>
              <td>{{$supplier->modified_by}}</td>
              <td>
                <form class="" action="{{ route('supplier.destroy',$supplier->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{ route('supplier.edit',$supplier->id) }}" class="btn btn-primary">Edit</a>
                  <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')"name="name" value="Delete">
                </form>
              </td>
            </tr>
          @endforeach
        </table>

        <!-- Pagination -->
        {!! $suppliers->links('pagination') !!}
      </div>
    </div>
  </div>

@endsection
