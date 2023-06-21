<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Policy;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
    public function index()
    {
        $year = date('Y');
        $customer = User::where('year',$year)->get();
        $product = Product::where('year',$year)->get();
        $policies = Policy::where('year',$year)->get();
        $sum = 0;
        foreach($policies as $val){
           $sum = $sum +  intval($val['premium']);
      
        }
        
        
        $data = array();
        $data = array(
            'customer' => count($customer),
            'product'  => count($product),
            'policies' => count($policies),
            'policies_premium' => $sum
        );

        // echo '<pre>';
        // print_r($data);
        // exit();
        return view('admin/dashboard',$data);
    }

    public function login()
    {
        if (session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        }else{
            return view('admin/login');
        }
    }

    
    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('admin/login')->withInput()->withErrors($validator);
        }
        $email = $request->post('email');
        $password = $request->post('password');
        $check = Admin::where('email',$email)->count();
        if ($check > 0) {
            $admin = Admin::where('email',$email)->get();
            if (Hash::check($request->post('password'),$admin[0]['password'])) {
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$admin[0]['id']);
                $request->session()->put('ADMIN_NAME',$admin[0]['name']);
                $request->session()->put('ADMIN_EMAIL',$admin[0]['email']);
                $request->session()->flash('icon','success');
                $request->session()->flash('msg','Login Successfully');
                return redirect('admin/dashboard');
            }else{
                //password
                $request->session()->flash('icon','error');
                $request->session()->flash('msg','Invalid Credential');
                return redirect('admin/login');
            }
           
        }else{
            //email
            $request->session()->flash('icon','error');
            $request->session()->flash('msg','Invalid Credential');
            return redirect('admin/login');
        }

        
    }

    
    public function store()
    {
      
    }

   
    public function show(Admin $admin)
    {
        
    }

    
    public function edit(Admin $admin)
    {
        
    }

    
    public function update(Request $request, Admin $admin)
    {
        
    }

    
    public function destroy(Admin $admin)
    {
        
    }
}
