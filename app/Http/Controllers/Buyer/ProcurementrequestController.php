<?php

namespace App\Http\Controllers\Buyer;

use App\Bid;
use App\User;
use App\Buyer\Product;
use App\Buyer\Procurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcurementrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['suppliers'] = User::where('role','supplier')->get();
        $data['products'] = Product::all();
       return $data;
    }

    public function view()
    {
        return view('admin.pages.procurementrequest');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'suppliers'=>'required',
            'date'=>'required',
            'details'=>'required',
            'product'=>'required',
            'qty'=>'required',
            'total'=>'required',
            'unitPrice'=>'required',
            
        ]);

      $pr =   Procurement::create([
            'date'=> $request->date,
            'details'=>$request->details,
            'product_id'=>$request->product,
            'qty'=>$request->qty,
            'total'=>$request->total,
            'unitPrice'=>$request->unitPrice,
        ]);
     $pr->Suppliers()->attach($request->suppliers,['product_id'=> $request->product]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function procurements(){
        $data['procurements'] = Procurement::all();
        return view('admin.pages.showProcurement',$data);
        
       
      
    }
    public function sendReq($id){
        // dd($id);
       $procurement = Procurement::find($id);
       $procurement->req_send = true;
       $procurement->save();
       return redirect()->back();
      
    }
    public function getBid(){
        // dd($id);
       $data['bids'] = Bid::all();

       return view('admin.pages.bids',$data);
      
    }
    public function accept($id){
      
       $data = Bid::find($id);
       $data->bid_approval = true;
       $data->save();

       return redirect()->route('procurements.bid');
      
    }
}
