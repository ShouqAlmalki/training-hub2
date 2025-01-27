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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">Start Date</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->start_date->format('d-M-Y') }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">End Date</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->end_date->format('d-M-Y') }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">Week 1</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->week1 }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">Week 2</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->week2 }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">Week 3</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->week3 }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">Week 4</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->week4 }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">Week 5</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->week5 }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">Week 6</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->week6 }}" disabled>
                        </div>
                        @if ($student->planReport->week7)
                            <div class="col-md-6 mt-1 mb-1">
                                <label for="start_date">Week 7</label>
                                <input type="text" class="form-control" value="{{ $student->planReport->week7 }}" disabled>
                            </div>
                        @endif
                        @if ($student->planReport->week8)
                            <div class="col-md-6 mt-1 mb-1">
                                <label for="start_date">Week 8</label>
                                <input type="text" class="form-control" value="{{ $student->planReport->week8 }}" disabled>
                            </div>
                        @endif
                        <div class="col-md-12 mt-1 mb-1">
                            <label for="start_date">Training Type</label>
                            <input type="text" class="form-control" value="{{ $student->planReport->training_type }}" disabled>
                        </div>
                        @if ($student->planReport->training_type == 'hybrid' || $student->planReport->training_type == 'onsite')
                            <div class="col-md-6 mt-1 mb-1">
                                <label for="start_date">Organization Name</label>   
                                <input type="text" class="form-control" value="{{ $organization->name }}" disabled>
                            </div>
                            <div class="col-md-6 mt-1 mb-1">
                                <label for="start_date">Organization Supervisor Name</label>   
                                <input type="text" class="form-control" value="{{ $student->planReport->org_sub_name }}" disabled>
                            </div>
                            <div class="col-md-6 mt-1 mb-1">
                                <label for="start_date">Organization Supervisor Email</label>   
                                <input type="text" class="form-control" value="{{ $student->planReport->org_sub_email }}" disabled>
                            </div>
                            <div class="col-md-6 mt-1 mb-1">
                                <label for="start_date">Organization Supervisor Phone</label>   
                                <input type="text" class="form-control" value="{{ $student->planReport->org_sub_phone }}" disabled>
                            </div>
                            <div class="col-md-6 mt-1 mb-1">
                                <label for="start_date">Organization Supervisor Department</label>   
                                <input type="text" class="form-control" value="{{ $student->planReport->org_sub_department }}" disabled>
                            </div>
                        @endif
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="start_date">This report created at</label>   
                            <input type="text" class="form-control" value="{{ $student->planReport->created_at->format('d-M-Y') }}" disabled>
                        </div>
                    </div>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <th scope="col">Week Number</th>
                              <th scope="col">Topics</th>
                              <th scope="col">Skills</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($weeklyreports as $weeklyreport)
                                <tr>
                                    <th>{{ $weeklyreport->week_number }}</th>
                                    <th>
                                        <div class="row">
                                            @foreach ($weeklyreport->topics as $topic)
                                            <div class="col-md-6">
                                                <span class="badge text-bg-primary p-1">{{ $topic }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                    </th>
                                    <th>
                                        <div class="row">
                                            @foreach ($weeklyreport->skills as $skill)
                                                <div class="col-md-6">
                                                    <span class="badge text-bg-primary p-1">{{ $skill }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                    </table>
                </div>
                <div class="modal-footer">
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mt-1 mb-1">
                        <label for="introduction">Introduction</label>
                        <input type="text" class="form-control" value="{{ $student->finalReport->introduction }}" disabled>
                    </div>
                    <div class="col-md-6 mt-1 mb-1">
                        <label for="training_plan">Training Plan</label>
                        <input type="text" class="form-control" value="{{ $student->finalReport->training_plan }}" disabled>
                    </div>
                    <div class="col-md-6 mt-1 mb-1">
                        <label for="overall_experiance">Overall Experiance</label>
                        <input type="text" class="form-control" value="{{ $student->finalReport->overall_experiance }}" disabled>
                    </div>
                    <div class="col-md-6 mt-1 mb-1">
                        <label for="recommendations">Recommendations</label>
                        <input type="text" class="form-control" value="{{ $student->finalReport->recommendations }}" disabled>
                    </div>
                    <div class="col-md-6 mt-1 mb-1">
                        <label for="conclusion">Conclusion</label>
                        <input type="text" class="form-control" value="{{ $student->finalReport->conclusion }}" disabled>
                    </div>
                    <div class="col-md-6 mt-1 mb-1">
                        <label for="reference">Reference</label>
                        <input type="text" class="form-control" value="{{ $student->finalReport->reference }}" disabled>
                    </div>
                    <div class="col-md-12 mt-1 mb-1">
                        <label for="created_at">This Form Submited At</label>
                        <input type="text" class="form-control" value="{{ $student->finalReport->created_at->format('d-M-Y') }}" disabled>
                    </div>
                </div>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="organization">Organization Name</label>
                            <input type="text" class="form-control" value="{{ $organization->name }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="overview">Overview</label>
                            <input type="text" class="form-control" value="{{ $student->ratings->overview }}" disabled>
                        </div>
                        <div class="col-md-6 mt-1 mb-1">
                            <label for="rating">Rate</label>
                            <input type="text" class="form-control" value="{{ $student->ratings->rating }} of 5" disabled>
                        </div>
                    </div>
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