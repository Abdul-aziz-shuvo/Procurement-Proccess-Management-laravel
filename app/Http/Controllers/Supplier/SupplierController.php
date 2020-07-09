<?php

namespace App\Http\Controllers\Supplier;

use App\Bid;
use App\User;
use App\Buyer\Product;
use App\Buyer\Procurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $procurements = Procurement::where('req_send',1)->get();
        $data['procurements'] = Auth::user()->Procurements;
        $data['bid'] = null;
        $data['approved'] = Auth::user()->Bids;



        // $bided = Auth::user()->Procurements;
        // $bided = User::with(['Procurements' => function ($q) {
        //     $q->where('user_id', Auth::user()->id)->select('bided')->where('bided', 1);
        // }])->first();

        // $bided = Auth::user()->procurements();
        // dd($bided);
        // $bided = Procurement::all()->Suppliers->where('user_id', Auth::user()->id)->get();


        // foreach ($bided->Procurements as $key => $value) {
        //     # code...
        // }

        return view('supplier.pages.buyerRequest', $data);
    }

    public function bid(Request $request, $id)
    {



        $request->validate([
            'product_id' => 'required',
            'qty' =>  'required',
            'unit_price' =>  'required',
            'total' =>  'required',


        ]);

        Bid::create([
            'user_id' => $request->supplier_id,
            'product_id' => $request->product_id,
            'procurement_id' => $id,
            'qty' => $request->qty,
            'unit_price' => $request->unit_price,
            'total' => $request->total,
            'details' => $request->details,


        ]);
        // Auth::user()->Procurements()->sync('bided', 1);
        // Auth::user()->Procurements()->where('product_id', $request->product_id)->update(['bided' => 1]);
        // Auth::user()->Procurements()->sync(['bided' => 1]);
        Auth::user()->procurements()->updateExistingPivot(
            $id,
            ['bided' => 1]
        );
        return redirect()->route('supplier.index');
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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['procurements'] = Auth::user()->Procurements->where('req_send', 1);
        $data['bid'] = Procurement::find($id);
        $data['approved'] = Auth::user()->Bids->where('bid_approval', 1);
        $data['procurement_id'] = $id;
        return view('supplier.pages.buyerRequest', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
