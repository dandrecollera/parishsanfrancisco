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


class AnnouncementController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('axuadmin');
    }

    public function adminannouncement(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $data['notiflist'] = [
            1 => 'Announcement has been updated.',
            2 => 'Article successfully modified.',
            3 => 'Password modified.',
            4 => 'Status modified.',
        ];
        $data['notif'] = 0;
        if(!empty($_GET['n'])){
            $data['notif'] = $_GET['n'];
        }

        return view('admin.adminannouncement', $data);
    }

    public function adminannouncement_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();


        // dd($input);
        // dd(implode(',', $input['position']));

        DB::table('announcement')
            ->insert([
                'title' => $input['title'],
                'content' => $input['content'],
                'subject' => $input['subject'],
                'volunteerid' => implode(',', $input['position']),
                'priestid' => $input['priest'],
                'facebook' => $input['facebook'],
                'instagram' => $input['instagram'],
                'twitter' => $input['twitter'],
                'youtube' => $input['youtube'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'User updated the announcement',
                'content' => $userinfo[4] . " updated the announcement",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/adminannouncement?n=1');
    }
}
