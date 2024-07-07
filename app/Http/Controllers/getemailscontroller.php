<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\getemaildata; 

class getemailscontroller extends Controller
{
    public function getData()
        {
        
        $records = DB::table('getemails_new')->orderBy('Email_recv_date', 'desc')->get();

        return  view('Placements',['records' => $records]);
    }
}