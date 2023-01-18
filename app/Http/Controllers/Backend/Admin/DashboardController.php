<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Hospital;
use App\Models\Appointment;
use App\Models\AppointmentReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function appointment_list()
    {
        if (Auth::guard('admin')->user()->Is_admin == 1) {
            $appointments = Appointment::get();
        }
        else {
            $login_id = Auth::guard('admin')->user()->id;
        $hospital = Hospital::where('admin_id', $login_id)->first();
         $appointments = Appointment::where('hospital_id', $hospital->id)->with('user')->get();
        }

         return view('admin.appointment.index', compact('appointments'));
    }

    public function appointment_status($id)
    {
        $appointment = Appointment::where('id', $id)->first();
        if($appointment->status == 0){
            Appointment::find($appointment->id)->update([
                'status'=>1
            ]);

            return back()->with('success', 'Change Status');
        }
    }




}
