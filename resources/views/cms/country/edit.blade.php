@extends('cms.parent')

@section('title' , 'Edit Country')

@section('main_title' , 'Edit Country')

@section('sub_title' , 'Edit Country')
@section('styles')
@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Country Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>

      <div class="card-body">
        <div class="form-group">
          <label for="country">Country Name</label>
          <input type="text" class="form-control" id="country" name="country" {{--<-column name --}} placeholder="Enter Country" value="{{$countries->country}}">
        </div>
        <div class="form-group">
          <label for="code">Code</label>
          <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code Name" value="{{$countries->code}}">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performUpdate({{$countries->id}})" class="btn btn-primary">Update</button>
        <a href="{{route ('countries.index')}}" type="submit" class="btn btn-success">back</a>
      </div>
    </form>
  </div>
@endsection
@section('scripts')
<script>
  function performUpdate(id){
    let formData = new FormData;
    formData.append('country', document.getElementById('country').value);
    formData.append('code', document.getElementById('code').value);
    storeRoute('/cms/admin/countries_update/'+id, formData);
  }
</script>

@endsection
