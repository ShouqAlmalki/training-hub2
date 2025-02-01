    @foreach ($students as $student)
    @if ($student->planReport)
        @php
            $organization = \App\Models\Organization::where('id', $student->planReport->organization_id)->first();
        @endphp
    @endif
    @php
        $weeklyreports =  \App\Models\WeeklyReport::where('user_id', $student->id)->get();
    @endphp
@if ($student->planReport)
    <!-- Plan Report Modal -->
    <div class="modal fade" id="planReportModal{{ $student->id }}" tabindex="-1" aria-labelledby="planReportModalLabel{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="planReportModalLabel{{ $student->id }}">Plan Report Details For {{ $student->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">❌</button>
                </div>
                <div class="modal-body">
    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Start Date</strong></td>
                <td>{{ $student->planReport->start_date->format('d-M-Y') }}</td>
            </tr>
            <tr>
                <td><strong>End Date</strong></td>
                <td>{{ $student->planReport->end_date->format('d-M-Y') }}</td>
            </tr>

            @for ($i = 1; $i <= 8; $i++)
                @php $week = "week$i"; @endphp
                @if (!empty($student->planReport->$week))
                    <tr>
                        <td><strong>Week {{ $i }}</strong></td>
                        <td><span class="badge bg-primary p-2">{{ $student->planReport->$week }}</span></td>
                    </tr>
                @endif
            @endfor

            <tr>
                <td><strong>Training Type</strong></td>
                <td><span class="badge bg-info p-2">{{ ucfirst($student->planReport->training_type) }}</span></td>
            </tr>

            @if ($student->planReport->training_type == 'hybrid' || $student->planReport->training_type == 'onsite')
                <tr>
                    <td><strong>Organization Name</strong></td>
                    <td>{{ $organization->name }}</td>
                </tr>
                <tr>
                    <td><strong>Supervisor Name</strong></td>
                    <td>{{ $student->planReport->org_sub_name }}</td>
                </tr>
                <tr>
                    <td><strong>Supervisor Email</strong></td>
                    <td>{{ $student->planReport->org_sub_email }}</td>
                </tr>
                <tr>
                    <td><strong>Supervisor Phone</strong></td>
                    <td>{{ $student->planReport->org_sub_phone }}</td>
                </tr>
                <tr>
                    <td><strong>Supervisor Department</strong></td>
                    <td>{{ $student->planReport->org_sub_department }}</td>
                </tr>
            @endif

            <tr>
                <td><strong>Report Created At</strong></td>
                <td>{{ $student->planReport->created_at->format('d-M-Y') }}</td>
            </tr>
        </tbody>
    </table>
