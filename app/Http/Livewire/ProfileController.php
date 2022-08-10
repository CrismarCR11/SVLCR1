<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class ProfileController extends Component
{
    public $name, $phone, $email, $status, $image, $password, $selected_id, $fileLoaded, $profile, $search;
    public function render($id)
    {
        $record = User::find($id, ['id','name','image']);
       
        /*$data=$this->Obtenerperfil();*/
        return view('livewire.profile.component',[
            
            'data' => $record
        ])
        ->extends('layouts.theme.app')
        //para la informacion del componente
        ->section('content');
    }
    /*public function Obtenerperfil($id)
    {
       
        //busqueda y mejor integrada "Buena practica"
        $record = User::find($id, ['id','name','image']);
        
        $usuario=$record->name;
        
        return view('livewire.profile.component', compact('usuario'));
    }*/
   
}
