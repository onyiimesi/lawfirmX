<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class FilterClientController extends Controller
{
    public function filter(Request $request){

        $filter = Client::query();

        if($request->last_name){
            $filter->where('last_name', 'LIKE', '%' .$request->last_name. '%');
        }

        $filters = $filter->get();

        return [
            'status' => '',
            'message' => '',
            'data' => $filters
        ];

    }
}
