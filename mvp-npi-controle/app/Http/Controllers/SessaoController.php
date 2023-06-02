<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessaoController extends Controller
{
    public function sessao(){
        return view('sessao.iniciar-sessao');
    }
}
