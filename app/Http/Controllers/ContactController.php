<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = '';
        if (file_exists(storage_path('exports/contact.xls'))) {
            $contacts = Excel::load(storage_path('exports') . '/contact.xls', function ($reader) {
            })->get();

        }
        return view('contact.index')->with('contacts', $contacts);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|regex:/^[a-zA-Z]+$/u|max:50',
            'lastname' => 'required|regex:/^[a-zA-Z]+$/u|max:50',
            'email' => 'required|email',
        ]);
        $data = $request->except('_token');;


        if (file_exists(storage_path('exports/contact.xls'))) {
            Excel::load(storage_path('exports') . '/contact.xls', function ($reader) use ($data) {

                $reader->sheet('mysheet', function ($sheet) use ($data) {
                    $sheet->appendRow($data);
                });
            })->store('xls', false);
        } else {
            Excel::create("contact", function ($excel) use ($data) {
                $excel->sheet('mysheet', function ($sheet) use ($data) {
                    $sheet->setOrientation('landscape');


                    $sheet->fromArray($data, null, 'A1', true, true);
                    $sheet->prependRow([
                        'firstname', 'lastname', 'email', 'gender', 'phone', 'address', 'nationality',
                        'education_background', 'mode_of_contact',
                    ]);
                });
            })->store('xls');
        }
        Session::flash('message', 'Information Saved.');
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function exportFile(){
        if (file_exists(storage_path('exports/contact.xls'))) {
            Excel::load(storage_path('exports') . '/contact.xls', function ($reader){})->export('xls');
        }
    }
}
