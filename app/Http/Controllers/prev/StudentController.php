<?php

namespace App\Http\Controllers;

use App\Student;
use App\Models\Name;
use App\Models\IdentityCard;     //使用模型，在控制器中使用模型，则要先引入
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        //save插入，更新
        // $stu = new Student;
        // $stu->name = 'wang';
        // $stu->age = '15';
        // $stu->save();
        //insert插入
        // Student::insert(
        //     [
        //         'name'=>'zhang','age'=>'25'
        //     ]
        // );
        //删除
        // Student::where('age','<', 10)->delete();
        // Student::destroy(51);
        //查找
        //return Student::find(6);
        //return Student::where('age','<', 20)->get();
        // Student::destroy(6);
        //判断是否被软删除
        // $stu = Student::find(7);
        // $stu->delete();
        // if ($stu->trashed()) {
        //     return '已经被软删除';
        // }
        //查询出被软删除的数据
        // $stu = Student::withTrashed()
        //     ->where('id', 6)
        //     ->get();
        // return $stu;
        //只取出被软删除的
        // $stu = Student::onlyTrashed()
        // ->where('age','>', 50)
        // ->get();
        // return $stu;
        //恢复被软删除的
        // Student::withTrashed()
        //     ->where('id', 6)
        //     ->restore();
        //永久删除
        // $stu = Student::find(8);
        // $stu->forceDelete();
        //查所有
        // $flights = Student::all();  //返回数组
        // foreach ($flights as $flight) {
        //     echo $flight->name;
        // }
        //查结果里的第一条，排序
        //return Student::where('age', 48)->orderBy('name', 'desc')->first();
        //查值
        //return Student::where('id', 6)->value('age');
        //分页
        //每页显示条数
        //return Student::paginate(15)->limit(1);
        //return Student::simplePaginate(15);
        //查索引数据
        //return Student::find(10);
        //return Student::find([10,12]);
        //查某字段值的数组
        //return Student::pluck('age');  
        //查行数
        //return Student::count();
        //查最大最小值
        // return Student::max('age');
        //return Student::min('age');
        //查平均和求和
        //return Student::avg('age');
        //return Student::sum('age');
        //更新
        //Student::where('id', 1)->update(['age' => 93]);
        // $stu = Student::find(1);
        // $stu ->name = '曹飞';
        // $stu->save();

        // Name::insert(
        //     [
        //         ['name'=>'王菲菲'],
        //         ['name'=>'李素'],
        //         ['name'=>'黄希']
        //     ]
        // );
        // IdentityCard::insert(
        //     [
        //         ['city'=>'北京','uesr_id'=>1],
        //         ['city'=>'南京','uesr_id'=>2],
        //         ['city'=>'上海','uesr_id'=>3]
        //     ]
        // );
        //一对一建表
        // $card = new IdentityCard(['city' => '广州']);
        // $name = Name::create([
        //     'name' => '赵雪'
        // ]);
        // $name ->identity_card()->save($card);
        //一对一删被关联表，有外键
        // $name = Name::find(1);
        // $name ->identity_card()->delete();
        //删主表
        // IdentityCard::find(3) ->name()->delete();
        //更新
        // $name = Name::find(2);
        // $name ->identity_card()->update(['city'=>'北京']);
        //查有外键的表
        //return Name::find(2)->identity_card;
        //查主表
        // return IdentityCard::find(2)->name;
        //视图 变量传递 with方法
        //$a = 123;
        //$b = 4567;
        //return view('zhang')->with('a',$a)->with('b',$b);
        //compact方法
        //return view('zhang',compact('a','b'));

        //时间
        //$time = time();
        //返回时间戳
        // return view('zhang',compact('time'));
        //一对多建表  不能自动更新时间
        // Article::insert(
        //     [
        //         ['title' => '文章一','content' => '内容一'],
        //         ['title' => '文章二','content' => '内容二'],
        //         ['title' => '文章三','content' => '内容三']
        //     ]
        // );
        // Comment::insert(
        //     [
        //         ['content' => '你好','article_id' => 1],
        //         ['content' => '内容很精彩','article_id' => 1],
        //         ['content' => '催更','article_id' => 2],
        //         ['content' => '快快更新','article_id' => 2],
        //         ['content' => '写得很详细','article_id' => 3],
        //         ['content' => '内容有错误','article_id' => 3]
        //     ]
        // );  
        //一对多增外键的表
        // $article = Article::find(1);
        // $article->comments()->create(['content'=>'上海在哪儿']);
        //一对多删被关联表，有外键
        // $article = Article::find(1);
        // $article ->comments()->delete();
        //更新
        // $comment = Comment::find(4);
        // $comment ->article()->update(['title'=>'广州在哪儿']);
        //查有外键的表
        //return Article::find(3)->comments;
        //查主表
        // return Comment::find(6)->article;
        
        //视图foreach循环
        // $stu = Student::all();
        // return view('chen',compact('stu'));
        // $store = 80;
        // return view('chen',compact('store'));

        //模板继承
        //return view('son');

        //dd相当于var_dump()
        //return dd(Student::get());

        //session(['zhang' => '123']);
        // $arr = [1,2,3];
        // return head($arr);
        
        //数组辅助函数
        // $array = [100, 200, 300];
        // $first = Arr::last($array, function ($value, $key) {
        //     return $value >= 150;
        // });
        // return $first;
        // $array = ['name' => 'Desk', 'price' => 100, 'orders' => 10];
        // return $slice = Arr::only($array, ['name', 'price']);
        
        // $array = [100, '200', 300, '400', 500];
        // return $filtered = Arr::where($array, function ($value, $key) {
        //     return is_string($value);
        // });

        //path辅助函数
         //return $path = app_path();
         //return $path1 = config_path();
         //return $path2 = public_path();
         //return $path = storage_path();

        //string辅助函数
        //return $class = class_basename('Foo\Bar\Baz');
        //返回当前环境
        //return App::environment();
        // 获取当前路由实例
        //return $route = Route::current();  有错？？
        // 获取当前路由名称
        //return Route::currentRouteName();
        // // 获取当前路由action属性
        //return $action = Route::currentRouteAction();
        //文件上传
        // if ($request->isMethod('POST')) { //判断是否是POST上传
    	// 	$fileCharater = $request->file('source');
    	// 	if ($request->hasFile('source') && $fileCharater->isValid()) { 
    	// 		//获取文件的扩展名 
    	// 		$ext = $fileCharater->extension();
    	// 		//获取文件的绝对路径
    	// 		$path = $fileCharater->path();
    	// 		//定义文件名
    	// 		$filename = date('Y-m-d-h-i-s').'.'.$ext;
    	// 		//存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
    	// 		Storage::disk('public')->put($filename, file_get_contents($path));
    	// 	}        
    	// }
    	// return view('form');
        //重定向到外部域名
        //return redirect()->away('https://xueyuanjun.com');

        // 获取不带请求字符串的当前 URL...
        //echo url()->current();
        // 获取包含请求字符串的当前 URL...
        //echo url()->full();
        // 获取上一个请求的完整 URL...
       // echo url()->previous();
        //url门面获取当前url
       //echo URL::current();

       
       //设置获取session
       //$request->session()->put('name', '张');
       //return $request->session()->get('name', 'chen');
       //返回所有session信息
       //return $request->session()->all();
       // 通过全局辅助函数 session
       //session(['key' => 'wang']);
       //删除session信息
       //$request->session()->pull('key', 'default');
       //$request->session()->forget('key');
       //判断是否存在某个指定的session并且不为空
       // if ($request->session()->has('key')) {
       //    return $request->session()->get('key', 'chen');
       // } else {
       //    return 'session为空le';
       // }
         
        //加密及解密
        // $encrypted = Crypt::encryptString('Hello world.');
        // return $encrypted;
        // return Crypt::decryptString($encrypted);
        
        //哈希 加密
        // $password = $request ->get('password');
        // $hashpassword = Hash::make($password);
        // //将加密后的放入session中
        // session(['hashpassword' => $hashpassword]);
        // return session('hashpassword');

        //集合
        //return $collection = collect([1, 2, 3]);
        //return collect([1, 2, 3])->all();
        //集合平均值
        //return $average = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->avg('foo');
        //return $average = collect([1, 1, 2, 4])->avg();
        //集合拆分
         $collection = collect([1, 2, 3, 4, 5, 6, 7,8]);
        // $chunks = $collection->chunk(4);
        // return $chunks->toArray();   //第二部分为什么变为了对象 ？？？？
        //追加到集合尾部
        //return $collection->concat(['Jane Doe'])->all();
        //判断是否包含
        //dd($collection->contains('Desk'));
        //判断总数
        //return $collection->count();
        // dd 方法会打印集合项并结束脚本执行
        // return $collection->dd();
        //dump 方法会打印集合项而不终止脚本执行
        //return $collection->dump();
        //除了，only只有 
        //return $collection->except([5,6,7])->all(); //集合中会保留最前一位数5
        //过滤
        // return $collection->filter(function ($value, $key) {
        //     return $value > 2;
        // })->all();
        // 返回集合的第一个元素
        // return $collection->first();
        //删除
        //return $collection->forget(6)->all();  //函数里边的参数必须为键
        //获取
        //return $collection->get(0);  //不存在返回空值，函数里边的参数必须为键
        //has 方法判断给定键是否在集合中存在
        //dd($collection->has(6));
        //implode 方法连接集合中的数据项
        //return $collection->implode('-');
        // 如果集合为空的话 isEmpty 方法返回 true；否则返回 false
        // dd($collection->isEmpty());
        //最大值
        //return $collection->max();
        //返回中位数  值的中位数
        //return $collection->median();
        //pull 方法通过键从集合中移除并返回数据项
        // $collection->pull(7);
        // return $collection->all();
        // put 方法在集合中设置给定键和值
        // $collection->put(8, 100);
        // return $collection->all();
        //取指定数目的数据项返回一个新的集合
        //return $collection->take(3)->all();

        //数组
        //返回数组中的第一个元素
        // $array = [100, 201, 300];
        // $first = Arr::first($array, function ($value, $key) {
        //     return $value >= 150;   //函数参数必须值在前，键在后
        // });
        // return $first;
        //获取数组中元素
        // $array = ['products' => ['desk' => ['price' => 100]]];
        // $price = Arr::get($array, 'products.desk.price');
        // return $price;
        //返回包含值的数组
        // $array = [
        //     ['developer' => ['id' => 1, 'name' => 'Taylor']],
        //     ['developer' => ['id' => 2, 'name' => 'Abigail']],
        // ];
        // $names = Arr::pluck($array, 'developer.name');
        // return $names;
        //返回数组中第一个
        // $array = [100, 200, 300];
        // return head($array);
        //代替哈希加密
        //return bcrypt('password');
        //当前时间
        //return now();
        //重定向到指定路由
        //return redirect('bar');
        //return today();
        //返回给定的值
        // $callback = function ($value) {
        //     return (is_numeric($value)) ? $value * 2 : 0;
        // }; 
        // return  with(5, $callback);
        return  with(5, null);











    }
}
