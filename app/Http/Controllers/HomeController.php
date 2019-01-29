<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth ;
use App\Employee;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) {

    if ($request->isMethod('post')){
       $em= new Employee();
       $this->validate(request(), [
          'first_name' => 'required',
          'last_name' => 'required' ,
          'image' => 'required'
        ]);

       $image = $request->file('image');
       $image_name = time().'.'.$image->getClientOriginalExtension();
       $destinationPath = public_path('/images');
       $image->move($destinationPath, $image_name);
       $em->first_name=$request->input('first_name');
       $em->last_name=$request->input('last_name');
       $em->image=$image_name;
       $em->job=$request->input('job');
       $em->status=$request->input('status');
       $em->user_id=Auth::user()->id;
       $em->save();
       return redirect('home');
    }
   }

   public function add(Request $request) {

    return view('add'); 
   } 

   public function delete($id) {
    $employee= Employee::find($id);
    $employee->delete();

   return redirect('home');
   }

   public function edit($id){

    $employee= Employee::find($id);
    
    return view('edit', compact('employee')); 
   }

   public function update(Request $request, $id) {
    
    if ($request->isMethod('put')){
        $em = Employee::find($id);
        $this->validate(request(), [
          'first_name' => 'required',
          'last_name' => 'required'
        ]); 
        if($request->file('image')){
           $image = $request->file('image');
           $image_name = time().'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path('/images');
           $image->move($destinationPath, $image_name);
           $em->image=$image_name;
       } 
       $em->first_name=$request->input('first_name');
       $em->last_name=$request->input('last_name');
       $em->job=$request->input('job');
       $em->status=$request->input('status');
       $em->user_id=Auth::user()->id;
       $em->save();
       return redirect('home');
    }

   } 

   public function searchEmployee(Request $request){
     $search = $request->get('search');
     $employees= Employee::where('first_name','like', "%{$search}%")
     ->orWhere('last_name','like', "%{$search}%")
     ->orWhere('job','like', "%{$search}%")
     ->get();

     return response()->json([
            'employees' => $employees
        ]);  
   } 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees= Employee::all();
        return view('employee', compact('employees'));
    }
}
