<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use Illuminate\Support\Facades\Auth;
use App\Income;
use App\Expense;
use App\Account;
use App\Subcategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      if (auth()->user()) {
        //dd('select * from incomes where account_id=' . auth()->user()->account->id . ' union all select * from expenses where account_id='. auth()->user()->account->id .' order by created_at desc limit 5; ');
        $accounts=Account::where('user_id','=', auth()->user()->id)->first();
        if (!$accounts) {
          $accounts=new  Account;
          $accounts->user_id=auth()->user()->id;
          $accounts->save();
        }
        if ($inDB=Income::where('account_id', auth()->user()->account->id  )->get()) {
          // code...
          $in=$inDB->sum('total');

        }
        if ($outDB=Expense::where('account_id', auth()->user()->account->id  )->get()) {
          // code...
          $out=$outDB->sum('total');
        }
        $totalsCharts = DB::select('select count(Ex.subcategory_id) as records, Sub.name as name, sum(Ex.total) as total FROM expenses Ex,  subcategories Sub  where account_id='. auth()->user()->account->id . '  and Ex.subcategory_id=Sub.id group by subcategory_id order by total asc limit 10;' );

        $chartSubData = DB::select('select Su.name, count(Ex.subcategory_id) as total from expenses Ex, subcategories Su where Ex.deleted_at is null and Ex.subcategory_id=Su.id and Ex.account_id='. auth()->user()->account->id . '  group by (Ex.subcategory_id);'  );

        //$data=DB::select('select * from incomes where account_id=' . auth()->user()->account->id . ' union all select * from expenses where account_id='. auth()->user()->account->id .' order by created_at desc limit 5; ');
        $data=Expense::where('account_id', '=' ,auth()->user()->account->id )->orderBy('id', 'desc')->skip(0)->take(5)->get();
        //dd($data->first);
      }
      else {
        // query que une tabla de ingresos y egresos
        //$data=DB::select('select * from incomes union all select * from expenses order by created_at desc limit 5; ');
        $data=Expense::where('id', '>' ,0 )->orderBy('id', 'desc')->skip(0)->take(5)->get();
        $in=2900;
        $out=1350 * -1;
        $totalsCharts = DB::select('select count(Ex.subcategory_id) as records, Sub.name as name, sum(Ex.total) as total FROM expenses Ex,  subcategories Sub  where Ex.subcategory_id=Sub.id group by subcategory_id  order by total asc limit 10;' );

        $chartSubData = DB::select('select Su.name, count(Ex.subcategory_id) as total from expenses Ex, subcategories Su where Ex.deleted_at is null and Ex.subcategory_id=Su.id group by (Ex.subcategory_id);');
      }
      //seccion para la informacion de los graficoss
      //seleciona los registros agrupando y contando por categoriass
      $subcategory= DB::selectOne('select * from subcategories where id=9');
      //dd($chartSubData);
      return view('test', ['data'=>$data, 'in'=>$in, 'out'=>$out, 'chartSubData'=>$chartSubData, 'totalsCharts'=>$totalsCharts]);
    }
}
