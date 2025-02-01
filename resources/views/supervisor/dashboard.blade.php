@extends('layouts.custom.app')
@section('title', 'Dashboard')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="card p-4 shadow-lg">
            <h4 class="text-center mb-4">Student Reports Overview</h4>
            <table class="table table-hover table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Student Name</th>
                        <th>Plan Form</th>
                        <th>Weekly Form</th>
                        <th>Final Form</th>
                        <th>Experience Form</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td class="fw-bold">{{ $student->name }}</td>

                        <!-- Plan Form -->
                        <td>
                            @if (!$student->planReport)
                                <button class="btn btn-secondary btn-sm" disabled>No Data <i class="fa-solid fa-eye-slash"></i></button>
                            @else
                                <span class="badge {{ $student->planReport->status == 1 ? 'bg-success' : 'bg-danger' }} mb-1">
                                    {{ $student->planReport->status == 1 ? 'Accepted' : 'Rejected' }}
                                </span>
                                <br>
                                <button class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#planReportModal{{ $student->id }}">
                                    See Details <i class="fa-solid fa-eye"></i>
                                </button>
                            @endif
                        </td>

                        <!-- Weekly Form -->
                        <td>
                            @if (!$student->weeklyReport)
                                <button class="btn btn-secondary btn-sm" disabled>No Data <i class="fa-solid fa-eye-slash"></i></button>
                            @else
                                <span class="badge {{ $student->weeklyReport->status == 1 ? 'bg-success' : 'bg-danger' }} mb-1">
                                    {{ $student->weeklyReport->status == 1 ? 'Accepted' : 'Rejected' }}
                                </span>
                                <br>
                                <button class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#weeklyReportModal{{ $student->id }}">
                                    See Details <i class="fa-solid fa-eye"></i>
                                </button>
                            @endif
                        </td>

                        <!-- Final Form -->
                        <td>
                            @if (!$student->finalReport)
                                <button class="btn btn-secondary btn-sm" disabled>No Data <i class="fa-solid fa-eye-slash"></i></button>
                            @else
                                <span class="badge {{ $student->finalReport->status == 1 ? 'bg-success' : 'bg-danger' }} mb-1">
                                    {{ $student->finalReport->status == 1 ? 'Accepted' : 'Rejected' }}
                                </span>
                                <br>
                                <button class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#finalReportModal{{ $student->id }}">
                                    See Details <i class="fa-solid fa-eye"></i>
                                </button>
                            @endif
                        </td>

                        <!-- Experience Form -->
                        <td>
                            @if (!$student->ratings)
                                <button class="btn btn-secondary btn-sm" disabled>No Data <i class="fa-solid fa-eye-slash"></i></button>
                            @else
                                <span class="badge {{ $student->ratings->status == 1 ? 'bg-success' : 'bg-danger' }} mb-1">
                                    {{ $student->ratings->status == 1 ? 'Accepted' : 'Rejected' }}
                                </span>
                                <br>
                                <button class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#experianceReportModal{{ $student->id }}">
                                    See Details <i class="fa-solid fa-eye"></i>
                                </button>
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
