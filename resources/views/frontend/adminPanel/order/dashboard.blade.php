@extends('frontend.adminPanel.order.layouts.main')
@section('container')
<div class="container " style="margin-top:90px;border:1px solid red;">
    
            <nav class="nav border">
              <a class="nav-item border active p-3" style="width:100px;text-align:center;" aria-current="page" href="#">ALL</a>
              <a class="nav-item p-3 border" style="width:100px;text-align:center;"  href="#">Features</a>
              <a class="nav-item border p-3" style="width:100px; text-align:center;"  href="#">Pricing</a>
              <a class="nav-item border p-3" style="width:100px;text-align:center;"  href="#">Disabled</a>
              @foreach ($categories as $category)
                <a class="nav-item border p-3" style="min-width:100px;text-align:center;"  href="#">{{$category->cat_name}}</a>
              @endforeach
             
              
            </nav>
      
      <div class="mt-3 mb-3 p-2 d-flex flex-wrap container border border-primary">
        <div class="card m-2" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        @foreach($items as $item)
        
          
            <div class="card m-2" style="width: 18rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h3>{{$item->name}}</h3>
              </div>
          </div>

        @endforeach
      </div>
</div>
@endsection
