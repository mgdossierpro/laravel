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
        return view('admin.login');
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

        if($validation)
        {
            $cd = new Cd();
            $cd->title =$request->input('title');
            $cd->description= $request->input('description');
            $saved = $cd->create($cd);
            if($saved)
            {
                return redirect()->back()->with('info',$request->input('title') .' was created');
            }

            return redirect()->back()->with('info', $request->input('title') .' was not created there is porblem');
        }
    }

    /**
     *  updateform admin
     */
    public function updateForm($id)
    {
        //get from db first
        $cdModel = new Cd();
        $cd = $cdModel->getCd($id);

        return view('admin.main' ,['cd'=>$cd , 'update'=>true]);
    }

    /**
     *  update admin
     */
    public function updateCd(Request $request)
    {
        $cdModel = new Cd();
        $cdModel->updateCd($request->input('id'),$request->input('title'),$request->input('description'));

        return redirect()->back()->with('info', 'info updated');
    }

     /**
     *  delete admin
     */
    public function delete($id)
    {
        $cd = new Cd();
        $deleted = $cd->deleteCd($id);
        return redirect()->back()->with('info', 'entry number :' .$id.' was deleted');
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
