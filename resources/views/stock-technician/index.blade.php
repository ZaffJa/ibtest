<!-- Create data-->
@extends('layouts.technician')

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
            <th>Action</th>
          </tr>

          <?php $no=1; ?>

          @foreach($items as $item)
            <tr class="item{{$item->id}}">
              <td>{{$no++}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->modified_by}}</td>
              <td>{{$item->updated_at}}</td>
              <td>
                  <button class="edit-stock btn btn-primary" data-id="{{$item->id}}" data-description="{{$item->description}}" data-quantity="{{$item->quantity}}" data-modified_by="{{$item->modified_by}}">Edit</button>
              </td>
            </tr>
          @endforeach
        </table>

        <!-- Pagination -->

      </div>
    </div>
  </div>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fid" disabled>
              </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-2" for="description" >Item Name:</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="desc" disabled>
              </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="quantity">Quantity:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="qty">
            </div>
          </div>
        </form>

        <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
        $('.dropdown-toggle').dropdown();
});
$(document).on('click', '.edit-stock', function() {
      $('#footer_action_button').text(" Update");
      $('.actionBtn').addClass('btn-success');
      $('.actionBtn').removeClass('btn-danger');
      $('.actionBtn').addClass('edit');
      $('.modal-title').text('Edit');
      $('.deleteContent').hide();
      $('.form-horizontal').show();
      $('#fid').val($(this).data('id'));
      $('#desc').val($(this).data('description'));
      $('#qty').val($(this).data('quantity'));
      $('#myModal').modal('show');
  });
  $('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'post',
        url: '/editTech',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('#fid').val(),
            'description': $('#desc').val(),
            'quantity': $('#qty').val()
        },
        success: function(data) {
            $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.description + "</td><td>" + data.quantity + "</td><td>" +data.modified_by+ "</td><td>" +data.updated_at+"</td><td><button class='edit-stock btn btn-info' data-id='" + data.id + "' data-description='" + data.description + "' data-quantity='" + data.quantity + "'>Edit</button></td></tr>");
        }
    });
  });
    //$(document).ready(function(){
//$('#edit-stock').click(function(){
            //console.log("done");
            //$('#myModal .modal-title').html("Edit Item");
          //  console.log("done");
        //});
      //});
        //console.log(e);

        //var cat_id= e.target.value;

        //ajax
      //  $.get('/itemName?cat_id=' + cat_id, function(data){
          //$('#description').empty();
          //('#description').append('<option value="0" selected disabled>Choose Item</option>');
          //success data
          //.each(data, function(index, itemObj){
          //  $('#description').append('<option value="'+itemObj.id+'">'+itemObj.description+'</option>');
        //  });
//});
  </script>
@endsection
