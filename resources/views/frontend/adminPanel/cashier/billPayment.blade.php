@extends('frontend.adminPanel.layouts.main');
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container d-flex justify-content-center align-items-center" style="margin-top:90px;">
        <div class="card w-30 p-3" style="">
          <h2 class="text-center mb-5">PAYMENT</h2>
            <form method="POST"  >
                @csrf
                    <div class="form-group row">
                      <label for="staticTotal" class="col-sm-5 col-form-label">Charged Amount:</label>
                      <div class="col-sm-5">
                        <input type="text" readonly class="form-control-plaintext charged" id="staticTotal" value="{{$total}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tenderedAmount" class="col-sm-5 col-form-label">Tendered Amount:</label>
                      <div class="col-sm-7">
                        <input type="number" class="form-control tendered" id="inputAmount" placeholder="Amount">
                      </div>
                    </div>
                    <div class="form-group row pt-2">
                        <label for="tenderedAmount" class="col-sm-5 col-form-label">Change Amount:</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control change" id="inputAmount" placeholder="Amount" disabled>
                        </div>
                      </div>
                    <div class="form-check pt-3">
                        <input class="form-check-input" type="checkbox" value="print" id="printBill" name="print">
                        <label class="form-check-label" for="printBill">
                          Print Bill
                        </label>
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