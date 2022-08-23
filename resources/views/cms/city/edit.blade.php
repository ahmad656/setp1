@extends('cms.parent')

@section('title' , 'Edit City')

@section('main_title' , 'Edit City')

@section('sub_title' , 'Edit City')
@section('styles')

@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit City Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('cities.update', $cities->id)}}" method="POST">
      @csrf
      @method('PUT')
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

      <div class="card-body">
        <div class="form-group">
          <label for="city">City Name</label>
          <input type="text" class="form-control" id="city" name="city" {{--<-column name --}} placeholder="Enter City" value="{{$cities->city}}">
        </div>
        <div class="form-group">
          <label for="street">Street</label>
          <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street Name" value="{{$cities->street}}">
          <div class="col-md-12">
            <div class="form-group">
              <label>Country</label>
              <select class="form-control select2" name="country_id" style="width: 100%;" id="country_id">
                  <option selected value="{{$cities->country->id}}">{{$cities->country->country}}</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->country}}</option>
                @endforeach
              </select>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route ('cities.index')}}" type="submit" class="btn btn-success">back</a>
      </div>
    </form>
  </div>
@endsection
@section('scripts')
<!-- Select2 *-->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox *-->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask *-->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker *-->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker *-->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch *-->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper *-->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs *-->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- Page specific script -->
<script>
    $('.country_id').select2({
      theme: 'bootstrap4'
     } )
</script>
@endsection
