<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficerRequest;
use App\Interfaces\OfficerInterface;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    private $officer;

    public function __construct(OfficerInterface $officer)
    {
        $this->officer = $officer;
    }

    public function index(Request $request)
    {
        $officers = $this->officer->get();
        if ($request->has('is_active') && $request->is_active == 1) {
            $officers = $this->officer->get()->where('is_active', 1);
        } else if ($request->has('is_active') && $request->is_active == 0) {
            $officers = $this->officer->get()->where('is_active', 0);
        }

        if ($request->ajax()) {
            return datatables()
                ->of($officers)
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('sex', function ($data) {
                    return  $data->sex == 1 ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('job', function ($data) {
                    return  $data->job;
                })
                ->addColumn('phone', function ($data) {
                    return $data->phone;
                })
                ->addColumn('created_at', function ($data) {
                    return date('d-m-Y', strtotime($data->created_at));
                })
                ->addColumn('status', function ($data) {
                    return view('admin.officer.columns.status', ['isActive' => $data->is_active]);
                })
                ->addColumn('action', function ($data) {
                    return view('admin.officer.columns.action', ['data' => $data]);
                })
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.officer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.officer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficerRequest $request)
    {
        try {
            $this->officer->store($request->validated());
            return redirect()->route('admin.officer.index')->with('success', 'Berhasil menambahkan data petugas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.officer.show', ['officer' => $this->officer->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.officer.edit', ['officer' => $this->officer->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfficerRequest $request, $id)
    {
        try {
            $this->officer->update($request->validated(), $id);
            return redirect()->route('admin.officer.index')->with('success', 'Berhasil mengubah data petugas');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->officer->destroy($id);
            return redirect()->route('admin.officer.index')->with('success', 'Berhasil menghapus data petugas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // Custom function

    public function activate($id)
    {
        try {
            $this->officer->activate($id);
            return redirect()->route('admin.officer.index')->with('success', 'Berhasil mengaktifkan data petugas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
