<?php

namespace App\Http\Controllers;
use App\User;
use App\NewSensorData;
use App\Sensors;
use App\MonitoredLocation;
use App\Category;
use App\Post;
use App\SensedItem;
use App\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $usercount = $user->count();
        //
        $records = NewSensorData::all();
        $recordscount = $records->count();
        //
        $sensor = Sensors::all();
        $sensorcount = $user->count();
        //
        $location = MonitoredLocation::all();
        $locationcount = $location->count();
        //
        $category = Category::all();
        $categorycount = $category->count();
        //
        $post = Post::all();
        $postcount = $post->count();
        //
        $senseditem = SensedItem::all();
        $sensedItemcount = $senseditem->count();
        //
        $comments = Comment::all();
        $commentcount = $comments->count();
        //charts

        $record = NewSensorData::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(Time) as day_name"), \DB::raw("DAY(Time) as day"))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
        $data = [];
        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
          }
        $data['chart_data'] = json_encode($data);
          ///
          ///


          toast('All data is updated','success');
        return view('Admin-lte.index', compact('usercount', 'recordscount', 'sensorcount', 'locationcount','data','categorycount','postcount','sensedItemcount','commentcount'));
    }
    public function index_reg()
    {
        return view('home');
    }
}
