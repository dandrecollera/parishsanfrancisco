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

class AdminController extends Controller
{

    public function __construct(Request $request){
        $this->middleware('axuadmin');
    }

    public function home(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('admin.home', $data);
    }

    public function adminnotification(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        $lpp = 25;
        $lineperpage = [3, 25, 50, 100, 200];
        if(!empty($query['lpp'])){
            if(in_array($query['lpp'], $lineperpage)){
                $lpp = $query['lpp'];
            }
        }
        $data['lpp'] = $qstring['lpp'] = $lpp;

        $page = 1;
        if(!empty($query['page'])){
            $page = $query['page'];
        }
        $qstring['page'] = $page;

        $countdata = DB::table('notif')
            ->where('accounttype', 'admin')
            ->count();
        $dbdata = DB::table('notif')
            ->where('accounttype', 'admin')
            ->orderBy('id', 'desc');


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
        return view('admin.adminnotification', $data);
    }

    public function adminlogs(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        $lpp = 25;
        $lineperpage = [3, 25, 50, 100, 200];
        if(!empty($query['lpp'])){
            if(in_array($query['lpp'], $lineperpage)){
                $lpp = $query['lpp'];
            }
        }
        $data['lpp'] = $qstring['lpp'] = $lpp;

        $page = 1;
        if(!empty($query['page'])){
            $page = $query['page'];
        }
        $qstring['page'] = $page;

        $countdata = DB::table('systemlog')
            ->count();
        $dbdata = DB::table('systemlog')
            ->orderBy('id', 'desc');


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
        return view('admin.adminlogs', $data);
    }

    public function adminuser(Request $request){
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
            1 => 'New user successfully added.',
            2 => 'User successfully modified.',
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
            ['display' => 'Admin', 'field' => 'admin'],
            ['display' => 'Secretary', 'field' => 'secretary'],
            ['display' => 'User', 'field' => 'user'],
            ['display' => 'Media', 'field' => 'media'],
        ];
        if(!empty($query['type'])){
            $data['type'] = $qstring['type'] = $query['type'];
        }

