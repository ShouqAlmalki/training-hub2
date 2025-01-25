@extends('layouts.custom.app')
@section('title', 'Dashboard')
@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
      <div class="card">
        <div class="line_box" style="margin: 40px 0 40px 0;">
          <div class="text_circle done">
             <div class="circle">
                <h4>Plan Form</h4>
                @if(!$planreport)
                  <p>Waiting for your submission</p>
                  @else
                     @if ($planreport->status == 0)
                        <p>Submitted and waiting for approval</p>
                     @elseif ($planreport->status == 1)
                        <p>Approved</p>
                     @elseif ($planreport->status == 2)
                        <p>Rejected</p>
                     @endif
                  @endif
             </div>
               @if(!$planreport)
                  <a href="{{ route('student.plan-form') }}" class="tvar tvar-default"><i class="fa-solid fa-pen"></i></a>
               @else
                  @if ($planreport->status == 0)
                  <a href="" class="tvar tvar-warning"><i class="fa-solid fa-clock"></i></a>
                  @elseif ($planreport->status == 1)
                  <a href="" class="tvar tvar-success"><i class="fa-solid fa-check"></i></a>
                  @elseif ($planreport->status == 2)
                  <a href="" class="tvar tvar-danger"><i class="fa-solid fa-xmark"></i></a>
                  @endif
               @endif
          </div>
          <div class="text_circle done">
            <div class="circle">
               <h4>Weekly Form</h4>
               @if(!$weeklyreport)
                  <p>Waiting for your submission</p>
                  @else
                     @if ($weeklyreport->status == 0)
                        <p>Submitted and waiting for approval</p>
                     @elseif ($weeklyreport->status == 1)
                        <p>Approved</p>
                     @elseif ($weeklyreport->status == 2)
                        <p>Rejected</p>
                     @endif
                  @endif
            </div>
            @if(!$weeklyreport)
               <a href="{{ route('student.weekly-form') }}" class="tvar tvar-default"><i class="fa-solid fa-pen"></i></a>
               @else
                  @if ($weeklyreport->status == 0)
                  <a href="{{ route('student.weekly-form') }}" class="tvar tvar-warning"><i class="fa-solid fa-clock"></i></a>
                  @elseif ($weeklyreport->status == 1)
                  <a href="" class="tvar tvar-success"><i class="fa-solid fa-check"></i></a>
                  @elseif ($weeklyreport->status == 2)
                  <a href="" class="tvar tvar-danger"><i class="fa-solid fa-xmark"></i></a>
                  @endif
               @endif
         </div>
         <div class="text_circle done">
          <div class="circle">
             <h4>Final Form</h4>
             @if(!$finalreport)
                  <p>Waiting for your submission</p>
                  @else
                     @if ($finalreport->status == 0)
                        <p>Submitted and waiting for approval</p>
                     @elseif ($finalreport->status == 1)
                        <p>Approved</p>
                     @elseif ($finalreport->status == 2)
                        <p>Rejected</p>
                     @endif
                  @endif
          </div>
          @if(!$finalreport)
               <a href="{{ route('student.final-form') }}" class="tvar tvar-default"><i class="fa-solid fa-pen"></i></a>
               @else
                  @if ($finalreport->status == 0)
                  <a href="" class="tvar tvar-warning"><i class="fa-solid fa-clock"></i></a>
                  @elseif ($finalreport->status == 1)
                  <a href="" class="tvar tvar-success"><i class="fa-solid fa-check"></i></a>
                  @elseif ($finalreport->status == 2)
                  <a href="" class="tvar tvar-danger"><i class="fa-solid fa-xmark"></i></a>
                  @endif
               @endif
       </div>
       <div class="text_circle done">
        <div class="circle">
           <h4>Experience Form</h4>
           @if ($user->planReport)
            @if (!$rating)
               <p>Waiting For Your Submit</p>
            @else
               @if ($rating->status == 0)
                  <p>Submitted and waiting for approval</p>
               @elseif ($rating->status == 1)
                  <p>Approved</p>
               @elseif ($rating->status == 2)
                  <p>Rejected</p>
               @endif
            @endif
            @else
            <p>Please finish your plan form first</p>
           @endif
        </div>
         @if ($user->planReport)
               @if (!$rating)
                  <a href="{{ route('student.experiance-form') }}" class="tvar tvar-default"><i class="fa-solid fa-pen"></i></a>
               @else
                  @if ($rating->status == 0)
                  <a href="" class="tvar tvar-warning"><i class="fa-solid fa-clock"></i></a>
                  @elseif ($rating->status == 1)
                  <a href="" class="tvar tvar-success"><i class="fa-solid fa-check"></i></a>
                  @elseif ($rating->status == 2)
                  <a href="" class="tvar tvar-danger"><i class="fa-solid fa-xmark"></i></a>
                  @endif
               @endif
         @else
            <a href="" class="tvar tvar-waiting"><i class="fa-solid fa-file"></i></a>
         @endif
     </div>
      <div class="text_circle done">
        <div class="circle">
          <h4>Website Rating</h4>
          @if (!$websiterating)
            <p>Waiting For Your Submit</p>
            @else
            <p>Thanks for your opinion</p>
          @endif
        </div>
         @if (!$websiterating)
            <a href="{{ route('student.website-rating') }}" class="tvar tvar-default"><i class="fa-solid fa-pen"></i></a>
         @else
            <a href="" class="tvar tvar-success"><i class="fa-solid fa-check"></i></a>
         @endif
    </div>
       </div>
      </div>
  </div>
  </div>
@endsection