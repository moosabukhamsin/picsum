@extends('front.layout')

@section('title','create image')

@section('content')
<main role="main">
   <section class="jumbotron text-center">
      <div class="container">
         <h1 class="jumbotron-heading">new image</h1>
         <form class="" method="post" action="{{route('image.store')}}" id="form" enctype="multipart/form-data">
            @csrf
            <div class="col-xs-12">
               <div class="form-group">
                  <label >name</label>
                  <input name="name" type="text" class="form-control"  placeholder="Enter Name" required>
               </div>
               <div class="form-group">
                  <label>upload image</label>
                  <input name="image" type="file" class="form-control-file" required>
               </div>
            </div>
            <hr>
            <div class="clearfix m-b-30"></div>
            <div class="col-xs-12 col-md-2 pull-right">
               <button type="submit" class="btn btn-primary  waves-effect waves-light btn-rounded the-btn" >{{ __('front.buttons.create_image') }}</button>
            </div>
         </form>
      </div>
   </section>
  
</main>
  
@endsection
