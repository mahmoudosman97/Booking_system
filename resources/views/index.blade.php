@extends('layouts.main')

@section('content')
    
<div class="container my-5">

    <div class="card-body text-center">
        @if (session('message'))
    <div class="alert alert-success">
     {{ session('message') }}
     </div>
    @endif
    <div class="card-body text-center">
        @if (session('errormessage'))
    <div class="alert alert-success">
     {{ session('errormessage') }}
     </div>
    @endif

    <div class="row">
        @foreach ($departments as $department)
            
        <div class="col-md-4 text-center ">
            <div class="card mb-5">
                <img  src="images/{{$department->image}}" height="200" alt="">
                <h1 class="text-danger">{{$department->name}}</h1>
                <p>{{$department->description}}</p>

                <form action="{{ route('showAppointment', $department->id) }}" method="post">
                    @csrf
                    {{-- <input type="hidden" name="department_id " value="{{$department->id}}"> --}}
                    <button type="submit" class="btn btn-primary my-2">Show appointment</button>
                </form>
                
            </div><!-- card -->
        </div><!-- col-md-4 -->
        
        
        @endforeach

      
        
    </div><!-- row -->
</div><!-- container -->

@endsection