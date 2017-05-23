<!-- Create data-->
@extends('layouts.technician')
  @section('content')



  <!-- Show data-->
    <div class="container">
      <div class="row">
        <!-- <div class="col-md-10 col-md-offset-1">-->
        <div class="col-md-10 col-md-offset-1">
          <table class="table" style="background-color:#E5E4E2">
            <tr style="background-color:#848482">
              <th>No.</th>
              <th>Production Name</th>
              <th>Added By</th>
              <th>Modified By</th>
              <th>Last Modified</th>
              <th>Action</th>
            </tr>

            <?php $no=1; ?>

            @foreach($reports as $report)
              <tr class="report{{$report->id}}">
                <td>{{$no++}}</td>
                <td>{{$report->production->prod_name}}</td>
                <td>{{$report->added_by}}</td>
                <td>{{$report->modified_by}}</td>
                <td>{{$report->updated_at}}</td>
                <td>
                    <button class="view-report btn btn-primary" data-id="{{$report->id}}" data-process="{{$report->process}}" data-achievement="{{$report->achievement}}" data-prob_cause="{{$report->prob_cause}}" data-solution="{{$report->solution}}">Edit</button>
                </td>
              </tr>
            @endforeach
          </table>

          <!-- Pagination  data-prod="{{$report->production->prod_name}}" -->

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
                  <label class="control-label col-sm-2" for="id">Report ID :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fid" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="process" >Process:</label>
                  <div class="col-sm-10">
                    <textarea type="name" class="form-control" id="pro"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="achievement" >Achievement:</label>
                  <div class="col-sm-10">
                    <textarea type="name" class="form-control" id="ach"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="prob_cause" >Problem and Cause:</label>
                  <div class="col-sm-10">
                    <textarea type="name" class="form-control" id="pc"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="solution" >Solution:</label>
                  <div class="col-sm-10">
                    <textarea type="name" class="form-control" id="sln"></textarea>
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

  <div id="myMessage" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <form class="form-horizontal" role="form">
              <div class="form-group">
                Data successfully updated!
              </div>
          </form>
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
$(document).on('click', '.view-report', function() {
      $('#footer_action_button').text(" Update");
      $('.actionBtn').addClass('btn-success');
      $('.actionBtn').removeClass('btn-danger');
      $('.actionBtn').addClass('edit');
      $('.modal-title').text('Edit');
      $('.deleteContent').hide();
      $('.form-horizontal').show();
      $('#fid').val($(this).data('id'));
        //$('#pid').val($(this).data('prod'));
      $('#pro').val($(this).data('process'));
      $('#ach').val($(this).data('achievement'));
      $('#pc').val($(this).data('prob_cause'));
      $('#sln').val($(this).data('solution'));
      $('#myModal').modal('show');
  });
  $('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'post',
        url: '/editNameTech',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('#fid').val(),
            //'prod': $('#pid').val(),
            'process': $('#pro').val(),
            'achievement': $('#ach').val(),
            'prob_cause': $('#pc').val(),
            'solution': $('#sln').val(),
        },
        success: function(data) {
            $('.report' + data.id).replaceWith("<tr class='report" + data.id + "'><td>" + {{$no-1}} + "</td><td>" + data.p_name + "</td><td>" + data.added_by + "</td><td>" + data.modified_by + "</td><td>" + data.updated_at + "</td><td><button class='edit-stock btn btn-info' data-id='" + data.id +  "' data-process='" + data.process + "' data-achievement='" + data.achievement + "' data-prob_cause='" + data.prob_cause + "' data-solution='" + data.solution +"'>Edit</button></td></tr>");
            //  $("#myMessage").modal('show');
            alert("Data successfully updated!");
        }
    });
  });
  </script>
@endsection
