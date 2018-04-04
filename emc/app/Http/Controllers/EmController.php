<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emi;
use App\Http\Requests\emisRequest;
use Illuminate\Http\UploadedFile;
Use  App\gestion\PaginationGestion;


class EmController extends Controller
{
    protected $PaginationGestion;
    protected $nbrPerPage =4;
    public function __construct(PaginationGestion $PaginationGestion)
    {
        $this->PaginationGestion = $PaginationGestion;
        $this ->middleware('auth');
    }


    //lister les emission
    public function index(){
        $emis = $this->PaginationGestion->getPaginate($this->nbrPerPage);
        $links = $emis->render();

        return view('emission.index', compact('emis', 'links'));
}


//afficher le formulaire de l'emission
    public function create(){
    return view('emission.create');
    }


    //enregistrer un emission
    public function store(emisRequest $request){
     $emission= new Emi();
     $emission -> nom = $request->input('nom');
     $emission -> type = $request->input('type');
     $emission -> photo = $request->input('photo');
     //if ($request->hasFile('photo')){

         //$emission->photo=$request->photo->store('image');

     //}
        if ($request->hasFile('photo')) {
            $photoname = $request->photo->getClientOroginalName();
            $request->photo->storeAs('public/upload',$photoname);
            $image = new Emi;
            $image->photo = $photoname;
            $image->save();


        }

     $emission ->save();
     session()->flash('success','lemission a été bine enregistré !!');
     return redirect('emis');
    }


    //permet de recuper un emission puis le le mettre dans le formulaire
    public function edit($id){

     $emission= Emi::find($id);
     return view('emission.edit',['emission' => $emission]);
    }
    public function show($id){

        $emission= Emi::find($id);
        return view('emission.show',['emission' => $emission]);
    }

    //modifier un emission

    public function update(emisRequest $request,$id)
    {

        $emission = Emi::find($id);
        $emission-> nom = $request->input('nom');
        $emission-> type = $request->input('type');
        $emission->save();
        return redirect('emis');
    }



        //supprimer un emission
    public function destroy(Request $request,$id){
        $emission= Emi::find($id);
        $emission->delete();
        return redirect('emis');
    }
}
