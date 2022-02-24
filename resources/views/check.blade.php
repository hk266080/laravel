@extends('frontlayout')
@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <a href="{{url('login')}}"><img src="https://i.ibb.co/C0VH2Mm/danial-igdery-FCHl-Yv-R5g-JI-unsplash.jpg" alt="danial-igdery-FCHl-Yv-R5g-JI-unsplash" border="0"></a>
        <a href="{{url('login')}}" class="btn btn-primary">User</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <a href="{{url('admin/login')}}"><img src="https://i.ibb.co/GHjk1ST/274-2748802-transparent-tech-support-icon-png-admin-login-images.png" alt="274-2748802-transparent-tech-support-icon-png-admin-login-images" border="0"></a>
        <a href="{{url('admin/login')}}" class="btn btn-primary">Admin</a>
      </div>
    </div>
  </div>
</div>
@endsection