@extends('front.layout')

@section('title','image index')

@section('content')
<main role="main">
   <section class="jumbotron text-center">
   <h1 class="jumbotron-heading">image index</h1>
      <div class="container">
         <div class="row">
            @foreach ($images as $image)
            <div class="col-md-4">
               <div class="card" style="width: 18rem;">
                  <a href="{{route('image.show',$image->id)}}">
                     <img class="card-img-top" src="{{ asset('uploads/'.$image->file_name) }}">
                  </a>
                  <div class="card-body">
                     <h5 class="card-title">{!!$image->name!!}</h5>
                  </div>
               </div>
            </div>
            @endforeach  
         </div>   
      </div>
   </section>
  
</main>
  
@endsection
