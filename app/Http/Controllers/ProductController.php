<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index()
    {
        $year = date('Y');
        $result['product'] = Product::join('company', 'company.company_id', '=', 'product.company')
            ->where('product.year',$year)
            ->get(['product.*', 'company.company_name']);
        // echo '<pre>';
        // print_r($result['product']);
        // exit();
        return view('admin/products/list', $result);
    }

    public function create()
    {
        $result['company'] = Company::all();  
        return view('admin/products/create', $result);
    }

    public function insert(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit();

        $validator = Validator::make($request->all(), [
            'p_name' => 'required',
            'company' => 'required',
            'category' => 'required',
            'sub_cat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/product/create')->withErrors($validator)->withInput();
        }
        $year = date('Y');

        $product = new Product;
        $product->product_name = $request->p_name;
        $product->company = $request->company;
        $product->category = $request->category;
        $product->sub_cat = $request->sub_cat;
        $product->remark = $request->remark;
        $product->year = $year;
        $product->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Product created successfully!');
        return redirect('admin/product/');
    }

    public function edit($id)
    {
        // echo $id;
        $result['company'] = Company::all();
        $result['product'] = Product::where('product_id', $id)->get();
        // echo '<pre>';
        // print_r($result['product']);
        // exit();
        return view('admin/products/edit', $result);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'p_name' => 'required',
            'company' => 'required',
            'category' => 'required',
            'sub_cat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/product/edit' . $request->update_id)->withErrors($validator)->withInput();
        }

        $product =  Product::find($request->update_id);
        $product->product_name = $request->p_name;
        $product->company = $request->company;
        $product->category = $request->category;
        $product->sub_cat = $request->sub_cat;
        $product->remark = $request->remark;
        $product->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Product Update successfully!');
        return redirect('admin/product/');
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('icon', 'success');
        session()->flash('msg', 'Product Deleted successfully!');
        return redirect('admin/product/');
    }
}
