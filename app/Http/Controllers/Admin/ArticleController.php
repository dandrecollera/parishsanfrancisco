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

class ArticleController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('axuadmin');
    }

    public function adminarticle(Request $request){
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
            1 => 'New article added.',
            2 => 'Article successfully modified.',
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
            ['display' => 'Default', 'field' => 'articles.id'],
            ['display' => 'Title', 'field' => 'articles.title'],
            ['display' => 'Content', 'field' => 'articles.content'],
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
        $countdata = DB::table('articles')
            ->count();
        $dbdata = DB::table('articles');

        if(!empty($keyword)){
            $countdata = DB::table('articles')
                ->where('title', 'like', "%$keyword%")
                ->orwhere('content', 'like', "%$keyword%")
                ->count();

            $dbdata->where('title', 'like', "%$keyword%");
            $dbdata->orwhere('content', 'like', "%$keyword%");
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

        return view('admin.adminarticle', $data);
    }

    public function adminarticle_add(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        return view('admin.adminarticle_add', $data);
    }

    public function adminarticle_add_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');

        $input = $request->input();

        // dd($input);
        DB::table('articles')
            ->insert([
                "userid" => $userinfo[0],
                "title" => $input['title'],
                "content" => $input['content'],
                "image" => $this->fileProcess($request->file('image')),
                "status" => 'active',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'User Added a new Article',
                'content' => $userinfo[4] . " Added a new article",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect("/adminarticle?n=1");
    }

    public function fileProcess($input){
        $photo = 'blank.jpg';

        $now = Carbon::now();
        $formattedNow = $now->format('Ymd_His');

        $baseDestinationPath = 'public/articles';

        $image = $input;
        $extension = $image->getClientOriginalExtension();
        $filename = $formattedNow . '.' . $extension;
        $path = $image->storeAs($baseDestinationPath, $filename);
        $photo = $filename;

        return $photo;
    }

    public function adminarticle_lock_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('articles')
            ->where('id', $query['id'])
            ->update([
                'status' => 'inactive',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'User disabled an article',
                'content' => $userinfo[4] . " disabled an article",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/adminarticle?n=2');
    }

    public function adminarticle_unlock_process(Request $request){
        $data = array();
        $data['userinfo'] = $userinfo = $request->get('userinfo');
        $query = $request->query();

        DB::table('articles')
            ->where('id', $query['id'])
            ->update([
                'status' => 'active',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        DB::table('systemlog')
            ->insert([
                'userid' => $userinfo[0],
                'title' => 'User activate an article',
                'content' => $userinfo[4] . " activate an article",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/adminarticle?n=2');
    }
}
