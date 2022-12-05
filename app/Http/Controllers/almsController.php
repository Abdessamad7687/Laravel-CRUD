<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alms;
use PDF;

class almsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = alms::all();
        $employes = alms::orderBy('created_at', 'desc')->paginate(5);
        return view('HomePage', compact('employes', 'emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'profile' => 'required',
            'code' => "required",
            'Noun' => "required",
            'Address' => "required",
            'phone' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('profile')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profile'] = "$profileImage";
        }

        alms::create($input);
        return back()->with('message', 'Client added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = alms::find($id);
        return view('show')->with('employe', $employe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = alms::find($id);
        return view('edit')->with('employe', $employe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employe = alms::find($id);
        $input = $request->all();

        if ($image = $request->file('profile')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profile'] = "$profileImage";
        }
        $employe->update($input);
        return redirect('/')->with('flash_message', 'student Updated!');  
    }


    public function downloadPDF($id){
        $a = alms::find($id);  
        $employe = [
            'code' => $a->code,
            'noun' => $a->noun
        ];
        $pdf = PDF::loadView('show', compact('employe'));
        return $pdf->download('show.pdf');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alms = alms::find($id);
        $alms->delete();
        return redirect('/');
    }

 }
