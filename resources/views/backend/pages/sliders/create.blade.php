@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Slider
        </div>
        <div class="card-body">
          <form action="{!! route('admin.slider.store') !!}"  method="post" enctype="multipart/form-data">
            @csrf
          
       
      
       
      
         <div class="form-group">
             <label for="name">Title</label>
             <input type="text" class="form-control" name="title" placeholder="Enter full name" value="{{ old('name') }}">
         </div>
         <div class="form-group">
           <label for="email">Image</label>
           <input type="file" class="form-control" name="image" placeholder="Enter email address" value="{{ old('email') }}">
       </div>
         <div class="form-group">
             <label for="password">Priority</label>
             <input type="text" class="form-control" name="priority" placeholder="Enter password" value="{{ old('password') }}">
         </div>
         <div class="form-group">
           <label for="cpassword">Button Text</label>
           <input type="text" class="form-control" name="button_text" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
       </div>
       <div class="form-group">
        <label for="cpassword">Button Link</label>
        <input type="text" class="form-control" name="button_link" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
    </div>
         <div class="form-group">
            
          <button type="submit" class="btn btn-success">Add New</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

         </div>
         <br>
       
     </form>
</div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
