@extends('user.components.layout')


@section('styles')
<style>
    .caritem {
        height: 600px;
        object-fit: cover;

    }
</style>
@endsection

@section('content')
<main>
    <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">

        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <img src="{{asset('img/PSFA (4).jpg')}}" class="d-block w-100 caritem" />
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/PSFA (6).jpg')}}" class="d-block w-100 caritem" />
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/PSFA (11).jpg')}}" class="d-block w-100 caritem" />
            </div>
        </div>
    </div>

    <div class="bg-primary text-white">
        <div class="container py-4">
            <center>
                <h3>
                    Welcome to the Official Web Page of San Francisco ng Assisi Parish
                </h3>
            </center>
        </div>
    </div>

    {{-- Schedule Announcement News --}}
    <div class="text-dark">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h2 class="card-title" style="line-height: 15px">Mass Schedule</h2>
                                <p class="card-text">Office Hours Open</p>
                                <div class="overflow-scroll scrollable-container">
                                    <table class="table table-hover">
                                        <thead>
                                            <th><strong>Day</strong></th>
                                            <th><strong>Time</strong></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Monday</td>
                                                <td>Closed</td>
                                            </tr>
                                            <tr>
                                                <td>Tuesday</td>
                                                <td>
                                                    8:00 AM - 12:00 PM<br>
                                                    1:00 PM - 5:00 PM
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Wednesday</td>
                                                <td>
                                                    8:00 AM - 12:00 PM<br>
                                                    1:00 PM - 5:00 PM
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Thursday</td>
                                                <td>
                                                    8:00 AM - 12:00 PM<br>
                                                    1:00 PM - 5:00 PM
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Friday</td>
                                                <td>
                                                    8:00 AM - 12:00 PM<br>
                                                    1:00 PM - 5:00 PM
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saturday</td>
                                                <td>
                                                    8:00 AM - 12:00 PM<br>
                                                    1:00 PM - 5:00 PM
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sunday</td>
                                                <td>
                                                    8:00 AM - 12:00 PM<br>
                                                    1:00 PM - 5:00 PM
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mt-3 mt-md-0">
                    <div class="card overflow-scroll" style="height: 718px;">
                        <div class="card-body">
                            <center>
                                <h2 class="card-title" style="line-height: 15px">Announcement</h2>
                                <p class="card-text">As of <span style="font-weight:500">August 1, 2023</span></p>
                                <hr>
                                {{-- Content Here --}}
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h2 class="card-title" style="line-height: 15px">Articles</h2>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-primary text-white my-5">
        <div class="container py-5">
            <center>
                <h1>Our Services</h1>
                <p>Be a community that recognizes all of its members as unique individuals with a commitment to a common
                    faith. In that faith we come together to share ourselves in fellowship and offer one another the
                    mutual support that family provides. Provide the opportunity for everyone in the community to grow
                    in knowledge and understanding of our God, our faith, and our church.</p>

                <button type="button" class="btn btn-light">Read More</button>
            </center>
        </div>
    </div>

    <div class="text-dark my-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <h1 class="d-md-none mb-3">About our Chapel</h1>
                    </center>
                    <img src="{{asset('img/about.jpg')}}" class="d-block w-100" />
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <center class="d-md-none mt-3">
                        <p>
                            Kalagitnaan ng taong 2010 nang nag padala ng dalawang prayle ang Orden ng mga Franciscanong
                            Conventual sa Binangonan Rizal para magmisyon at pag-aralan ang posibilidad na tanggapin ng
                            naturang Orden ang pangangasiwa sa maaaring maging bagong parokya sa lugar baka sakali man.
                            Nagsimulang manirahan sila noong Hulyo 2010 sa isang pahiram na yunit sa Mountainville
                            Estates
                            Subdivision sa Barangay Tatala.
                        </p>
                        <button type="button" class="btn btn-dark">Read More</button>
                    </center>
                    <div class="d-none d-md-block">
                        <h1>About our Chapel</h1>
                        <p>
                            Kalagitnaan ng taong 2010 nang nag padala ng dalawang prayle ang Orden ng mga Franciscanong
                            Conventual sa Binangonan Rizal para magmisyon at pag-aralan ang posibilidad na tanggapin ng
                            naturang Orden ang pangangasiwa sa maaaring maging bagong parokya sa lugar baka sakali man.
                            Nagsimulang manirahan sila noong Hulyo 2010 sa isang pahiram na yunit sa Mountainville
                            Estates
                            Subdivision sa Barangay Tatala.
                        </p>
                        <button type="button" class="btn btn-dark">Read More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-primary text-white">
        <div class="container py-5">
            <center>
                <h2>Subscribe now for real-time updates and be ahead of the curve!</h2>
                <form action="/subscribe_process">
                    @csrf
                    <div class="input-group form-outline form-white mt-4 mb-3">
                        <input type="text" id="email" class="form-control" name="email" required />
                        <label class="form-label" for="username">Email</label>
                        <button class="btn btn-light shadow-0" type="submit" id="button-addon1"
                            data-mdb-ripple-color="dark">
                            Subscribe
                        </button>
                    </div>
                </form>
            </center>
        </div>
    </div>
    <div class="bg-secondary text-white">
        <div class="container py-5">
            <h2>Send us a Message!</h2>

            <form action="/sendmessage_process" class="mt-3">
                @csrf
                <div class="form-outline form-white mb-3">
                    <input type="text" class="form-control" name="name" id="name" required>
                    <label class="form-label" for="name">Name*</label>
                </div>
                <div class="form-outline form-white mb-3">
                    <input type="text" class="form-control" name="email" id="email" required>
                    <label class="form-label" for="email">Email*</label>
                </div>
                <div class="form-outline form-white mb-3">
                    <textarea class="form-control" name="address" id="address" rows="4" required></textarea>
                    <label class="form-label" for="address">Message</label>
                </div>
                <button class="btn btn-light shadow-0" type="submit" id="button-addon1" data-mdb-ripple-color="dark">
                    Subscribe
                </button>
            </form>
        </div>
    </div>


</main>




@endsection