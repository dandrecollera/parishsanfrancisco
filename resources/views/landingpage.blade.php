@extends('public_layout')


@section('styles')
<style>
    .caritem {
        height: 600px;
        object-fit: cover;

    }

    .card-text-sp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        /* Limit to 2 lines */
        overflow: hidden;
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


                                @php
                                use Carbon\Carbon;

                                $thecount = DB::table('announcement')
                                ->count();

                                $dbr = DB::table('announcement')
                                ->leftjoin('volunteers', 'volunteers.id', '=', 'announcement.volunteerid')
                                ->select([
                                'announcement.*',
                                'volunteers.firstname',
                                'volunteers.middlename',
                                'volunteers.lastname',
                                'volunteers.ministry',
                                ])
                                ->orderBy('announcement.id', 'desc')
                                ->first();

                                if(!empty($dbr)){
                                $formatteddate = Carbon::parse($dbr->created_at)->format('F j, Y');
                                }

                                @endphp
                                @if ($thecount > 0)
                                <p class="card-text">As of <span style="font-weight:500">{{$formatteddate}}</span></p>

                                @endif
                                <hr>
                            </center>

                            {{-- template --}}
                            <center>
                                @if ($thecount > 0)
                                <h4>{{$dbr->title}}</h4>
                                <h6>{{$dbr->subject}}</h6>
                                <p>{{$dbr->content}}</p>
                                <hr>
                                <h4>Volunteer</h4>
                                @php
                                $ministries = explode(', ', $dbr->ministry);
                                @endphp
                                <h5>
                                    {{$dbr->firstname}} {{$dbr->middlename}} {{$dbr->lastname}}

                                </h5>
                                @foreach ($ministries as $min)
                                {{$min}}
                                @endforeach

                                @endif
                            </center>
                        </div>
                        <div class="card-footer">
                            <center>
                                @if ($thecount > 0)
                                <a href="{{$dbr->facebook}}">
                                    <i class="fa-brands fa-facebook fa-fw fa-xl"></i>
                                </a>
                                <a href="{{$dbr->instagram}}">
                                    <i class="fa-brands fa-instagram fa-fw fa-xl"></i>
                                </a>
                                <a href="{{$dbr->twitter}}">
                                    <i class="fa-brands fa-twitter fa-fw fa-xl"></i>
                                </a>
                                <a href="{{$dbr->youtube}}">
                                    <i class="fa-brands fa-youtube fa-fw fa-xl"></i>
                                </a>
                                @endif
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
                            @php
                            $count = DB::table('articles')
                            ->count();

                            $dbr = DB::table('articles')
                            ->orderBy('id', 'desc')
                            ->take(3)
                            ->get()
                            ->toArray();
                            @endphp

                            @if ($count > 0)

                            <div class="row pt-4">
                                @foreach ($dbr as $db)
                                <div class="col-lg-4 mb-4">
                                    <div class="card ">
                                        <img src="{{asset('storage/articles/' .$db->image  )}}" class="card-img-top"
                                            style="max-height: 200px; object-fit:cover" />
                                        <div class="card-body">
                                            <h5 class="card-title">{{$db->title}}</h5>
                                            <p class="card-text card-text-sp">
                                                {{$db->content}}</p>
                                            <a href="/newsarticle?id={{$db->id}}" class="btn btn-sm btn-primary">See
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
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

                <a href="services" class="btn btn-light">Read More</a>
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
                        <a href="about" class="btn btn-dark">Read More</a>
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
                        <a href="about" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-primary text-white">
        <div class="container py-5">
            <center>
                <h2>Subscribe now for real-time updates and be ahead of the curve!</h2>
                <form action="/subscribe_process_public">
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