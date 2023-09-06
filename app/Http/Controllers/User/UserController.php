<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationMail;

class UserController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('axuuser');
    }

    public function userhome(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('user.home', $data);
    }

    public function userabout(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('user.userabout', $data);
    }

    public function userservices(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $data['notiflist'] = [
            1 => 'Donation sent, thank you for donating',
        ];
        $data['notif'] = 0;
        if(!empty($_GET['n'])){
            $data['notif'] = $_GET['n'];
        }

        return view('user.userservices', $data);
    }

    public function user_donation(Request $request){
        $input = $request->input();
        // dd($request->all());
        $userinfo = $request->get('userinfo');

        DB::table('donations')
            ->insert([
                'userid' => $userinfo[0],
                'amount' => $input['amount'],
                'donationimage' => $this->donationImage($request->file('receipt')),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('notif')
            ->insert([
                'accounttype' => 'admin',
                'title' => 'New Public Donation',
                'content' => "New donation, amount: " . $input['amount'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/userservices?n=1');

    }

    public function donationImage($input) {
        $photo = 'blank.jpg';

        $now = Carbon::now();
        $formattedNow = $now->format('Ymd_His');

        $destinationPath = 'public/donation';

        $image = $input;
        $extension = $image->getClientOriginalExtension();
        $filename = $formattedNow . '.' . $extension;
        $path = $image->storeAs($destinationPath, $filename); // Changed from $input->storeAs(...)
        $photo = $filename;

        return $photo;
    }

    public function userfaqs(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('user.userfaqs', $data);
    }

    public function usercalendar(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('user.usercalendar', $data);
    }

    public function userhistory(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $data['notiflist'] = [
            1 => 'Request Sent, wait for confirmation.',
        ];
        $data['notif'] = 0;
        if(!empty($_GET['n'])){
            $data['notif'] = $_GET['n'];
        }

        $data['list'] = $list = DB::table('reservation')
            ->leftjoin('calendartime', 'calendartime.id', 'reservation.calendar_id')
            ->where('user_id', $userinfo[0])
            ->orderBy('reservation.id', 'desc')
            ->select([
                'reservation.id',
                'reservation.service',
                'reservation.status',
                'calendartime.year',
                'calendartime.month',
                'calendartime.day',
                'calendartime.start_time',
                'calendartime.end_time',
                'reservation.created_at',
            ])
            ->get()
            ->toArray();

        // dd($list);

        return view('user.userhistory', $data);
    }

    public function getDataForDayUser(Request $request){
        $query = $request->query();

        $type = null;

        $type = DB::table('calendartime')
            ->where('day', $query['day'])
            ->where('month', $query['month'])
            ->where('year', $query['year'])
            ->where('service', $query['service'])
            ->where('slot', '>', 0)
            ->select('event_type')
            ->first();

        if(empty($type)){
            return response()->json($type);
        } else {
            return response()->json($type->event_type);
        }
    }

    public function getScheduleForDayUser(Request $request){
        $query = $request->query();

        $data = DB::table('calendartime')
            ->where('day', $query['day'])
            ->where('month', $query['month'])
            ->where('year', $query['year'])
            ->where('service', $query['service'])
            ->where('slot', '>', 0)
            ->orderBy('start_time', 'asc')
            ->get()
            ->toArray();

        foreach($data as $item){
            $item->start_time = $this->formatTime($item->start_time);
            $item->end_time = $this->formatTime($item->end_time);
        }

        return response()->json($data);
    }

    public function formatTime($time){
        return Carbon::createFromFormat('H:i:s', $time)->format('g:ia');
    }


    public function userreservation(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $query = $request->query();

        $data['date'] = $date = DB::table('calendartime')
            ->where('id', $query['id'])
            ->first();

        $data['price'] = $price = DB::table('service_prices')
            ->where('service', $date->service)
            ->where('event_type', $date->event_type)
            ->select([
                'amount'
            ])
            ->first();

        if($date->service == "Baptism"){
            return view('user.baptism', $data);
        }
        if($date->service == "Funeral Mass"){
            return view('user.funeral', $data);
        }
        if($date->service == "Anointing Of The Sick"){
            return view('user.anoint', $data);
        }
        if($date->service == "Blessing"){
            return view('user.blessing', $data);
        }
        if($date->service == "Kumpil"){
            return view('user.kumpil', $data);
        }
        if($date->service == "First Communion"){
            return view('user.communion', $data);
        }
        if($date->service == "Wedding"){
            return view('user.wedding', $data);
        }
    }

    public function sendEmail($id, $subject){
        $info = DB::table('reservation')
            ->where('reservation.id', $id)
            ->leftjoin('main_users', 'main_users.id', '=', 'reservation.user_id')
            ->leftjoin('main_users_details', 'main_users_details.userid', '=', 'main_users.id')
            ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
            ->select([
                'reservation.*',
                'calendartime.year',
                'calendartime.month',
                'calendartime.day',
                'calendartime.start_time',
                'calendartime.end_time',
                'calendartime.event_type',
                'main_users_details.firstname',
                'main_users_details.lastname',
                'main_users.email'
            ])
            ->first();

        $user = $info->firstname . ' ' . $info->lastname;
        Mail::to($info->email)->send(new ReservationMail($subject, $user, $info));
    }

    public function baptism_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        $info = DB::table('baptisminfo')
            ->insertGetID([
                'fathers_name' => $input['fathersname'],
                'mothers_name' => $input['mothersname'],
                'childs_name' => $input['childname'],
                'gender' => $input['gender'],
                'date_of_birth' => $input['datebirth'],
                'place_of_birth' => $input['placeofbirth'],
                'address' => $input['address'],
                'no_of_godfather' => $input['godfather'],
                'no_of_godmother' => $input['godmother'],
                'requirement' => $this->fileProcess($request->file('requirement'), 'baptism', 'requirement', $userinfo[0]),
                'payment' => $input['amount'],
                'paymentimage' => $this->fileProcess($request->file('receipt'), 'baptism', 'receipt', $userinfo[0]),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $reservation = DB::table('reservation')
            ->insertGetId([
                'user_id' => $userinfo[0],
                'calendar_id' => $input['sid'],
                'status' => 'Pending',
                'service' => 'Baptism',
                'baptism_id' => $info,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $calendar = DB::table('calendartime')
            ->where('id', $input['sid'])
            ->select([
                'slot'
            ])
            ->first();

        $slotcount = $calendar->slot;
        $slotcount--;

        DB::table('calendartime')
            ->where('id', $input['sid'])
            ->update([
                'slot' => $slotcount,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $this->addAdminNotif();
        $this->sendEmail($reservation, "Reservation Update");
        return redirect('/userhistory');
    }

    public function funeral_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        $info = DB::table('funeralinfo')
            ->insertGetID([
                'relationship' => $input['relationship'],
                'name' => $input['deceasedname'],
                'age' => $input['age'],
                'gender' => $input['gender'],
                'dateofbirth' => $input['datebirth'],
                'dateofpassing' => $input['passingdate'],
                'location' => $input['address'],
                'requirement' => $this->fileProcess($request->file('requirement'), 'funeral', 'requirement', $userinfo[0]),
                'payment' => $input['amount'],
                'paymentimage' => $this->fileProcess($request->file('receipt'), 'funeral', 'receipt', $userinfo[0]),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $reservation = DB::table('reservation')
            ->insertGetID([
                'user_id' => $userinfo[0],
                'calendar_id' => $input['sid'],
                'status' => 'Pending',
                'service' => 'Funeral Mass',
                'funeral_id' => $info,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $calendar = DB::table('calendartime')
            ->where('id', $input['sid'])
            ->select([
                'slot'
            ])
            ->first();

        $slotcount = $calendar->slot;
        $slotcount--;

        DB::table('calendartime')
            ->where('id', $input['sid'])
            ->update([
                'slot' => $slotcount,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $this->addAdminNotif();
        $this->sendEmail($reservation, "Reservation Update");
        return redirect('/userhistory');
    }

    public function anoint_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        $info = DB::table('anointinginfo')
            ->insertGetID([
                'relationship' => $input['relationship'],
                'name' => $input['sickname'],
                'age' => $input['age'],
                'gender' => $input['gender'],
                'dateofbirth' => $input['datebirth'],
                'address' => $input['address'],
                'requirement' => $this->fileProcess($request->file('requirement'), 'anointing', 'requirement', $userinfo[0]),
                'payment' => $input['amount'],
                'paymentimage' => $this->fileProcess($request->file('receipt'), 'anointing', 'receipt', $userinfo[0]),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $reservation = DB::table('reservation')
            ->insertGetID([
                'user_id' => $userinfo[0],
                'calendar_id' => $input['sid'],
                'status' => 'Pending',
                'service' => 'Anointing Of The Sick',
                'anointing_id' => $info,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $calendar = DB::table('calendartime')
            ->where('id', $input['sid'])
            ->select([
                'slot'
            ])
            ->first();

        $slotcount = $calendar->slot;
        $slotcount--;

        DB::table('calendartime')
            ->where('id', $input['sid'])
            ->update([
                'slot' => $slotcount,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $this->addAdminNotif();
        $this->sendEmail($reservation, "Reservation Update");
        return redirect('/userhistory');
    }

    public function blessing_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        $info = DB::table('blessinginfo')
            ->insertGetID([
                'address' => $input['address'],
                'requirement' => $this->fileProcess($request->file('requirement'), 'blessing', 'requirement', $userinfo[0]),
                'payment' => $input['amount'],
                'paymentimage' => $this->fileProcess($request->file('receipt'), 'blessing', 'receipt', $userinfo[0]),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $reservation = DB::table('reservation')
            ->insertGetID([
                'user_id' => $userinfo[0],
                'calendar_id' => $input['sid'],
                'status' => 'Pending',
                'service' => 'Blessing',
                'blessing_id' => $info,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $calendar = DB::table('calendartime')
            ->where('id', $input['sid'])
            ->select([
                'slot'
            ])
            ->first();

        $slotcount = $calendar->slot;
        $slotcount--;

        DB::table('calendartime')
            ->where('id', $input['sid'])
            ->update([
                'slot' => $slotcount,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $this->addAdminNotif();
        $this->sendEmail($reservation, "Reservation Update");
        return redirect('/userhistory');
    }

    public function kumpil_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        $info = DB::table('kumpilinfo')
            ->insertGetID([
                'principal' => $input['principal'],
                'secretary' => $input['secretary'],
                'address' => $input['address'],
                'total_student' => $input['student'],
                'no_of_male' => $input['male'],
                'no_of_female' => $input['female'],
                'requirement' => $this->fileProcess($request->file('requirement'), 'kumpil', 'requirement', $userinfo[0]),
                'payment' => $input['amount'],
                'paymentimage' => $this->fileProcess($request->file('receipt'), 'kumpil', 'receipt', $userinfo[0]),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $reservation = DB::table('reservation')
            ->insertGetID([
                'user_id' => $userinfo[0],
                'calendar_id' => $input['sid'],
                'status' => 'Pending',
                'service' => 'Kumpil',
                'kumpil_id' => $info,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $calendar = DB::table('calendartime')
            ->where('id', $input['sid'])
            ->select([
                'slot'
            ])
            ->first();

        $slotcount = $calendar->slot;
        $slotcount--;

        DB::table('calendartime')
            ->where('id', $input['sid'])
            ->update([
                'slot' => $slotcount,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $this->addAdminNotif();
        $this->sendEmail($reservation, "Reservation Update");
        return redirect('/userhistory');
    }

    public function communion_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        $info = DB::table('communioninfo')
            ->insertGetID([
                'principal' => $input['principal'],
                'secretary' => $input['secretary'],
                'address' => $input['address'],
                'total_student' => $input['student'],
                'no_of_male' => $input['male'],
                'no_of_female' => $input['female'],
                'requirement' => $this->fileProcess($request->file('requirement'), 'communion', 'requirement', $userinfo[0]),
                'payment' => $input['amount'],
                'paymentimage' => $this->fileProcess($request->file('receipt'), 'communion', 'receipt', $userinfo[0]),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $reservation = DB::table('reservation')
            ->insertGetID([
                'user_id' => $userinfo[0],
                'calendar_id' => $input['sid'],
                'status' => 'Pending',
                'service' => 'First Communion',
                'communion_id' => $info,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $calendar = DB::table('calendartime')
            ->where('id', $input['sid'])
            ->select([
                'slot'
            ])
            ->first();

        $slotcount = $calendar->slot;
        $slotcount--;

        DB::table('calendartime')
            ->where('id', $input['sid'])
            ->update([
                'slot' => $slotcount,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $this->addAdminNotif();
        $this->sendEmail($reservation, "Reservation Update");
        return redirect('/userhistory');
    }

    public function wedding_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        $info = DB::table('weddinginfo')
            ->insertGetID([
                'bridename' => $input['bfirstname'] . ' ' . $input['bmiddlename'] . ' ' . $input['blastname'],
                'bridemother' => $input['bmothersname'],
                'bridefather' => $input['bfathersname'],
                'brideage' => $input['bage'],
                'bridebirth' => $input['bdatebirth'],
                'bridenumber' => $input['bmobilenumber'],
                'brideemail' => $input['bemail'],
                'brideaddress' => $input['baddress'],
                'groomname' => $input['gfirstname'] . ' ' . $input['gmiddlename'] . ' ' . $input['glastname'],
                'groommother' => $input['gmothersname'],
                'groomfather' => $input['gfathersname'],
                'groomage' => $input['gage'],
                'groombirth' => $input['gdatebirth'],
                'groomnumber' => $input['gmobilenumber'],
                'groomemail' => $input['gemail'],
                'groomaddress' => $input['gaddress'],
                'requirement' => $this->fileProcess($request->file('requirement'), 'wedding', 'requirement', $userinfo[0]),
                'payment' => $input['amount'],
                'paymentimage' => $this->fileProcess($request->file('receipt'), 'wedding', 'receipt', $userinfo[0]),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $reservation = DB::table('reservation')
            ->insertGetID([
                'user_id' => $userinfo[0],
                'calendar_id' => $input['sid'],
                'status' => 'Pending',
                'service' => 'Wedding',
                'wedding_id' => $info,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $calendar = DB::table('calendartime')
            ->where('id', $input['sid'])
            ->select([
                'slot'
            ])
            ->first();

        $slotcount = $calendar->slot;
        $slotcount--;

        DB::table('calendartime')
            ->where('id', $input['sid'])
            ->update([
                'slot' => $slotcount,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        $this->addAdminNotif();
        $this->sendEmail($reservation, "Reservation Update");
        return redirect('/userhistory');
    }

    public function fileProcess($input, $service, $type, $info) {
        $photo = 'blank.jpg';

        $now = Carbon::now();
        $formattedNow = $now->format('Ymd_His');

        $baseDestinationPath = 'public/' . $service;

        if ($type == 'receipt') {
            $destinationPath = 'public/' . $service . '/receipt';
        } else {
            $destinationPath = 'public/' . $service . '/requirement';
        }

        $image = $input;
        $extension = $image->getClientOriginalExtension();
        $filename = $info . '_' . $formattedNow . '.' . $extension;
        $path = $image->storeAs($destinationPath, $filename); // Changed from $input->storeAs(...)
        $photo = $filename;

        return $photo;
    }

    public function addAdminNotif(){
        DB::table('notif')
            ->insert([
                'accounttype' => 'admin',
                'title' => 'New Reservation',
                'content' => "New reservation added, check it's requirements and validity",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
    }

    public function additionalinfo(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $query = $request->query();

        $data['service'] = $service = DB::table('reservation')
            ->where('id', $query['sid'])
            ->first();

        // dd($service);
        $info = null;

        if($service->service == "Baptism"){
            $info = DB::table('reservation')
                ->leftjoin('main_users', 'main_users.id', 'reservation.user_id')
                ->leftjoin('main_users_details', 'main_users_details.userid', 'reservation.user_id')
                ->leftjoin('calendartime', 'calendartime.id', 'reservation.calendar_id')
                ->leftjoin('baptisminfo', 'baptisminfo.id', 'reservation.baptism_id')
                ->where('reservation.baptism_id', $service->baptism_id)
                ->select([
                    'calendartime.service',
                    'calendartime.event_type',
                    'main_users_details.firstname',
                    'main_users_details.middlename',
                    'main_users_details.lastname',
                    'calendartime.year',
                    'calendartime.month',
                    'calendartime.day',
                    'calendartime.start_time',
                    'calendartime.end_time',
                    'main_users.email',
                    'main_users_details.mobilenumber',
                    'baptisminfo.fathers_name',
                    'baptisminfo.mothers_name',
                    'baptisminfo.childs_name',
                    'baptisminfo.gender',
                    'baptisminfo.date_of_birth',
                    'baptisminfo.place_of_birth',
                    'baptisminfo.address',
                    'baptisminfo.no_of_godfather',
                    'baptisminfo.no_of_godmother',
                    'baptisminfo.requirement',
                    'baptisminfo.payment',
                    'baptisminfo.paymentimage',
                ])
            ->first();
        }

        if($service->service == "Funeral Mass"){
            $info = DB::table('reservation')
                ->leftjoin('main_users', 'main_users.id', 'reservation.user_id')
                ->leftjoin('main_users_details', 'main_users_details.userid', 'reservation.user_id')
                ->leftjoin('calendartime', 'calendartime.id', 'reservation.calendar_id')
                ->leftjoin('funeralinfo', 'funeralinfo.id', 'reservation.funeral_id')
                ->where('reservation.funeral_id', $service->funeral_id)
                ->select([
                    'calendartime.service',
                    'calendartime.event_type',
                    'main_users_details.firstname',
                    'main_users_details.middlename',
                    'main_users_details.lastname',
                    'calendartime.year',
                    'calendartime.month',
                    'calendartime.day',
                    'calendartime.start_time',
                    'calendartime.end_time',
                    'main_users.email',
                    'main_users_details.mobilenumber',
                    'funeralinfo.relationship',
                    'funeralinfo.name',
                    'funeralinfo.age',
                    'funeralinfo.gender',
                    'funeralinfo.dateofbirth',
                    'funeralinfo.dateofpassing',
                    'funeralinfo.location',
                    'funeralinfo.requirement',
                    'funeralinfo.payment',
                    'funeralinfo.paymentimage',
                ])
            ->first();
        }

        if($service->service == "Anointing Of The Sick"){
            $info = DB::table('reservation')
                ->leftjoin('main_users', 'main_users.id', 'reservation.user_id')
                ->leftjoin('main_users_details', 'main_users_details.userid', 'reservation.user_id')
                ->leftjoin('calendartime', 'calendartime.id', 'reservation.calendar_id')
                ->leftjoin('anointinginfo', 'anointinginfo.id', 'reservation.anointing_id')
                ->where('reservation.anointing_id', $service->anointing_id)
                ->select([
                    'calendartime.service',
                    'calendartime.event_type',
                    'main_users_details.firstname',
                    'main_users_details.middlename',
                    'main_users_details.lastname',
                    'calendartime.year',
                    'calendartime.month',
                    'calendartime.day',
                    'calendartime.start_time',
                    'calendartime.end_time',
                    'main_users.email',
                    'main_users_details.mobilenumber',
                    'anointinginfo.relationship',
                    'anointinginfo.name',
                    'anointinginfo.age',
                    'anointinginfo.gender',
                    'anointinginfo.dateofbirth',
                    'anointinginfo.address',
                    'anointinginfo.requirement',
                    'anointinginfo.payment',
                    'anointinginfo.paymentimage',
                ])
            ->first();
        }

        if($service->service == "Kumpil"){
            $info = DB::table('reservation')
                ->leftjoin('main_users', 'main_users.id', 'reservation.user_id')
                ->leftjoin('main_users_details', 'main_users_details.userid', 'reservation.user_id')
                ->leftjoin('calendartime', 'calendartime.id', 'reservation.calendar_id')
                ->leftjoin('kumpilinfo', 'kumpilinfo.id', 'reservation.kumpil_id')
                ->where('reservation.kumpil_id', $service->kumpil_id)
                ->select([
                    'calendartime.service',
                    'calendartime.event_type',
                    'main_users_details.firstname',
                    'main_users_details.middlename',
                    'main_users_details.lastname',
                    'calendartime.year',
                    'calendartime.month',
                    'calendartime.day',
                    'calendartime.start_time',
                    'calendartime.end_time',
                    'main_users.email',
                    'main_users_details.mobilenumber',
                    'kumpilinfo.principal',
                    'kumpilinfo.secretary',
                    'kumpilinfo.address',
                    'kumpilinfo.total_student',
                    'kumpilinfo.no_of_male',
                    'kumpilinfo.no_of_female',
                    'kumpilinfo.requirement',
                    'kumpilinfo.payment',
                    'kumpilinfo.paymentimage',
                ])
            ->first();
        }

        if($service->service == "First Communion"){
            $info = DB::table('reservation')
                ->leftjoin('main_users', 'main_users.id', 'reservation.user_id')
                ->leftjoin('main_users_details', 'main_users_details.userid', 'reservation.user_id')
                ->leftjoin('calendartime', 'calendartime.id', 'reservation.calendar_id')
                ->leftjoin('communioninfo', 'communioninfo.id', 'reservation.communion_id')
                ->where('reservation.communion_id', $service->communion_id)
                ->select([
                    'calendartime.service',
                    'calendartime.event_type',
                    'main_users_details.firstname',
                    'main_users_details.middlename',
                    'main_users_details.lastname',
                    'calendartime.year',
                    'calendartime.month',
                    'calendartime.day',
                    'calendartime.start_time',
                    'calendartime.end_time',
                    'main_users.email',
                    'main_users_details.mobilenumber',
                    'communioninfo.principal',
                    'communioninfo.secretary',
                    'communioninfo.address',
                    'communioninfo.total_student',
                    'communioninfo.no_of_male',
                    'communioninfo.no_of_female',
                    'communioninfo.requirement',
                    'communioninfo.payment',
                    'communioninfo.paymentimage',
                ])
            ->first();
        }

        if($service->service == "Blessing"){
            $info = DB::table('reservation')
                ->leftjoin('main_users', 'main_users.id', 'reservation.user_id')
                ->leftjoin('main_users_details', 'main_users_details.userid', 'reservation.user_id')
                ->leftjoin('calendartime', 'calendartime.id', 'reservation.calendar_id')
                ->leftjoin('blessinginfo', 'blessinginfo.id', 'reservation.blessing_id')
                ->where('reservation.blessing_id', $service->blessing_id)
                ->select([
                    'calendartime.service',
                    'calendartime.event_type',
                    'main_users_details.firstname',
                    'main_users_details.middlename',
                    'main_users_details.lastname',
                    'calendartime.year',
                    'calendartime.month',
                    'calendartime.day',
                    'calendartime.start_time',
                    'calendartime.end_time',
                    'main_users.email',
                    'main_users_details.mobilenumber',
                    'blessinginfo.address',
                    'blessinginfo.requirement',
                    'blessinginfo.payment',
                    'blessinginfo.paymentimage',
                ])
                ->first();
        }

        if($service->service == "Wedding"){
            $info = DB::table('reservation')
                ->leftjoin('main_users', 'main_users.id', 'reservation.user_id')
                ->leftjoin('main_users_details', 'main_users_details.userid', 'reservation.user_id')
                ->leftjoin('calendartime', 'calendartime.id', 'reservation.calendar_id')
                ->leftjoin('weddinginfo', 'weddinginfo.id', 'reservation.wedding_id')
                ->where('reservation.wedding_id', $service->wedding_id)
                ->select([
                    'calendartime.service',
                    'calendartime.event_type',
                    'main_users_details.firstname',
                    'main_users_details.middlename',
                    'main_users_details.lastname',
                    'calendartime.year',
                    'calendartime.month',
                    'calendartime.day',
                    'calendartime.start_time',
                    'calendartime.end_time',
                    'main_users.email',
                    'main_users_details.mobilenumber',
                    'weddinginfo.bridename',
                    'weddinginfo.bridemother',
                    'weddinginfo.bridefather',
                    'weddinginfo.brideage',
                    'weddinginfo.bridebirth',
                    'weddinginfo.bridenumber',
                    'weddinginfo.brideemail',
                    'weddinginfo.brideaddress',
                    'weddinginfo.groomname',
                    'weddinginfo.groommother',
                    'weddinginfo.groomfather',
                    'weddinginfo.groomage',
                    'weddinginfo.groombirth',
                    'weddinginfo.groomnumber',
                    'weddinginfo.groomemail',
                    'weddinginfo.groomaddress',
                    'weddinginfo.requirement',
                    'weddinginfo.payment',
                    'weddinginfo.paymentimage',
                ])
                ->first();
        }

        // dd($info);
        $data['info'] = $info;
        return view('user.additionalinfo', $data);
    }

    public function user_request(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        // dd($input);
        DB::table('reservation')
            ->where('id', $input['id'])
            ->update([
                "status" => "Requesting",
            ]);

        DB::table('notif')
            ->insert([
                'accounttype' => 'admin',
                'title' => 'Request Certificate',
                'content' => "New request issued, check it's requirements and validity",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/userhistory?n=1');
    }

}
