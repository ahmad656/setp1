@extends('cms.parent')

@section('title' , 'Edit City')

@section('main-title' , ' Edit City')

@section('sub-title' , 'edit city')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of City</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('cities.update' , $cities->id)}}" method="POST" >
              @csrf
              @method('PUT')

              @if ($errors->any())

              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                 @foreach ( $errors->all() as $error )
                     <li>{{ $error }} </li>
                 @endforeach
                </div>
                @endif
                {{-- <option selected> {{ $cities->country->country }} </option> --}}

                @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Success !</h5>
                 {{session('message')}}
                </div>
                @endif

              <div class="card-body">
              
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control select2" name="country_id" style="width: 100%;" id="country_id">
                      <option selected>{{$cities->country->country}}</option>
                      @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->country}}</option>
                      @endforeach
                    </select>
                  </div>

                </div>
                <div class="form-group col-md-12">
                  <label for="city">City Name</label>
                  <input type="text" class="form-control" id="city" name="city"
                  value={{$cities->city}} placeholder="Enter City Name">
                </div>
                <div class="form-group col-md-12">
                  <label for="street">Street</label>
                  <input type="text" class="form-control" id="street" name="street"
                  value={{$cities->street}} placeholder="Enter Street Name">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>

        </div>

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')
<script>
  $('.country_id').select2({
      theme: 'bootstrap4'
    })
  
  </script>
@endsection
