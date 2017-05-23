<!-- tak guna-->
@extends('layouts.app')

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
      <div class="col-md-10 col-md-offset-1">
        <table class="table" style="background-color:#E5E4E2">
          <tr style="background-color:#848482">
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

@section('script')

  <script type="text/javascript">
      $('#category_id').on('change', function(e){
        console.log(e);

        var cat_id= e.target.value;

        //ajax
        $.get('/itemName?cat_id=' + cat_id, function(data){
          $('#item_id').empty();
          $('#item_id').append('<option value="0" selected disabled>Choose Item</option>');
          //success data
          $.each(data, function(index, itemObj){
            $('#item_id').append('<option value="'+itemObj.id+'">'+itemObj.description+'</option>');
          });
        });
      });
  </script>
@endsection
