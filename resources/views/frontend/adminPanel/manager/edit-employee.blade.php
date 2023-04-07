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
                <li class="nav-item"><a href="{{route('showEmployees')}}" class="nav-link active"> <i class="fa-sharp fa-solid fa-gauge"></i><span class="title"> Employees</span></a></li>
                <li class="nav-item"><a href="{{route('showReservations')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-chair"></i><span class="title"> Reservations</span></a></li>
                <li class="nav-item"><a href="{{route('showMessages')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-message"></i><span class="title">Messages</span></a></li>
                <li class="nav-item"><a href="{{route('showAccounts','waiter')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-user"></i><span class="title">Manage Accounts</span></a></li>    
           </ul>
        </div>
        <div class="content">
            <h4 class="text-center mb-3">EDIT EMPLOYEE</h4>
            <form action="{{route('saveEditEmployee')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$employee->id}}">  
                <div class="row">
                    
                    <div class="mb-3 col-sm-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" value="{{$employee->first_name}}" class="form-control" id="first_name" aria-describedby="emailHelp">
                  
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" name="middle_name" value="{{$employee->middle_name}}" class="form-control" id="middle_name" aria-describedby="emailHelp">
                  
                    </div>
                   
                </div>
                <div class="row">
                    <div class="mb-3 col-sm-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" value="{{$employee->last_name}}" class="form-control" id="last_name" aria-describedby="emailHelp">
                  
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" name="role" value="{{$employee->role}}" class="form-control" id="role">
                    </div>
                </div>
                <div class="row">
                    
                    <div class="mb-3 col-sm-6">
                        <label for="shift" class="form-label">Shift</label>
                        <input type="text" name="shift" value="{{$employee->shift}}" class="form-control" id="shift">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="shift" class="form-label">Salary</label>
                        <input type="number" name="salary" value="{{$employee->salary}}" class="form-control" id="shift">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-sm-6">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" value="{{$employee->contact}}" class="form-control" id="contact">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="Address" class="form-label">City</label>
                        <input type="text" name="city" value="{{$employee->city}}" class="form-control" id="Address">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{$employee->email}}" class="form-control" id="email">
                    </div>
                   
                </div>
                 <button type="submit" class="btn btn-primary">CONFIRM EDIT</button>
              </form>
        </div>

    
@endsection