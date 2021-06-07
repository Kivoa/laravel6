<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Bankuai;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Teizi;
use App\Teizireply;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class TeiziController extends Controller

{
    //首页
    public function index()
    {
        $data = Bankuai::where('fatherId', 0)->get('name');       
        for($i = 0; $i < count($data); $i++) {
            $sons = Bankuai::where('fatherId', ($i+1))->get();
            for ($j = 0; $j < count($sons); $j++) {             
                $son = Teizi::where('bankuai_id', $sons[$j]['id'])->get();              
                $count[] = count($son); 

                $fa = DB::table('teizis')
                    ->select('teizis.id','teizis.title','users.name','teizis.updated_at')
                    ->leftJoin('users', 'teizis.user_id', '=', 'users.id')
                    ->where('teizis.bankuai_id', $sons[$j]['id'])
                    ->orderBy('teizis.updated_at', 'desc')
                    ->first();
                $falast[] = $fa;

                $re = DB::table('teizireplies')
                    ->select('teizireplies.id','users.name','teizireplies.updated_at')
                    ->leftJoin('users', 'teizireplies.user_id', '=', 'users.id')
                    ->where('teizireplies.teizi_id', $fa -> id)
                    ->orderBy('teizireplies.updated_at', 'desc')
                    ->first();
                $relast[] = $re;
            }     
            $datas[] = ['father' => $data[$i],'son' => $sons,'count' => $count,'falast' => $falast,'relast' => $relast]; 
            $count =  [] ;
            $falast =  [] ;
            $relast =  [] ;         
        }

        return view('index',compact('datas'));

    }

    //注册
    public function register()
    {
        return view('register');
    }

    //注册认证
    public function home(Request $request)
    {
        //向数据库中写入用户信息
        $model = new User();
        $model->add($request);
        return redirect('login');
    }

    //登录
    public function login()
    {
        return view('login');
    }

    //登录认证
    public function back(Request $request)
    {         
        $user = User::where('name', $request->uName)->first();
        if ($request->uName == $user['name'] && md5($request->uPass) == $user['password']) 
        {
            session(['user' => $user]);
            return redirect('/');
        }
        return view('faillogin');
    }

    //退出登录
    public function layout(Request $request)
    {
        $request->session()->forget('user');
        return view('login');
    }

    //帖子列表
    public function bankuai(Request $request, $id)
    {    
        $banKuaiName = Bankuai::where('id', $id)->value('name');
        $teiZiName = DB::table('teizis')
            ->select('teizis.id', 'teizis.title','users.name')
            ->leftJoin('users', 'teizis.user_id', '=', 'users.id')
            ->where('teizis.bankuai_id', $id)
            ->orderBy('teizis.updated_at', 'desc')
            ->paginate(20);

        foreach($teiZiName as $data) {
            $tid = $data -> id;
            $son = Teizireply::where('teizi_id', $tid)->get();
            $count[] = count($son);
        }
   
        return view('teizi',compact('banKuaiName','teiZiName','id','count'));
    }
   
    //帖子详情
    public function list(Request $request, $id, $bid = '')
    { 
        $banKuaiName = Bankuai::where('id', $bid)->value('name');
        $teiZiName = Teizi::where('id', $id)->value('title');
       
        $user = DB::table('teizis')
            ->select('teizis.id', 'teizis.title', 'teizis.content','teizis.created_at','teizis.updated_at','users.id as userId','users.name','users.face','users.register_time')
            ->leftJoin('users', 'teizis.user_id', '=', 'users.id')
            ->where('teizis.id', $id)
            ->get();
       
        $replyuser = DB::table('teizireplies')
            ->select('teizireplies.id', 'teizireplies.content', 'teizireplies.created_at','teizireplies.updated_at','users.id as reuserId','users.name','users.face','users.register_time')
            ->leftJoin('users', 'teizireplies.user_id', '=', 'users.id')
            ->where('teizireplies.teizi_id', $id)
            ->orderBy('teizireplies.updated_at', 'desc')
            ->paginate(19);

        $reply = Teizireply::where('teizi_id', $id)->get();
        $count = count($reply);

        return view('list',compact('banKuaiName','user','teiZiName','id','bid','replyuser','count'));
    }

    //发帖
    public function fatie(Request $request, $id)
    {         
        $banKuaiName = Bankuai::where('id', $id)->value('name');
        return view('fatie',compact('id','banKuaiName'));
    }

    //发帖填入数据
    public function fatiedb(Request $request, $id)
    {      
        $teizi = new Teizi;
        $teizi->title = $request->title;
        $teizi->content = $request->content;
        $teiziuser = User::where('id', session('user.id'))->value('id'); 
        $teizi->user_id = $teiziuser;
        $teizi->bankuai_id = $id;
        $teizi->save(); 
 
        $banKuaiName = Bankuai::where('id', $id)->value('name');
        $teiZiName = Teizi::where('bankuai_id', $id)->get();
        return redirect()->route('profile', ['id' => $id]);

    }

    //发帖修改
    public function faupdate(Request $request, $id , $bid = '')
    {        
        $banKuaiName = Bankuai::where('id', $bid)->value('name'); 
        $content = Teizi::where('id', $id)->get();
        return view('faupdate',compact('id','banKuaiName','bid','content'));   
    }

    //发帖修改数据
    public function faupdatedb(Request $request, $id , $bid = '')
    {    
        DB::table('teizis')
            ->where('id', $id)
            ->update(
                [
                    'title' => $request->title,
                    'content' => $request->content,
                    'updated_at' => now()
                ]);

         return redirect()->route('listbody',['id' => $id,'bid' => $bid]);
    }

    //发帖删除数据
    public function fadeldb(Request $request, $id , $bid = '')
    {      
        $td = DB::table('teizireplies')
            ->select('teizireplies.id')
            ->leftJoin('teizis', 'teizireplies.teizi_id', '=', 'teizis.id')
            ->where('teizis.id', $id)
            ->get(); 
      
        //删除帖子时，先删除所有回复，再删除发帖
        if(!empty($td)) {          
            DB::table('teizireplies')->where('teizi_id', $id)->delete();
            DB::table('teizis')->where('id', $id)->delete();    
        }
        return redirect()->route('profile',['id' => $bid]);
    }

    //回帖
    public function reply(Request $request, $id, $bid = '')
    {            
        $banKuaiName = Bankuai::where('id', $bid)->value('name');   
        return view('reply',compact('id','banKuaiName','bid'));
    }

    //回帖填入数据
    public function replydb(Request $request, $id, $bid = '')
    {   
        $reply = new Teizireply;
        $reply->content = $request->content;     
        $reply->teizi_id = $id;     
        $reply->user_id = session('user.id');
        $reply->save(); 
 
        $banKuaiName = Bankuai::where('id', $bid)->value('name');  
        $teiZiName = Teizi::where('bankuai_id', $id)->get();
        return redirect()->route('listbody', ['id' => $id,'bid' => $bid]);  
      
    }
    
    //回帖修改
    public function reupdate(Request $request, $id , $bid = '')
    {         
        $banKuaiName = Bankuai::where('id', $bid)->value('name');
        $content = Teizireply::where('id', $id)->value('content');    
        return view('reupdate',compact('id','banKuaiName','bid','content'));
    }

    //回帖修改数据
    public function reupdatedb(Request $request, $id , $bid = '')
    {    
        DB::table('teizireplies')
            ->where('id', $id)   
            ->update(['content' => $request->content,'updated_at' => now()]);
           
        $td = DB::table('teizireplies')
            ->select('teizis.id')
            ->leftJoin('teizis', 'teizireplies.teizi_id', '=', 'teizis.id')
            ->where('teizireplies.id', $id)
            ->get();
     
        return redirect()->route('listbody', ['id' => ($td[0]-> id),'bid' => $bid]);
    }

    //回帖删除数据
    public function redeldb(Request $request, $id , $bid = '')
    {    

        $td = DB::table('teizireplies')
            ->select('teizis.id')
            ->leftJoin('teizis', 'teizireplies.teizi_id', '=', 'teizis.id')
            ->where('teizireplies.id', $id)
            ->get();  
 
        DB::table('teizireplies')->where('id', $id)->delete(); 
     
        return redirect()->route('listbody', ['id' => ($td[0]-> id),'bid' => $bid]);
    }


}
