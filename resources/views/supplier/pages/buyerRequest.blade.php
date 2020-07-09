@extends('home')

@section('content')
<div class="content-wrapper" id="app">
    <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Procurement Requests</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>serial</th>
                  <th>Suppliers</th>
                  <th>Product Name</th>
                  <th>Qty</th>
                  <th>Unit Price</th>
                  <th>Details</th>
                  <th>Total Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  {{-- {{dd($procurements)}} --}}
                 
                  @foreach ($procurements as $key => $request)
                  <tr>
                  <td>{{$key+1}}</td>
                      <td> 
                        {{Auth::user()->name}}
                      </td>
                      <td>
                        {{$request->Product->name}}
                      </td>

                      <td>{{$request->qty}}</td>
                      <td>{{$request->unitPrice}}</td>
                      <td>{{$request->details}}</td>
                      <td>{{$request->total}}</td>
                      <td>
                        {{-- {{dd($request->pivot->bided)}} --}}
{{-- 
                        @if ($request->pivot->bided == 1)
                           
                        <a href="{{route('supplier.show',$request->id)}}" class="btn btn-success disabled float-left mr-2 ">Bided</a>

                        @else 
                        <a href="{{route('supplier.show',$request->id)}}" class="btn btn-success float-left mr-2 ">Bid</a>
                        @endif --}}
                         

                        {{-- {{ dd($request->pivot) }} --}}
                         

                          @if ($request->pivot->bided == 1 && $request->pivot->is_approved == 0)

                            <a href="{{route('supplier.show',$request->id)}}" class="btn btn-success disabled float-left mr-2 ">Bided</a>
                          @elseif($request->pivot->is_approved == 1 && $request->pivot->bided == 1)
                             
                              <a href="{{route('supplier.show',$request->id)}}" class="btn btn-success float-left mr-2 disabled">Approved</a>
                           @else
                           <a href="{{route('supplier.show',$request->id)}}" class="btn btn-success float-left mr-2 ">Bid</a>
                          @endif
                            
                            

                          
{{--                              
                          @if ($request->pivot->bided == 1)
                              
                                 
                               @if (count($approved) != 0)
                                  @foreach ($approved as $approve)
                                    @if (($approve->bid_approval == 1))
                                        <a href="{{route('supplier.show',$request->id)}}" class="btn btn-success float-left mr-2 disabled">Approved</a>

                                        @else  

                                        <a href="{{route('supplier.show',$request->id)}}" class="btn btn-success disabled float-left mr-2 ">Bided</a>
                                    @endif

                                  @endforeach
                              
                               

                              
                              
                               @endif  
                               
                            
                          @endif

                         @if ($request->pivot->bided == 0)
                         <a href="{{route('supplier.show',$request->id)}}" class="btn btn-success float-left mr-2 ">Bid</a>
                         @endif
                       --}}
                        
 
                   
                     
                           

                       
                    </td>
                  </tr>


                
              @endforeach 
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>


       
        @if ($bid != null)
 

        <div class="col-8">
          <form role="form" action="{{route('supplier.bid', $procurement_id)}}" method="POST" id="form">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Supplier Name</label>
              <input  value="{{Auth::user()->id}}" name="supplier_id" hidden>
              <input type="text" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->name}}" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Product</label>
              <input value="{{$bid->Product->id}}" name="product_id" hidden>
              <input type="text" class="form-control" id="exampleInputEmail1" value="{{$bid->Product->name}}" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="text" class="form-control" id="exampleInputEmail1" value="{{$bid->qty}}" name="qty" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Unit Price</label>
              <input type="text" class="form-control" id="exampleInputEmail1" value="{{$bid->unitPrice}}" name="unit_price">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Total Price</label>
              <input type="text" class="form-control" id="exampleInputEmail1" value="{{$bid->total}}" name="total">
            </div>
            <div class="form-group">
              <label for="">Details</label>
              <textarea class="form-control details" name="details" id="" rows="3"> </textarea>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
          <button type="submit" class="btn btn-primary save-data {{$bid->bid_approval == true ? "disabled" : ""}}" >{{$bid->bid_approval == true ? "Approved" : "Bid Now"}}</button>
          </div>
        </form>
        </div>
        @endif

    </div>
</div>
@endsection
@push('js')
    {{-- <script>
    
  $(".save-data").click(function(event){
      event.preventDefault();

      let supplier_id = $("input[name=supplier_id]").val();
      let product_id = $("input[name=product_id]").val();
      let qty = $("input[name=qty]").val();
      let unitPrice = $("input[name=unit_price]").val();
      let total = $("input[name=total]").val();
      let details = $(".details").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');
      let url = window.location.origin;

      console.log(this.form);
      $.ajax({
        url: url+"/bid",
        type:"POST",
        data:{
          supplier_id:supplier_id,
          product_id:product_id,
          qty:qty,
          unitPrice:unitPrice,
          total:total,
          details:details,
          _token: _token
        },
        cache:false,
        success:function(response){
          console.log(response);
          $("#form").trigger("reset");
        },
       });
       
  });
    </script> --}}
@endpush