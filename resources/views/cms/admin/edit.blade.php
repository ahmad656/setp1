@extends('cms.parent')

@section('title' , 'Edit Admin')

@section('main_title' , 'Edit Admin')

@section('sub_title' , 'Edit Admin')
@section('styles')
@endsection
@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit  Admins's Data</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form >
    @csrf
    @if ($errors->any())
          
      

      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </div>
      @endif
      @if (session()->has('message'))
          

      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success</h5>
        {{session('message')}}
      </div>
      @endif

    <div class="card-body row">
      <div class="form-group col-md-4">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" {{--<-column name --}} placeholder="Enter first name" value="{{$admins->user->firstname}}">
      </div>
      <div class="form-group col-md-4">
        <label for="code">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last Name" value="{{$admins->user->lastname}}">
      </div>
      <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{$admins->email}}">
      </div>
      {{-- <div class="form-group col-md-4">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="{{$admins->firstname}}">
      </div> --}}
      <div class="form-group col-md-4">
        <label for="mobile">Mobile</label>
        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" value="{{$admins->user->mobile}}">
      </div>
      <div class="form-group col-md-4">
        <label for="date_of_birth">Date Of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter your date of birth" value="{{$admins->user->date_of_birth}}">
      </div>
      <div class="form-group col-md-4">
        <label>Country</label>
        <select class="form-control select2" name="country_id" style="width: 100%;" id="country_id" value="{{$admins->firstname}}">
          @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->country}}</option>
          @endforeach

        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="gender">Gender</label>
        <select class="form-control select2" style="width: 100%;" id="gender" name="gender">
          <option selected="selected">{{$admins->user->gender}}</option>
          <option value="Male">Male</option>
          <option value="Female">Femail</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="status">Status</label>
        <select class="form-control select2" style="width: 100%;" id="status" name="status">
          <option selected="selected">{{$admins->user->status}}</option>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div> 
      <div class="form-group col-md-4">
        <label for="date_of_birth">Image</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Add your personal image">
      </div>
      <div class="card-footer col-md-12">
        <button id="btnC" onclick="performUpdate ({{$admins->id}},this)" type="button" class="btn btn-primary">Edit</button>
        <a href="{{route ('admins.index')}}" type="submit" class="btn btn-success">back</a>
      </div>
    </div>
    <!-- /.card-body -->


  </form>
</div>
@endsection
@section('scripts')
<script>
  function performUpdate(id){
    let formData = new FormData;
    
    formData.append('firstname', document.getElementById('firstname').value);
    formData.append('lastname', document.getElementById('lastname').value);
    formData.append('mobile', document.getElementById('mobile').value);
    formData.append('gender', document.getElementById('gender').value);
    formData.append('email', document.getElementById('email').value);
    // formData.append('password', document.getElementById('password').value);
    formData.append('status', document.getElementById('status').value);
    formData.append('date_of_birth', document.getElementById('date_of_birth').value);
    // formData.append('country_id', document.getElementById('country_id').value);
    formData.append('image', document.getElementById('image').files[0]);
    storeRoute('/cms/admin/admins_update/'+id, formData, );
    storeRedirect ('/cms/admin/admins_update/'+id, formData, '/cms/admin/admins')

  }
</script>

@endsection
