@extends('frontend.adminPanel.layouts.main')
@section('container')
<div class="container " style="margin-top:90px;border:1px solid red;">
              <section class="menu" id="menu">
                 <h2 style="text-align: center;">CATEGORIES</h2>
                 <hr>
                <ul class="nav nav-tabs d-flex justify-content-center" >
                  @foreach ($categories as $category)

                  @if($category->id == $categoryPK)
                    <li class="nav-item">
                      <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#menu-starters"  href="#">
                        <h4>{{$category->cat_name}}</h4>
                      </a>
                    </li>

                  @else
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-starters"  href="#">
                      <h4>{{$category->cat_name}}</h4>
                    </a>
                  </li>

                  @endif
                  @endforeach   
                </ul>
              </section>
              

                <div class="tab-pane fade active show d-flex flex-wrap justify-content-between" id="menu-starters">
                  {{-- @foreach($items as $item)
                  <div class="menu-item m-3 p-4 border border-primary rounded" style="width:250px;">
                    <a href="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="menu-img img-fluid" alt=""></a>
                    <h4>{{$item->name}}</h4>
                    
                    <p class="price">
                     {{$item->price}}
                    </p>
                  </div>
                  @endforeach --}}
                </div>
              </div>
{{--              
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
      </div> --}}
</div>
@endsection
