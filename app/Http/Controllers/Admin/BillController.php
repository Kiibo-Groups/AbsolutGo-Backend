<?php

namespace App\Http\Controllers\Admin;

// Controller Facturama
use App\Http\Controllers\FacturamaController;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Banner;
use App\City;
use App\User;
use App\Admin;
use App\BannerStore;
use DB;
use Validator;
use Redirect;
use IMS;

class BillController extends Controller
{
    public $folder  = "admin/bills.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClients()
    {
        $res = new FacturamaController;

        return response()->json(['data' => $res->getClients()]);

        // return View($this->folder.'list_clients',[
        //     'data' => $res->getClients(),
        //     'link' => env('admin').'/bill_clients/'
        // ]);
    }

    public function addClient()
    {
        return View($this->folder.'addClient',[
            'data' 		=> [],
            'form_url' 	=> env('admin').'/addClient'
        ]);
    }

    public function editClient($id)
    {
        $req = new FacturamaController;
        
        // return response()->json($req->searchClientById($id));
        
        return View($this->folder.'editClient',[
            'data' 		=> $req->searchClientById($id),
            'form_url' 	=> env('admin').'/updateClient'
        ]);
    }
    
    public function _addClient(Request $request)
    {
        try {
            $newClient = new FacturamaController;
            $req = $newClient->addClient($request->all(),'new');
            
            // return response()->json($request->all());
            // return response()->json($req);

            return redirect(env('admin').'/bill_clients')->with('message','Nuevo cliente agregado.');
        } catch (\Exception $th) {
            return redirect(env('admin').'/add_client')->with('error','Error : ',$th->getMessage());
        }

    }

    public function updateClient(Request $request)
    {
        try {
            $newClient = new FacturamaController;
            $req = $newClient->addClient($request->all(),'update');
             
            return redirect(env('admin').'/bill_clients')->with('message','Nuevo cliente agregado.');
        } catch (\Exception $th) {
            return redirect(env('admin').'/add_client')->with('error','Error : ',$th->getMessage());
        }
    }

    public function deleteClient($id)
    {
        try {
            $req = new FacturamaController;
            $req->DeleteClient($id);
            return redirect(env('admin').'/bill_clients')->with('message','Cliente eliminado con éxito.');
        } catch (\Exception $th) {
            return redirect(env('admin').'/bill_clients')->with('error','Error : ',$th->getMessage());
        }
    }
}
