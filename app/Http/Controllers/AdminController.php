<?php

namespace App\Http\Controllers;

use App\Repositories\CdRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use Throwable;

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
    public function admin()
    {
        $tags = $this->tagRepository->getAll();
        return view('admin', ['tags'=>$tags]);
    }


    /**
     *  list cd admin
     */
    public function list()
    {
        $cds =$this->cdRepository->getAll();
        return view('list', ['cds'=> $cds]);
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

            // on cree l'entity
            $entity = $this->cdRepository->create($cd);

            if($entity)
            {
                // on rattache les tags
                $cd->tags()->sync($request->input('tag'));
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
        $tagsForView  = [];

        foreach ($tags as $tag ) {
           foreach ($cd->tags->all() as $tagducd) {
                if ($tag->id ===  $tagducd->id)
                {
                    array_push($tagsForView, $tag->id);
                }
            }
        }
        return view('admin' ,['cd'=>$cd, 'tags'=>$tags->all(),'tagsForView'=> $tagsForView , 'update'=>true]);
    }

    /**
     *  update admin
     */
    public function updateCd(Request $request)
    {
        $cd = $this->cdRepository->getById($request->input('id'));
        $cd->title = $request->input('title');
        $cd->description = $request->input('description');

        if( $request->input('tag') != null)
        {
            // attach ceux selectionnés
            $cd->tags()->sync($request->input('tag'));
        }

        if(empty($request->input('tag')))
        {
            $cd->tags()->detach();
        }

        try {
            $this->cdRepository->update($cd);
        } catch (Throwable $e) {
            return redirect()->back()->withErrors(['problem', $e->getMessage()]);
        }
        return redirect()->back()->with('info', 'info updated');
    }

     /**
     *  delete admin
     */
    public function deleteCd($id)
    {
        // on recupere les entites attenantes first si ca ne supprime pas faut les rattacher
        $cd = $this->cdRepository->getById($id);
        $tags = $cd->tags;
        $titles =$cd->titles;
        // on detache et ou delete
        $cd->tags()->detach();
        $cd->titles()->delete();

        try {
            $this->cdRepository->delete($id);
        } catch (\InvalidArgumentException $e) {
            // on rattache si ca suppprime pas
            foreach($tags as $tag)
            {
                $cd->tags()->attach($tag);
            }
            foreach( $titles as $title)
            {
                $cd->titles()->save($title);
            }
            return redirect()->back()->withErrors(['problem', $e->getMessage()]);
        }

       return redirect()->back()->with('info', ' cd : ' .$cd->title.' was deleted');
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
