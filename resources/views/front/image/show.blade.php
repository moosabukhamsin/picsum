@extends('front.layout')

@section('title','image show')

@section('content')
<main role="main">
   <section class="jumbotron text-center">
      <div class="container">
         <h1 class="jumbotron-heading">{!!$image->name!!}</h1>
         <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('uploads/'.$image->file_name) }}">
            <div class="card-body">
               <h5 class="card-title">{!!$image->name!!}</h5>
            </div>
         </div>         
      </div>
   </section>
  
</main>
  
@endsection
