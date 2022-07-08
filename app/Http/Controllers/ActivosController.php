<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Activo;


class ActivosController extends Controller
{

    public function index(Request $request){
        $items = Activo::all();
        return view("activos_index", ['activos' => $items]);
    }

    public function add(Request $request){
        $obj = new Activo();
        return view ("activos_form", ['activo' => $obj]);
    }

    public function edit($id){
        $obj = Activo::find($id);
        return view ("activos_form", ['activo' => $obj]);
    }


    public function store(Request $request){
        $id = $request->input("id");

        $item = new Activo();
        if (isset($id)){
            $item = Activo::find($id);
        }else{
            $item->gasto_total = 0;
        }
        $item->nombre = $request->input("nombre");
        $item->descripcion = $request->input("descripcion");
        $item->save();

        return redirect("/activos");

    }

    public function list(){
        return Activo::all();
    }

    public function del($id){
        $obj = Activo::find($id);

        if(isset($obj)){
            Gasto::where("activo_id", $obj->id)->delete();
            $obj->delete();
            return redirect("/activos");

        }else{
            return "El activo no existe o ya fue eliminado";
        }

    }
}
