<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalInformation;
use App\Benefit;
use Validator;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $benefits = Benefit::all();
        if(request()->ajax())
        {
            return datatables()->of(PersonalInformation::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="/index/'.$data->id.'"  name="view" id="'.$data->id.'" class="view btn btn-success btn-sm" role="button">View</a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('crud', compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'firstname' =>  'required',
            'lastname'  =>  'required',
            'birthdate' =>  'required|date_format:Y-m-d', 
            'phone' =>   'required|digits:11|numeric',
            'about' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'benefits' => 'required',
            'marital' => 'required',
        );

        $error = Validator::make($request->all(), $rules); //creates new instance of validation. if there are any errors, it will store in $error variable

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'firstname' =>  $request->firstname,
            'lastname'  =>  $request->lastname,
            'middlename' =>  $request->lastname,
            'birthdate' =>  $request->birthdate,
            'phone' =>  $request->phone,
            'about' =>  $request->about,
            'address' =>  $request->address,
            'gender' =>  $request->gender,
            'marital' =>  $request->marital,
        );

        $personal = PersonalInformation::create($form_data);
        $personal->benefits()->sync(request('benefits'));
        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
   
            
            // return response()->json(['data' => $data]);
        $personal = PersonalInformation::findOrFail($id);
        // dd($personal->benefits);
        return view('show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = PersonalInformation::findOrFail($id);
            $data['benefits'] = $data->benefits;
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $rules = array(
            'firstname' =>  'required',
            'lastname'  =>  'required',
            'birthdate' =>  'required|date_format:Y-m-d', 
            'phone' =>   'required|digits:11|numeric',
            'about' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'benefits' => 'required',
            'marital' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'firstname' =>  $request->firstname,
            'lastname'  =>  $request->lastname,
            'middlename' =>  $request->lastname,
            'birthdate' =>  $request->birthdate,
            'phone' =>  $request->phone,
            'about' =>  $request->about,
            'address' =>  $request->address,
            'gender' =>  $request->gender,
            'marital' =>  $request->marital,
        );

        PersonalInformation::whereId($request->hidden_id)->update($form_data);
        $personal = PersonalInformation::find($request->hidden_id);
        $personal->benefits()->sync(request('benefits'));
        return response()->json(['success' => 'Record successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $data =  PersonalInformation::findOrFail($id);
        $data->delete();

    }
}
