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
                <li class="nav-item"><a href="{{route('showEmployees')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-gauge"></i><span class="title"> Employees</span></a></li>
                <li class="nav-item"><a href="{{route('showReservations')}}" class="nav-link active"> <i class="fa-sharp fa-solid fa-chair"></i><span class="title"> Reservations</span></a></li>
                <li class="nav-item"><a href="{{route('showMessages')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-message"></i><span class="title">Messages</span></a></li>
                <li class="nav-item"><a href="{{route('showAccounts','waiter')}}" class="nav-link"> <i class="fa-sharp fa-solid fa-user"></i><span class="title">Manage Accounts</span></a></li>


            </ul>
        </div>
        <div class="content">

            <div class="head text-center mb-2   ">
                <a href="{{route('showReservations')}}" class="btn  @if(!$status) btn-primary @endif">Pending</a>
                <a href="{{route('showReservations',1)}}" class="btn @if($status) btn-primary @endif">Approved</a>
            </div>
            


            @foreach($reservations as $reservation)
            <div class="card w-100 m-3" style="height:200px;overflow:auto;">
                <div class="card-body">

                    <div class="card-title"> <h3>{{$reservation->name}}</h3></div>
                    <hr>
                    <div class="card-subtitle text-muted">{{$reservation->email}}</div>
                    <div class="card-subtitle text-muted">{{$reservation->phone_no}}</div>
                    <div class="card-subtitle text-muted">Date: {{$reservation->date}}</div>
                    <div class="card-subtitle text-muted">Time: {{$reservation->time}}</div>
                    <div class="card-subtitle text-muted">People: {{$reservation->guests}}</div>

                    <div class="card-text mb-3"> Message:
                        {{$reservation->message}}
                    </div>
                    @if($reservation->status == 'pending')
            <a href="{{route('approveReservation',$reservation->id)}}" class="btn btn-success"> <i class="fas fa-check">  </i> Approve</a>
            @endif
                    
                    <a href="{{route('deleteReservation',$reservation->id)}}" class="btn btn-danger "> <i class="fas fa-times">  </i> Delete</a>


                </div>
            </div>

            @endforeach
            
        </div>
       
    </div>


@endsection