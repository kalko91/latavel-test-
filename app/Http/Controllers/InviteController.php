<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InviteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        \Cookie::queue('invite_token', $request->input('tg'));
        \Cookie::queue('telegram_id', $request->input('telegram_id'));
        
        return redirect()->route('register');
    }

    public function joinGroup( Request $request)
    {
        $telegram_id = $request->input('telegram_id');
        \DB::table('users')
            ->where('telegram_id', $telegram_id)
            ->update(['invited_group' => 1]);
        return redirect()->route('home');
    }

    public function leftGroup( Request $request)
    {
        $telegram_id = $request->input('telegram_id');
        \DB::table('users')
            ->where('telegram_id', $telegram_id)
            ->update(['invited_group' => 0]);
        return redirect()->route('home');
        
    }
}
