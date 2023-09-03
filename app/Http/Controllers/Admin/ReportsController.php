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

class ReportsController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('axuadmin');
    }

    public function adminreport(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('admin.adminreports', $data);
    }

    public function reservationDataMonth(Request $request){
        $query = $request->query();

        $monthNames = [
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December"
        ];

        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthName = $monthNames[$i]; // Get the month name from the array
            $count = DB::table('reservation')
                ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                ->where('reservation.status', "Completed")
                ->where('calendartime.year', $query['year'])
                ->where('calendartime.month', $i)
                ->where('reservation.service', $query['service'])
                ->count();

            $data[$monthName] = $count;
        }

        return response()->json($data);
        dd($data);
    }

    public function moneyDataMonth(Request $request){
        $query = $request->query();

        for($i = 1; $i <= 12; $i++){
            $data[$i] = DB::table('reservation')
                ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                ->where('reservation.status', "Completed")
                ->where('calendartime.year', $query['year'])
                ->where('calendartime.month', $i)
                ->where('reservation.service', $query['service'])
                ->count();
        }

        return response()->json($data);
        dd($data);
    }
}
