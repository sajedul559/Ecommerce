@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage sliders
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2" ><i class="fa fa-plus">Add New</i></a>
            <div class="clearfix"></div>
            
                  <!-- Delete Modal -->
                  <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add new slider</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
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
                        <input type="url" class="form-control" name="button_link" placeholder="Enter confirm password" value="{{ old('button_link') }}">
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
                 
          <table class="table table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Slider Title</th>
              <th>Slider Image</th>
              <th>Slider Button</th>
              <th>Slider Text</th>


              <th>Priority</th>

              <th>Action</th>
            </tr>

            @foreach ($sliders as $slider)
              <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{ $slider->title }}</td>
                <td>
                  <img src="{!! asset('images/sliders/'.$slider->image) !!}" width="100">

                </td>
                <td>{{ $slider->button_text }}</td>
                <td>{{ $slider->button_link }}</td>



                <td>
                  <a href="#update" data-toggle="modal" class="btn btn-info float-right mb-2" ><i class="fa fa-plus">Update</i></a>
                  <!-- Delete Modal -->
                   <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update slider</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.slider.update', $slider->id) !!}"  method="post" enctype="multipart/form-data">
                            @csrf
                          
                       
                      
                       
                      
                         <div class="form-group">
                             <label for="name">Title</label>
                             <input type="text" class="form-control" name="title" placeholder="Enter full name" value="{{ $slider->title }}">
                         </div>
                         <div class="form-group">
                           <label for="image">Slider Image
                             <a href="{!! asset('images/sliders/'.$slider->image) !!}" target="_blank"> Previous Image</a>
                           </label>
                           <input type="file" class="form-control" name="image" placeholder="Enter email address" >

                        </div>
                         <div class="form-group">
                             <label for="password">Priority</label>
                             <input type="text" class="form-control" name="priority" placeholder="Enter password" value="{{ $slider->priority }}">
                         </div>
                         <div class="form-group">
                           <label for="cpassword">Button Text</label>
                           <input type="text" class="form-control" name="button_text" placeholder="Enter confirm password" value="{{ $slider->button_text }}">
                       </div>
                       <div class="form-group">
                        <label for="cpassword">Button Link</label>
                        <input type="url" class="form-control" name="button_link" placeholder="Enter confirm password" value="{{ $slider->button_link }}">
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

                  <a href="#deleteModal{{ $slider->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.slider.delete', $slider->id) !!}"  method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Permanent Delete</button>
                          </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </td>
              </tr>
            @endforeach

          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
