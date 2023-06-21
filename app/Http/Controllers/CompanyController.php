<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    //

    public function index()
    {
        $year = date('Y');
        $result['company'] = Company::where('year',$year)->get();
        return view('admin/companies/list', $result);
    }

    public function create()
    {
        $result['category'] = Category::all();
        $result['sub_category'] = SubCategory::all();
        return view('admin/companies/create', $result);
    }

    public function insert(Request $request)
    {
        // print_r($request->all());
        // exit();

        $validator =  Validator::make($request->all(), [
            'c_name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'category' => 'required',
            'sub_cat' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('admin/companies/create')->withErrors($validator)->withInput();
        }
            $year = date('Y');
       
            $company = new Company;
            $company->company_name = $request->c_name;
            $company->email = $request->email;
            $company->contact = $request->phone;
            $company->category = $request->category;
            $company->sub_cat = $request->sub_cat;
            $company->remark = $request->remark;
            $company->year = $year;
            $company->save();
            $request->session()->flash('icon', 'success');
            $request->session()->flash('msg', 'Company created successfully!');
            return redirect('admin/companies/');
        
    }

    public function edit($id)
    {
        // echo $id;
        $result['category'] = Category::all();
        $result['sub_category'] = SubCategory::all();
        $result['company'] = Company::where('company_id', $id)->get();
        return view('admin/companies/edit', $result);
    }

    public function update(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'c_name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'category' => 'required',
            'sub_cat' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('admin/companies/edit/' . $request->update_id)->withErrors($validator)->withInput();
        }

        $count = Company::where('email', $request->email)->count();
        $checka = Company::where('email', $request->email)->get();

        if ($count > 0) {
            if ($request->update_id == $checka[0]['company_id']) {
                $check = Company::find($request->update_id);
                $check->company_name = $request->c_name;
                $check->email = $request->email;
                $check->contact = $request->phone;
                $check->category = $request->category;
                $check->sub_cat = $request->sub_cat;
                $check->remark = $request->remark;
                $check->save();
                $request->session()->flash('icon', 'success');
                $request->session()->flash('msg', 'Company updated successfully!');
                return redirect('admin/companies/');
            } else {
                $request->session()->flash('icon', 'error');
                $request->session()->flash('msg', 'This email is already exist');
                return redirect('admin/companies/edit/' . $request->update_id);
            }
        } else {
            $check = Company::find($request->update_id);
            $check->company_name = $request->c_name;
            $check->email = $request->email;
            $check->contact = $request->phone;
            $check->category = $request->category;
            $check->sub_cat = $request->sub_cat;
            $check->remark = $request->remark;
            $check->save();
            $request->session()->flash('icon', 'success');
            $request->session()->flash('msg', 'Company updated successfully!');
            return redirect('admin/companies/');
        }
    }

    public function delete($id){
        Company::find($id)->delete();
        session()->flash('icon', 'success');
        session()->flash('msg', 'Company Deleted successfully!');
        return redirect('admin/companies/');
    }
}
