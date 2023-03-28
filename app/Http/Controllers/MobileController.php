<?php

namespace Botble\Slug\Http\Controllers;
use Botble\Base\Http\Controllers\BaseController;

use Illuminate\Http\Request;

class MobileController extends BaseController
{
    public function connected(){
        return response([
            'message' => 'email update successfully'
        ], 200);
    }
}
