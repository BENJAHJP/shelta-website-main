<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function connected(){
        return response([
            'message' => 'email update successfully'
        ], 200);
    }
}
