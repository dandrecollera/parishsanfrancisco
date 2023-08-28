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

        return view('user.userservices', $data);
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

        DB::table('reservation')
            ->insert([
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

        DB::table('reservation')
            ->insert([
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

        DB::table('reservation')
            ->insert([
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

        DB::table('reservation')
            ->insert([
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

        DB::table('reservation')
            ->insert([
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

        DB::table('reservation')
            ->insert([
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

        DB::table('reservation')
            ->insert([
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


}
