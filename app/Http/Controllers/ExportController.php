<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use Illuminate\Http\Request;
//importar todo lo requerido para el pdf
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
//models
use App\Models\sale;
use App\Models\SaleDetails;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
//importar para el excel
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function reportPDF($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
       $fechaHoy = Carbon::parse(Carbon::now())->format('Y-m-d');
       $horahoy = Carbon::parse(Carbon::now())->format('H:m:s A');
        $data = [];
        $data1= [];
         //obtener las ventas del dia 
         if($reportType == 0 )// ventas del dia
         {
             //fecha
             $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
             $to = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
         } else {
             //fechas especificadas por el usuario
             $from = Carbon::parse($dateFrom)->format('Y-m-d') . ' 00:00:00';
             $to = Carbon::parse($dateTo)->format('Y-m-d') . ' 23:59:59';
         }

         //validar si seleccionamos algun usuario
        if($userId == 0){
            //consulta
            $data = Sale::join('users as u','u.id','sales.user_id')
            ->select('sales.*','u.name as user')
            ->whereBetween('sales.created_at', [$from,$to])
            ->get();

            $data1 = Sale::join('users as u','u.id','sales.user_id')
            ->select('u.name as user')
            ->whereBetween('sales.created_at', [$from,$to])
            ->groupBy('u.name')
            ->get();
            
            

        } else {
            $data = Sale::join('users as u','u.id','sales.user_id')
            ->select('sales.*','u.name as user')
            ->whereBetween('sales.created_at', [$from,$to])
            ->where('user_id', $userId)
            ->get();
        }
        //obtener nombre del vendedor de uno solo
        $vendedor = Sale::join('users as u','u.id','sales.user_id')
        ->first('u.name as user');
        //$vende=$vendedor->user;
        //intentando para tener de tosos los vendedores sin repetir
        $vende;
        $contar=0;
        $vendedores;
        foreach($data1 as $name)
        {
            $vende[$contar]=$name->user;
            $contar++;
            $vendedores=$name->user;
        }
        //dd($vendedores);
        $contar2=$contar;
       /*for($i=0; $i<$contar2; $i++)
       {
        $vendedores =$vende[$i];
        $vendedores .=' | ';
            
        /*if($i==$contar)
        {
            $vendedores .= $vende[$i];
            
        }
        {
            $vendedores =$vende[$i];
            $vendedores .='|';
        }
        
       } */
       //dd($vende);
       //$vendedores=$vende[0]. '|' . $vende[1];
        //validar la palabra user
        $user = $userId == 0 ? 'Todos' : User::find($userId)->name;
        //usar lo importado del PDF
        //loadView = pasando la vista
        $pdf = FacadePdf::setPaper([0,0,612.2835,1009.1339])->loadView('pdf.reporte1', compact('data','reportType', 'user', 'dateFrom', 'dateTo' , 'fechaHoy', 'horahoy'));
        //visualizar en el navegador
        // setPaper([0,0,612.2835,1009.1339] -> tamaño oficio
        return $pdf->stream('salesReport.pdf'); 
        //para descargar el reporte en pdf
        //return $pdf->download('salesReport.pdf');
    }

    //exportar en excel
    public function reporteExcel($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $reportName = 'Reporte de Ventas_' . uniqid() . '.xlsx';
        return Excel::download(new SalesExport($userId, $reportType, $dateFrom, $dateTo),$reportName );
    }
}
