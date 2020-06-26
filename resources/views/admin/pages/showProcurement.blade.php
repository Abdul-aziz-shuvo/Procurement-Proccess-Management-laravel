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
                 
                      @foreach ($procurements as $key => $procurement)
                          <tr>
                          <td>{{$key+1}}</td>
                              <td>
                                  @foreach ($procurement->Suppliers as $supplier)
                                   <span class="badge badge-pill badge-primary"> {{$supplier->name}}</span>
                                  @endforeach
                              </td>
                              <td>{{$procurement->Product->name}}</td>
                              <td>{{$procurement->qty}}</td>
                              <td>{{$procurement->unitPrice}}</td>
                              <td>{{$procurement->details}}</td>
                              <td>{{$procurement->total}}</td>
                              <td><a 
                                href="{{route('send.req',$procurement->id)}}" 
                                class="btn btn-outline-dark" 
                                {{$procurement->req_send == true ? "disabled" : ""}}
                                >{{$procurement->req_send == true ? "Sent" : "Send request"}} </a></td>
                          </tr>
                      @endforeach 
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

    </div>
</div>
@endsection