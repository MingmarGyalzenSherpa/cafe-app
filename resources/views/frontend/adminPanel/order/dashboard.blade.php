@extends('frontend.adminPanel.layouts.main')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

/* .btn-orders{
  display: none;
  padding:10px 20px;
  background-color:lightseagreen;
  border:none;
  border-radius: 5px;
  font-size: 20px;
  position:fixed;
  bottom:20px;
  right:30px;
}

.btn-orders:hover{
  background-color:lightgreen;
} */

.modal-order {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  transition: 200ms ease-in-out;
  border: 1px solid black;
  border-radius: 10px;
  z-index: 10;
  background-color: white;
  width: 500px;
  max-width: 80%;
}

/* .modal-header {
   transform: translate(-50%, -50%) scale(1);
} */

/* .modal-header {
  padding: 10px 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid black;
} */

/* .modal-header .title {
  font-size: 1.25rem;
  font-weight: bold;

} */
.modal-header .close-buttom {
  cursor: pointer;
  border: none;
  outline: none;
  background: none;
  font-size: 1.25rem;
  font-weight: bold;
}

.modal-body {
  padding: 10px 15px;
}

/* #overlay {
  position: fixed;
  opacity: 0;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, .5);
  pointer-events: none;

}

#overlay.active {
  opacity: 1;
  pointer-events: all; */

  </style>



<div class="containers " style="margin-top:90px;border:1px solid red;">
              <section class="menu pt-2 pb-3" id="menu">
                 <h2 style="text-align: center;">CATEGORIES {{$tableID}}</h2>
                 <hr>
                <ul class="nav nav-tabs d-flex justify-content-center" >
                  @foreach ($categories as $category)

                  @if($category->id == $categoryPK)
                    <li class="nav-item">
                      <a class="nav-link active"  href="{{route('orderDashboard',[$tableID,$category->id])}}">
                        <h4>{{$category->cat_name}}</h4>
                      </a>
                    </li>

                  @else
                  <li class="nav-item">
                    <a class="nav-link"  href="{{route('orderDashboard',[$tableID,$category->id])}}">
                      <h4>{{$category->cat_name}}</h4>
                    </a>
                  </li>

                  @endif
                  @endforeach   
                </ul>
              </section>
              

              <h2 style="text-align: center;">ITEMS</h2>
                <div class="tab-pane fade active p-4 pe-1 show d-flex flex-wrap justify-content-space-between">
                  


                        

                  {{-- using for loop to access the item and images as they share same index --}}
                  
                  @for ($i = 0; $i < $count; $i++) 
                     <div class="card ms-1 me-1" style="width: 18rem;">
                        <img src="@if($images[$i]) {{asset('storage/'.$images[$i]->img_path)}}@endif" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center text-uppercase mb-4">{{$items[$i]->name}}</h5>
                          
                          <form action="{{route('addOrder')}}" method="POST"> 
                            @csrf
                            <input type="hidden" name="tableID" value="{{$tableID}}">
                            <input type="hidden" name="itemID" value="{{$items[$i]->id}}">
                            <h6 class="card-subtitle  mb-2 d-flex justify-content-between align-items-center"><span>Quantity:</span><input type="number" name="quantity" class="form-control pt-1 pb-1" style="width:80px;" value="1"></h6>
                            <button type="submit" class="pick btn mr-2 w-100 mt-3 p-3 text-decoration-none"><i class="fas fa-link"></i> Pick</button>
                          </form>
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
              
<button data-modal-target="#modal">Button</button>
<div class="modal-order" id="modal-order">
    <div class="">
    <div class="title">Example Modal</div>
    <button data-close-button class="close-button">&times;</button>
  </div>
  <div class="">
    This is testing of the items checkout!!
  </div>
</div>
<!-- <div class="active" id="overlay"></div> -->

          </div>
                 
          <!-- <button type="button" style="background;" class=" btn-orders"><i class="fas fa-burger"></i></button> -->

          

<script>
  const openModalButtons = documnet.querySelectorAll('[data-modal-target]')
  const closeModalButtons = documnet.querySelectorAll('[data-close-button]')

  openModalButtons.forEach(button => {
    button.addEventListener('click',() => {
      const modal = documnet.querySelector(button.dataset.modalTarget)
      closeModal(modal)
    })
  })

  // overlay.addEventListener('click', () => {
  //   const modals = documnet.querySelectorAll('.modal.active')
  //   modals.forEach(modal => {
  //     closeModal(modal)

  //   })
  // })

    closeModalButtons.forEach(button => {
    button.addEventListener('click',() => {
      const modal = button.closest('.modal-order')
      openModal(modal)
    })
  })


 function openModal(modal) {
  if (modal == null) return
  modal.classList.add('active')
 }

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
 

  
 }
</script>

@endsection
