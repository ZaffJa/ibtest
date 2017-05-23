
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax ToDo list project</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Ajax ToDo List <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
				  </div>
				  <div class="panel-body">
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
                <tr class="itemrow">
                  <td>{{$no++}}</td>
                  <td class="desc">{{$stock->description}}</td>
                  <td class="qty">{{$stock->quantity}}</td>
                  <td>{{$stock->modified_by}}</td>
                  <td>{{$stock->updated_at}}</td>
                  <td>

                  </td>
                </tr>
              @endforeach
            </table>
				  </div>
				</div>
			</div>

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Modal title</h4>
			      </div>
			      <div class="modal-body">
			        <p id="staticdesc">{{$stock->description}}</p>
              <p><input type="text" value="{{$stock->quantity}}" id="edititem"></p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
	</div>

	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      $('.itemrow').each(function(){
        $(this).click(function(event){
          var text1 = $('.desc').text();
          var text2 = $('.qty').text();
          $('#staticdesc').val(text1);
          $('#edititem').val(text2);
          console.log(text1);
          console.log(text2);
        });
      });
    });
  </script>
</body>
</html>
