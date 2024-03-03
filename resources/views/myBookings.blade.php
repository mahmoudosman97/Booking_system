@extends('layouts\main')

@section('content')
    
<div class="container-lg"> 

     <h2 class="text-center mb-3 bg-dots-darker text-bold text-danger ">My Bookings</h2>

  <table class="table">
     <thead>
      <tr>
        <th>#</th>
        <th>User name </th>
        <th>Appointment id</th>
        <th>Department Name</th>
        <th>Appointment Date</th>
        <th>Want to Cancel?</th>
      </tr>
     </thead>
     <tbody>
        @foreach ($bookings as $booking)
            
        <tr>
            <td>{{$booking->id}}</td>
            <td>{{$booking->user_name}}</td>
            <td>{{$booking->appointment_id}}</td>
            <td>{{$booking->department_name}}</td>
            <td>{{$booking->appointment_date}}</td>
            <td>
               <form action="{{ route('cancelBooking',) }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="booking_id" value="{{$booking->id}}">
                  <input type="hidden" name="appointment_id" value="{{$booking->appointment_id}}"> 
                  <button type="submit" class="btn btn-danger">Cancel </button>
               </form>
            </td>
           
            
        </tr>
        
        @endforeach
     
      </tbody>
   </table>

</div>
@endsection


