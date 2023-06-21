@extends('layout/admin')

@section('title','View Policy')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Policy</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{ url('admin/policies') }}" class="btn btn-primary">Policies List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('policies.update') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="update_id" id="update_id" value="{{$policy[0]['policie_id']}}">
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Policy Owner <span style="color:red;">*</span></label>
                                        <select name="customer" id="customer" class="form-control @error('customer') is-invalid @enderror" onchange="getdetail()" disabled>

                                            <option value="">Select Owner</option>

                                            @foreach($customer as $val)
                                            <option <?php if ($policy[0]['customer'] == $val['id']) {
                                                        echo 'selected';
                                                    } ?> value="{{$val['id']}}">{{$val['first_name']}} {{$val['last_name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('customer')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <!-- <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                         <p class="text-danger">{{ $message }}</p>
                                        @enderror -->
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Company<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{old('company',$policy[0]['company'])}}" id="company" placeholder="company Name" readonly>
                                        @error('company')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <!-- <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                         <p class="text-danger">{{ $message }}</p>
                                        @enderror -->
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Product <span style="color:red;">*</span></label>
                                        <select name="product" id="product" class="form-control @error('product') is-invalid @enderror" disabled>

                                            <option value="">Select Product</option>

                                            @foreach($product as $val)
                                            <option <?php if ($policy[0]['product'] == $val['product_id']) {
                                                        echo 'selected';
                                                    } ?> value="{{$val['product_id']}}">{{$val['product_name']}} </option>
                                            @endforeach
                                        </select>
                                        @error('product')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Type <span style="color:red;">*</span></label>
                                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" disabled>
                                            <option value="">Select Type</option>
                                            <option <?php if ($policy[0]['type'] == 'Annually') {
                                                        echo 'selected';
                                                    } ?> value="Annually">Annually</option>
                                            <option <?php if ($policy[0]['type'] == 'Monthly') {
                                                        echo 'selected';
                                                    } ?> value="Monthly">Monthly</option>
                                            <option <?php if ($policy[0]['type'] == 'Weekly') {
                                                        echo 'selected';
                                                    } ?> value="Weekly">Weekly</option>
                                        </select>
                                        @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <!-- <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                         <p class="text-danger">{{ $message }}</p>
                                        @enderror -->
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Expire of Date <span style="color:red;">*</span></label>
                                        <input type="date" class="form-control @error('e_date') is-invalid @enderror" name="e_date" value="{{old('e_date',$policy[0]['expire_date'])}}" id="e_date" placeholder="Expire of Date" readonly>
                                        @error('e_date')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Renewal of Date <span style="color:red;">*</span></label>
                                        <input type="date" class="form-control @error('r_date') is-invalid @enderror" name="r_date" value="{{old('r_date',$policy[0]['renewal_date'])}}" id="phone" placeholder="Renewal of Date" readonly>
                                        @error('r_date')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="name">Beneficiaries <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('Beneficiaries') is-invalid @enderror" name="Beneficiaries" value="{{old('Beneficiaries',$policy[0]['beneficiaries'])}}" id="Beneficiaries" placeholder="Enter Beneficiaries" readonly>
                                        @error('Beneficiaries')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> -->

                                    @if($policy[0]['vehicle'] != NULL)
                                    <div class="form-group col-md-6" id="v1" style="visibility :  visible">
                                        <label for="name">Vehicle <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('vehicle') is-invalid @enderror" name="vehicle" value="{{old('vehicle',$policy[0]['vehicle'])}}" id="vehicle" placeholder="Enter Vehicle" readonly>
                                        @error('vehicle')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @else
                                    <div class="form-group col-md-6" id="v1" style="visibility :  hidden">
                                        <label for="name">Vehicle <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('vehicle') is-invalid @enderror" name="vehicle" value="{{old('vehicle',$policy[0]['vehicle'])}}" id="vehicle" placeholder="Enter Vehicle" readonly>
                                        @error('vehicle')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    @endif
                                    <!-- <div class="form-group col-md-6">
                                        <label for="email">Email address <span style="color:red;">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email" placeholder="Enter email">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Phone Number <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" id="phone" placeholder="Enter Phone Number">
                                        @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                  

                                    <div class="form-group col-md-6">
                                        <label for="name">Address <span style="color:red;">*</span></label>
                                        <textarea name="address" id="address" cols="30" rows="1" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address"></textarea>
                                        @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label for="name">Category <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{old('category')}}" id="category" placeholder="Enter category ">
                                        @error('category')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Sub-Category <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('sub_cat') is-invalid @enderror" name="sub_cat" value="{{old('sub_cat')}}" id="sub_cat" placeholder="Enter sub_cat ">
                                        @error('sub_cat')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Special Remark</label>
                                        <textarea name="remark" id="remark" cols="30" rows="1" class="form-control @error('remark') is-invalid @enderror" placeholder="Enter Remark"></textarea>
                                        @error('remark')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> -->

                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-12 mt-3" style="margin-bottom : -4px;">
                                        <h5>Payment Details : </h5>
                                        <br>
                                    </div>



                                    <div class="form-group col-md-3">
                                        <label for="name">Premium <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('premium') is-invalid @enderror" name="premium" value="{{old('premium',$policy[0]['premium'])}}" id="premium" placeholder="Enter premium" readonly>
                                        @error('premium')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="name">Amount Paid <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{old('amount',$policy[0]['amount'])}}" id="amount" placeholder="Enter Amount" readonly>
                                        @error('amount')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="name">Payment Date <span style="color:red;">*</span></label>
                                        <input type="date" class="form-control @error('payment_date') is-invalid @enderror" name="payment_date" value="{{old('payment_date',$policy[0]['payment_date'])}}" id="payment_date" placeholder="Payment Date" readonly>
                                        @error('payment_date')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="name">Payment Mode <span style="color:red;">*</span></label>
                                        <select name="mode" id="mode" class="form-control @error('mode') is-invalid @enderror" disabled>
                                            <option value="">Select Type</option>
                                            <option <?php if ($policy[0]['payment_mode'] == 'Cash') {
                                                        echo 'selected';
                                                    } ?> value="Cash">Cash</option>
                                            <option <?php if ($policy[0]['payment_mode'] == 'Card') {
                                                        echo 'selected';
                                                    } ?> value="Card">Card</option>
                                            <option <?php if ($policy[0]['payment_mode'] == 'Gpay') {
                                                        echo 'selected';
                                                    } ?> value="Gpay">Gpay</option>
                                        </select>
                                        @error('mode')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-12 row">


                                    <div class="form-group col-md-6">
                                        <label for="name">Special Remark</label>
                                        <textarea name="remark" id="remark" cols="30" rows="1" class="form-control @error('remark') is-invalid @enderror" placeholder="Enter Remark" readonly> {{$policy[0]['remark']}} </textarea>
                                        @error('remark')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                   
                                </div>
                            </div>
                            <!-- /.card-body -->
                           
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    function getsub_cat() {
        let id = $('#category').val();
        $.ajax({
            url: "{{url('/sub_cat')}}",
            method: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data)
                $('#sub_cat').html(data);
            }
        });
    }

    function getcategors() {
        let id = $('#company').val();
        // alert(id);
        $.ajax({
            url: "{{url('/getcategory')}}",
            method: 'GET',
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#category').val(data.category);
                $('#sub_cat').val(data.sub_category);
            }
        });
    }

    function getdetail() {
        let id = $('#customer').val();
        $.ajax({
            url: "{{url('/getdetials')}}",
            method: 'GET',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#company').val(data.company_name);
                getproduct(data.company_id);
                if (data.category == 'Motor Insurance') {

                    document.getElementById("v1").style.visibility = "visible";
                } else {
                    $('#vehicle').val('');
                    document.getElementById("v1").style.visibility = "hidden";
                }
            }
        });
    }

    function getproduct(id) {
        // alert(id);
        $('#product').html('');
        $.ajax({
            url: "{{url('/getproduct')}}",
            method: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                $('#product').html(data);
            }
        });
    }
</script>

@endsection