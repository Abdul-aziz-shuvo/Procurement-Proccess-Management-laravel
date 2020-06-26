@extends('home')
@push('css')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<style>
    .li{
    list-style: none;
    cursor: pointer;
    border-bottom: 1px solid rgb(248, 248, 248);
    
  }
  .li:hover
  {
    color: white;
    
  }
  .li:last-child{
    border-bottom: none;
  }
  .ul{
    padding: 0;
    background-color: rgba(187, 187, 187, 0.678);
    border-bottom: 1px solid rgba(43, 43, 43, 0.301);
    border-left: 1px solid rgb(43, 43,43, 0.301);
    border-right: 1px solid rgb(43, 43,43, 0.301);
    border-radius: 0px 0px 5px 5px;
  
   
  }
</style>
@endpush
@section('content')
<div class="content-wrapper" id="app">
    <procurementrequest></procurementrequest>
</div>

@push('js')
    <script>
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })

    </script>
@endpush
@endsection
