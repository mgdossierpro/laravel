<?php

namespace App\Http\Controllers;

use App\Models\Cd;
use Illuminate\Http\Request;

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
    public function add(Request $request)
    {
        // redirection auto si pb dans la saisie
        $validation =  $this->validate($request, [
        'title'=>'required|min:5',
        'description'=>'required|min:3'
        ]);

        dump('ice');

        if($validation)
        {
            $cd = new Cd();
            $cd->title($request->input('title'));
            $cd->description($request->input('description'));
            $returnedId = $cd->create($cd);

            return view('admin.main')->with('info', $returnedId .' was created');
        }
    }

    /**
     *  update admin
     */
    public function updateCd(Request $request)
    {
        //get from db first
        $cd = Cd::find($request->input('id'));
        // set new attributes
        $cd->title($request->input('title'));
        $cd->title($request->input('description'));
        $cd->save();

        return view('admin.update')->with('info', 'info updated');
    }

     /**
     *  delete admin
     */
    public function delete($id)
    {
        $cd = Cd::find($id);
        $cd->delete();
        return view('admin.delete')->with('info', 'cd deleted');
    }

    /**
     *  updateordelete admin
     */
    public function updateOrDelete()
    {
        $cd = new Cd();
        $cds = $cd->getCds();
        return view('admin.updateordelete', ['cds'=> $cds]);
    }
}
