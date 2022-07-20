<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ClientsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function clients(){

        $clients = User::where('role', 'user')->orderBy('id', 'desc')->get();
        return view('admin.dashboard.clients', compact('clients'));
    }
}
