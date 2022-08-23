<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $countries = Country::orderBy('id', 'desc')->simplePaginate(8);//التالي والسابق بدون ارقام
        $countries = Country::orderBy('id', 'desc')->Paginate(8);//باجينيشن بارقام الصفحات
        return response()->view('cms.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),[
            'country' => 'required|string|min:3|max:20',
            'code' => 'required|string|min:3|max:20'
        ],
        [
            'country.required' => 'This is Required',
            'code.min' => ' لا يمكن اقل من ثلاث حروف'
        ]
    );
        if(!$validator->fails()){
            $countries = new Country();
            $countries->country = $request->get('country');
            $countries->code = $request->get('code'); 
            $isSaved= $countries->save();
            if($isSaved){
                return response()->json(['icon'=>'success' , 'title'=>'Created  is successfully'], 200);
            }
            else{
                return response()->json(['icon'=>'error' , 'title'=>'Created is Faild'], 400);
                
            }
        }
         
    
        // return redirect()->back();
        // // // return redirect()->route('countries.index');
        else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first()], 400);
         }
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
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.edit', compact('countries'));
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
        $validator = validator($request->all(),[
            'country' => 'required|string|min:3|max:20',
            'code' => 'required|string|min:3|max:20'
        ],
        [
            'country.required' => 'This is Required',
            'code.min' => ' لا يمكن اقل من ثلاث حروف'
        ]
    );

    if(!$validator->fails()){
        $countries = Country::findOrFail($id);
        $countries->country = $request->get('country');
        $countries->code = $request->get('code'); 

        $isUpdated = $countries->save();
        return ['redirect'=>route('countries.index',$id)];
        if($isUpdated){
            return response()->json(['icon'=>'success' , 'title'=>'Updated  is successfully'], 200);
        }
        else{
            return response()->json(['icon'=>'error' , 'title'=>'Updated is Faild'], 400);
        }
    }
     
    else{
        return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first()], 400);
     }
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries = Country::destroy($id);
        // return response()->json(['icon'=>'success' , 'title'=>'Deleted is successfully'],$countries ? 200 : 400);
        if($countries){
            return response()->json(['icon'=>'success' , 'title'=>'Deleted is successfully'], 200);
        }
        else{
            return response()->json(['icon'=>'error' , 'title'=>'Deleted is Faild']. 400);
        }
        // if($countries){
        //     echo "Deleted is Successfully";
        // }
        // else{
        //     echo "Deleted is Failed";
        // }
    }
}
