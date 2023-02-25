@extends('frontend.adminPanel.layouts.main')
@section('container')
<style>
  :root {
  --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
}

.container {
    display: flex;
    flex-wrap:wrap;
    justify-content: space-between;
    align-items: center;
  }

.card {
  background: #222;
  border: 1px solid #dd2476;
  color: rgba(250, 250, 250, 0.8);
  margin-bottom: 2rem;
}

.btn {
  border: 5px solid;
  border-image-slice: 1;
  background: var(--gradient) !important;
  -webkit-background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  border-image-source:  var(--gradient) !important; 
  text-decoration: none;
  transition: all .4s ease;
}

.btn:hover, .btn:focus {
      background: var(--gradient) !important;
  -webkit-background-clip: none !important;
  -webkit-text-fill-color: #fff !important;
  border: 5px solid #fff !important; 
  box-shadow: #222 1px 0 10px;
  text-decoration: underline;
}
  </style>
<div class="containers " style="margin-top:90px;border:1px solid red;">
              <section class="menu" id="menu">
                 <h2 style="text-align: center;">CATEGORIES</h2>
                 <hr>
                <ul class="nav nav-tabs d-flex justify-content-center" >
                  @foreach ($categories as $category)

                  @if($category->id == $categoryPK)
                    <li class="nav-item">
                      <a class="nav-link active"  href="{{route('orderDashboard',$category->id)}}">
                        <h4>{{$category->cat_name}}</h4>
                      </a>
                    </li>

                  @else
                  <li class="nav-item">
                    <a class="nav-link"  href="{{route('orderDashboard',$category->id)}}">
                      <h4>{{$category->cat_name}}</h4>
                    </a>
                  </li>

                  @endif
                  @endforeach   
                </ul>
              </section>
              

              <h2 style="text-align: center;">ITEMS</h2>
                <div class="tab-pane fade active show d-flex flex-wrap justify-content-between">
                  


                        

                  {{-- using for loop to access the item and images as they share same index --}}
                  <div class="container">
                  @for ($i = 0; $i < $count; $i++) 
                      
<div class="container mx-auto mt-4 d-flex flex-wrap">
  <div class="row">
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
  <img src="@if($images[$i]) {{asset('storage/'.$images[$i]->img_path)}}@endif" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$items[$i]->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$items[$i]->price}}</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       <a href="#" class="btn mr-2"><i class="fas fa-link"></i> Pick</a>
    
  </div>
  </div>
    </div>    
      
</div>
  </div>
                  <!-- <div class="menu-item m-3 p-4 border border-primary rounded" style="width:250px;">
                    <a href="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="@if($images[$i]) {{asset('storage/'.$images[$i]->img_path)}}@endif" class="menu-img img-fluid" alt=""></a>
                    <h4>{{$items[$i]->name}}</h4>
                    
                    <p class="price">
                     {{$items[$i]->price}}
                    </p>
                  </div>-->
                  @endfor
                
                      
</div>
</div>
</div>
@endsection
