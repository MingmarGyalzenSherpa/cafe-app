@extends('frontend.adminPanel.layouts.main')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

*{
    box-sizing: border-box;
}
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

.addDishForm{
    display: none;
}

</style>

        <div class="sidebar " style="width:20%;">
           <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link"> <i class="fas  fa-gauge"></i> <span class="title"> Dashboard</span> </a></li>
                <li class="nav-item"><a href="{{route('showCategories')}}" class="nav-link"> <i class="fa-solid fa-sitemap"></i><span class="title"> Categories</span></a></li>
                <li class="nav-item"><a href="{{route('showItems')}}" class="nav-link active"><i class="fas fa-burger"></i><span class="title"> Dish</span></a></li>
                <li class="nav-item"><a href="{{route('showEmployees')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-gauge"></i><span class="title"> Employees</span></a></li>
              
           </ul>
        </div>
        <div class="content">
            <button class="btn btn-primary mb-4 addDishBtn"><i class="fa fa-plus"> </i> Add Dish</button>
            
                <form class="addDishForm p-3 mb-4 " action="{{route('addItem')}}" method="POST" enctype="multipart/form-data" style="width:50%;">
            @csrf
            <div class="form-group row p-1">
                <label for="name" class="col-sm-2"> Name </label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" >
                </div>
            </div>
           <div class="form-group row p-1">
                <label for="category" class="col-sm-2">Category</label>
                <div class="col-sm-10">
                    <select name="categories_id" class="p-1" >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </div>
           </div>
            <div class="form-group row p-1">
                <label for="image" class="col-sm-2">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="img">
                </div>
            </div>
            <div class="form-group row p-1">
                <label for="price" class="col-sm-2">Price</label>
                <div class="col-sm-10">
                    <input type="text" name="price">

                </div>
            </div>
            <form-group class="row p-1">
                <button type="submit" class="btn btn-primary">Add </button>

            </form-group>
            
        </form>    
            <div class="actions d-flex justify-content-between mb-3">
                
                <form action="{{route('showItems')}}" method="GET">
                    <label for="">Search by Category:</label>
                    <select name="catID" id="" class="ms-2 p-1 ps-2 pe-2">
                        <option value="all">ALL</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->cat_name}}</option>

                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary  ms-1 p-3 ps-4 pe-4 pb-1 pt-1 "><i class="fas fa-search"></i></button>
                </form>
                <form action="{{route('showItems')}}" method="GET">
                    <input type="text" placeholder="Search By Name" name="dishName" class="p-1 ps-2 border rounded">
                    <button type="submit" class="btn btn-primary pb-1">Search</button>
                </form>
                <div class="sort">
                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort" class="p-2">
                        <option value="default">default</option>
                        <option value="incre">Price (low to high)</option>
                        <option value="decre">Price (high to low)</option>
                    </select>
                    <button type="submit" class="btn btn-primary pb-1">Sort</button>

                </div>
                
            </div>
            
            <table class="table">
                <thead  class="bg-dark" style="color:white;">
                <tr>
                  <th scope="col">S.N</th>
                  <th scope="col">Dish</th>
                  <th scope="col">Category</th>
                  <th scope="col">Price</th>
                  <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ; ?>
                    @foreach ($items as $item)
                        <tr class="items">
                            <th scope="row"> {{$count++}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->cat_name}}</td>
                            <td class="price">Rs.{{$item->price}}</td>
                            <td><a href="{{route('editItem',$item->id)}}" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
       
        <script>

            let addDishBtn = document.querySelector('.addDishBtn');
            console.log(addDishBtn);
            let addDishForm = document.querySelector('.addDishForm');
            addDishBtn.addEventListener('click',(e)=>{
                e.preventdefault;
                addDishForm.style.display = "block";
                
            });


        </script>
    

    {{-- <div class="container" style="margin-top:90px;">
        <h1>Items</h1>
        <form action="{{route('addItem')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Item Name:</label>
                <input type="text" name="name" >
                <br>
                <br>
            <label for="category">Category</label>
            <select name="categories_id" id="">
                <option value="1">food</option>
                <option value="2">foods</option>
                <option value="3">fooed</option>
            </select>
            <br>
            <br>
            <label for="image">Image:</label>
            <input type="file" name="img">
            <br>
            <br>
            <label for="price">price:</label>
            <input type="text" name="price">
            <br>
            <button type="submit">Add Item</button>
        </form>    
        
        
    </div> --}}
@endsection