<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;

class PublicController extends Controller
{
    public function home(Request $request){
        return view('landingpage');
    }

    public function about(Request $request){
        return view('about');
    }

    public function news(Request $request){
        return view('news');
    }

    public function newsarticle(Request $request){
        $data = array();
        $query = $request->query();

        if(!$query || $query['id'] == null){
            return redirect('news');
        }

        $data['db'] = DB::table('articles')
            ->where('id', $query['id'])
            ->first();

        return view('newsarticle', $data);
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

    public function subscribe_process_public(Request $request){
        $input = $request->input();

        $count = DB::table('subscription')
            ->where('email', $input['email'])
            ->count();

        if($count < 1){
            DB::table('subscription')
                ->insert([
                    "email" => $input['email'],
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);

            Mail::to($input['email'])->send(new SubscriptionMail());

            DB::table('notif')
                ->insert([
                    'accounttype' => 'admin',
                    'title' => 'A New User Subscribe to our news letter!',
                    'content' => "New Subscriber: " . $input['email'],
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
        }

        return redirect('/');
    }

    public function sendmessage_process(Request $request){
        $input = $request->input();

        // dd($input);

        DB::table('messages')
            ->insert([
                'name' => $input['name'],
                'email' => $input['email'],
                'message' => $input['address'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('notif')
            ->insert([
                'accounttype' => 'admin',
                'title' => 'A user sent a message!',
                'content' => "Check message tab to see more, sender: " . $input['email'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/');
    }
}
