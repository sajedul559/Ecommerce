<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image as Image;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use File;

class SlidersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    $sliders = Slider::orderBy('priority', 'asc')->get();
    return view('backend.pages.sliders.index', compact('sliders'));
  }

  public function create()
  {
    return view('backend.pages.sliders.create');
  }

  public function store(Request $request)
  {
   
    
    $slider = new Slider();
    $slider->title = $request->title;
    $slider->title = $request->title;

    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority;

    if($request->image > 0){

        $image = $request->file('image');
        $img = time(). '.'. $image->getClientOriginalExtension();
        $location = public_path('images/sliders/' .$img);
        Image::make($image)->save($location);
        $slider->image = $img;
    }
   
    $slider->save();

    session()->flash('success', 'A new  slider has added successfully !!');
    return redirect()->route('admin.sliders');

  }

  public function edit($id)
  {
    $division= Division::find($id);
    if (!is_null($division)) {
      return view('backend.pages.divisions.edit', compact('division'));
    }else {
      return resirect()->route('admin.divisions');
    }
  }


    public function update(Request $request, $id)
    {
        $slider =  Slider::find($id);
        $slider->title = $request->title;
    
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

       

        if($request->image > 0)
        {
          
        
        $image = $request->file('image');
        $img = time(). '.'. $image->getClientOriginalExtension();
        $location = public_path('images/sliders/' .$img);
        Image::make($image)->save($location);
        $slider->image = $img;
         
        }
        $slider->save();

        session()->flash('success', 'A   slider update successfully !!');
        return redirect()->route('admin.sliders');

    }
   
    public function delete($id)
    {
      $division = Slider::find($id);
      if (!is_null($division))
       {
        // //Delete all the districts for this division
        // $districts = District::where('division_id', $division->id)->get();
        // foreach ($districts as $district) {
        //   $district->delete();
        // }
        $division->delete();
      }
      session()->flash('success', 'Slider has deleted successfully !!');
      return back();

    }
}
