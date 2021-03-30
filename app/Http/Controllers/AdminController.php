<?php

namespace App\Http\Controllers;

use App\Cd;

use Illuminate\Http\Request;
use Illuminate\Session\Store;

class AdminController extends Controller
{
    /**
     *  auth admin
     */
    public function authentication()
    {
        return view('admin.auth'); 
    }
    
    /**
     *  main menu admin
     */
    public function main()
    {
        return view('admin.main'); 
    }

    /**
     * Create admin 
     */
    public function add(Request $request, Store $session )
    {
        // redirection auto si pb dans la saisie
         $validation =  $this->validate($request, [
            'title'=>'required|min:5',
            'description'=>'required|min:3'
            ]);

           return redirect()
           ->route('admin.main')
           ->with('info','nouvelle entrée enregistrée: ' . $request->input('title'));
    }

    /**
     *  update admin
     */
    public function update()
    {
        return view('admin.update'); 
    }

     /**
     *  delete admin
     */
    public function delete()
    {
        return view('admin.delete'); 
    }

    /**
     *  updateordelete admin
     */
    public function updateOrDelete(Store $session)
    {
        $cds = $session->get('cds');
        return view('admin.updateordelete', ['cds'=> $cds]); 
    }
}
