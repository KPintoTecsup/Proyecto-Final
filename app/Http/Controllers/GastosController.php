<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use App\Models\Gasto;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class GastosController extends Controller
{

    public function reporte(Request  $request){
        $fec_ini = $request->input("fini");
        $fec_fin = $request->input("ffin");

        $gastos = Gasto::all();
        if ($fec_ini != '' && $fec_fin != ''){
            $gastos = Gasto::whereBetween('fecha_gasto', [$fec_ini, $fec_fin])->get();
        }

        $accion = $request->input('accion');
        $accion = ($accion == '') ? "filtrar": $accion;

        if ($accion == 'filtrar'){
            return view("gastos_reporte", ['gastos' => $gastos, 'fini' => $fec_ini, 'ffin' => $fec_fin]);
        }else{
            $total = 0;
            foreach ($gastos as $gasto){
                $total += $gasto->monto;
            }


            $html = '';
            $html .= "<div style='text-align:center'><h1>Reporte de Gastos</h1></div>";
            $html .= "Periodos: Desde {$fec_ini} hasta {$fec_fin} <br>";
            $html .= "Total: S/{$total}<br>";
            $html .= "<br/>";
            $html .= "<table width='100%'>";
            $html .= "<tr><th>Fecha</th><th>Activo</th><th>Nombre</th><th>Factura/Boleta</th><th>Monto</th></tr>";
            foreach ($gastos as $gasto){
                $html .= "<tr>";
                $html .= "<td>{$gasto->fecha_gasto}</td>";
                $html .= "<td>{$gasto->activo->nombre}</td>";
                $html .= "<td>{$gasto->nombre}</td>";
                $html .= "<td>{$gasto->documento_relacionado}</td>";
                $html .= "<td>S/ {$gasto->monto}</td>";
                $html .= "</tr>";
            }
            $html .= "</table>";

            $pdf = PDF::loadHTML($html);
            return $pdf->stream();
        }






    }

    public function index($activo_id){
        $obj_activo = Activo::find($activo_id);

        $gastos = Gasto::where("activo_id", $activo_id)->get();

        return view("gastos_index", ['activo' => $obj_activo, 'gastos' => $gastos]);
    }

    public function add($activo_id){
        $obj_activo = Activo::find($activo_id);
        $obj_gasto = new Gasto();
        return view ("gastos_form", ['activo' => $obj_activo, 'gasto' => $obj_gasto]);
    }

    public function edit($id){
        $obj_gasto = Gasto::find($id);
        $obj_activo = Activo::find($obj_gasto->activo_id);
        return view ("gastos_form", ['activo' => $obj_activo, 'gasto' => $obj_gasto]);
    }

    public function store(Request $request){
        $id = $request->input("id");

        $item = new Gasto();
        if (isset($id)){
            $item = Gasto::find($id);
        }
        $item->nombre = $request->input("nombre");
        $item->activo_id = $request->input("activo_id");
        $item->documento_relacionado = $request->input("documento");
        $item->fecha_gasto = $request->input("fecha");
        $item->monto = $request->input("monto");
        $item->save();

        $obj_activo = Activo::find($item->activo_id);
        $monto_anterior = $request->input("monto_anterior");
        $obj_activo->gasto_total = $obj_activo->gasto_total - $monto_anterior + $item->monto;
        $obj_activo->save();

        return redirect("/gastos/{$item->activo_id}");

    }

    public function del($id){
        $obj = Gasto::find($id);

        if(isset($obj)){
            $activo_id = $obj->activo_id;

            $obj_activo = Activo::find($activo_id);
            $obj_activo->gasto_total = $obj_activo->gasto_total - $obj->monto;
            $obj_activo->save();

            $obj->delete();
            return redirect("/gastos/{$activo_id}");
        }else{
            return "El gasto ya fue eliminado o no existe";
        }

    }
}
