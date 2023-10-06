<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function markAsRead(Request $request, $notificationId)
    {
        $notification = auth()->user()->notifications()->findOrFail($notificationId);

        if (!$notification->read_at) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }

}
