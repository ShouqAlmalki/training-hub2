@extends('layouts.custom.app')
@section('title', 'Dashboard')
@section('content')

<div class="container py-2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="line_box" style="margin: 40px 0;">

                <!-- Plan Form -->
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
                        <a href="{{ route('student.plan-form') }}" class="tvar tvar-default">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    @else
                        <a href="#" class="tvar 
                            @if ($planreport->status == 0) tvar-warning
                            @elseif ($planreport->status == 1) tvar-success
                            @elseif ($planreport->status == 2) tvar-danger
                            @endif" 
                            data-bs-toggle="modal" data-bs-target="#planReportModal">
                            <i class="fa-solid 
                                @if ($planreport->status == 0) fa-clock
                                @elseif ($planreport->status == 1) fa-check
                                @elseif ($planreport->status == 2) fa-xmark
                                @endif"></i>
                        </a>
                    @endif
                </div>

                <!-- Weekly Form -->
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

                <!-- Final Form -->
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
                        <a href="{{ route('student.final-form') }}" class="tvar tvar-default">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    @else
                        <a href="#" class="tvar 
                            @if ($finalreport->status == 0) tvar-warning
                            @elseif ($finalreport->status == 1) tvar-success
                            @elseif ($finalreport->status == 2) tvar-danger
                            @endif" 
                            data-bs-toggle="modal" data-bs-target="#finalReportModal">
                            <i class="fa-solid 
                                @if ($finalreport->status == 0) fa-clock
                                @elseif ($finalreport->status == 1) fa-check
                                @elseif ($finalreport->status == 2) fa-xmark
                                @endif"></i>
                        </a>
                    @endif
                </div>

                <!-- Experience Form -->
                <div class="text_circle done">
        <div class="circle">
           <h4>Experience Form</h4>
           @if ($user->planReport)
            @if ($user->planReport->training_type == 'online')
               <p>Your Trainig type is Online</p>
            @else
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
            @endif
            @else
            <p>Please finish your plan form first</p>
           @endif
        </div>
         @if ($user->planReport)
            @if ($user->planReport->training_type == 'online')
               <a href="" class="tvar tvar-waiting"><i class="fa-solid fa-smile"></i></a>
               @else
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
            @endif
         @else
            <a href="" class="tvar tvar-waiting"><i class="fa-solid fa-file"></i></a>
         @endif
     </div>

                <!-- Website Rating -->
                <div class="text_circle done">
                    <div class="circle">
                        <h4>Website Rating</h4>
                        <p>{{ !$websiterating ? 'Waiting For Your Submit' : 'Thanks for your opinion' }}</p>
                    </div>
                    
                    <a href="{{ !$websiterating ? route('student.website-rating') : '#' }}" class="tvar 
                        {{ !$websiterating ? 'tvar-default' : 'tvar-success' }}">
                        <i class="fa-solid {{ !$websiterating ? 'fa-pen' : 'fa-check' }}"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@include('student.model')

@endsection
