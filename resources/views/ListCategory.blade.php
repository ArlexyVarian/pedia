@extends('AdminLayout')

@section('admincontent')
<h1>Category</h1>
<br><br>

<table class="table">
  <tbody>
  @foreach($category as $item)
    <tr>
    <td><a href="#" class="btn btn-info addRow" role="button" >{{$item->category}}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

<script type="text/javascript">
  ('.addRow').on('click', function(){
    addRow();
  });

  function addRow(){
    var tr = '<tr>'+
                    '<td>'+
                        '<select name="brandName[]" class="form-control">'+
                            '<option>Sony</option>'+
                            '<option>Samsung</option>'+
                            '<option>Huawei</option>'+
                        '</select>'+
                      '</td>'+
                      '<td><input type="text" name="model[]" class="form-control"></td>'+
                      '<td><input type="text" name="price[]" class="form-control"></td>'+
                      '<td style="text-align: center"><a href="#" class="btn btn-danger">-</a></td>'+
              '</tr>'
            ('tbody').append('tr');
    };  
</script>

@stop


