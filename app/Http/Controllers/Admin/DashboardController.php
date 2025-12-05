<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $users = Patient::paginate(25);
        $appointments = Appointment::paginate(25);

        return view('vendor.backpack.ui.dashboard', [
            'users' => $users,
            'appointments' => $appointments,
        ]);
    }

    public function getListUser()
    {
        $users = User::paginate(25);

        return response()->json($users);
    }
}
