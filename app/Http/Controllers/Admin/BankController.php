<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use Kodami\Models\Mysql\Bank; 

class BankController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {        
        $params['data']     = Bank::orderBy('is_favorit', 'DESC')->get();

    	return view('admin.bank.index')->with($params);
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.bank.create');
    }
    
    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $data = Bank::where('id', $id)->first();

        return view('admin.bank.edit', compact('data'));
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
        $data =  Bank::where('id', $id)->first();
        $data->nama             = $request->nama;
        $data->bank_code        = $request->bank_code;
        
        if ($request->hasFile('logo')) {
            
            $image = $request->file('logo');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/bank');
            
            $image->move($destinationPath, $name);

            $data->image = $name;
        }

        $data->save();

        return redirect()->route('bank.index')->with('message-success', 'Data berhasil disimpan'); 
    }
    
    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $data = Bank::where('id', $id)->first();
        $data->delete();

        return redirect()->route('bank.index')->with('message-sucess', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        $data                   = new Bank();
        $data->nama             = $request->nama;
        $data->bank_code        = $request->bank_code;
        
        if ($request->hasFile('logo')) {
            
            $image = $request->file('logo');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/bank');
            
            $image->move($destinationPath, $name);

            $data->image = $name;
        }

        $data->save();

        return redirect()->route('bank.index')->with('messages-success', 'Bank berhasil disimpan');
   }
}
