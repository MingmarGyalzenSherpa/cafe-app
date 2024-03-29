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
            <li class="nav-item"><a href="{{route('managerDashboard')}}" class="nav-link "> <i class="fas  fa-gauge"></i> <span class="title"> Dashboard</span> </a></li>
            <li class="nav-item"><a href="{{route('showCategories')}}" class="nav-link"> <i class="fa-solid fa-sitemap"></i><span class="title"> Categories</span></a></li>
                <li class="nav-item"><a href="{{route('showItems')}}" class="nav-link"><i class="fas fa-burger"></i><span class="title"> Dish</span></a></li>
                <li class="nav-item"><a href="{{route('showEmployees')}}" class="nav-link active"> <i class="fa-sharp fa-solid fa-gauge"></i><span class="title"> Employees</span></a></li>
                <li class="nav-item"><a href="{{route('showReservations')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-chair"></i><span class="title"> Reservations</span></a></li>
                <li class="nav-item"><a href="{{route('showMessages')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-message"></i><span class="title">Messages</span></a></li>  
                <li class="nav-item"><a href="{{route('showAccounts','waiter')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-user"></i><span class="title">Manage Accounts</span></a></li>

           </ul>
        </div>
        <div class="content">
            <div class="actions d-flex justify-content-between mb-3 align-items-cetner">
               
                <form action="{{route('searchEmployee')}}" method="GET">
                    
                    <div class="form-group">
                        <input type="text" name="input" class="form-control" placeholder="Search" class="p-1 ps-2">

                    </div>

                        <div class="form-group m-1 d-flex align-items-center justify-content-between">
                            <label for="" class="">Search By:</label>
                            <select name="searchBy" id="" class="p-1">
                                <option value="name" selected>Name</option>
                                <option value="address">Address</option>
                                <option value="contact">Contact</option>
                                <option value="email">Email</option>

                            </select>
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </form>
                
            <a href="{{route('addEmployee')}}" class="btn btn-primary mb-4 addDishBtn p-3 pt-4 "><i class="fa fa-plus"> </i> Add Employee</a>
                
            </div>
            <table class="table">
                <thead  class="bg-dark" style="color:white;">
                <tr>
                  <th scope="col">S.N</th>
                  <th scope="col">Name</th>
                  <th scope="col">Role</th>
                  <th scope="col">Shift</th>
                  <th scope="col">Salary</th>
                  <th scope="col">Contact</th>
                  <th scope="col">City</th>
                  <th scope="col">Email</th>
                  <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ; ?>
                    @foreach ($employees as $employee)
                        <tr class="items" style="border-bottom:1px solid black;">
                            <th scope="row"> {{$count++}}</th>
                            <td>{{$employee->first_name ." ".$employee->middle_name." ".$employee->last_name }}</td>
                            <td >{{$employee->role}}</td>
                            <td >{{$employee->shift}}</td>
                            <td >{{$employee->salary}}</td>
                            <td >{{$employee->contact}}</td>
                            <td >{{$employee->city}}</td>
                            <td >{{$employee->email}}</td>
                            <td>
                                <a href="{{route('editEmployee',$employee->id)}}" class="btn btn-primary m-2 ps-3 pe-3">Edit</a>
                                <a href="{{route('deleteEmployee',$employee->id)}}" class="btn btn-danger btn-delete">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>

@endsection