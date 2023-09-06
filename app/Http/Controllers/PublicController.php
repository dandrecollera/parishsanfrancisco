<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{
    public function home(Request $request){
        return view('landingpage');
    }

    public function about(Request $request){
        return view('about');
    }

    public function services(Request $request){
        $data = array();

        $data['notiflist'] = [
            1 => 'Donation sent, thank you for donating',
        ];
        $data['notif'] = 0;
        if(!empty($_GET['n'])){
            $data['notif'] = $_GET['n'];
        }

        return view('services', $data);
    }

    public function faqs(Request $request){
        return view('faqs');
    }

    public function public_donation(Request $request){
        $input = $request->input();
        // dd($request->all());

        DB::table('donations')
            ->insert([
                'amount' => $input['amount'],
                'donationimage' => $this->fileProcess($request->file('receipt')),
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

        return redirect('/services?n=1');

    }

    public function fileProcess($input) {
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
}
