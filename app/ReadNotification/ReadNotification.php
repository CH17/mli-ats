<?php

namespace App\ReadNotification;


class ReadNotification
{
    public function read($notification_id)
    {
        $userUnreadNotification = auth()->user()
            ->unreadNotifications
            ->where('id', $notification_id)
            ->first();
        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }
    }
}
