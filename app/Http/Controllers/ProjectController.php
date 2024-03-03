<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
   
    public function index()
    {
        $departments = Department::all();
        return view('index' , compact('departments'));
    }

    
    public function booking(Request $request)
    {
       

        Booking::create([
                'user_name'=>auth()->user()->name,
                'user_id'=>auth()->user()->id,
                'appointment_id'=>$request->appointment_id,
                'department_name'=>$request->department_name,
                'appointment_date'=>$request->appointment_date,
        ]);

        Appointment::where('id',$request->appointment_id)->update(['taken'=>1]);

         return redirect('/')->with('message' , 'Appointment booked SuccessFully' );
    }

   
    public function myBookings(Request $request)
    {
        $bookings = Booking::where('user_id',Auth::user()->id)->get();
        return view('myBookings' , compact('bookings'));
    }

    
    public function showAppointment(Request $request ,$id )
    {
       $department = Department::find($id);
       $appointments= Appointment::where('department_id',$department->id)->get();
        return view('appointment' , compact('appointments'));
    }

    
    public function edit(string $id)
    {
        //
    }

   

    
    public function cancelBooking( Request $request)
    {
        
       Booking::where('id',$request->booking_id)->delete();
       Appointment::where('id',$request->appointment_id)->update(['taken'=>0]);
        return redirect('/')->with('message' , 'Appointment Deleted SuccessFully' );

    }
}
