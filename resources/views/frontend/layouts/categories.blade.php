@extends('frontend.layouts.main')
@section('main-container')

<section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Menu</h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          @foreach($categories as $category)

          <li class="nav-item">
            <a class="nav-link @if($activeID == $category->id)  active @endif  show" data-bs-toggle="tab" data-bs-target="#menu-{{$category->cat_name}}">
              <h4>{{$category->cat_name}}</h4>
            </a>
          </li>

          @endforeach
          {{-- <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
              <h4>Starters</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
              <h4>Breakfast</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
              <h4>Lunch</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
              <h4>Dinner</h4>
            </a>
          </li><!-- End tab nav item --> --}}

        </ul>

        {{-- <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
          <div class="tab-pane fade active show" id="">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Starters</h3>
            </div>
          </div>

          <div class="row gy-5">
            @foreach($items as $item)

            <div class="col-lg-4 menu-item">
              <a href="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('storage/'.$item->img_path)}}" class="menu-img img-fluid" alt=""></a>
              <h4>Fish Ball Chowmein</h4>
            
              <p class="price">
                Rs.200
              </p>
            </div>

            @endforeach
          
          </div> --}}
          {{-- <div class="tab-pane fade active show" id="menu-starters">
 
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Starters</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Fish Ball Chowmein</h4>
                <p class="ingredients">
                  Wheat noodles, fish balls, dark soy sauce.
                </p>
                <p class="price">
                  Rs.200
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-2.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-2.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Creamy White Bean & Sausage Soup</h4>
                <p class="ingredients">
                   Low-sodium chicken broth, Cans cannellini beans.
                </p>
                <p class="price">
                  Rs.300
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-3.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-3.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Spicy Tomato Cheddar Soup</h4>
                <p class="ingredients">
                 Tomato paste, Sodium chicken or vegetable broth.
                </p>
                <p class="price">
                  Rs.300
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-4.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-4.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Korean Fried Chicken</h4>
                <p class="ingredients">
                 Chicken wings, ketchup,rice vinegar,cocktail peanuts.
                </p>
                <p class="price">
                  Rs.400
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-5.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-5.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Thai Fried Chicken Sandwich</h4>
                <p class="ingredients">
                Skinless, boneless chicken thighs,mayonnaise,fish sauce.
                </p>
                <p class="price">
                  Rs.350
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-6.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-6.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Air Fryer Potatoes</h4>
                <p class="ingredients">
                 Baby potatoes,Freshly ground black pepper,Lemon wedge.
                </p>
                <p class="price">
                  Rs.150
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-breakfast">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Breakfast</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Sweet Potato Pancake</h4>
                <p class="ingredients">
                 Sweet Potato, Buttermilk, Maple syrup.
                </p>
                <p class="price">
                  Rs. 150
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-2.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-2.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Lemon Ricotta Pancakes</h4>
                <p class="ingredients">
                  Lemon, Ricotta, Maple syrup.
                </p>
                <p class="price">
                  Rs.200
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-3.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-3.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Blueberry Buttermilk Pancakes</h4>
                <p class="ingredients">
                  Blueberry, Buttermilk, Fresh Blueberries.
                </p>
                <p class="price">
                  Rs. 250
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-4.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-4.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Cornbread Waffles</h4>
                <p class="ingredients">
                  Honey, Softened Butter, Yellow Cornmeal.
                </p>
                <p class="price">
                  Rs. 350
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-5.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-5.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Ham & Cheese Spinach Puffs</h4>
                <p class="ingredients">
                Box frozen puff pastry, Whole milk.
                </p>
                <p class="price">
                  Rs.300
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-6.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-6.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Scrambled Eggs</h4>
                <p class="ingredients">
                 Kosher salt, sour cream or heavy cream.
                </p>
                <p class="price">
                  Rs. 150
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Lunch</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Garlic Bread Pizza</h4>
                <p class="ingredients">
              loaf frozen garlic bread,pepperoni slices.
                </p>
                <p class="price">
                  Rs.200
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-2.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-2.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Pinwheel Sandwiches</h4>
                <p class="ingredients">
                  butter lettuce leaves,deli-sliced baked ham.
                </p>
                <p class="price">
                  Rs.300
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-3.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-3.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Buffalo Chicken Wrap</h4>
                <p class="ingredients">
                  boneless skinless chicken breasts,red wine vinegar.
                </p>
                <p class="price">
                  Rs.300
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-4.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-4.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Chicken Patty</h4>
                <p class="ingredients">
                  smoked paprika,Sliced beefsteak tomatoes.
                </p>
                <p class="price">
                  Rs.250
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-5.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-5.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Grown-Up SpaghettiOs & Meatballs</h4>
                <p class="ingredients">
                unsalted butter,panko bread crumbs,ground beef chuck.
                </p>
                <p class="price">
                  Rs.400
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-6.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-6.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Chicken Salad Sandwich</h4>
                <p class="ingredients">
                boneless skinless chicken breasts,mayonnaise.
                </p>
                <p class="price">
                  Rs.250
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Lunch Menu Content -->

          <div class="tab-pane fade" id="menu-dinner">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Dinner</h3>
            </div> --}}
{{-- 
            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-1.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Creamy Steak Fettuccine</h4>
                <p class="ingredients">
                  Boneless skinless chicken breasts, heavy cream.
                </p>
                <p class="price">
                  Rs.500
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-2.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-2.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>BBQ Chicken Twice-Baked Potatoes</h4>
                <p class="ingredients">
                 Shredded rotisserie chicken,Shredded smoked Gouda.
                </p>
                <p class="price">
                  Rs.500
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-3.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-3.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Chicken Fried Rice</h4>
                <p class="ingredients">
            Cooked white rice, chicken breasts.
                </p>
                <p class="price">
                  Rs.400
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-4.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-4.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Thai Fried Rice</h4>
                <p class="ingredients">
                  Cooked white rice,chicken breasts, thinly sliced,Kosher salt.
                </p>
                <p class="price">
                  Rs.450
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-5.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-5.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Tofu Katsu Curry</h4>
                <p class="ingredients">
                  Block firm tofu,baby bella mushrooms.
                </p>
                <p class="price">
                  Rs.400
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('import/assets/img/menu/menu-item-6.png')}}" class="glightbox"><img src="{{asset('import/assets/img/menu/menu-item-6.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Tex-Mex Meatballs</h4>
                <p class="ingredients">
                   Shredded Mexican cheese blend,can crushed tomatoes.
                </p>
                <p class="price">
                  Rs.400
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Dinner Menu Content -->

        </div>

      </div> --}}
    </section><!-- End Menu Section -->


    @endsection