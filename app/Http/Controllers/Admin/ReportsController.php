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
                ->where(function ($queryBuilder) use ($i, $query) {
                    $queryBuilder->where('reservation.status', 'Completed')
                        ->orWhere('reservation.status', 'Requesting')
                        ->orWhere('reservation.status', 'Finalized');
                })
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


        if($query['service'] == "Blessing"){
            for ($i = 1; $i <= 12; $i++) {
                $monthName = $monthNames[$i];
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('blessinginfo', 'blessinginfo.id', '=', 'reservation.blessing_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $query['year'])
                    ->where('calendartime.month', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('blessinginfo.payment');

                $data[$monthName] = $count;
            }
        }

        if($query['service'] == "Baptism"){
            for ($i = 1; $i <= 12; $i++) {
                $monthName = $monthNames[$i];
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('baptisminfo', 'baptisminfo.id', '=', 'reservation.baptism_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $query['year'])
                    ->where('calendartime.month', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('baptisminfo.payment');

                $data[$monthName] = $count;
            }
        }

        if($query['service'] == "Funeral Mass"){
            for ($i = 1; $i <= 12; $i++) {
                $monthName = $monthNames[$i];
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('funeralinfo', 'funeralinfo.id', '=', 'reservation.funeral_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $query['year'])
                    ->where('calendartime.month', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('funeralinfo.payment');

                $data[$monthName] = $count;
            }
        }

        if($query['service'] == "Anointing Of The Sick"){
            for ($i = 1; $i <= 12; $i++) {
                $monthName = $monthNames[$i];
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('anointinginfo', 'anointinginfo.id', '=', 'reservation.anointing_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $query['year'])
                    ->where('calendartime.month', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('anointinginfo.payment');

                $data[$monthName] = $count;
            }
        }

        if($query['service'] == "Kumpil"){
            for ($i = 1; $i <= 12; $i++) {
                $monthName = $monthNames[$i];
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('kumpilinfo', 'kumpilinfo.id', '=', 'reservation.kumpil_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $query['year'])
                    ->where('calendartime.month', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('kumpilinfo.payment');

                $data[$monthName] = $count;
            }
        }

        if($query['service'] == "First Communion"){
            for ($i = 1; $i <= 12; $i++) {
                $monthName = $monthNames[$i];
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('communioninfo', 'communioninfo.id', '=', 'reservation.communion_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $query['year'])
                    ->where('calendartime.month', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('communioninfo.payment');

                $data[$monthName] = $count;
            }
        }

        if($query['service'] == "Wedding"){
            for ($i = 1; $i <= 12; $i++) {
                $monthName = $monthNames[$i];
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('weddinginfo', 'weddinginfo.id', '=', 'reservation.wedding_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $query['year'])
                    ->where('calendartime.month', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('weddinginfo.payment');

                $data[$monthName] = $count;
            }
        }

        if($query['service'] == "Donations"){
            for ($i = 1; $i <= 12; $i++) {
                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                $count = DB::table('donations')
                    ->whereRaw('MONTH(created_at) = ?', [$i])
                    ->whereRaw('YEAR(created_at) = ?', $query['year'])
                    ->sum('amount');

                $data[$monthName] = $count;
            }
        }


        return response()->json($data);
        dd($data);
    }

    public function reservationDataYear(Request $request){
        $query = $request->query();
        // dd($query);

        $data = [];

        for ($i = 2022; $i <= $query['year']; $i++) {
            $count = DB::table('reservation')
                ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                ->where(function ($queryBuilder) use ($i, $query) {
                    $queryBuilder->where('reservation.status', 'Completed')
                        ->orWhere('reservation.status', 'Requesting')
                        ->orWhere('reservation.status', 'Finalized');
                })
                ->where('calendartime.year', $i)
                ->where('reservation.service', $query['service'])
                ->count();

            $data[$i] = $count;
        }

        return response()->json($data);
        dd($data);
    }

    public function moneyDataMonthYear(Request $request){
        $query = $request->query();
        $data = [];

        if($query['service'] == "Blessing"){
            for ($i = 2022; $i <= $query['year']; $i++) {
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('blessinginfo', 'blessinginfo.id', '=', 'reservation.blessing_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('blessinginfo.payment');

                $data[$i] = $count;
            }
        }

        if($query['service'] == "Baptism"){
            for ($i = 2022; $i <= $query['year']; $i++) {
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('baptisminfo', 'baptisminfo.id', '=', 'reservation.baptism_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('baptisminfo.payment');

                $data[$i] = $count;
            }
        }

        if($query['service'] == "Funeral Mass"){
            for ($i = 2022; $i <= $query['year']; $i++) {
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('funeralinfo', 'funeralinfo.id', '=', 'reservation.funeral_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('funeralinfo.payment');

                $data[$i] = $count;
            }
        }

        if($query['service'] == "Anointing Of The Sick"){
            for ($i = 2022; $i <= $query['year']; $i++) {
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('anointinginfo', 'anointinginfo.id', '=', 'reservation.anointing_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('anointinginfo.payment');

                $data[$i] = $count;
            }
        }

        if($query['service'] == "Kumpil"){
            for ($i = 2022; $i <= $query['year']; $i++) {
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('kumpilinfo', 'kumpilinfo.id', '=', 'reservation.kumpil_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('kumpilinfo.payment');

                $data[$i] = $count;
            }
        }

        if($query['service'] == "First Communion"){
            for ($i = 2022; $i <= $query['year']; $i++) {
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('communioninfo', 'communioninfo.id', '=', 'reservation.kumpil_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('communioninfo.payment');

                $data[$i] = $count;
            }
        }

        if($query['service'] == "Wedding"){
            for ($i = 2022; $i <= $query['year']; $i++) {
                $count = DB::table('reservation')
                    ->leftjoin('calendartime', 'calendartime.id', '=', 'reservation.calendar_id')
                    ->leftjoin('weddinginfo', 'weddinginfo.id', '=', 'reservation.kumpil_id')
                    ->where(function ($queryBuilder) use ($i, $query) {
                        $queryBuilder->where('reservation.status', 'Completed')
                            ->orWhere('reservation.status', 'Requesting')
                            ->orWhere('reservation.status', 'Finalized');
                    })
                    ->where('calendartime.year', $i)
                    ->where('reservation.service', $query['service'])
                    ->sum('weddinginfo.payment');

                $data[$i] = $count;
            }
        }

        if($query['service'] == "Donations"){
            for ($i = 2022; $i <= $query['year']; $i++) {
                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                $count = DB::table('donations')
                    ->whereRaw('YEAR(created_at) = ?', [$i])
                    ->sum('amount');
                $data[$i] = $count;
            }
        }

        return response()->json($data);
        dd($data);
    }
}
