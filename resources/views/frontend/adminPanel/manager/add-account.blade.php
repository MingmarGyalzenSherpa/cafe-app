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
                <li class="nav-item"><a href="{{route("showReservations")}}" class="nav-link"> <i class="fa-sharp fa-solid fa-chair"></i><span class="title"> Reservations</span></a></li>
                <li class="nav-item"><a href="{{route('showMessages')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-message"></i><span class="title">Messages</span></a></li>
                <li class="nav-item"><a href="{{route('showAccounts','waiter')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-user"></i><span class="title">Manage Accounts</span></a></li>

                
           </ul>
        </div>
        <div class="content">
            <h4 class="text-center mb-3">ADD ACCOUNT</h4>
            <form action="{{route('save-new-account')}}" method="POST" class="w-50" style="margin:0 auto;">
                @csrf
                
                <div class="row">
                    
                    <div class="mb-3 ">
                        <label for="first_name" class="form-label">Email</label>
                        <input name="email" type="text" @error('first_name') placeholder="{{$message}}" @enderror name="first_name" class="form-control" id="first_name" aria-describedby="emailHelp">
                  
                    </div>
                   
                   
                
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="Type">Type:</label>
                        <select class="form-select" name="type">
                            <option value="cashier" selected>    Cashier </option>
                            <option value="waiter"> Waiter</option>

                        </select>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="password" class="form-label">New Password</label>
                        <input type="text" name="password"  class="pw form-control" id="password" aria-describedby="emailHelp">
                  
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="text" name="confirm-password"  class="con-pw form-control" id="confirm-password" aria-describedby="emailHelp">
                  
                    </div>
                </div>
               
                 <button type="submit" class="edit-btn btn btn-primary p-3 ps-4 w-100">EDIT</button>
              </form>
        </div>
       
    </div>

    <script>
        const editBtn = document.querySelector('.edit-btn');
        const password = document.querySelector('.pw');
        const confirmPassword = document.querySelector('.con-pw');

   

            editBtn.disabled = true;

        confirmPassword.addEventListener('keyup',(e)=>{
            console.log(confirmPassword.value);
            console.log(password.value);
            if(confirmPassword.value === password.value)
            {
                editBtn.disabled = false;
            }else{
                editBtn.disabled = true;
            }
        })

        </script>

@endsection