        // Sort
        $data['sort'] = 0;
        $data['orderbylist'] = [
            ['display' => 'Default', 'field' => 'main_users.id'],
            ['display' => 'Email', 'field' => 'main_users.email'],
            ['display' => 'Username', 'field' => 'main_users_details.username'],
            ['display' => 'First Name', 'field' => 'main_users_details.firstname'],
            ['display' => 'Middle Name', 'field' => 'main_users_details.middlename'],
            ['display' => 'Last Name', 'field' => 'main_users_details.lastname'],
            ['display' => 'Account Type', 'field' => 'main_users.accounttype'],
            ['display' => 'Status', 'field' => 'main_users.status'],
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
        $countdata = DB::table('main_users')
            ->leftjoin('main_users_details', 'main_users_details.userid', '=', 'main_users.id')
            ->count();
        $dbdata = DB::table('main_users')
            ->leftjoin('main_users_details', 'main_users_details.userid', '=', 'main_users.id')
            ->select(
                'main_users.*',
                'main_users_details.username',
                'main_users_details.firstname',
                'main_users_details.middlename',
                'main_users_details.lastname',
            );

        if(!empty($keyword)){
            $countdata = DB::table('main_users')
                ->leftjoin('main_users_details', 'main_users_details.userid', '=', 'main_users.id')
                ->where('main_users.email', 'like', "%$keyword%")
                ->orwhere('main_users_details.username', 'like', "%$keyword%")
                ->orwhere('main_users_details.firstname', 'like', "%$keyword%")
                ->orwhere('main_users_details.middlename', 'like', "%$keyword%")
                ->orwhere('main_users_details.lastname', 'like', "%$keyword%")
                ->count();

            $dbdata->where('main_users.email', 'like', "%$keyword%");
            $dbdata->orwhere('main_users_details.username', 'like', "%$keyword%");
            $dbdata->orwhere('main_users_details.firstname', 'like', "%$keyword%");
            $dbdata->orwhere('main_users_details.middlename', 'like', "%$keyword%");
            $dbdata->orwhere('main_users_details.lastname', 'like', "%$keyword%");
        }

        if($data['type'] != 0){
            $dbdata->where('accounttype', $data['typebylist'][$data['type']]['field']);
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

        return view('admin.adminuser', $data);
    }


    public function adminuser_add(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');


        $data['province'] = $provincedb = DB::table('province')
            ->orderBy('province_name', 'asc')
            ->get()
            ->toArray();

        return view('admin.adminuser_add', $data);
    }

    public function adminuser_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        $checkemail = DB::table('main_users')
            ->where('email', $input['email'])
            ->count();
        if($checkemail == true){
            return redirect('/adminuser?e=1');
            die();
        }

        if(strlen($input['password']) < 8){
            return redirect('/adminuser?e=2');
            die();
        }

        if($input['password2'] != $input['password']){
            return redirect('/adminuser?e=3');
            die();
        }

        $mainuserid = DB::table('main_users')
            ->insertGetID([
                'accounttype' => $input['type'],
                'email' => $input['email'],
                'password' => md5($input['password']),
                'verified' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('main_users_details')
            ->insert([
                'userid' => $mainuserid,
                'username' => $input['username'],
                'firstname' => $input['firstname'],
                'middlename' => !empty($input['middlename']) ? $input['middlename'] : '',
                'lastname' => $input['lastname'],
                'birthdate' => $input['birthdate'],
                'gender' => $input['gender'],
                'province' => $input['province'],
                'municipality' => $input['municipality'],
                'mobilenumber' => $input['mobilenumber'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Account Created',
                'content' => "User created a new account.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminuser?n=1');
    }

    public function adminuser_edit(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        $data['province'] = $provincedb = DB::table('province')
            ->orderBy('province_name', 'asc')
            ->get()
            ->toArray();

        $data['selecteduser'] = $selecteduser = DB::table('main_users')
            ->leftjoin('main_users_details', 'main_users_details.userid', '=', 'main_users.id')
            ->where('main_users.id', $query['id'])
            ->first();

        $selectedprovince = DB::table('province')
            ->where('id', $selecteduser->province)
            ->first();

        $data['municipality'] = $selectedmunicipality = DB::table('municipality')
            ->where('province_id', $selectedprovince->id)
            ->orderBy('municipality_name', 'asc')
            ->get()
            ->toArray();

        return view('admin.adminuser_edit', $data);
    }

    public function adminuser_edit_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        $lastemail = DB::table('main_users')
            ->where('id', $input['id'])
            ->select('email')
            ->first();

        if($lastemail->email != $input['email']){
            $checkemail = DB::table('main_users')
                ->where('email', $input['email'])
                ->count();
            if($checkemail == true){
                return redirect('/adminuser?e=1');
                die();
            }
        }

        DB::table('main_users')
            ->where('id', $input['id'])
            ->update([
                'email' => $input['email'],
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('main_users_details')
            ->where('userid', $input['id'])
            ->update([
                'username' => $input['username'],
                'firstname' => $input['firstname'],
                'middlename' => !empty($input['middlename']) ? $input['middlename'] : '',
                'lastname' => $input['lastname'],
                'birthdate' => $input['birthdate'],
                'gender' => $input['gender'],
                'province' => $input['province'],
                'municipality' => $input['municipality'],
                'mobilenumber' => $input['mobilenumber'],
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Account Edited',
                'content' => "User edited an existing account's details.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminuser?n=2');
    }

    public function adminuser_pass_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        if(strlen($input['password']) < 8){
            return redirect('/adminuser?e=2');
            die();
        }

        if($input['password2'] != $input['password']){
            return redirect('/adminuser?e=3');
            die();
        }

        DB::table('main_users')
            ->where('id', $input['id'])
            ->update([
                'password' => md5($input['password']),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Account Edited',
                'content' => "User edited an existing account's password.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminuser?n=3');
    }

    public function adminuser_lock_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('main_users')
            ->where('id', $query['id'])
            ->update([
                'status' => 'inactive',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Account Status Update',
                'content' => "User locked an existing account.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminuser?n=4');
    }

    public function adminuser_unlock_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('main_users')
            ->where('id', $query['id'])
            ->update([
                'status' => 'active',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Account Status Update',
                'content' => "User unlocked an existing account.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminuser?n=4');
    }

    public function adminmessage(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        $lpp = 25;
        $lineperpage = [3, 25, 50, 100, 200];
        if(!empty($query['lpp'])){
            if(in_array($query['lpp'], $lineperpage)){
                $lpp = $query['lpp'];
            }
        }
        $data['lpp'] = $qstring['lpp'] = $lpp;

        $page = 1;
        if(!empty($query['page'])){
            $page = $query['page'];
        }
        $qstring['page'] = $page;

        $countdata = DB::table('messages')
            ->count();
        $dbdata = DB::table('messages')
            ->orderBy('id', 'desc');


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

        return view('admin.adminmessage', $data);
    }

    public function adminsettings(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

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
            1 => 'New user successfully added.',
            2 => 'Successfully modified.',
            3 => 'Password modified.',
            4 => 'Status modified.',
        ];
        $data['notif'] = 0;
        if(!empty($_GET['n'])){
            $data['notif'] = $_GET['n'];
        }

        $data['province'] = $provincedb = DB::table('province')
            ->orderBy('province_name', 'asc')
            ->get()
            ->toArray();

        $data['selecteduser'] = $selecteduser = DB::table('main_users')
            ->leftjoin('main_users_details', 'main_users_details.userid', '=', 'main_users.id')
            ->where('main_users.id', $userinfo[0])
            ->first();

        $selectedprovince = DB::table('province')
            ->where('id', $selecteduser->province)
            ->first();

        $data['municipality'] = $selectedmunicipality = DB::table('municipality')
            ->where('province_id', $selectedprovince->id)
            ->orderBy('municipality_name', 'asc')
            ->get()
            ->toArray();

        return view('admin.components.adminsettings', $data);
    }

    public function adminsettings_edit_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        $lastemail = DB::table('main_users')
            ->where('id', $input['id'])
            ->select('email')
            ->first();

        if($lastemail->email != $input['email']){
            $checkemail = DB::table('main_users')
                ->where('email', $input['email'])
                ->count();
            if($checkemail == true){
                return redirect('/adminsettings?e=1');
                die();
            }
        }

        DB::table('main_users')
            ->where('id', $input['id'])
            ->update([
                'email' => $input['email'],
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('main_users_details')
            ->where('userid', $input['id'])
            ->update([
                'username' => $input['username'],
                'firstname' => $input['firstname'],
                'middlename' => !empty($input['middlename']) ? $input['middlename'] : '',
                'lastname' => $input['lastname'],
                'birthdate' => $input['birthdate'],
                'gender' => $input['gender'],
                'province' => $input['province'],
                'municipality' => $input['municipality'],
                'mobilenumber' => $input['mobilenumber'],
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Account Edited',
                'content' => "User modified his/her profile.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        $userdata = DB::table('main_users')
            ->leftjoin('main_users_details', 'main_users_details.userid', '=', 'main_users.id')
            ->where('main_users.id', $userinfo[0])
            ->first();

        $userkey = [
            $userdata->id, //0
            $userdata->accounttype, //1
            $userdata->email, //2
            $userdata->username, //3
            $userdata->firstname, //4
            $userdata->middlename, //5
            $userdata->lastname, //6
            $userdata->birthdate, //7
            $userdata->gender, //8
            $userdata->province, //9
            $userdata->municipality, //10
            $userdata->mobilenumber, //11
            date('ymdHis')
        ];

        $userid = encrypt(implode($userkey, ','));
        $request->session()->put('sessionkey', $userid);
        session(['sessionkey' => $userid]);

        return redirect('/adminsettings?n=2');
    }

    public function adminsettings_pass_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        if(strlen($input['password']) < 8){
            return redirect('/adminsettings?e=2');
            die();
        }

        if($input['password2'] != $input['password']){
            return redirect('/adminsettings?e=3');
            die();
        }

        DB::table('main_users')
            ->where('id', $input['id'])
            ->update([
                'password' => md5($input['password']),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Account Edited',
                'content' => "User modified his/her profile.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/adminsettings?n=3');
    }

    public function adminprofile(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('admin.components.adminprofile', $data);
    }
}
