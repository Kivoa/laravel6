<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\CheckAge;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;



//各类请求
// Route::get('bar', function () {
//     return 'Hello world1';
// });
// Route::post('/bsr', function () {
//     return 'This is a request from get or post';
// });
// Route::match(['get', 'post'], 'foo', function () {
//     return 'This is a request from get or post';
// });
// Route::any('zhang', function () {
//     return 'This is a request from any HTTP verb';
// });
// //路由参数
// Route::get('user1/{id}', function ($id) {
//     return 'User1 ' . $id;
// });
// Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
//     return $postId . '-' . $commentId;
// });
// Route::get('user/{name?}', function ($name = null) {
//     return $name;
// });

// Route::get('user/{name?}', function ($name = 'John') {
//     return $name;
// });
//添加正则约束
// Route::get('user/{name}', function ($name) {
//     // $name 必须是字母且不能为空
//     return $name;
// })->where('name', '[A-Za-z]+');

// Route::get('user/{id}', function ($id) {
//     // $id 必须是数字
//    return $id;
// })->where('id', '[0-9]+');

// Route::get('user/{id}/{name}', function ($id, $name) {
//     // 同时指定 id 和 name 的数据格式
//    return $id. '-' .$name;
  
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
//重命名 重定向
// Route::get('user/profile', function () {
//     // 通过路由名称生成 URL
//     return '重定向成功' ;
// })->name('profile');
// Route::get('user/name', function() {
//     // 通过路由名称进行重定向
//     return redirect()->route('profile');
// });

// Route::any('zhang', function () {
//     return 'This is a request from any HTTP verb'.$_GET['id'];
// });
// Route::get('user/{id}/profile', function ($id) {
//     // 通过路由名称生成 URL
//     return $id ;
// })->name('profile');
// Route::get('user/name', function() {
//     // 通过路由名称进行重定向
//     return redirect()->route('profile', ['id' => 1]);
// });

// Route::get('user/{id}/{post}/profile', function ($id, $post) {
//     // 通过路由名称生成 URL
//     return $id . '-' . $post ;
// })->name('profile');
// Route::get('user/name', function() {
//     // 通过路由名称进行重定向
//     return redirect()->route('profile', ['id' => 1,'post' => 'tian']);
// });
// Route::get('add/{a}/{b}', 'UserController@show');
// Route::get('age/{age}', 'AgeController@index')->middleware(\App\Http\Middleware\CheckAge::class);

// Route::get('use', 'UseController@use');
// Route::get('use1', 'UseController1@use1');

// Route::any('home', function () {
//     $people =[
//         '黎明',
//         '孔明',
//         '赵明',
//         '章明'
//     ];
//     return view('home',compact('people'));
        
// });

// Route::get('{number}', function ($number) {
 
//     return view('home'.$number);
        
// });
// Route::get('/', function () {
//     //return view('welcome');
//     $name = DB::connection() ;
//     echo $name;
// });
//Route::any('stu', 'StudentController@index');

// Route::get('/cache', function () {
//     return Cache::get('key');
// });

//重定向
//Route::redirect('/', '/bar');

//Route::get('/sss', function (Request $request) {
    //请求路径
    //return $request->path();
    //请求的url
    //return $request->url();
    //请求的带参数的全部url
    //return $request->fullUrl();
    //获取请求方法
    //return $request->method();
    //判断请求方法
    // if($request->isMethod('get')){ 
    //     dd (true) ;  //打印布尔值；
    // }
    //返回请求url以数组形式返回，url有？隔开，参数之间用&隔开
    //return $request->all();
    //url后？隔开，获取用户的参数输入
    //http://zhang.com/sss?name=11
    // return $request->input('name');  
    // return $request->input('name', '学院君');  //设置默认值  //11
    //以数组形式返回
    //return $request->input('products.*.name');  //有错
    //查询
    //return $request->query('name');
    //return $request->query('name', '学院君');
    //结果是关联数组形式
    //   http://zhang.com/sss?username=1&password=123&age=12
    //return $request->query();
    // return $request->only(['username', 'password']);
    // return $request->except(['username', 'password']);
    //只要参数名存在就为真，判断存在
    // if ($request->has(['username', 'password'])) {
    //     dd (true) ; 
    // }
    //判断存在，只有参数名存在且参数值也存在是才为真
    // if ($request->filled('username')) {
    //     dd (true) ; 
    // }
    //存到session中
    //return $request->flash();
    //return $request->flashOnly('username', 'age');
    //return $request->flashExcept('password');

    //return $request->cookie('name');