</div>

                <div class="modal-footer">
                    @if ($student->planReport->status == 0)
                        <form method="POST" action="{{ route('supervisor.planForm.reject', $student->planReport->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                        <form method="POST" action="{{ route('supervisor.planForm.accept', $student->planReport->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        @elseif ($student->planReport->status == 2)
                            <form method="POST" action="{{ route('supervisor.planForm.accept', $student->planReport->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                        @elseif ($student->planReport->status == 1)
                            <form method="POST" action="{{ route('supervisor.planForm.reject', $student->planReport->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif


@if ($student->weeklyReport)
 <!-- Weekly Report Modal -->
    <div class="modal fade" id="weeklyReportModal{{ $student->id }}" tabindex="-1" aria-labelledby="weeklyReportModalLabel{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="weeklyReportModalLabel{{ $student->id }}">Weekly Report Details For {{ $student->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">❌</button>
                </div>
                <div class="modal-body">
    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">Week Number</th>
                <th scope="col">Topics Covered</th>
                <th scope="col">Skills Learned</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weeklyreports as $weeklyreport)
            <tr>
                <td><strong>Week {{ $weeklyreport->week_number }}</strong></td>
                <td>
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach ($weeklyreport->topics as $topic)
                            <span class="badge bg-primary m-1 p-2">{{ $topic }}</span>
                        @endforeach
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach ($weeklyreport->skills as $skill)
                            <span class="badge bg-success m-1 p-2">{{ $skill }}</span>
                        @endforeach
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
                <div class="modal-footer">
                    @if($weeklyreport->week_number == 8)
                        @if ($student->weeklyReport->status == 0)
                            <form method="POST" action="{{ route('supervisor.weeklyForm.reject', $student->weeklyReport->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                            <form method="POST" action="{{ route('supervisor.weeklyForm.accept', $student->weeklyReport->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                            @elseif ($student->weeklyReport->status == 2)
                                <form method="POST" action="{{ route('supervisor.weeklyForm.accept', $student->weeklyReport->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                            @elseif ($student->weeklyReport->status == 1)
                                <form method="POST" action="{{ route('supervisor.weeklyForm.reject', $student->weeklyReport->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                        @endif
                    @else
                        <div class="alert alert-info d-flex align-items-center text-center text-white" role="alert">
                            <p>No action can be taken until the student completes the week 8 report.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@if ($student->finalReport)
<div class="modal fade" id="finalReportModal{{ $student->id }}" tabindex="-1" aria-labelledby="finalReportModalLabel{{ $student->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="finalReportModalLabel{{ $student->id }}">Final Report Details For {{ $student->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">❌</button>
            </div>
            <div class="modal-body">
    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 30%;">Field</th>
                <th style="width: 70%;">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Introduction</strong></td>
                <td>
                    <div class="p-3 d-block bg-white border rounded" style="white-space: normal; word-break: break-word;">
                        {{ $student->finalReport->introduction }}
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Training Plan</strong></td>
                <td>
                    <div class="p-3 d-block bg-white border rounded" style="white-space: normal; word-break: break-word;">
                        {{ $student->finalReport->training_plan }}
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Overall Experience</strong></td>
                <td>
                    <div class="p-3 d-block bg-white border rounded" style="white-space: normal; word-break: break-word;">
                        {{ $student->finalReport->overall_experiance }}
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Recommendations</strong></td>
                <td>
                    <div class="p-3 d-block bg-white border rounded" style="white-space: normal; word-break: break-word;">
                        {{ $student->finalReport->recommendations }}
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Conclusion</strong></td>
                <td>
                    <div class="p-3 d-block bg-white border rounded" style="white-space: normal; word-break: break-word;">
                        {{ $student->finalReport->conclusion }}
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Reference</strong></td>
                <td>
                    <div class="p-3 d-block bg-white border rounded" style="white-space: normal; word-break: break-word;">
                        {{ $student->finalReport->reference }}
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <span class="badge bg-success p-3 d-inline-block" style="font-size: 16px; padding: 10px 15px; border-radius: 5px;">
                Submitted At: {{ $student->finalReport->created_at->format('d-M-Y') }}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
            <div class="modal-footer">
                @if ($student->finalReport->status == 0)
                    <form method="POST" action="{{ route('supervisor.finalForm.reject', $student->finalReport->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                    <form method="POST" action="{{ route('supervisor.finalForm.accept', $student->finalReport->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                    @elseif ($student->finalReport->status == 2)
                        <form method="POST" action="{{ route('supervisor.finalForm.accept', $student->finalReport->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                    @elseif ($student->finalReport->status == 1)
                        <form method="POST" action="{{ route('supervisor.finalForm.reject', $student->finalReport->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

    @if ($student->ratings)
    <div class="modal fade" id="experianceReportModal{{ $student->id }}" tabindex="-1" aria-labelledby="experianceReportModal{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="experianceReportModal{{ $student->id }}">Experiance Report Details For {{ $student->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">❌</button>
                </div>
                <div class="modal-body">
    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 30%;">Field</th>
                <th style="width: 70%;">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Organization Name</strong></td>
                <td>
                    <div class="p-3 bg-white border rounded text-center">
                        {{ $organization->name }}
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Overview</strong></td>
                <td>
                    <div class="p-3 bg-white border rounded text-center">
                        {{ $student->ratings->overview }}
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Rating</strong></td>
                <td>
                    <div class="p-3 bg-white border rounded text-center">
                        {{ str_repeat('⭐', $student->ratings->rating) }} 
                        <span>({{ $student->ratings->rating }} / 5)</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
                <div class="modal-footer">
                    @if ($student->ratings->status == 0)
                        <form method="POST" action="{{ route('supervisor.expForm.reject', $student->ratings->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                        <form method="POST" action="{{ route('supervisor.expForm.accept', $student->ratings->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        @elseif ($student->ratings->status == 2)
                            <form method="POST" action="{{ route('supervisor.expForm.accept', $student->ratings->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                        @elseif ($student->ratings->status == 1)
                            <form method="POST" action="{{ route('supervisor.expForm.reject', $student->ratings->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach
