<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\getemaildata; 

class readmailsubject extends Controller
{
    public function read_email_subject_function($param)
        {
            $records = DB::table('getemails_new')->find($param);
            $links=$records->Important_links;
            $links = str_replace(['[', ']'], '', $links);

            // Split the string into an array using comma as the delimiter
            $values = explode(',', $links);

       return view("read_subject",["records"=>$records,"values"=>$values]);
    }
}
