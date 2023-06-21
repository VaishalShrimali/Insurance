@extends('layout/admin')

@section('title','Policies List')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Policies List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{ url('admin/policies/create') }}" class="btn btn-primary">Add Policie</a>
                        </div>
                        <div class="card-body">
                            <table border="0" cellspacing="5" cellpadding="5">
                                <tbody>
                                    <tr>
                                        <td>Minimum date:</td>
                                        <td><input type="text" id="min" name="min"></td>
                                    </tr>
                                    <tr>
                                        <td>Maximum date:</td>
                                        <td><input type="text" id="max" name="max"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Insurance</th>
                                        <th>Vehicle Number</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($policies as $val)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{$val['first_name']}} {{$val['last_name']}}</td>
                                        <td>{{$val['product_name']}}</td>
                                        <td>{{$val['company']}}</td>
                                        <td>

                                            @if($val['vehicle'] != NULL)
                                            {{$val['vehicle']}}
                                            @else

                                            Health Insurance
                                            @endif



                                        </td>

                                        <td>{{$val['entry_date']}}</td>
                                        <td>
                                            <a href="{{ url('admin/policies/edit/'.$val['policie_id']) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ url('admin/policies/view/'.$val['policie_id']) }}" class="btn btn-sm btn-primary">View</a>
                                            <a href="{{ url('admin/policies/delete/'.$val['policie_id']) }}" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-danger">Delete</a>
                                            <a href="{{ url('admin/policies/download_pdf/'.$val['policie_id']) }}" class="btn btn-sm btn-secondary" style="margin-top: 2px;"> PDF</a>
                                            <!-- 
                                            <a href="{{ url('admin/policies/pdf/'.$val['policie_id']) }}" class="btn btn-sm btn-primary">pdf</a> -->
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
<script>
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min_date = document.getElementById("min").value;
            var min = new Date(min_date);
            var max_date = document.getElementById("max").value;
            var max = new Date(max_date);

            var startDate = new Date(data[5]);
            //window.confirm(startDate);
            if (!min_date && !max_date) {
                return true;
            }
            if (!min_date && startDate <= max) {
                return true;
            }
            if (!max_date && startDate >= min) {
                return true;
            }
            if (startDate <= max && startDate >= min) {
                return true;
            }
            return false;
        }
    );

   

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').change(function() {
        var table = $('#example1').DataTable();
        table.draw();
    });
    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'YYYY-MM-DD'
        });
        maxDate = new DateTime($('#max'), {
            format: 'YYYY-MM-DD'
        });
    })
</script>
@endsection
@endsection