@extends('admin.components.modal')

@section('content')

<h4 class="mb-3">Baptism</h4>
<div class="row">
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="rbaptism" id="1" value="{{$prices[0]->amount}}">
            <label class="form-label" for="rbaptism">Regular Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="cbaptism" id="2" value="{{$prices[1]->amount}}">
            <label class="form-label" for="cbaptism">Community Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="sbaptism" id="3" value="{{$prices[2]->amount}}">
            <label class="form-label" for="sbaptism">Special Price*</label>
        </div>
    </div>
</div>
<br>

<h4 class="mb-3">Funeral Mass</h4>
<div class="row">
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="rfuneral" id="4" value="{{$prices[3]->amount}}">
            <label class="form-label" for="rfuneral">Regular Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="cfuneral" id="5" value="{{$prices[4]->amount}}">
            <label class="form-label" for="cfuneral">Community Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="sfuneral" id="6" value="{{$prices[5]->amount}}">
            <label class="form-label" for="sfuneral">Special Price*</label>
        </div>
    </div>
</div>
<br>

<h4 class="mb-3">Anointing of the Sick</h4>
<div class="row">
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="rsick" id="7" value="{{$prices[6]->amount}}">
            <label class="form-label" for="rsick">Regular Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="csick" id="8" value="{{$prices[7]->amount}}">
            <label class="form-label" for="csick">Community Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="ssick" id="9" value="{{$prices[8]->amount}}">
            <label class="form-label" for="ssick">Special Price*</label>
        </div>
    </div>
</div>
<br>

<h4 class="mb-3">Blessing</h4>
<div class="row">
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="rblessing" id="10" value="{{$prices[9]->amount}}">
            <label class="form-label" for="rblessing">Regular Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="cblessing" id="11" value="{{$prices[10]->amount}}">
            <label class="form-label" for="cblessing">Community Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="sblessing" id="12" value="{{$prices[11]->amount}}">
            <label class="form-label" for="sblessing">Special Price*</label>
        </div>
    </div>
</div>
<br>

<h4 class="mb-3">Kumpil</h4>
<div class="row">
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="rkumpil" id="13" value="{{$prices[12]->amount}}">
            <label class="form-label" for="rkumpil">Regular Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="ckumpil" id="14" value="{{$prices[13]->amount}}">
            <label class="form-label" for="ckumpil">Community Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="skumpil" id="15" value="{{$prices[14]->amount}}">
            <label class="form-label" for="skumpil">Special Price*</label>
        </div>
    </div>
</div>
<br>

<h4 class="mb-3">First Communion</h4>
<div class="row">
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="rcommunion" id="16" value="{{$prices[15]->amount}}">
            <label class="form-label" for="rcommunion">Regular Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="ccommunion" id="17" value="{{$prices[16]->amount}}">
            <label class="form-label" for="ccommunion">Community Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="scommunion" id="18" value="{{$prices[17]->amount}}">
            <label class="form-label" for="scommunion">Special Price*</label>
        </div>
    </div>
</div>
<br>

<h4 class="mb-3">Wedding</h4>
<div class="row">
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="rwedding" id="19" value="{{$prices[18]->amount}}">
            <label class="form-label" for="rwedding">Regular Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="cwedding" id="20" value="{{$prices[19]->amount}}">
            <label class="form-label" for="cwedding">Community Price*</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-outline mb-3">
            <input type="number" class="form-control" name="swedding" id="21" value="{{$prices[20]->amount}}">
            <label class="form-label" for="swedding">Special Price*</label>
        </div>
    </div>
</div>
<br>



@endsection

@push('jsscripts')
<script>
    $(document).ready(function(){
        $('.form-control').on('input', function(){
            let inputID = $(this).attr('id');
            let inputValue = $(this).val();
            let theToken = $('meta[name="csrf-token"]').attr('content');
            console.log(theToken);
            console.log(inputValue);
            $.get('/adminprices_update', {
                id : inputID,
                value : inputValue,
            })
        })
    })
</script>
@endpush