<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\LabTestReport;
use App\Models\Order;
use App\Models\OrderLabTestDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbaordController extends Controller
{
    public function dashbaord()
    {
        return view('frontend.profile.dashboard');
    }

    public function order_list()
    {
        $order_lists = OrderLabTestDetails::where('user_id', Auth::user()->id)->get();
        return view('frontend.profile.test_list', compact('order_lists'));
    }

    public function test_report_view($id)
    {
        $labTest = OrderLabTestDetails::where('id', $id)->first();
        $test_reports = LabTestReport::where('labtest_order_id', $labTest->id)->get();

        return view('frontend.profile.view_test_report', compact('test_reports'));
    }

    public function user_appointment_report()
    {
        $user_id = Auth::user()->id;
        $appointments = Appointment::where('user_id', $user_id)->get();
        return view('frontend.profile.appointment', compact('appointments'));

    }

}
