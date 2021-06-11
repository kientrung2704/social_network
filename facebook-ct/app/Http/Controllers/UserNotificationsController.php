<?php

namespace App\Http\Controllers;

class UserNotificationsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;
        return response()->json([$unreadNotifications, 200]);
    }

    public function destroy()
    {
        $markAsRead = auth()->user()->unreadNotifications->markAsRead();
        return response()->json([$markAsRead, 204]);
    }
}