<?php

namespace App\Http\Controllers\Admin;

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
use App\Mail\CertificateMail;
use PDF;

class AppointmentController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('axuadmin');
    }

    public function adminappointment(Request $request){
        $query = $request->query();
        $data = array();
        $qstring = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        // Errors
        $data['errorlist'] = [
            1 => 'Email already exist',
            2 => 'Password must be 8 character long',
            3 => 'Password must match',
        ];
        $data['error'] = 0;
        if(!empty($_GET['e'])){
            $data['error'] = $_GET['e'];
        }

        // Notifications
        $data['notiflist'] = [
            1 => 'Status Updated.',
            2 => 'Certificate Approved.',
            3 => 'Password modified.',
            4 => 'Status modified.',
        ];
        $data['notif'] = 0;
        if(!empty($_GET['n'])){
            $data['notif'] = $_GET['n'];
        }

        // Line Per Page
        $lpp = 25;
        $lineperpage = [3, 25, 50, 100, 200];
        if(!empty($query['lpp'])){
            if(in_array($query['lpp'], $lineperpage)){
                $lpp = $query['lpp'];
            }
        }
        $data['lpp'] = $qstring['lpp'] = $lpp;

        // Keywords
        $keyword = '';
        if(!empty($query['keyword'])){
            $qstring['keyword'] = $keyword = $query['keyword'];
            $data['keyword'] = $keyword;
        }

        // Filter: Account Type
        $data['type'] = 0;
        $data['typebylist'] = [
            ['display' => 'Default', 'field' => ''],
            ['display' => 'Baptism', 'field' => 'Baptism'],
            ['display' => 'Funeral Mass', 'field' => 'Funeral Mass'],
            ['display' => 'Anointing Of The Sick', 'field' => 'Anointing Of The Sick'],
            ['display' => 'Blessing', 'field' => 'Blessing'],
            ['display' => 'Kumpil', 'field' => 'Kumpil'],
            ['display' => 'First Communion', 'field' => 'First Communion'],
            ['display' => 'Wedding', 'field' => 'Wedding'],
        ];
        if(!empty($query['type'])){
            $data['type'] = $qstring['type'] = $query['type'];
        }

        // Sort
        $data['sort'] = 0;
        $data['orderbylist'] = [
            ['display' => 'Default', 'field' => 'reservation.id'],
            ['display' => 'Email', 'field' => 'main_users.email'],
            ['display' => 'Service', 'field' => 'reservation.service'],
            ['display' => 'Event Date', 'field' => 'event_date'],
            ['display' => 'Created At', 'field' => 'reservation.created_at'],
            ['display' => 'Status', 'field' => 'reservation.status'],
        ];
        if(!empty($query['sort'])){
            $data['sort'] = $qstring['sort'] = $query['sort'];
        }
        // Paging
        $page = 1;
        if(!empty($query['page'])){
            $page = $query['page'];
        }
        $qstring['page'] = $page;

        $countdata = DB::table('reservation')
            ->leftjoin('main_users', 'main_users.id', '=', 'reservation.user_id')
            ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
            ->count();

        $dbdata = DB::table('reservation')
            ->leftjoin('main_users', 'main_users.id', '=', 'reservation.user_id')
            ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
            ->select([
                'reservation.id',
                'main_users.email',
                'reservation.service',
                // 'calendartime.day',
                // 'calendartime.month',
                // 'calendartime.year',
                DB::raw("CONCAT(calendartime.year, '-', LPAD(calendartime.month, 2, '0'), '-', LPAD(calendartime.day, 2, '0')) AS event_date"),
                'reservation.created_at',
                'reservation.status',
            ]);

        if(!empty($keyword)){
            $countdata = DB::table('reservation')
                ->leftjoin('main_users', 'main_users.id', '=', 'reservation.user_id')
                ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                ->where('main_users.email', 'like', "%$keyword%")
                ->orWhere('reservation.service', 'like', "%$keyword%")
                ->count();

            $dbdata->where('main_users.email', 'like', "%$keyword%");
            $dbdata->orWhere('reservation.service', 'like', "%$keyword%");
        }

        if($data['type'] != 0){
            $dbdata->where('reservation.service', $data['typebylist'][$data['type']]['field']);
        }

        if($data['sort'] == 3){
            $dbdata->orderby($data['orderbylist'][$data['sort']]['field'], 'desc');

        } else {

            $dbdata->orderby($data['orderbylist'][$data['sort']]['field'], 'asc');
        }


        $data['totalpages'] = ceil($countdata/$lpp);
        $data['page'] = $page;
        $data['totalitems'] = $countdata;
        $dataoffset = ($page*$lpp) - $lpp;

        $dbdata->offset($dataoffset)->limit($lpp);
        $data['qstring'] = http_build_query($qstring);
        $data['qstring2'] = $qstring;

        if ($page < 2) {
            $data['page_first_url'] = '<a class="btn btn-dark disabled" href="#" role="button" aria-disabled="true" style="padding-top: 10px;"><i class="fa-solid fa-angles-left fa-xs"></i> </a>';
            $data['page_prev_url'] = '<a class="btn btn-dark disabled" href="#" role="button" aria-disabled="true" style="padding-top: 10px;"><i class="fa-solid fa-angle-left fa-xs"></i> </a>';
        } else {
            $urlvar = $qstring; $urlvar['page'] = 1;
            $data['page_first_url'] = '<a class="btn btn-dark" href="?'.http_build_query($urlvar).'" role="button" style="padding-top: 10px;"><i class="fa-solid fa-angles-left fa-xs"></i> </a>';
            $urlvar = $qstring; $urlvar['page'] = $urlvar['page'] - 1;
            $data['page_prev_url'] = '<a class="btn btn-dark" href="?'.http_build_query($urlvar).'" role="button" style="padding-top: 10px;"><i class="fa-solid fa-angle-left fa-xs"></i> </a>';
        }
        if ($page >= $data['totalpages']) {
            $data['page_last_url'] = '<a class="btn btn-dark disabled" href="#" role="button" aria-disabled="true" style="padding-top: 10px;"><i class="fa-solid fa-angles-right fa-xs"></i> </a>';
            $data['page_next_url'] = '<a class="btn btn-dark disabled" href="#" role="button" aria-disabled="true" style="padding-top: 10px;"><i class="fa-solid fa-angle-right fa-xs"></i> </a>';
        } else {
            $urlvar = $qstring; $urlvar['page'] = $data['totalpages'];
            $data['page_last_url'] = '<a class="btn btn-dark" href="?'.http_build_query($urlvar).'" role="button" style="padding-top: 10px;"><i class="fa-solid fa-angles-right fa-xs"></i> </a>';
            $urlvar = $qstring; $urlvar['page'] = $urlvar['page'] + 1;
            $data['page_next_url'] = '<a class="btn btn-dark" href="?'.http_build_query($urlvar).'" role="button" style="padding-top: 10px;"><i class="fa-solid fa-angle-right fa-xs"></i> </a>';
        }

        $data['dbresult'] = $dbresult = $dbdata->get()->toArray();

        return view('admin.adminappointment', $data);
    }

    public function adminadditionalinfo(Request $request){
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
                    'communioninfo.requirement2',
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
                    'weddinginfo.requirement2',
                    'weddinginfo.requirement3',
                    'weddinginfo.requirement4',
                    'weddinginfo.payment',
                    'weddinginfo.paymentimage',
                ])
                ->first();
        }

        // dd($info);
        $data['info'] = $info;
        return view('user.additionalinfo', $data);
    }

    public function adminstatusupdate(Request $request){
        $data = array();
        $query = $request->query();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $data['selectedreservation'] = $selectedreservation = $query['id'];

        $data['dbdata'] = $dbdata = DB::table('reservation')
            ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
            ->select([
                DB::raw("CONCAT(calendartime.year, '-', LPAD(calendartime.month, 2, '0'), '-', LPAD(calendartime.day, 2, '0')) AS event_date"),
                'calendartime.start_time',
                'calendartime.end_time',
                'reservation.calendar_id'
            ])
            ->where('reservation.id', $selectedreservation)
            ->first();

        return view('admin.adminstatusupdate', $data);
    }

    public function adminstatusupdate_process(Request $request){
        $data = array();
        $input = $request->input();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $date = Carbon::parse($input['date']);

        $year = $date->year;
        $month = $date->month;
        $day = $date->day;

        $selecteduser = DB::table('reservation')
            ->leftjoin('main_users', 'main_users.id', '=', 'reservation.user_id')
            ->where('reservation.id', $input['id'])
            ->select([
                'main_users.id'
            ])
            ->first();

        // dd($year, $month, $day);
        // dd($selecteduser);

        if($input['status'] == "Pending"){
            return redirect('adminappointment?n=1');
        }


        if($input["status"] == "Reschedule"){
            DB::table('calendartime')
                ->where('id', $input['calendarid'])
                ->update([
                    'year' => $year,
                    'month' => $month,
                    'day' => $day,
                    'start_time' => $input['starttime'],
                    'end_time' => $input['endtime'],
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
        }

        DB::table('reservation')
            ->where('id', $input['id'])
            ->update([
                'status' => $input['status']
            ]);

        // Email
        $info = DB::table('reservation')
            ->where('reservation.id', $input['id'])
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

        $subject = null;
        if($input['status'] != "Pending"){

            if($input['status'] == "Scheduled"){
                $subject = "Reservation Approved";
            } elseif($input['status'] == "Completed"){
                $subject = "Reservation Completed";
            } elseif($input['status'] == "Reschedule"){
                $subject = "Reservation Rescheduled";
            } elseif($input['status'] == "Cancelled"){
                $subject = "Reservation Cancelled";
            }

            $user = $info->firstname . ' ' . $info->lastname;
            Mail::to($info->email)->send(new ReservationMail($subject, $user, $info));
        }

        DB::table('notif')
            ->insert([
                'userid' => $selecteduser->id,
                'accounttype' => 'user',
                'title' => 'Reservation Update',
                'content' => $this->contentCreator($input['status']),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);


        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Status Update',
                'content' => "Status of a user's reservation updated",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('adminappointment?n=1');
    }

    public function contentCreator($status){
        if($status == "Scheduled"){
            return "Your appointment has been approved";
        } elseif($status == "Completed"){
            return "Your appointment has been completed";
        } elseif($status == "Reschedule"){
            return "Your appointment has been rescheduled";
        } elseif($status == "Cancelled"){
            return "Your appointment has been canceled";
        }
    }

    public function approved_certi(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        $data['service'] = $service = DB::table('reservation')
            ->where('id', $input['id'])
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

        $data['info'] = $info;

        $pdf = PDF::loadView('pdf.certificate', $data);

        $now = Carbon::now();
        $formattedNow = $now->format('Ymd_His');
        $pdfFileName = $formattedNow . '.pdf';

        $storagePath = 'public/certificate';

        if(!Storage::exists($storagePath)){
            Storage::makeDirectory($storagePath);
        }

        Storage::put("$storagePath/$pdfFileName", $pdf->output());
        $pdfUrl = Storage::url("$storagePath/$pdfFileName");
        $fullname = $info->firstname . ' ' . $info->middlename . ' ' . $info->lastname;
        $fulllink = env("APP_URL") . $pdfUrl;

        // dd($fullname, $fulllink);

        Mail::to($info->email)->send(new CertificateMail($fullname, $fulllink));

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Certificate Approved',
                'content' => "Status of a user's reservation updated",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('reservation')
            ->where('id', $input['id'])
            ->update([
                "status" => "Completed",
            ]);
        return redirect("/adminappointment?n=2");
    }
}
