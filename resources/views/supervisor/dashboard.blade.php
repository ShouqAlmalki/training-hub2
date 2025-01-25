@extends('layouts.custom.app')
@section('title', 'Dashboard')
@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
      <div class="card p-5">
        <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Plan Form</th>
                <th>Weekly Form</th>
                <th>Final Form</th>
                <th>Experiance Form</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>
                        @if (!$student->planReport)
                            <a href="#" class="btn btn-default btn-block">No Data <i class="fa-solid fa-eye-slash"></i></a>
                        @else
                            @if ($student->planReport->status == 1)
                                <span class="badge text-bg-success mb-1">Accepted</span>
                            @elseif($student->planReport->status == 2)
                                <span class="badge text-bg-danger mb-1">Rejected</span>
                            @endif
                            <br>
                            <button class="btn btn-info btn-block" data-bs-toggle="modal" data-bs-target="#planReportModal{{ $student->id }}">See Details <i class="fa-solid fa-eye"></i></button>
                        @endif
                    </td>
                    <td>
                        @if (!$student->weeklyReport)
                            <a href="#" class="btn btn-default btn-block">No Data <i class="fa-solid fa-eye-slash"></i></a>
                        @else
                            @if ($student->weeklyReport->status == 1)
                                <span class="badge text-bg-success mb-1">Accepted</span>
                                @elseif($student->weeklyReport->status == 2)
                                <span class="badge text-bg-danger mb-1">Rejected</span>
                            @endif
                            <br>
                            <button class="btn btn-info btn-block" data-bs-toggle="modal" data-bs-target="#weeklyReportModal{{ $student->id }}">See Details <i class="fa-solid fa-eye"></i></button>
                        @endif
                    </td>
                    <td>
                        @if (!$student->finalReport)
                            <a href="#" class="btn btn-default btn-block">No Data <i class="fa-solid fa-eye-slash"></i></a>
                        @else
                        @if ($student->finalReport->status == 1)
                            <span class="badge text-bg-success mb-1">Accepted</span>
                            @elseif($student->finalReport->status == 2)
                            <span class="badge text-bg-danger mb-1">Rejected</span>
                        @endif
                        <br>
                        <button class="btn btn-info btn-block" data-bs-toggle="modal" data-bs-target="#finalReportModal{{ $student->id }}">See Details <i class="fa-solid fa-eye"></i></button>
                        @endif
                    </td>
                    <td>
                        @if (!$student->ratings)
                            <a href="#" class="btn btn-default btn-block">No Data <i class="fa-solid fa-eye-slash"></i></a>
                            @else
                                @if ($student->ratings->status == 1)
                                <span class="badge text-bg-success mb-1">Accepted</span>
                                @elseif($student->ratings->status == 2)
                                <span class="badge text-bg-danger mb-1">Rejected</span>
                            @endif
                        <br>
                        <button class="btn btn-info btn-block" data-bs-toggle="modal" data-bs-target="#experianceReportModal{{ $student->id }}">See Details <i class="fa-solid fa-eye"></i></button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
      </div>
  </div>
  </div>
  @include('supervisor.models')
@endsection