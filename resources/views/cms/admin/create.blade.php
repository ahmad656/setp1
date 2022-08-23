@extends('cms.parent')

@section('title' , 'Create Admin')

@section('main_title' , 'Add Admin')

@section('sub_title' , 'Create Admin')
@section('styles')
@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Admins's Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="myform">
      <div class="card-body row">
        <div class="form-group col-md-4">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" id="firstname" name="firstname" {{--<-column name --}} placeholder="Enter first name">
        </div>
        <div class="form-group col-md-4">
          <label for="code">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last Name">
        </div>
        <div class="form-group col-md-4">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group col-md-4">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>
        <div class="form-group col-md-4">
          <label for="mobile">Mobile</label>
          <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number">
        </div>
        <div class="form-group col-md-4">
          <label for="date_of_birth">Date Of Birth</label>
          <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter your date of birth">
        </div>
        <div class="form-group col-md-4">
          <label>Country</label>
          <select class="form-control select2" name="country_id" style="width: 100%;" id="country_id">
            @foreach($countries as $country)
              <option value="{{$country->id}}">{{$country->country}}</option>
            @endforeach

          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="gender">Gender</label>
          <select class="form-control select2" style="width: 100%;" id="gender" name="gender">
            <option selected="selected">Male</option>
            <option value="Male">Male</option>
            <option value="Female">Femail</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="status">Status</label>
          <select class="form-control select2" style="width: 100%;" id="status" name="status">
            <option selected="selected">Active</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div> 
        <div class="form-group col-md-4">
          <label for="date_of_birth">Image</label>
          <input type="file" class="form-control" id="image" name="image" placeholder="Add your personal image">
        </div>
        <div class="card-footer col-md-12">
          <button id="btnC" onclick="performStore()" type="button" class="btn btn-primary">Store</button>
          <a href="{{route ('admins.index')}}" type="submit" class="btn btn-success">back</a>
        </div>
      </div>
      <!-- /.card-body -->


    </form>
  </div>
@endsection
@section('scripts')
<script>
  function performStore(){
    let formData = new FormData;
    formData.append('firstname', document.getElementById('firstname').value);
    formData.append('lastname', document.getElementById('lastname').value);
    formData.append('mobile', document.getElementById('mobile').value);
    formData.append('gender', document.getElementById('gender').value);
    formData.append('email', document.getElementById('email').value);
    formData.append('password', document.getElementById('password').value);
    formData.append('status', document.getElementById('status').value);
    formData.append('date_of_birth', document.getElementById('date_of_birth').value);
    formData.append('country_id', document.getElementById('country_id').value);
    formData.append('image', document.getElementById('image').files[0]);

    store('/cms/admin/admins', formData);
    clearForm();
  }
</script>

 {{-- سكربت تفريغ الحقول بعد التخزين
<script>
  const btn = document.getElementById('btnC');

btn.addEventListener('click', function handleClick(event) {
  // 👇️ if you are submitting a form
  event.preventDefault();

  const inputs = document.querySelectorAll('#firstname, #lastname, #mobile, #gender, #email, #password, #status, #date_of_birth, #country_id');

  inputs.forEach(input => {
    input.value = '';
  });
});
</script> --}}
@endsection
