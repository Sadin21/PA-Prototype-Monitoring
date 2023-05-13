<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\child_parent;
use App\Models\donate_report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KoordinatorController extends Controller
{
    public function index()
    {
        $user_id = Auth()->user()->id;
        $dataChild = Child::join('users', 'children.coordinator_id', '=', 'users.id')
        ->join('child_parents', 'children.child_parent_id', '=', 'child_parents.id')
        ->where('children.coordinator_id', $user_id)
        ->select('children.*', 'users.name as coordinator_name', 'child_parents.name as parent_name')
        ->get();
        
        // dd($dataChild);
        return view('pages.koor-dashboard', compact('dataChild'));
    }

    public function detail($id)
    {
        $dataChild = Child::join('users', 'children.coordinator_id', '=', 'users.id')
        ->join('child_parents', 'children.child_parent_id', '=', 'child_parents.id')
        ->where('children.id', $id)
        ->select('children.*', 'users.name as coordinator_name', 'child_parents.name as parent_name')
        ->get();

        dd($dataChild);
    }

    public function pengajuan()
    {
        $dataParents = child_parent::all();
        $dataChildren = Child::join('child_parents', 'children.child_parent_id', '=', 'child_parents.id')
        ->join('users', 'children.coordinator_id', '=', 'users.id')
        ->select('children.*', 'child_parents.name as parent_name', 'child_parents.address as parent_address', 'child_parents.phone as parent_phone', 'users.name as coordinator_name', 'users.id as coordinator_id')
        ->get();

        return view('pages.koor-pengajuan', compact('dataParents', 'dataChildren'));
    }

    public function create_pengajuan_ortu()
    {
        return view('pages.koordinator.create-ortu');
    }

    public function store_pengajuan_ortu(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'marital' => 'required',
            'tertiary_education' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'home_status' => 'required',
            'number_of_souls' => 'required',
            'category_of_souls' => 'required',
        ]);
        // dd($request->all());
        $data = $request->all();
        child_parent::create($data);
        
        return redirect()->route('koor.pengajuan')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit_pengajuan_ortu($id)
    {
        $data = child_parent::findOrFail($id);
        // dd($data);

        return view('pages.koordinator.edit-ortu', compact('data'));
    }

    public function update_pengajuan_ortu(Request $request, $id) 
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'marital' => 'required',
            'tertiary_education' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'home_status' => 'required',
            'number_of_souls' => 'required',
            'category_of_souls' => 'required',
        ]);
        $data = child_parent::findOrFail($id);
        
        $data->update([
            'name' => $request->name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'marital' => $request->marital,
            'tertiary_education' => $request->tertiary_education,
            'job' => $request->job,
            'salary' => $request->salary,
            'address' => $request->address,
            'phone' => $request->phone,
            'home_status' => $request->home_status,
            'number_of_souls' => $request->number_of_souls,
            'category_of_souls' => $request->category_of_souls,
        ]);

        return redirect()->route('koor.pengajuan')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy_pengajuan_ortu($id)
    {
        $data = child_parent::findOrFail($id);
        $data->delete();

        return redirect()->route('koor.pengajuan')->with(['success' => 'Data berhasil diubah']);
    }

    public function create_pengajuan_anak()
    {
        $dataParents = child_parent::all();
        $dataKoor = User::leftJoin('roles', 'users.role_id', '=', 'roles.id')->whereHas('role', function ($query) {
            $query->where('role_slug', 'koordinator');
        })->get(['users.*', 'roles.role_name']);
        $dataChild = Child::with('user', 'child_parent')->get();

        // dd($dataParents);
        return view('pages.koordinator.create-anak', compact('dataParents', 'dataKoor', 'dataChild'));
    }

    public function store_pengajuan_anak(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'photo' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,svg, webp',
            'status_in_family' => 'required',
            'grade' => 'required',
            'class' => 'required',
            'school' => 'required',
            'status_with_parents' => 'required',
            'coordinator_id' => 'required|exists:users,id',
            'child_parent_id' => 'required|exists:child_parents,id',
        ]);
        
        $photo = $request->file('photo');
        $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('assets/images'), $filename);
        
        $data = $request->all();
        $data['photo'] = $filename;
        Child::create($data);        


        return redirect()->route('koor.pengajuan')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit_pengajuan_anak($id)
    {
        $data = Child::findOrFail($id);
        $dataParents = child_parent::all();
        $dataKoor = User::leftJoin('roles', 'users.role_id', '=', 'roles.id')->whereHas('role', function ($query) {
            $query->where('role_slug', 'koordinator');
        })->get(['users.*', 'roles.role_name']);
        $dataChild = Child::with('user', 'child_parent')->get();

        // dd($data);
        return view('pages.koordinator.edit-anak', compact('data', 'dataParents', 'dataKoor', 'dataChild'));
    }

    public function update_pengajuan_anak(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'photo' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,svg, webp',
            'status_in_family' => 'required',
            'grade' => 'required',
            'class' => 'required',
            'school' => 'required',
            'status_with_parents' => 'required',
            'coordinator_id' => 'required|exists:users,id',
            'child_parent_id' => 'required|exists:child_parents,id',
        ]);
        
        $data = Child::findOrFail($id);

        $photo = $request->file('photo');
        $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('assets/images'), $filename);

        $data = $request->all();
        $data['photo'] = $filename;
        // Child::update($data);

        Child::where('id', $id)->update([
            'name' => $request->name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'photo' => $filename,
            'status_in_family' => $request->status_in_family,
            'grade' => $request->grade,
            'class' => $request->class,
            'school' => $request->school,
            'status_with_parents' => $request->status_with_parents,
            'coordinator_id' => $request->coordinator_id,
            'child_parent_id' => $request->child_parent_id,
        ]);

        return redirect()->route('koor.pengajuan')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function destroy_pengajuan_anak($id)
    {
        $data = Child::findOrFail($id);
        $data->delete();

        return redirect()->route('koor.pengajuan')->with(['success' => 'Data berhasil dihapus']);
    }

    public function laporan_donasi()
    {
        // $dataChild = Child::join('users', 'children.coordinator_id', '=', 'users.id')
        // ->join('child_parents', 'children.child_parent_id', '=', 'child_parents.id')
        // ->join('donate_reports', 'children.id', '=', 'donate_reports.child_id')
        // ->where('children.coordinator_id')
        // ->select('children.*', 'users.name as coordinator_name', 'child_parents.name as parent_name')
        // ->get(); 
        
        $dataDonate = donate_report::join('children', 'donate_reports.child_id', '=', 'children.id')
        ->join('users', 'children.coordinator_id', '=', 'users.id')
        ->where('children.coordinator_id', Auth::user()->id)
        ->select('donate_reports.*', 'children.name as child_name')
        ->get();

        // dd($dataDonate);
        return view('pages.koordinator.keuangan', compact('dataDonate'));
    }
}
