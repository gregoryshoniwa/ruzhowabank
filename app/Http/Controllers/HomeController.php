<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $nowsub30 = date('Y-m-d', strtotime('-30 days'));

        $withdrawal = DB::table('transactions')->where([
            ['ruzhowa_id','=',$user->ruzhowa_id],
            ['description','=','Withdrawal'],
            ['created_at' , '>', $nowsub30],
        ])->sum('amount');

        $deposit = DB::table('transactions')->where([
            ['ruzhowa_id','=',$user->ruzhowa_id],
            ['description','like','Deposited into savings'],
            ['created_at' , '>', $nowsub30],
        ])->sum('amount');

        return view('home')->with([
            'withdrawal' => $withdrawal,
            'deposit' => $deposit
        ]);

    }

    public function invest()
    {
        //queries
        $user = Auth::user();

        $nowsub30 = date('Y-m-d', strtotime('-30 days'));

        $activities = DB::table('transactions')->where('ruzhowa_id','=',$user->ruzhowa_id)->orderBy('created_at', 'desc')->limit(4)->get();

        $deposit = DB::table('transactions')->where([
            ['ruzhowa_id','=',$user->ruzhowa_id],
            ['description','=','Deposited into savings'],
            ['created_at' , '>', $nowsub30],
        ])->sum('amount');

        $total_deposits = DB::table('transactions')->where([
            ['ruzhowa_id','=',$user->ruzhowa_id],
            ['description','=','Deposited into savings'],
        ])->sum('amount');

        $total_withdrawals = DB::table('transactions')->where([
            ['ruzhowa_id','=',$user->ruzhowa_id],
            ['description','=','Withdrawal'],
        ])->sum('amount');

        $current_balance = $total_deposits - $total_withdrawals;


        return view('invest')->with([
            'activities' => $activities,
            'user' => $user,
            'current_balance' => $current_balance,
            'deposit' => $deposit
        ]); 
    }

    public function past()
    {
        $user = Auth::user();

        $activities = DB::table('transactions')->where('ruzhowa_id','=', $user->ruzhowa_id)->orderBy('created_at', 'desc')->get();

        $total_deposits = DB::table('transactions')->where([
            ['ruzhowa_id','=',$user->ruzhowa_id],
            ['description','=','Deposited into savings'],
        ])->sum('amount');

        $total_withdrawals = DB::table('transactions')->where([
            ['ruzhowa_id','=',$user->ruzhowa_id],
            ['description','=','Withdrawal'],
        ])->sum('amount');

        return view('past')->with([
            'activities' => $activities,
            'user' => $user,
            'total_deposits' => $total_deposits,
            'total_withdrawals' => $total_withdrawals,

        ]);
    } 

    public function profile()
    {
        return view('profile');
    }



}
