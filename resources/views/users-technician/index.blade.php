@extends('layouts.technician')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2 col-md-offset-8">
      <a href="{{ url('/change_tpassword') }}" class="btn btn-warning pull-right">Change Password</a>
    </div>
  </div>
</div>
<br>
<!-- Show data-->
  <div class="container">
    <div class="row">
      <!-- <div class="col-md-10 col-md-offset-1">-->
      <div class="col-md-8 col-md-offset-2">
        <table  class="table" style="background-color:#E5E4E2">
          <tr style="background-color:#848482">
            <th>No.</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>User Group</th>
          </tr>



          <?php $no=1; ?>

          @foreach($user as $users)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$users->name}}</td>
              <td>{{$users->email}}</td>
              <td>{{$users->roles->role}}</td>

            </tr>
          @endforeach
        </table>

        <!-- Pagination -->
        {!! $user->links('pagination') !!}

      </div>
    </div>
  </div>
@endsection
