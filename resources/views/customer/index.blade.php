@extends('layout')
@section('content')
  <!-- Begin Page Content -->
                <div class="container-fluid">

                

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customer</h6>
                             <a href="{{url('admin/customer/create')}}" class="float-right btn btn-success btn-sm">Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            	  <form enctype="multipart/form-data" method="post" action="{{url('admin/customer')}}">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                       		 <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@if($data)
                                    	@foreach($data as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->full_name}}</td>
                                            <td>{{$d->email}}</td>
                                            <td>{{$d->mobile}}</td>
                                            <td><a href="{{url('admin/customer/'.$d->id)}}" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i></a>
                                        	<a href="{{url('admin/customer/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></i></a>
                                        	<a onclick="return confirm('Are you sure to delete this data?')" href="{{url('admin/customer/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                       @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            @section('scripts')
            
            <!-- End of Main Content -->
             <!-- Custom styles for this page -->
    <link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
            <!-- Page level plugins -->
    <script src="{{asset('public')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public')}}/js/demo/datatables-demo.js"></script>
@endsection

@endsection