<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    public function index()
    {
        $user_id = Auth()->user()->id;
        $data = User::join('children', 'users.id', '=', 'children.user_id')
        ->where('users.id', $user_id)
        ->get(['children.*', 'users.*']);

        dd($data);

        return view('pages.child-dashboard');
    }
}
