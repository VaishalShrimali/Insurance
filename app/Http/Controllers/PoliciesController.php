<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Product;
use App\Models\Policy;
use Nette\Utils\Json;
use Illuminate\Support\Facades\Validator;
use \PDF;
use File;
use ZipArchive;

class PoliciesController extends Controller
{
    //
    public function index()
    {
        $year = date('Y');
        $result['policies'] = Policy::join('product', 'product.product_id', '=', 'policies.product')
            ->join('users', 'users.id', '=', 'policies.customer')
            ->where('policies.year',$year)
            ->get(['policies.*', 'product.product_name', 'users.first_name', 'users.last_name']);
        // echo '<pre>';
        // print_r($result['policies']);
        // exit();

        return view('admin/policies/list', $result);
    }
    public function create()
    {
        $result['company'] = Company::all();
        $result['customer'] = User::all();
        // $year = date('Y');
        // echo '<pre>';
        // print_r($year);
        // exit();
        return view('admin/policies/create', $result);
    }

    public function insert(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit();

        $validator = Validator::make($request->all(), [
            'customer' => 'required',
            'company' => 'required',
            'product' => 'required',
            'type' => 'required',
            'e_date' => 'required',
            'r_date' => 'required',
            'premium' => 'required',
            'payment_date' => 'required',
            'mode' => 'required',
            'docs[]' => 'mimes:jpg,png,jpeg,gif,svg,pdf'
        ]);
        if ($validator->fails()) {
            $result['company'] = Company::all();
            $result['customer'] = User::all();
            return redirect('admin/policies/create')->withErrors($validator)->withInput();
        }



        $image = array();
        if ($files = $request->file('docs')) {
            foreach ($files as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $destination = public_path() . '/uploads/document';
                $file->move($destination, $filename);
                $image[] = $filename;
            }
        }

        // $file = $request->file('docs');
        // $filename = time() . '-' . $file->getClientOriginalName();
        // $destination = public_path() . '/uploads/document';
        // $file->move($destination, $filename);

        $data = implode('|', $image);
        $year = date('Y');
        // echo '<pre>';
        // print_r($year);
        // exit();


        $policies = new Policy;
        $policies->customer = $request->customer;
        $policies->company = $request->company;
        $policies->product = $request->product;
        $policies->type = $request->type;
        $policies->expire_date = $request->e_date;
        $policies->renewal_date = $request->r_date;
        $policies->beneficiaries = $request->Beneficiaries;
        $policies->premium = $request->premium;
        $policies->amount = $request->amount;
        $policies->payment_date = $request->payment_date;
        $policies->payment_mode = $request->mode;
        $policies->remark = $request->remark;
        $policies->vehicle = $request->vehicle;
        $policies->entry_date = date("Y-m-d");
        $policies->docs = $data;
        $policies->year = $year;
        $policies->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Policy created successfully!');
        return redirect('admin/policies/');
    }

    public function edit($id)
    {

        $result['policy'] = Policy::where('policie_id', $id)->get();
        $result['product'] = Product::all();
        $result['company'] = Company::all();
        $result['customer'] = User::all();
        return view('admin/policies/edit', $result);
    }

    public function view($id)
    {

        $result['policy'] = Policy::where('policie_id', $id)->get();
        $result['product'] = Product::all();
        $result['company'] = Company::all();
        $result['customer'] = User::all();
        $docs = array();
        $docs = explode('|', $result['policy'][0]['docs']);
        $result['docs'] = $docs;
        // echo '<pre>';
        // // print_r($result['policy'][0]['docs']);
        // print_r($result['docs']);
        // exit();
        return view('admin/policies/view', $result);
    }



