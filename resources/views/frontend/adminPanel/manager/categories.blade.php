@extends('frontend.adminPanel.layouts.main')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

.sidebar{
    position: fixed;
    top:90px;
    left:0;
    height:100%;
    border-right:  1px solid #e5e5e5;
    border-top: 1px solid #e5e5e5;
}

.content{
    margin:90px 0 0 20%;
    background-color:#e5e5e5;
    padding:40px 40px;
    min-height: 88vh;

}
.nav{
    letter-spacing: 0.1rem;
    padding:35px;
}

.nav > li{
    
}

.nav a{
    display: block;
    width: 100%;
    height: 100%;
    padding:0;
    height:3rem;
    
}

a:hover{
    color:#17a2b8;
}

.nav .title{
    padding-left: 10px;
}
.nav-link{
    color:#343a40;

}

.active{
    color:blue;
    font-size: 1.2rem;
}

.addCatForm{
    display: none;
}
</style>

        <div class="sidebar " style="width:20%;">
            <ul class="nav flex-column ">
                <li class="nav-item"><a href="{{route('managerDashboard')}}" class="nav-link "> <i class="fas  fa-gauge"></i> <span class="title"> Dashboard</span> </a></li>
                <li class="nav-item"><a href="{{route('showCategories')}}" class="nav-link active"> <i class="fa-solid fa-sitemap"></i><span class="title"> Categories</span></a></li>
                <li class="nav-item"><a href="{{route('showItems')}}" class="nav-link"><i class="fas fa-burger"></i><span class="title"> Dish</span></a></li>
                <li class="nav-item"><a href="{{route('showEmployees')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-gauge"></i><span class="title"> Employees</span></a></li>
                <li class="nav-item"><a href="{{route('showReservations')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-chair"></i><span class="title"> Reservations</span></a></li>
                <li class="nav-item"><a href="{{route('showMessages')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-message"></i><span class="title">Messages</span></a></li>
                <li class="nav-item"><a href="{{route('showAccounts','waiter')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-user"></i><span class="title">Manage Accounts</span></a></li>

                
           </ul>
        </div>
        <div class="content">
            <button class="btn btn-primary mb-4 addCatBtn"><i class="fa fa-plus"> </i> Add Category</button>
            
            <form class="addCatForm p-3 mb-4 " action="{{route('addCategory')}}" method="POST"  style="width:50%;">
        @csrf
        <div class="form-group row p-1">
            <label for="name" class="col-sm-2 pt-1"> Name </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" >
            </div>
        </div>
       
        <form-group class="row p-1">
            <button type="submit" class="btn btn-primary">Add </button>

        </form-group>
        
    </form>    
            <table class="table">
                <thead  class="bg-dark" style="color:white;">
                <tr>
                  <th scope="col">S.N</th>
                  <th scope="col">Name</th>
                  <th scope="col">Dishes</th>
                  <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ; ?>
                    @foreach ($categories as $category)
                        <tr class="items">
                            <th scope="row"> {{$count++}}</th>
                            <td>{{$category->cat_name }}</td>
                            <td>{{$counts[$count-2]}}</td>
                            <td><a href="{{route('editCategory',$category->id)}}" class="btn btn-primary">Edit</a>
                                <a href="#" data-id = "{{$category->id}}" class="btn btn-danger btn-delete">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>
    <div class="alert card p-0" style="display:none;position:fixed;background-color:white;width:35%;top:50%;left:50%;transform:translate(-50%,-50%);height:150px;z-index:99;">
        <div class="close-btn mb-0" style="display:flex;justify-content:flex-end;"> <button class="btn btn-cross" style="color:red"><i class="fas fa-close"></i></button></div>
    <h3 class=" text-center  mb-0">Are you sure you want to delete?</h3>
    <form action="{{route('deleteCategory')}}" method="GET">
        <input type="hidden" value="" name="id" class="deleteID">
        <button  " class="confirm-delete btn btn-danger mt-3 pt-2 pb-2" style="width:90%;position:relative;left:30px;">Confirm</button>
    </form>
   </div>
   <div class="overlay" style="display:none;position: fixed;top:0;left:0;width:100%;height:100%;background-color:green;opacity:0.5;">
        
   </div>
    <script>
            const inputDeleteID = document.querySelector('.deleteID');
            const alert = document.querySelector('.alert');
            const overLay = document.querySelector('.overlay');
            const deleteBtn = document.querySelectorAll('.btn-delete');
            const btnClose = document.querySelector('.btn-cross');

            let addCategoryBtn = document.querySelector('.addCatBtn');

            let addCatForm = document.querySelector('.addCatForm');
            addCategoryBtn.addEventListener('click',(e)=>{
                e.preventdefault;
                addCatForm.style.display = "block";
                
            });

            //for delete btn
            deleteBtn.forEach(btn => {
                btn.addEventListener('click',function(e){
                    e.preventdefault;
                    overLay.style.display= "block";
                    alert.style.display = "block";
                    inputDeleteID.value = btn.dataset.id;
                    
                })
            });

            //close delete btn
            btnClose.addEventListener('click',(e)=>{
                e.preventdefault;
                overLay.style.display = 'none';
                alert.style.display = 'none';
            })

    </script>
@endsection