<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use Carbon\Carbon;

class SummaryController extends Component
{
    //Resumen de ventas totales
    public $ventaT, $itemsT;
    public $ventaD, $itemD;
    public function mount(){
        //ventas totales
        $this->ventaT=sale::sum('total');
        $this->itemsT=sale::sum('items');
        //obtenemos la fecha de hoy y la hora de todo el dia
        $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
        $to = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
        //obtendremos los datos de las ventas de hoy
        $data = Sale::select('sales.*')
            ->whereBetween('sales.created_at', [$from,$to])
            ->get();
        $this->ventaD=$data->sum('total');
        $this->itemD=$data->sum('items');
    }

    public function render()
    {
        
        return view('livewire.summary.component')
        ->extends('layouts.theme.app')
        ->section('content');
        
    }
}