//});
//获取上次的数据
// Route::get('/sss1', function (Request $request) {
//     return $request->old();
//     return$request->old('username');
// });
//设置cookie
// Route::get('cookie/add', function () {
//     $minutes = 24 * 60;
//     return response('欢迎来到 Laravel 学院')->cookie('name1', '学院君1', $minutes);
// });
// Route::get('cookie/add', function () {
//     $minutes = 24 * 60;
//     //return response('欢迎来到 Laravel 学院')->cookie('name', '学院君', $minutes);
//     $cookie = cookie('name2', '学院君X', $minutes);
//     return response('欢迎来到 Laravel 学院')->cookie($cookie);
// });
//获取cookie，用request获取
// Route::get('cookie/get', function(Request $request) {
//     return $request->cookie('name');
    
// });
//用cookie门面获取
// Route::get('cookie/get', function() {
//     return Cookie::get('name2');
    
// });
//添加cookie到相应
// Route::get('response', function() {
//     Cookie::queue(Cookie::make('site', 'Laravel学院',1));
//     Cookie::queue('author', '学院君', 1);
//     return response('Hello Laravel', 200)
//         ->header('Content-Type', 'text/plain');
// });

// Route::get('dashboard', function () {    //出错？？？
//     return redirect('home/dashboard');
// });
//验证不通过，返回上一个请求的url             //出错？？？
// Route::post('user/profile', function () {    
//     // 验证请求...
//     return back()->withInput();
// });
//重定向到控制器
// Route::get('user', function () {    
//     return redirect()->action('StudentController@index');
// });
// Route::any('test', 'TestController@index');

// Route::get('greeting', function () {
//     return view('test', ['name' => '学院君']);
// });

// Route::get('hash', function (Request $request) {
//     //解密
//     $password1 = session('hashpassword');
//     $password2 = $request ->get('password');
//     //验证
//     if(Hash::check($password2, $password1)){  //放在session中的要放在后边
//             return '密码正确';
//     } else {
//         return '密码错误';
//     }  
// });







//论坛首页路由
Route::get('/','TeiziController@index');
//论坛帖子列表路由
Route::get('bankuai/{id}','TeiziController@bankuai')->name('profile');
//论坛帖子详情路由
Route::get('/list/{id}/{bid?}','TeiziController@list')->name('listbody');
//注册路由
Route::any('register','TeiziController@register');
//注册认证
Route::any('home','TeiziController@home')->middleware(\App\Http\Middleware\CheckRegister::class);
//登录路由
Route::any('login','TeiziController@login');
//登录认证
Route::any('back','TeiziController@back');
//注销登录
Route::get('layout','TeiziController@layout');

//控制未登录用户的权限
Route::middleware(['check.login'])->group(function () {
    //发帖路由
    Route::get('fatie/{id}','TeiziController@fatie');
    //发帖写入数据库路由
    Route::any('fatiedb/{id}','TeiziController@fatiedb');
    //发帖修改路由
    Route::get('faupdate/{id}/{bid?}','TeiziController@faupdate');
    //发帖修改数据库路由
    Route::any('faupdatedb/{id}/{bid?}','TeiziController@faupdatedb');
    //发帖删除数据库路由
    Route::any('fadeldb/{id}/{bid?}','TeiziController@fadeldb');

    //回帖路由
    Route::get('reply/{id}/{bid?}','TeiziController@reply');
    //回帖写入数据库路由
    Route::any('replydb/{id}/{bid?}','TeiziController@replydb');
    //回帖修改路由
    Route::get('reupdate/{id}/{bid?}','TeiziController@reupdate');
    //回帖修改数据库路由
    Route::any('reupdatedb/{id}/{bid?}','TeiziController@reupdatedb');
    //回帖删除数据库路由
    Route::delete('redeldb/{id}/{bid}','TeiziController@redeldb');
});