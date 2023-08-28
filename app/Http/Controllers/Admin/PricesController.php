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

class PricesController extends Controller
{
    // public function __construct(Request $request){
    //     $this->middleware('axuadmin');
    // }

    public function adminprices(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $data['prices'] = $prices = DB::table('service_prices')
            ->select([
                'service',
                'event_type',
                'amount',
            ])
            ->get()
            ->toArray();

        // dd($prices);

        return view('admin.adminprices', $data);
    }

    public function adminprices_update(Request $request){
        $query = $request->query();
        // dd($query);

        DB::table('service_prices')
            ->where('id', $query['id'])
            ->update([
                'amount' => $query['value']
            ]);

        return response()->json('success');
    }


}
