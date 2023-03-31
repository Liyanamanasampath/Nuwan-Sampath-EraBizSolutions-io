<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
class ManageAppointmentController extends Controller
{
    public function checkAvailability(Request $request) {


        $requestParams = $request->all();
        $appointments = Appointment::where('doctor_id', $requestParams['doctor'])
            ->where('date', $requestParams['date']);
        if(isset($requestParams['time']) && array_key_exists('time',$requestParams)){
            $appointments =$appointments->where('time', '$time');
        }
        $appointments =$appointments->first();

        if (!$appointments) {
            $createArray = [
                'patient_name' => $requestParams['patientName'],
                'doctor_id' => $requestParams['doctor'],
                'date' => $requestParams['date'],
                'time' => $requestParams['time'],
                ];
            Appointment::create($createArray);
            return response()->json(true);
        } else {
            return response()->json(false);
        }

    }
}
