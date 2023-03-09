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
</style>

        <div class="sidebar " style="width:20%;">
           <ul class="nav flex-column ">
                <li class="nav-item"><a href="#" class="nav-link active"> <i class="fas  fa-gauge"></i> <span class="title"> Dashboard</span> </a></li>
                <li class="nav-item"><a href="{{route('showCategories')}}" class="nav-link"> <i class="fa-solid fa-sitemap"></i><span class="title"> Categories</span></a></li>
                <li class="nav-item"><a href="{{route('showItems')}}" class="nav-link"><i class="fas fa-burger"></i><span class="title"> Dish</span></a></li>
                <li class="nav-item"><a href="{{route('showEmployees')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-gauge"></i><span class="title"> Employees</span></a></li>
              
           </ul>
        </div>
        <div class="content">
            <form class="addDishForm p-3 mb-4 " action="{{route('saveEditItem')}}" method="POST" enctype="multipart/form-data" style="width:50%;">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <div class="form-group row p-1">
                    <label for="name" class="col-sm-2"> Name </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{$item->name}}" >
                    </div>
                </div>
               <div class="form-group row p-1">
                    <label for="category" class="col-sm-2">Category</label>
                    <div class="col-sm-10">
                        <select name="categories_id" class="p-1" >
                            @foreach($categories as $category)
                                @if($category->id == $item->categories_id)
                                <option value="{{$category->id}}" selected>{{$category->cat_name}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
               </div>
                <div class="form-group row p-1">
                    <label for="image" class="col-sm-2">Image</label>
                   
                    <div class="col-sm-10">
                        <input type="file" name="img" id="choose-img" >
                    </div>
                </div>
                <div class="form-group row p-1">
                     <img class="col-sm-5" id="img-preview" src="{{asset('/storage/'.$img->img_path)}}" alt="">
                </div>
                <div class="form-group row p-1">
                    <label for="price" class="col-sm-2">Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" value="{{$item->price}}">
    
                    </div>
                </div>
                <form-group class="row p-1">
                    <button type="submit" class="btn btn-primary">Add </button>
    
                </form-group>
                
            </form>   
        </div>
       
    </div>


    <script>
        const chooseImg = document.querySelector('#choose-img');
        const imgPreview = document.getElementById('img-preview');

        chooseImg.addEventListener('change',function(){
            showImgPreview();
        })

        function showImgPreview(){
            const files = chooseImg.files[0];
            if(files)
            {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener('load',function(){
                    imgPreview.src = this.result;
                })
            }
        }

    </script>
@endsection