<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KloveController extends Controller
{


    public function index(){
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current',$tables);

        $data="";

        foreach ($tables as $table) {
            $classname=studly_case(str_singular($table));
            $table_name=$table;
            $data=$data."php artisan krlove:generate:model $classname --table-name=$table_name";
            $data=$data."\n";


        }

        return $data;
    }
}
