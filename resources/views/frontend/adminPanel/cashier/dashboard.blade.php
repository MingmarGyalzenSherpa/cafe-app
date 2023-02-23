@extends('frontend.adminPanel.layouts.main')
@section('container')
<div class="container p-3 border border-primary" style="margin-top:90px;text-align:center">
    <h2 style="font-family:'Times New Roman', Times, serif">TABLES</h2>
    <hr>
    <div class="container d-flex flex-wrap">
          @foreach ($tables as $table)
                <div class="card  m-1" style="width: 18rem;height:10rem;background-color: #8BC6EC;
                background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
                ">
                    <a href="#" class="border d-flex justify-content-center align-items-center" style="font-weight:bold; font-size: 3rem;color:white;width:100%;height:100%;"><span>{{$table->table_name}}</span></a>
                </div>
          @endforeach
        
    </div>
   
</div>
    
@endsection