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

class PriestController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('axuadmin');
    }

    public function adminpriest(Request $request){
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
            1 => 'New priest successfully added.',
            2 => 'Priest successfully modified.',
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
            ['display' => 'Default', 'field' => 'priests.id'],
            ['display' => 'Email', 'field' => 'priests.email'],
            ['display' => 'First Name', 'field' => 'priests.firstname'],
            ['display' => 'Middle Name', 'field' => 'priests.middlename'],
            ['display' => 'Last Name', 'field' => 'priests.lastname'],
            ['display' => 'Age', 'field' => 'priests.birthdate'],
            ['display' => 'Position', 'field' => 'priests.position'],
            ['display' => 'Conventual', 'field' => 'priests.conventual'],
            ['display' => 'Status', 'field' => 'priests.status'],
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
        $countdata = DB::table('priests')
            ->count();
        $dbdata = DB::table('priests');

        if(!empty($keyword)){
            $countdata = DB::table('priests')
                ->where('email', 'like', "%$keyword%")
                ->orwhere('position', 'like', "%$keyword%")
                ->orwhere('conventual', 'like', "%$keyword%")
                ->orwhere('firstname', 'like', "%$keyword%")
                ->orwhere('middlename', 'like', "%$keyword%")
                ->orwhere('lastname', 'like', "%$keyword%")
                ->count();

            $dbdata->where('email', 'like', "%$keyword%");
            $dbdata->orwhere('position', 'like', "%$keyword%");
            $dbdata->orwhere('conventual', 'like', "%$keyword%");
            $dbdata->orwhere('firstname', 'like', "%$keyword%");
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

        return view('admin.adminpriest', $data);
    }

    public function adminpriest_add(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('admin.adminpriest_add', $data);
    }

    public function adminpriest_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        DB::table('priests')
            ->insert([
                'email' => $input['email'],
                'firstname' => $input['firstname'],
                'middlename' => $input['middlename'],
                'lastname' => $input['lastname'],
                'birthdate' => $input['birthdate'],
                'mobilenumber' => $input['mobilenumber'],
                'address' => !empty($input['address']) ? $input['address'] : '',
                'position' => $input['position'],
                'conventual' => $input['conventual'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Priest Added',
                'content' => "User created a new priest query.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminpriest?n=1');
    }

    public function adminpriest_edit(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        $data['selected'] = $selected = DB::table('priests')
            ->where('id', $query['id'])
            ->first();

        return view('admin.adminpriest_edit', $data);
    }

    public function adminpriest_edit_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $input = $request->input();

        DB::table('priests')
            ->where('id', $input['id'])
            ->update([
                'email' => $input['email'],
                'firstname' => $input['firstname'],
                'middlename' => $input['middlename'],
                'lastname' => $input['lastname'],
                'birthdate' => $input['birthdate'],
                'mobilenumber' => $input['mobilenumber'],
                'address' => $input['address'],
                'position' => $input['position'],
                'conventual' => $input['conventual'],
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Priest Info Edited',
                'content' => "User edited an existing priest query.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminpriest?n=2');
    }

    public function adminpriest_lock_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('priests')
            ->where('id', $query['id'])
            ->update([
                'status' => 'inactive',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Priest Locked',
                'content' => "User locked an existing priest query.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminpriest?n=4');
    }

    public function adminpriest_unlock_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('priests')
            ->where('id', $query['id'])
            ->update([
                'status' => 'active',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'Priest Unlocked',
                'content' => "User unlocked an existing priest query.",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/adminpriest?n=4');
    }
}
