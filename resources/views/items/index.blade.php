<!-- Create data-->
@extends('layouts.app')
  @section('content')

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
      <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped">
          <tr>
            <th>No.</th>
            <th>Item Category</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>

          <?php $no=1; ?>

          @foreach($items as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->category->name}}</td>
              <td>{{$item->description}}</td>
              <td>
                <form class="" action="{{ route('items.destroy',$item->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{ route('items.edit',$item->id) }}" class="btn btn-primary">Edit</a>
                  <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')"name="name" value="Delete">
                </form>
              </td>
            </tr>
          @endforeach
        </table>

        <!-- Pagination -->
        {!! $items->links('pagination') !!}
      </div>
    </div>
  </div>

@endsection
