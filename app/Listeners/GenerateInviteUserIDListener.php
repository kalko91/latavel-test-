<?php

namespace App\Listeners;

use App\Events\UserCreatingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateInviteUserIDListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreatingEvent  $event
     * @return void
     */
    public function handle(UserCreatingEvent $event)
    {
        $user = $event->user;
        $value = \Cookie::get('invite_token');
        if($value){
            $u = \App\User::where('invite_token', $value)
            ->first();
            if($u){
                $user->invite_user_id = $u->id;
            }
            \Cookie::queue(\Cookie::forget('invite_token'));
        }
        
        
        //
    }
}
