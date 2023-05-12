<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $dataUser = User::leftJoin('roles', 'users.role_id', '=', 'roles.id')->whereHas('role', function ($query) {
            $query->where('role_slug', 'koordinator');
        })->get(['users.*', 'roles.role_name']);
        // dd($dataUser);

        return view('pages.admin-dashboard', compact('dataUser'));
    }
}
