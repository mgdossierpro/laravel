<?php

namespace App\Http\Controllers;

use App\Repositories\CdRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use Exception;

class AdminController extends Controller
{

    /**
     * The cd repository implementation.
     *
     * @var CdRepository $cdRepository
     */
    protected $cdRepository;

    /**
     * The tag repository implementation.
     *
     * @var TagRepository $tagRepository
     */
    protected $tagRepository;

    public function __construct(CdRepository $cdRepository, TagRepository $tagRepository)
    {
        $this->cdRepository = $cdRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     *  auth admin
     */
    public function authentication()
    {
        return view('admin.login');
    }

    /**
     *  add form
     */
    public function addForm()
    {
        $tags = $this->tagRepository->getAll();
        return view('admin.add', ['tags'=>$tags]);
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
            $cd = $this->cdRepository->newInstance();
            $cd->title =$request->input('title');
            $cd->description= $request->input('description');
            $entity =  $this->cdRepository->create($cd);

            if($entity )
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
        $cdRepository = $this->cdRepository;
        $cd = $cdRepository->getById($id);
        $tags = $this->tagRepository->getAll();

        return view('admin.add' ,['cd'=>$cd, 'tags'=>$tags->all() , 'update'=>true]);
    }

    /**
     *  update admin
     */
    public function updateCd(Request $request)
    {

        $cd = $this->cdRepository->getById($request->input('id'));
        $cd->title = $request->input('title');
        $cd->description = $request->input('description');

       // try {

        // ou le plus simple $user->roles()->sync([1, 2, 3]);
        // detach ceux qui ne sont pas selectionnés
        $cd->tags()->detach();

        if( $request->input('tag') != null)
        {        // attach ceux selectionnés
            foreach ( $request->input('tag') as $tag)
            {
                if(!in_array($tag, $cd->tags->all()))
                {
                    $cd->tags()->attach($tag);
                }
            }
        }


            try {
                $this->cdRepository->update($cd);
            } catch (\InvalidArgumentException $e) {
                throw $e;
                dd($e);
            }
       // } catch (Exception $e) {
         //  dd($e);
           //return redirect()->back()->withErrors(['problem', 'There were a problem to update this entity']);
       // }
        return redirect()->back()->with('info', 'info updated');
    }

     /**
     *  delete admin
     */
    public function deleteCd($id)
    {
       // try {
        // on recupere les entites attenantes first si ca ne supprime pas faut les rattacher
        $cd = $this->cdRepository->getById($id);
        $tags = $cd->tags;
        $titles =$cd->titles;
        // on detache et ou delete
        $cd->tags()->detach();
        $cd->titles()->delete();

        //dd($cd->tags);
        dd($cd->id);
        try {
            $this->cdRepository->delete($id);
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }finally{
            // on rattache si ca suppprime pas
            foreach( $tags as $tag)
            {
                $cd->tags()->attach($tag);
            }
            foreach( $titles as $title)
            {
                $cd->titles()->save($title);
            }
        }
    /**
     *     } catch (Exception $e) {
     *      return redirect()->back()->withErrors(['problem', 'There were a problem to delete this entity']);
     *   }
        */

        return redirect()->back()->with('info', 'entry number :' .$id.' was deleted');
    }

    /**
     *  updateordelete admin
     */
    public function updateOrDelete()
    {
        $cds =$this->cdRepository->getAll();
        return view('admin.updateordelete', ['cds'=> $cds]);
    }


}
