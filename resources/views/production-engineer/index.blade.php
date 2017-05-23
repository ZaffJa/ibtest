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
        <table class="table" style="background-color:#E5E4E2">
          <tr style="background-color:#848482">
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
              <td>{{$production->depart->depart_name}}</td>
              <td>
                @foreach($production->users as $user)
                    <li>{{ $user->name}}</li>
                @endforeach
              </td>

            </tr>
          @endforeach
        </table>

        <!-- Pagination -->
        {!! $productions->links('pagination') !!}
      </div>
    </div>
  </div>

@endsection
