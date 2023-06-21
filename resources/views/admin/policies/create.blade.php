@extends('layout/admin')

@section('title','Create Policy')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Policy</h1>
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
                        <form action="{{ route('policies.insert') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Policy Owner <span style="color:red;">*</span></label>
                                        <select name="customer" id="customer" class="form-control @error('customer') is-invalid @enderror" onchange="getdetail()">

                                            <option value="">Select Owner</option>

                                            @foreach($customer as $val)
                                            <option value="{{$val['id']}}" {{ old('customer') === $val['id'] ? 'selected' : '' }}  >{{$val['first_name']}} {{$val['last_name']}}</option>
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
                                        <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{old('company')}}" id="company" placeholder="company Name" readonly>
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
                                        <select name="product" id="product" class="form-control @error('product') is-invalid @enderror">

                                        </select>
                                        @error('product')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Type <span style="color:red;">*</span></label>
                                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                            <option value="">Select Type</option>
                                            <option value="Annually" {{ old('type') === 'Annually' ? 'selected' : '' }}>Annually</option>
                                            <!--<option value="Monthly">Monthly</option>-->
                                            <!--<option value="Weekly">Weekly</option>-->
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
                                        <input type="date" class="form-control @error('e_date') is-invalid @enderror" name="e_date" value="{{old('e_date')}}" id="e_date" placeholder="Expire of Date">
                                        @error('e_date')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Renewal of Date <span style="color:red;">*</span></label>
                                        <input type="date" class="form-control @error('r_date') is-invalid @enderror" name="r_date" value="{{old('r_date')}}" id="phone" placeholder="Renewal of Date">
                                        @error('r_date')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="name">Beneficiaries <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('Beneficiaries') is-invalid @enderror" name="Beneficiaries" value="{{old('Beneficiaries')}}" id="Beneficiaries" placeholder="Enter Beneficiaries">
                                        @error('Beneficiaries')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> -->

                                    <div class="form-group col-md-6" id="v1" style="visibility: hidden;">
                                        <label for="name">Vehicle <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('vehicle') is-invalid @enderror" name="vehicle" value="{{old('vehicle')}}" id="vehicle" placeholder="Enter Vehicle" >
                                        @error('vehicle')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
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
                                        <input type="text" class="form-control @error('premium') is-invalid @enderror" name="premium" value="{{old('premium')}}" id="premium" placeholder="Enter premium">
                                        @error('premium')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!--<div class="form-group col-md-3">-->
                                    <!--    <label for="name">Amount Paid <span style="color:red;">*</span></label>-->
                                    <!--    <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{old('amount')}}" id="amount" placeholder="Enter Amount">-->
                                    <!--    @error('amount')-->
                                    <!--    <p class="text-danger">{{ $message }}</p>-->
                                    <!--    @enderror-->
                                    <!--</div>-->
                                    <div class="form-group col-md-3">
                                        <label for="name">Payment Date <span style="color:red;">*</span></label>
                                        <input type="date" class="form-control @error('payment_date') is-invalid @enderror" name="payment_date" value="{{old('payment_date')}}" id="payment_date" placeholder="Payment Date">
                                        @error('payment_date')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="name">Payment Mode <span style="color:red;">*</span></label>
                                        <select name="mode" id="mode" class="form-control @error('mode') is-invalid @enderror">
                                            <option value="">Select Type</option>
                                            <option value="Online" {{ old('mode') === 'Online' ? 'selected' : '' }} >Online</option>
                                            <option value="Card" {{ old('mode') === 'Card' ? 'selected' : '' }}>Card</option>
                                            <option value="Gpay" {{ old('mode') === 'Gpay' ? 'selected' : '' }}>Gpay</option>
                                        </select>
                                        @error('mode')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Documents</label>
                                        <input type="file" class="form-control @error('docs') is-invalid @enderror" name="docs[]"  multiple   id="docs" >
                                        @error('docs')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Special Remark</label>
                                        <textarea name="remark" id="remark" cols="30" rows="1" class="form-control @error('remark') is-invalid @enderror" placeholder="Enter Remark"   >{{old('remark')}}</textarea>
                                        @error('remark')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
                console.log(data);
                $('#company').val(data.company_name);
                if(data.category == 'Motor Insurance'){

                    document.getElementById("v1").style.visibility = "visible";
                }else{
                    document.getElementById("v1").style.visibility = "hidden";
                }
                getproduct(data.company_id);
            }
        });
    }

    function getproduct(id) {
        // alert(id);
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