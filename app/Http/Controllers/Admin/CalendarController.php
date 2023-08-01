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

use Illuminate\Support\Facades\Log;

class CalendarController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('axuadmin');
    }

    public function admincalendar(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $data['errorlist'] = [
            1 => 'Email already exist',
            2 => 'Password must be 8 character long',
            3 => 'Password must match',
            4 => 'Select a ministry.'
        ];
        $data['error'] = 0;
        if(!empty($_GET['e'])){
            $data['error'] = $_GET['e'];
        }

        // Notifications
        $data['notiflist'] = [
            1 => 'Schedule Added.',
            2 => 'Schedule Deleted.',
            3 => 'Password modified.',
            4 => 'Status modified.',
        ];
        $data['notif'] = 0;
        if(!empty($_GET['n'])){
            $data['notif'] = $_GET['n'];
        }

        return view('admin.admincalendar', $data);
    }

    public function admincalendar_time(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        $data['query'] = $query;

        return view('admin.admincalendar_time', $data);
    }

    public function admincalendar_time_add(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        $data['query'] = $query;

        return view('admin.admincalendar_time_add', $data);
    }

    public function admincalendar_time_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        DB::table('calendartime')
            ->insert([
                "year" => $input['year'],
                "month" => $input['month'],
                "day" => $input['day'],
                "start_time" => $input['starttime'],
                "end_time" => $input['endtime'],
                "service" => $input['service'],
                "event_type" => $input['eventtype'],
                "slot" => empty($input['slot']) ? 1 :  $input['slot'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/admincalendar?n=1');
    }

    public function getDataForDay(Request $request){
        $input = $request->query();

        $type = null;

        $type = DB::table('calendartime')
            ->where('day', $input['day'])
            ->where('month', $input['month'])
            ->where('year', $input['year'])
            ->select('event_type')
            ->first();

        if(empty($type)){
            return response()->json($type);
        } else {
            return response()->json($type->event_type);
        }
    }

    public function formatTime($time){
        return Carbon::createFromFormat('H:i:s', $time)->format('g:ia');
    }

    public function getScheduleForDay(Request $request){
        $input = $request->query();

        $data = DB::table('calendartime')
            ->where('day', $input['day'])
            ->where('month', $input['month'])
            ->where('year', $input['year'])
            ->orderBy('start_time', 'asc')
            ->get()
            ->toArray();

        foreach ($data as $item) {
            $item->start_time = $this->formatTime($item->start_time);
            $item->end_time = $this->formatTime($item->end_time);
        }

        return response()->json($data);
    }

    public function admincalendar_time_delete_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('calendartime')
            ->where('id', $query['id'])
            ->delete();

            return redirect('/admincalendar?n=2');
    }


}
