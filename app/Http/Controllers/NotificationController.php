<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(User $user, UserService $service) {

        $service->unsubscribeFromNotifications($user);

        return view('member.emails.unsubscribe');
    }
}
