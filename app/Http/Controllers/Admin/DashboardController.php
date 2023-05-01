<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $users = \App\Models\Patient::paginate(25);
        $appointments = \App\Models\Appointment::paginate(25);
        return view('vendor.backpack.base.dashboard', [
            'users' => $users,
            'appointments' => $appointments,
        ]);
    }

    public function getListUser()
    {
        $users = \App\Models\User::paginate(25);
        return response()->json($users);
    }
}
