<?php

namespace App\Http\Controllers\Admin\Block;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function block(){
        return view('admin.block.block');
    }
}
