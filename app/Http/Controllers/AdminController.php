<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admins = Admin::with('user', 'country')->orderBy('id', 'desc')->simplePaginate(7);
        // $admins = Admin::orderBy('id', 'desc')->simplePaginate(8);//التالي والسابق بدون ارقام
        // $admins = Admin::orderBy('id', 'desc')->Paginate(8);//باجينيشن بارقام الصفحات
        return response()->view('cms.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $admins = Admin::all();
        return response()->view('cms.admin.create', compact('admins', 'countries'));

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
            'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",
            // 'email' => 'required',
            // 'status' => 'required'
        ],
        [
            'image' => 'This is Required1',


        ]
    );
        if(!$validator->fails()){
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $isSaved= $admins->save();
            if($isSaved){
                $users = new User();
                $image = $request->file('image');;
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/admin', $imageName);
                $users->image = $imageName;
                $users->firstname = $request->get('firstname');
                $users->lastname = $request->get('lastname');
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($admins); //لربط جدول الادمن مع اليوزر من خلال الاكتور
                $isSaved = $users->save();
                return response()->json(['icon'=>'success' , 'title'=>'Created  admin  successfully'], 200);
            }
            else{
                return response()->json(['icon'=>'error' , 'title'=>'Created is Faild'], 400);
                return response()->json(['icon'=>'error' , 'title'=>$validator->get()], 400);

                
            }
        }
         
    
        // return redirect()->back();
        // // // return redirect()->route('admins.index');
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
        $admins = Admin::findOrFail($id);
        $countries = Country::all();
        
        return response()->view('cms.admin.edit', compact('admins', 'countries'));
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
        $admins = Admin::findOrFail($id);
        $admins->email = $request->get('email');
        $admins->password = Hash::make($request->get('password'));
        $isSaved= $admins->save();
        // return response()->json(['icon'=>'success' , 'title'=>'Deleted is successfully'], 200);

        if($isSaved){
            $users = $admins->user;
            $users->firstname = $request->get('firstname');
            $users->lastname = $request->get('lastname');
            $users->mobile = $request->get('mobile');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->date_of_birth = $request->get('date_of_birth');
            $users->country_id = $request->get('country_id'); 
            $users->actor()->associate($admins); //لربط جدول الادمن مع اليوزر من خلال الاكتور
            $isSaved = $users->save();
            // return response()->json(['icon'=>'success' , 'title'=>'Deleted is successfully'], 200);
            // return response()->json(['icon'=>'success' , 'title'=>'Deleted is successfully']);
            // return ['redirect' =>route('admins.index')];
            
    }
    if($isSaved){
        return response()->json(['icon'=>'success' , 'title'=>'Editing Succeeded'], 200);
    }
    else{
        return response()->json(['icon'=>'error' , 'title'=>'Editing Failed']. 400);
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
        $admins = Admin::destroy($id);
        // return response()->json(['icon'=>'success' , 'title'=>'Deleted is successfully'],$admins ? 200 : 400);
        if($admins){
            return response()->json(['icon'=>'success' , 'title'=>'Deleted is successfully'], 200);
        }
        else{
            return response()->json(['icon'=>'error' , 'title'=>'Deleted is Faild']. 400);
        }
        // if($admins){
        //     echo "Deleted is Successfully";
        // }
        // else{
        //     echo "Deleted is Failed";
        // }
    }
}
