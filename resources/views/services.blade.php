@extends('public_layout')

@section('styles')
<style>
    img {
        margin-right: 10px;
    }

    .services {
        max-width: 90px;
    }

    p {
        font-size: 13px;
        line-height: 1.4;
    }
</style>
@endsection

@section('content')
<main style="min-height: 100vh">
    <div class="text-dark my-5">
        <div class="container py-4">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="d-flex align-items-center ">
                        <img src="{{asset('img/baptism.png')}}" class="d-block services" />
                        <div>
                            <h6>Baptism</h6>
                            <p>
                                Photocopy of Live birth/ Birth certificate<br>
                                Apply for an <a href="login">appointment</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="d-flex align-items-center ">
                        <img src="{{asset('img/funeral.png')}}" class="d-block services" />
                        <div>
                            <h6>Funeral Mass</h6>
                            <p>
                                Photocopy of Death certificate<br>
                                Apply for an <a href="login">appointment</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="d-flex align-items-center ">
                        <img src="{{asset('img/anointing.png')}}" class="d-block services" />
                        <div>
                            <h6>Anointing of the Sick</h6>
                            <p>
                                Apply for an <a href="login">appointment</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="d-flex align-items-center ">
                        <img src="{{asset('img/blessings.png')}}" class="d-block services" />
                        <div>
                            <h6>Blessings</h6>
                            <p>
                                Apply for an <a href="login">appointment</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="d-flex align-items-center ">
                        <img src="{{asset('img/donation.png')}}" class="d-block services" />
                        <div>
                            <h6>Donations/Offering</h6>
                            <p>
                                <a href="#" data-mdb-toggle="modal" data-mdb-target="#addeditmodal">Donate
                                    now</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="d-flex align-items-center ">
                        <img src="{{asset('img/wedding.png')}}" class="d-block services" />
                        <div>
                            <h6>Wedding</h6>
                            <p>
                                Original Baptismal certificate with Annotation for Marriage purposes<br>
                                Original Confirmation certificate with Annotation for Marriage purposes<br>
                                CENOMAR<br>
                                Marriage license<br>
                                Marriage license for civilly married<br>
                                Apply for an <a href="login">appointment</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="addeditmodal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addeditmodalLabel">
                    <div>Donate</div>
                </h1>
                <button type="button" class="btn-close" data-mdb-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="{{ asset('img/gcash_qr.png') }}" alt="qr" style="max-width: 75%" class="mb-2">
                </center>
                <form action="/public_donation" method="POST">
                    @csrf
                    <div class="form-outline mb-3">
                        <input ype="number" class="form-control" name="amount" required>
                        <label class=" form-label" for="amount">Amount*</label>
                    </div>
                    <label for="InputGroupFile01" class="form-label">Receipt:</label>
                    <div class="input-group mb-3">
                        <input type="file" name="receipt" class="form-control" id="inputGroupFile02" required>
                    </div>

                    <center>
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Continue</button>
                    </center>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection