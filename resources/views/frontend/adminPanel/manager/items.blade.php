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
</style>

        <div class="sidebar " style="width:20%;">
           <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link"> <i class="fas  fa-gauge"></i> <span class="title"> Dashboard</span> </a></li>
                <li class="nav-item"><a href="#" class="nav-link"> <i class="fa-solid fa-sitemap"></i><span class="title"> Categories</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link active"><i class="fas fa-burger"></i><span class="title"> Dish</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"> <i class="fa-sharp fa-solid fa-gauge"></i><span class="title"> Employees</span></a></li>
              
           </ul>
        </div>
        <div class="content">
            <div class="actions d-flex justify-content-between mb-3">
                <form action="">
                    <label for="">Search by Category:</label>
                    <select name="" id="" class="ms-2 p-1 ps-2 pe-2">
                        <option value="">Food</option>
                    </select>
                    <button type="submit" class="btn btn-primary  ms-1 p-3 ps-4 pe-4 pb-1 pt-1 "><i class="fas fa-search"></i></button>
                </form>
                <form>
                    <input type="text" placeholder="Search By Name" class="p-1 ps-2 border rounded">
                    <button type="submit" class="btn btn-primary pb-1">Search</button>
                </form>
                <div class="sort">
                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort">
                        <option value="default">default</option>
                        <option value="incre">Price (low to high)</option>
                        <option value="decre">Price (high to low)</option>
                    </select>
                </div>
                
            </div>
            
            <table class="table">
                <thead  class="bg-dark" style="color:white;">
                <tr>
                  <th scope="col">S.N</th>
                  <th scope="col">Dish</th>
                  <th scope="col">Category</th>
                  <th scope="col">Price</th>
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
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
       
        <script>

            let items = document.querySelectorAll('.items');
            console.log(items);
            let sort = document.getElementById('sort');
            sort.addEventListener('change',function(e){
                console.log(sort.options[sort.selectedIndex].value);
                sortByLowToHigh(items);

            })

            function sortByLowToHigh(items)
            {
                
            items.forEach(element => {
                    let price = element.querySelector('.price');
                    console.log(price);
                });

            }


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