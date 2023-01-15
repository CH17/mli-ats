<?php

namespace App\Http\Controllers;

use App\Project;
use App\ReadNotification\ReadNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->q;

        $data['filter'] = $filter;

        $query = auth()->user()->notifications();      

        if (!empty($filter)) {
            $query->where('activity_id', 'LIKE', '%' . $filter . '%');           
        }

        $notifications = $query->paginate(20);

        $data['notification_lists'] = $notifications;

        return view('backend/notification/index', $data);        
    }

    public function read(Request $request)
    {
        if (!empty($request->notification_id)) {
            $read_notification = new ReadNotification();
            $read_notification->read($request->notification_id);
        }

        return response()->json(['success' => true]);
    }
}
