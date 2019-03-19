<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;

class NotificationsController extends Controller
{
    /**
     * 
     */
    public function destroy($user_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        $user->unreadNotifications->map(function($n) use($request) {
            if($n->id == $request->get('notification_uuid')){
                $n->markAsRead();
            }
        });

        return back();
    }

}
