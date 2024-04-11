
@extends('chef.layouts.head')
  <body>
    <!-- top navigation bar -->
    @extends('chef.layouts.top-navigation-bar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
    @extends('chef.layouts.offcanvas')
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
    
    
        <div class="row">
          <div class="col-md-12 mb-3 ">
            <div class="card"  style="width: 90%">
              <div class="card-header  text-center">
                <span><i class="bi bi-table me-2"></i></span> عرض المكونات المضافة
              </div>
                 @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div> 
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                   
                    style="width: 100%"
                  >
                  <thead>
                        <tr>
                            <th style="width:5%">الرقم</th>
                            <th style="width:10%">الرقم</th>
                            <th style="width:20%">المكون</th>
                            
                            <th style="width:20%">الكمية</th>
                            <th style="width:25%">وحدة القياس</th>
                            <th style="width:5%" class="text-center">رئيسي</th>
                            
                            <th style="width:1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <form action="{{ route('uuu') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}

                        @php $i = 0 @endphp
                        @if(session('dish_cart'))
                            @foreach(session('dish_cart') as $id => $details)
                                <?php
                               
                                ?>
                                <tr data-id="{{ $id }}">
                                <td>  <input type="text" name="inputs[{{$i}}][dish_id]" value="{{  $dish->id }}" class="form-control  dish_cart_update"  /> 
                                    </td>
                                    <td>  <input type="text"  name="inputs[{{$i}}][ingredient_id]" value="{{ $id }}" class="form-control  dish_cart_update"  /> 
                                    </td>
                                                       
                                    <td data-th="Product">
                                         <input type="text" name="inputs[{{$i}}][name]" value="{{ $details['name'] }}" class="form-control  dish_cart_update"  /> 
                                           
                                            
                                    </td>

                                    

                                    <td data-th="Quantity">
                                        <input type="number" name="inputs[{{$i}}][servingSize]"   class="form-control  dish_cart_update" min="0" required />
                                    </td>
                                    <td data-th="Price">
                                   
                                        <select class="form-control " name="inputs[{{$i}}][measruing_unit]" required >
                                            
                                             <option selected disabled></option>
                                            
                                            <option value="جرام">جرام</option>
                                            <option value="معلقة صغيرة">معلقة صغيرة</option>
                                            <option value="معلقة كبيرة">معلقة كبيرة</option>
                                            <option value="كوب">كوب</option>
                                        </select>
                                  
                                    </td>
                                   
                                    <td class="text-center">
                                      
                                      <input type="checkbox"  name="inputs[{{$i}}][type]" value="رئيسي">
                                    </td>

                                    <?php
                                    // <td data-th="Subtotal" class="text-center">${{ $details[''] * $details[''] }}</td>
                                    ?>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm dish_cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                                    </td>
                                </tr>
                                @php
                                 $i++;
                                 @endphp
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                       
                        <tr>
                            <td colspan="5" class="text-right">
                                <a href="{{ url('/chef/dashboard/ingredients') }}/{{ $dish->id }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i>  إضافة المزيد</a>
                                <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
                            </td>
                        </tr>

                    </tfoot></form>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




    </main>



    


    <script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
   
    <script src="/js/dataTables.bootstrap5.min.js"></script>

    <script src="/js/script.js"></script>

    

    <script type="text/javascript">

   
    $(".dish_cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_dish_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
    </body>
</html>