<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('country')->orderBy('id', 'desc')->simplePaginate(7);

        return response()->view('cms.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.city.create', compact('countries'));
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
            'city' => 'required|string|min:3|max:20',
            'street' => 'required|string|min:3|max:20',


        ] ,
        [
            'city.required' => 'This is Required',
            'city.min' => ' لا يمكن اقل من ثلاث حروف'
        ]
    );
        $cities = new City();
        $cities->city = $request->get('city');
        $cities->street = $request->get('street'); 
        $cities->country_id = $request->get('country_id');
        $isSaved= $cities->save();

        session()->flash('message', $isSaved ? "Created is successfully" : "Created is failed"); 
        return redirect()->back();
        // // return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::findOrFail($id);
        $countries = Country::all();
        // $countries2 = City::findOrFail($id);
        return response()->view('cms.city.edit', compact('cities' , 'countries'));
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
        $request->validate([
            'city' => 'required|string|min:3|max:20',
            'street' => 'required|string|min:3|max:20' 
        ],
        [
            'city.required' => 'This is Required',
            'city.min' => ' لا يمكن اقل من ثلاث حروف'
        ]
        );
        $cities = City::findOrFail($id);
        $cities->city = $request->get('city');
        $cities->street = $request->get('street');
        $cities->country_id = $request->get('country_id');
        
        $isUpdated = $cities->save();

        session()->flash('message', $isUpdated ? "Updated is successfully" : "Updated is failed"); 
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::destroy($id);
        return redirect()->route('cities.index');
        // if($cities){
        //     echo "Deleted is Successfully";
        // }
        // else{
        //     echo "Deleted is Failed";
        // }
    }
}
