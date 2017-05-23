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
      <div class="col-md-2 col-md-offset-9">
        <a href="{{ route('order.olist-engineer') }}" class="btn btn-warning pull-right">View Order</a>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1 ">
              <div class="panel panel-default">
                  <div class="panel-heading">New Order</div>
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('order.store') }}">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <label for="department" class="col-md-2  control-label">Department</label>

                              <div class="col-md-3">
                                <select class="form-control" name="department" id="department">
                                  @foreach($deparments as $deparment)
                                    <option  value='{{ $deparment->id }}'>{{ $deparment->depart_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="" class="col-md-2 control-label">Company Name</label>

                              <div class="col-md-3">
                                  <select class="form-control" name="comp_name" id="comp_name">
                                    @foreach($suppliers as $supplier)
                                      <option data-comp_name="{{ $supplier->comp_name }}" value='{{ $supplier->id }}'>{{ $supplier->comp_name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <label for="" class="col-md-2 control-label">Contact Name</label>

                              <div class="col-md-3" id="contact">
                              </div>
                          </div>

                          <div class="form-group">

                              <label for="" class="col-md-2 control-label">Office No</label>

                              <div class="col-md-3" id="on">
                              </div>

                              <label for="" class="col-md-2 control-label">Fax No</label>

                              <div class="col-md-3" id="fn">
                              </div>

                          </div>
                          <div class=""form-group>
                            <table class="table table-striped" id="tbl">
                                <tr style="background-color: #33D4FF">
                                  <th>Item</th>
                                  <th class="col-md-1">Quantity</th>
                                  <th class="col-md-1">Price</th>
                                  <th class="col-md-2">Total(RM)</th>
                                  <th class="col-md-1">Action</th>
                                <tr>
                                <tr style="background-color: #D9D2D2" id="add_name" name="additem">
                                  <td><select class="form-control order_list" name="itemselected" id="itemselected">
                                        @foreach($items as $item)
                                          <option value='{{ $item->id }}' data-item="{{ $item->id }}">{{ $item->description }}</option>
                                        @endforeach
                                      </select>
                                  </td>
                                  <!--<td>  <input type="number" min="1" class="form-control" placeholder="1" step="1" name="qty" id="qty" onkeyup="calculateRow()"></td>-->
                                  <td>  <input class="form-control"  name="qty" id="qty" ></td>
                                  <td>  <input class="form-control" name="p" id="p"></td>
                                  <td class="total" id="t">   </td>
                                  <td>  <button class="btn btn-info" name="add" id="add">+</button></td>
                                <tr>

                            </table>
                          <!--
                          <div class="form-group">
                              <label for="" class="col-md-3 control-label" style="align-center">Item</label>

                              <label for="" class="col-md-1 control-label">Quantity</label>

                              <label for="" class="col-md-1 control-label">Price</label>

                              <label for="" class="col-md-1 control-label">Total</label>

                          </div>

                          <div class="form-group" id="add_name">
                              <div class="col-md-3">
                                  <select class="form-control order_list" name="iname[]">
                                    @foreach($items as $item)
                                      <option value='{{ $item->id }}'>{{ $item->description }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="col-md-1">
                                  <input class="form-control" id="qty">
                              </div>

                              <div class="col-md-1">
                                  <input class="form-control" id="p">
                              </div>

                              <div class="col-md-1" id="t">
                              </div>

                              <div class="col-md-1">
                                  <button class="btn btn-info" name="add" id="add">+</button>
                              </div>
                          </div>-->

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-success pull-right" id="submit">
                                      Send
                                  </button>
                              </div>
                          </div>
                      </form>
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
  $('#comp_name').on('change', function(e){
      console.log(e);

      var company = e.target.value;

      $.get('/company_details?company=' + company, function(data){
      $('#contact').empty();
      $('#on').empty();
      $('#fn').empty();
        $.each(data, function(Index, compObj){
            $('#contact').append('<input class="form-control" value="' +compObj.pic+ '" disabled>');
            $('#on').append('<input class="form-control" value="' +compObj.tel_no+ '"disabled>');
            $('#fn').append('<input class="form-control" value="' +compObj.office_no+ '"disabled>');
        });
      });
  });
//function calculateRow() {
    $(document).on('change', '#qty,#p', function(){

      //var token =  $(this).parent().find('input').attr("name","_token");
      //var qty =  $(this).parent().find('input').attr("id","qty");
      //var price =  $(this).parent().find('input').attr("id","p");
      //var total =  $(this).parent().parent().find('input').attr("id","t");


      //var token =  $(this).parent().find('input').attr("name","_token");
      //var $row = $(this).parent().find('#qty').val();
      //console.log($row);
      //var $row1 = $(this).parent().find('#p').val();
      //console.log($row1);
      //var q = $('#qty').val();

      //var $totalitem = $row*$row1;
      //total.val(totalitem);
      //$(this).parent().find('input').attr("id","t").val($totalitem);
      //var qty = $('#qty').val($(this).data('#qty'));
      //console.log(qty);
      //var p = $('#p').val();

        $.ajax({
            type: 'get',
            url: '/item_total',
            data: {
                //'_token': token.val(),
                '_token': $('input[name=_token]').val(),
                'quantity': $('#qty').val(),//qty.val(),
                'price': $('#p').val(),//price.val(),
            },
            success: function(data) {
              $('#t').empty();
                console.log(data);
                //console.log(qty);
                //total.val(data);
                //$('#t').replaceWith("<td><input class='form-control'value='"+data+" 'disabled></td>");
                //$('#t'+data.id).replaceWith("<td class='total"+data.id+"'><input class='form-control'value='"+data+" 'disabled></td>");
                $('#t').append("<input class='form-control'value='"+data+" 'disabled>");
            }
       });
     });
 //}

  $(document).ready(function(){

    $('#add').click(function(e){

            e.preventDefault();//to prevent dynamic add form missing after added
            var template = $('#tbl').append(
            '<tr style="background-color: #D9D2D2" name="additem" id="add-form">'+
            '  <td><select class="form-control order_list" name="iname[]">'+
                  '  @foreach($items as $item)'+
                    '  <option value='+{{ $item->id }}+'>{{ $item->description }}</option>'+
                  '  @endforeach'+
                '  </select>'+
              '</td>'+
            '  <td>  <input class="form-control"  name="q[]"id="qty" ></td>'+
              '<td>  <input class="form-control" name="p[]" id="p" ></td>'+
              '<td><input type="text" name="t" class="form-control" id="t" readonly/></td>'+
              '<td>  <button class="btn btn-danger" name="remove" id="remove">x</button></td>'+
            '</tr>');
            //$('#data').off('keyup').on('qty','p',calculateRow);

            $(template).after($('#totalitem'));

    });
    $('#tbl').on('click', '#remove', function(e){
            e.preventDefault();
            $(this).parents('#add-form').remove();
    });

  });
  </script>
  @endsection
