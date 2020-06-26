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
                 
                      @foreach ($bids as $key => $bid)
                          <tr>
                          <td>{{$key+1}}</td>
                              <td>
                                  {{$bid->User->name}}
                              </td>
                              <td>{{$bid->Product->name}}</td>
                              <td>{{$bid->qty}}</td>
                              <td>{{$bid->unit_price}}</td>
                              <td>{{$bid->details}}</td>
                              <td>{{$bid->total}}</td>
                              <td>

                              <a href="{{route('procurement.accept',$bid->id)}}" class="btn btn-primary {{$bid->bid_approval == true ? 'disabled' : ''}}" >Approve</a>
                                {{-- <a 
                                href="{{route('send.req',$bid->id)}}" 
                                class="btn btn-outline-dark" 
                                {{$procurement->req_send == true ? "disabled" : ""}}
                                >{{$procurement->req_send == true ? "Sent" : "Send request"}} </a> --}}
                              </td>
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