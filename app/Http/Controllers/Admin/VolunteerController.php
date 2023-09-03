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

class VolunteerController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('axuadmin');
    }

    public function adminvolunteer(Request $request){
        $query = $request->query();
        $data = array();
        $qstring = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        // Errors
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
            1 => 'New volunteer successfully added.',
            2 => 'Volunteer successfully modified.',
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

        // Sort
        $data['sort'] = 0;
        $data['orderbylist'] = [
            ['display' => 'Default', 'field' => 'volunteers.id'],
            ['display' => 'First Name', 'field' => 'volunteers.firstname'],
            ['display' => 'Middle Name', 'field' => 'volunteers.middlename'],
            ['display' => 'Last Name', 'field' => 'volunteers.lastname'],
            ['display' => 'Age', 'field' => 'volunteers.birthdate'],
            ['display' => 'Ministry', 'field' => 'volunteers.ministry'],
            ['display' => 'Status', 'field' => 'volunteers.status'],
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

        // Database Logic
        $countdata = DB::table('volunteers')
            ->count();
        $dbdata = DB::table('volunteers');

        if(!empty($keyword)){
            $countdata = DB::table('volunteers')
                ->where('firstname', 'like', "%$keyword%")
                ->orwhere('middlename', 'like', "%$keyword%")
                ->orwhere('lastname', 'like', "%$keyword%")
                ->count();

            $dbdata->where('firstname', 'like', "%$keyword%");
            $dbdata->orwhere('middlename', 'like', "%$keyword%");
            $dbdata->orwhere('lastname', 'like', "%$keyword%");
        }

        $dbdata->orderby($data['orderbylist'][$data['sort']]['field']);

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

        return view('admin.adminvolunteer', $data);
    }

    public function adminvolunteer_add(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('admin.adminvolunteer_add', $data);
    }

    public function adminvolunteer_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        if(empty($input['music']) && empty($input['youth']) && empty($input['lectors']) && empty($input['communications']) && empty($input['cathechetical']) && empty($input['ushers']) && empty($input['servers']) && empty($input['lay']) && empty($input['butler'])){
            return redirect('/adminvolunteer?e=4');
            die();
        }

        $ministries = array();
        if(!empty($input['music'])){
            $ministries[] = 'Liturgical Music Ministry';
        }
        if(!empty($input['youth'])){
            $ministries[] = 'Parish Youth Ministry';
        }
        if(!empty($input['lectors'])){
            $ministries[] = 'Ministry of Lectors and Commentators';
        }
        if(!empty($input['communications'])){
            $ministries[] = 'Social Communications Ministry';
        }
        if(!empty($input['cathechetical'])){
            $ministries[] = 'Cathechetical Ministry';
        }
        if(!empty($input['ushers'])){
            $ministries[] = 'Ministry of Ushers Greeters and Collectors';
        }
        if(!empty($input['servers'])){
            $ministries[] = 'Ministry of Altar Servers';
        }
        if(!empty($input['lay'])){
            $ministries[] = 'Ministry of Lay Minister';
        }
        if(!empty($input['butler'])){
            $ministries[] = 'Ministry of Mother Butler Guild';
        }

        $compiledministry = implode($ministries, ', ');

        DB::table('volunteers')
            ->insert([
                'firstname' => $input['firstname'],
                'middlename' => $input['middlename'],
                'lastname' => $input['lastname'],
                'birthdate' => $input['birthdate'],
                'mobilenumber' => $input['mobilenumber'],
                'address' => $input['address'],
                'mobilenumber' => $input['mobilenumber'],
                'ministry' => $compiledministry,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Volunteer Added',
                'content' => "User created a new volunteer query.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminvolunteer?n=1');
    }

    public function adminvolunteer_edit(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();


        $selected = DB::table('volunteers')
            ->where('id', $query['id'])
            ->first();

        $selected->ministry = explode(', ', $selected->ministry);

        $data['selected'] = $selected;

        return view('admin.adminvolunteer_edit', $data);
    }

    public function adminvolunteer_edit_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        if(empty($input['music']) && empty($input['youth']) && empty($input['lectors']) && empty($input['communications']) && empty($input['cathechetical']) && empty($input['ushers']) && empty($input['servers']) && empty($input['lay']) && empty($input['butler'])){
            return redirect('/adminvolunteer?e=4');
            die();
        }

        $ministries = array();
        if(!empty($input['music'])){
            $ministries[] = 'Liturgical Music Ministry';
        }
        if(!empty($input['youth'])){
            $ministries[] = 'Parish Youth Ministry';
        }
        if(!empty($input['lectors'])){
            $ministries[] = 'Ministry of Lectors and Commentators';
        }
        if(!empty($input['communications'])){
            $ministries[] = 'Social Communications Ministry';
        }
        if(!empty($input['cathechetical'])){
            $ministries[] = 'Cathechetical Ministry';
        }
        if(!empty($input['ushers'])){
            $ministries[] = 'Ministry of Ushers Greeters and Collectors';
        }
        if(!empty($input['servers'])){
            $ministries[] = 'Ministry of Altar Servers';
        }
        if(!empty($input['lay'])){
            $ministries[] = 'Ministry of Lay Minister';
        }
        if(!empty($input['butler'])){
            $ministries[] = 'Ministry of Mother Butler Guild';
        }

        $compiledministry = implode($ministries, ', ');

        DB::table('volunteers')
            ->where('id', $input['id'])
            ->update([
                'firstname' => $input['firstname'],
                'middlename' => $input['middlename'],
                'lastname' => $input['lastname'],
                'birthdate' => $input['birthdate'],
                'mobilenumber' => $input['mobilenumber'],
                'address' => $input['address'],
                'mobilenumber' => $input['mobilenumber'],
                'ministry' => $compiledministry,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Volunteer Edited',
                'content' => "User edited an existing volunteer query.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminvolunteer?n=2');
    }

    public function adminvolunteer_lock_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('volunteers')
            ->where('id', $query['id'])
            ->update([
                'status' => 'inactive',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Volunteer Status Update',
                'content' => "User locked an existing volunteer query.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminvolunteer?n=4');
    }

    public function adminvolunteer_unlock_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('volunteers')
            ->where('id', $query['id'])
            ->update([
                'status' => 'active',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Volunteer Status Update',
                'content' => "User unlocked an existing volunteer query.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminvolunteer?n=4');
    }
}
