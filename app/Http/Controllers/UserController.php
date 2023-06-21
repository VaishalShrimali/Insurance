<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Company;

class UserController extends Controller
{
  public function index()
  {
    $year = date('Y');
    $users['users'] = User::where('year',$year)->get();
    // print_r($users);
    return view('admin/users/list', $users);
  }

  public function create()
  {
    $result['category'] = Category::all();
    $result['sub_category'] = SubCategory::all();
    $result['company'] = Company::all();
    // echo '<pre>';
    // print_r( $result['sub_category']);
    // exit();
    return view('admin/users/create', $result);
  }

  public function store(Request $request)
  {
    // echo '<pre>';
    // print_r($request->all());
    // exit();
    $validator = Validator::make($request->all(), [
      'f_name' => 'required',
      'l_name' => 'required',
      'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      'address' => 'required',
      'company' => 'required',
      'category' => 'required',
      'sub_cat' => 'required',

    ]);

    if ($validator->fails()) {
      return redirect('admin/users/create')->withErrors($validator)->withInput();
    }

    $year = date('Y');

    $user = new User;
    $user->first_name = $request->f_name;
    $user->last_name = $request->l_name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->dob = $request->dob;
    $user->address = $request->address;
    $user->company = $request->company;
    $user->category = $request->category;
    $user->sub_cat = $request->sub_cat;
    $user->remark = $request->remark;
    $user->year = $year;
    $user->save();
    $request->session()->flash('icon', 'success');
    $request->session()->flash('msg', 'Customer created successfully!');
    return redirect('admin/users/');
  }

  public function edit($id)
  {
    $result['category'] = Category::all();
    $result['sub_category'] = SubCategory::all();
    $result['users'] = User::where('id', $id)->get();
    $result['company'] = Company::all();
    return view('admin/users/edit', $result);
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'f_name' => 'required',
      'l_name' => 'required',
      'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      'address' => 'required',
      'company' => 'required',
      'category' => 'required',
      'sub_cat' => 'required',

    ]);
    if ($validator->fails()) {
      return redirect('admin/users/edit/' . $request->upd_id)->withErrors($validator)->withInput();
    }

   
        $check = User::find($request->upd_id);
        $check->first_name = $request->f_name;
        $check->last_name = $request->l_name;
        $check->email = $request->email;
        $check->phone = $request->phone;
        $check->dob = $request->dob;
        $check->address = $request->address;
        $check->company = $request->company;
        $check->category = $request->category;
        $check->sub_cat = $request->sub_cat;
        $check->remark = $request->remark;
        $check->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Customer updated successfully!');
        return redirect('admin/users/');
   
  }


  public function getcategory(Request $request)
  {
    $id = $request->get('id');
    $company = Company::join('category', 'category.category_id', '=', 'company.category')
      ->join('sub_category', 'sub_category.sub_category_id', '=', 'company.sub_cat')
      ->where('company_id', $id)
      ->get(['company.*', 'category.category_ name', 'sub_category.sub_category']);

    // echo '<pre>';
    // print_r($company);
    // exit();
    $data = ['category' => $company[0]['category_ name'], 'sub_category' => $company[0]['sub_category']];
    // echo '<pre>';
    // print_r($data);
    // exit();
    return response()->JSON($data);
  }

  public function delete($id)
  {
    User::find($id)->delete();
    session()->flash('icon', 'success');
    session()->flash('msg', 'Customer Deleted successfully!');
    return redirect('admin/users/');
  }

  public function sub_cat(Request $request)
  {
    $id = $request->get('id');
    $sub_cat = SubCategory::where('category_id', $id)->get();
    // echo '<pre>';
    // print_r($sub_cat);
    // exit();

?>
    <option value="">Select Sub-Category</option><?php
                                                  foreach ($sub_cat as $val) { ?>
      <option value="<?php echo $val['sub_category_id'] ?>"><?php echo $val['sub_category']; ?></option>
<?php  }
                                                }
                                              }
