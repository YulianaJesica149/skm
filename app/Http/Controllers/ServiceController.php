<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Routing\Controller;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Session;


class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view("admin.services.index", compact("services"));
    }


    public function create()
    {
        $service = Service::all();
        return view('admin.services.create');
    }

    public function store(ServiceRequest $request)
    {

        Service::create($request->validated());

        return redirect("/service")->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Ditambahkan!')
        ]);
    }


    public function edit(Service $service, $id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }



    public function update(ServiceRequest $request, Service $service, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->validated());

        return redirect('/service')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Diubah!')
        ]);
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect('/service')->with([
            Session::flash('status', 'Berhasil'),
            Session::flash('message', 'Berhasil Dihapus!')
        ]);
    }
}
