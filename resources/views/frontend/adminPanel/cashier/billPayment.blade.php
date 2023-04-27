@extends('frontend.adminPanel.layouts.main');
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container d-flex justify-content-center align-items-center" style="margin-top:90px;">
        <div class="card w-30 p-3" style="">
          <h2 class="text-center mb-5">PAYMENT</h2>
            <form action="{{route('confirmPayment')}}"  method="POST"  >
                @csrf
                <input type="hidden" value="{{$id}}" name="tableID">
                    <div class="form-group row">
                      <label for="staticTotal" class="col-sm-5 col-form-label">Charged Amount:</label>
                      <div class="col-sm-5">
                        <input type="text" readonly class="form-control-plaintext charged" id="staticTotal" name="charged" value="{{$total}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tenderedAmount" class="col-sm-5 col-form-label">Tendered Amount:</label>
                      <div class="col-sm-7">
                        <input type="number" class="form-control tendered" id="inputAmount" placeholder="Amount" name="tendered">
                      </div>
                    </div>
                    <div class="form-group row pt-2">
                        <label for="tenderedAmount" class="col-sm-5 col-form-label">Change Amount:</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control change" id="inputAmount" name="change" placeholder="Amount" disabled>
                        </div>
                      </div>
                    
                        <div class="form-group row mt-3 p-2">
                            <button class="btn btn-primary p-3 ">Confirm </button>

                        </div>
            </form>
            
        </div>
            

    </div>

    <script>
        const chargedInput = document.querySelector('.charged');
        const tenderedInput = document.querySelector('.tendered');
        const changeInput = document.querySelector('.change');
        console.log(tenderedInput);
        tenderedInput.addEventListener('input',function(e){
            changeInput.value = (tenderedInput.value - chargedInput.value).toFixed(2) ;
        })
    </script>
@endsection