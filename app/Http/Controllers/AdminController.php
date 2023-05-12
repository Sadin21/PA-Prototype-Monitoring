<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Child;
use App\Models\child_parent;
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

    public function pengajuan()
    {
        $dataParents = child_parent::all();
        $dataChildren = Child::join('child_parents', 'children.child_parent_id', '=', 'child_parents.id')
        ->join('users', 'children.coordinator_id', '=', 'users.id')
        ->select('children.*', 'child_parents.name as parent_name', 'child_parents.address as parent_address', 'child_parents.phone as parent_phone', 'users.name as coordinator_name', 'users.id as coordinator_id')
        ->get();

        return view('pages.admin.admin-pengajuan', compact('dataChildren', 'dataParents'));
    }

    public function edit_pengajuan($id)
    {
        $data = Child::findOrFail($id);
        $dataParents = child_parent::all();
        $dataKoor = User::leftJoin('roles', 'users.role_id', '=', 'roles.id')->whereHas('role', function ($query) {
            $query->where('role_slug', 'koordinator');
        })->get(['users.*', 'roles.role_name']);
        $dataChild = Child::with('user', 'child_parent')->get();

        return view('pages.admin.edit-pengajuan', compact('data', 'dataParents', 'dataKoor', 'dataChild'));
    }

    public function update_pengajuan(Request $request, $id)
    {
        $data = Child::findOrFail($id);
        $data = $request->regis_status;
        Child::where('id', $id)->update([
            'regis_status' => $data
        ]);

        return redirect()->route('admin.pengajuan');
        // dd($data);
    }
}
