@extends('public_layout')

@section('content')
<main style="min-height: 100vh">
    <div class="container pt-5">
        <table class="table table-hover">
            <tbody>
                <tr data-mdb-target="#faq1" data-mdb-toggle="collapse" role="button">
                    <td>
                        What are the requirements needed to have an appointment?
                    </td>
                </tr>
                <tr class="collapse" id="faq1">
                    <td>
                        <center>
                            You will need to provide the following requirements for your appointment:
                            <img src="{{asset('img/requirements.jpg')}}" class="d-block services w-100"
                                style="max-width: 700px" />
                        </center>
                    </td>
                </tr>

                <tr data-mdb-target="#faq2" data-mdb-toggle="collapse" role="button">
                    <td>
                        How do I get an appointment?
                    </td>
                </tr>
                <tr class="collapse" id="faq2">
                    <td>
                        <center>
                            You can call the parish office during office hours or send us an email to <a
                                href="login">schedule an appointment</a>.
                        </center>
                    </td>
                </tr>

                <tr data-mdb-target="#faq3" data-mdb-toggle="collapse" role="button">
                    <td>
                        What are the services offers?
                    </td>
                </tr>
                <tr class="collapse" id="faq3">
                    <td>
                        <center>
                            We offer a variety of services, including sacraments, counseling, and community outreach
                            programs. Please check the<a href="services"> services page </a> for more information.
                        </center>
                    </td>
                </tr>

                <tr data-mdb-target="#faq4" data-mdb-toggle="collapse" role="button">
                    <td>
                        Parish Office Hours
                    </td>
                </tr>
                <tr class="collapse" id="faq4">
                    <td>
                        <center>
                            Our parish office is open from Tuesday to Sunday, 8:00 AM to 5:00 PM.
                        </center>
                    </td>
                </tr>

                <tr data-mdb-target="#faq5" data-mdb-toggle="collapse" role="button">
                    <td>
                        GCash Number for Donations
                    </td>
                </tr>
                <tr class="collapse" id="faq5">
                    <td>
                        <center>
                            Our GCash number for donations, you can scan our parish GCash QR Code provided on the<a
                                href="services"> services page </a>. Thank you for your generosity!
                        </center>
                    </td>
                </tr>

                <tr data-mdb-target="#faq6" data-mdb-toggle="collapse" role="button">
                    <td>
                        Location of the Parish?
                    </td>
                </tr>
                <tr class="collapse" id="faq6">
                    <td>
                        <center>
                            We are located at Macamot, Binangonan, Philippines.
                            <iframe
                                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=San%20Francisco%20ng%20Assisi%20Parish,%20Philippines+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                                width="600" height="450" frameborder="0" style="border:0; width: 100%;"></iframe>
                        </center>
                    </td>
                </tr>

                <tr data-mdb-target="#faq7" data-mdb-toggle="collapse" role="button">
                    <td>
                        Mass Schedule
                    </td>
                </tr>
                <tr class="collapse" id="faq7">
                    <td>
                        <center>
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
                        </center>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</main>

@endsection