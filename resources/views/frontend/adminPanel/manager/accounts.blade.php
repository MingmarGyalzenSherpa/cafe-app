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
                <li class="nav-item"><a href="#" class="nav-link "> <i class="fas  fa-gauge"></i> <span class="title"> Dashboard</span> </a></li>
                <li class="nav-item"><a href="{{route('showCategories')}}" class="nav-link"> <i class="fa-solid fa-sitemap"></i><span class="title"> Categories</span></a></li>
                <li class="nav-item"><a href="{{route('showItems')}}" class="nav-link"><i class="fas fa-burger"></i><span class="title"> Dish</span></a></li>
                <li class="nav-item"><a href="{{route('showEmployees')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-gauge"></i><span class="title"> Employees</span></a></li>
                <li class="nav-item"><a href="{{route("showReservations")}}" class="nav-link"> <i class="fa-sharp fa-solid fa-chair"></i><span class="title"> Reservations</span></a></li>
                <li class="nav-item"><a href="{{route('showMessages')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-message"></i><span class="title">Messages</span></a></li>
                <li class="nav-item"><a href="{{route('showAccounts','waiter')}}" class="nav-link active"> <i class="fa-sharp fa-solid fa-user"></i><span class="title">Manage Accounts</span></a></li>

                
           </ul>
        </div>
        <div class="content">
            <a href="{{route('add-account')}}" class="btn btn-primary"> Add Account</a>
            <div class="head text-center mb-2   ">
                <a href="{{route('showAccounts','waiter')}}" class="btn  @if($type == "waiter") btn-primary @endif">Waiter</a>
                <a href="{{route('showAccounts','cashier')}}" class="btn @if($type == "cashier") btn-primary @endif ">Cashier</a>
            </div>                  
            
            @foreach($accounts as $account)
            <div class="card w-100 m-3" style="height:100px;overflow:auto;">
                <div class="card-body d-flex justify-content-between">

                    <div class="info">
                        Email:<h5> {{$account->email}}</h5>
                    </div>
                    <div class="actions mt-3">
                   
                        <a href="{{route('deleteAccount',$account->id)}}" class="btn btn-danger"> Delete</a>

                    </div>
                </div>
            </div>

            @endforeach
        </div>
       
    </div>


@endsection