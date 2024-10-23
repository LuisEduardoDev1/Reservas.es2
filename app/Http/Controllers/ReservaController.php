<?php

namespace App\Http\Controllers;

use App\Models\Salas;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    function profReserva(){
        $salas = Salas::all();
        return view('reservas.professor', compact('salas'));
    }
}
