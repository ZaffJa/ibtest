<!-- Create data-->
@extends('layouts.engineer')
  @section('content')
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
      <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped">
          <tr>
            <th>No.</th>
            <th>Production Name</th>
            <th>Department</th>
            <th>Team Member</th>
          </tr>

          <?php $no=1; ?>

          @foreach($productions as $production)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$production->prod_name}}</td>
              <td>{{$production->department}}</td>
              <td>{{$production->team_member}}</td>

            </tr>
          @endforeach
        </table>

        <!-- Pagination -->
        {!! $productions->links('pagination') !!}
      </div>
    </div>
  </div>

@endsection
