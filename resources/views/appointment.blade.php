@extends('layouts\main')

@section('content')
    
<div class="container-lg"> 

     <h2 class="text-center mb-3 bg-dots-darker text-bold text-danger ">Appointments</h2>

  <table class="table">
     <thead>
      <tr>
        <th>#</th>
        <th>Department name</th>
        <th>Appointment date</th>
        <th>Status</th>
      </tr>
     </thead>
     <tbody>
        @foreach ($appointments as $appointment)
            
        <tr>
            <th>{{$appointment->id}}</th>
            <td>{{$appointment->department_name}}</td>
            <td>{{$appointment->appointment_date}}</td>
            @if ($appointment->taken)
                <td>You can't book this </td>
            @else
            <td>
                
                <form action="{{ route('booking') }}" method="post">
                    @csrf
                    <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                    <input type="hidden" name="department_name" value="{{$appointment->department_name}}">
                    <input type="hidden" name="appointment_date" value="{{$appointment->appointment_date}}">
                    <input type="hidden" name="taken" value="{{$appointment->taken}}">
                    <button type="submit" class="btn btn-primary">Book</button>
                </form>
            </td>
            @endif
            
        </tr>
        
        @endforeach
     
      </tbody>
   </table>

</div>
@endsection