    public function update(Request $request)
    {

        // echo '<pre>';
        // print_r($request->all());
        // exit();

        $validator = Validator::make($request->all(), [
            'customer' => 'required',
            'company' => 'required',
            'product' => 'required',
            'type' => 'required',
            'e_date' => 'required',
            'r_date' => 'required',
            'premium' => 'required',
            'payment_date' => 'required',
            'mode' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('admin/policies/edit' . $request->update_id)->withErrors($validator)->withInput();
        }



        $image = array();
        if ($files = $request->file('docs')) {
            foreach ($files as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $destination = public_path() . '/uploads/document';
                $file->move($destination, $filename);
                $image[] = $filename;
            }
        }

        $data = implode('|', $image);


        $policies = Policy::find($request->update_id);
        $policies->customer = $request->customer;
        $policies->company = $request->company;
        $policies->product = $request->product;
        $policies->type = $request->type;
        $policies->expire_date = $request->e_date;
        $policies->renewal_date = $request->r_date;
        $policies->beneficiaries = $request->Beneficiaries;
        $policies->premium = $request->premium;
        $policies->amount = $request->amount;
        $policies->payment_date = $request->payment_date;
        $policies->payment_mode = $request->mode;
        $policies->vehicle = $request->vehicle;
        $policies->remark = $request->remark;
        $policies->docs = $data;
        $policies->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('msg', 'Policy Update successfully!');
        return redirect('admin/policies/');
    }

    public function delete($id)
    {
        Policy::find($id)->delete();
        session()->flash('icon', 'success');
        session()->flash('msg', 'Policy Deleted successfully!');
        return redirect('admin/policies/');
    }

    public function pdf($id)
    {
        $policy = Policy::where('policie_id', $id)->get();
        $product = Product::all();
        $company = Company::all();
        $customer = User::all();
        $customer_name = User::where('id', $policy[0]['customer'])->get();
        $images = array();
        $images = explode('|', $policy[0]['docs']);
        $temp = array();
        // echo gettype($images);
        // print_r( $images);
        // exit();
        if (empty($images[0])) {
            $docs = public_path('uploads/document/no-image.jpg');
            $type = pathinfo($docs, PATHINFO_EXTENSION);
            $data = file_get_contents($docs);
            $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
            array_push($temp, $img);
        } else {
            foreach ($images as $img_d) {
                $docs = public_path('uploads/document/' . $img_d);
                $type = pathinfo($docs, PATHINFO_EXTENSION);
                $data = file_get_contents($docs);
                $img = 'data:image/' . $type . ';base64,' . base64_encode($data);
                array_push($temp, $img);
            }
        }





        // return view('admin/policies/pdf', compact('policy','product','company','customer','temp'));

        // echo '<pre>';
        // print_r($temp);
        // exit();




        $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin/policies/pdf', compact('policy', 'product', 'company', 'customer', 'temp'));
        // return $pdf->download('codesolutionstuff.pdf');
        return $pdf->download($customer_name[0]['first_name'] . '_' . $customer_name[0]['last_name'] . '.pdf');
    }

    public function getdetials(Request $request)
    {
        $id =  $request->get('id');
        $company = User::join('company', 'company.company_id', '=', 'users.company')
            ->where('id', $id)
            ->get(['users.*', 'company.company_id', 'company.company_name']);
        // echo '<pre>';
        // print_r($company);
        // exit();

        $data = ['company_id' => $company[0]['company_id'], 'company_name' => $company[0]['company_name'], 'category' => $company[0]['category']];
        return response()->JSON($data);
    }

    public function getproduct(Request $request)
    {
        $id =  $request->get('id');
        // echo $id;
        $product = Product::where('company', '=', $id)->get();
        // echo '<pre>';
        // print_r($product);
        // exit();
?>
        <option value="">Select Product</option>
        <?php foreach ($product as $val) { ?>
            <option value="<?php echo $val['product_id']; ?>" {{ old('product') === $val['product_id'] ? 'selected' : '' }}><?php echo $val['product_name']; ?></option>
<?php   }
    }

    public function download_pdf($id)
    {
        // echo $file;
        // echo $id;
        // exit();

        $policies = Policy::join('users', 'users.id', '=', 'policies.customer')
            ->where('policie_id', $id)
            ->get(['policies.*', 'users.first_name', 'users.last_name']);


        $data = explode('|', $policies[0]['docs']);
        // echo '<pre>';
        // print_r( $data);
        // exit();
        $zip = new ZipArchive;
        $fileName = $policies[0]['first_name'] . '_' . $id . '.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files(public_path('uploads/document'));
            // echo '<pre>';
            // print_r($files);
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                if (in_array($relativeNameInZipFile, $data)) {
                    $zip->addFile($value, $relativeNameInZipFile);
                    // echo '<pre>';
                    // echo $relativeNameInZipFile;
                }
            }
            $zip->close();
        }

        return response()->download(public_path($fileName));
    }
}
