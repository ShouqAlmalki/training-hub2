@if ($planreport)
    @php
        $organization = \App\Models\Organization::where('id', $planreport->organization_id)->first();
    @endphp
@endif



<!-- Plan Report Modal -->
@if($planreport)
<div class="modal fade" id="planReportModal" tabindex="-1" aria-labelledby="planReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Plan Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">❌</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <td><strong>Start Date</strong></td>
                        <td>{{ $planreport->start_date->format('d-M-Y') }}</td>
                    </tr>
                    <tr>
                        <td><strong>End Date</strong></td>
                        <td>{{ $planreport->end_date->format('d-M-Y') }}</td>
                    </tr>

                    @for ($i = 1; $i <= 8; $i++)
                        @php $week = "week$i"; @endphp
                        @if (!empty($planreport->$week))
                            <tr>
                                <td><strong>Week {{ $i }}</strong></td>
                                <td><span class="badge bg-primary p-2">{{ $planreport->$week }}</span></td>
                            </tr>
                        @endif
                    @endfor

                    <tr>
                        <td><strong>Training Type</strong></td>
                        <td>{{ ucfirst($planreport->training_type) }}</td>
                    </tr>

                    @if ($planreport->training_type == 'hybrid' || $planreport->training_type == 'onsite')
                        <tr>
                            <td><strong>Organization Name</strong></td>
                            <td>{{ $organization->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Supervisor Name</strong></td>
                            <td>{{ $planreport->org_sub_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Supervisor Email</strong></td>
                            <td>{{ $planreport->org_sub_email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Supervisor Phone</strong></td>
                            <td>{{ $planreport->org_sub_phone }}</td>
                        </tr>
                        <tr>
                            <td><strong>Supervisor Department</strong></td>
                            <td>{{ $planreport->org_sub_department }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td><strong>Form Created At</strong></td>
                        <td>{{ $planreport->created_at->format('d-M-Y') }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
@endif

 
<!-- Weekly Report Modal -->
<!--
<div class="modal fade" id="weeklyReportModal" tabindex="-1" aria-labelledby="weeklyReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

           
            <div class="modal-header">
                <h5 class="modal-title">Weekly Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">❌</button>
            </div>

            
            <div class="modal-body">
                
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
                </div>

               
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Week Number</th>
                            <th scope="col">Topics Covered</th> 
                            <th scope="col">Skills Learned</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @for ($week = 1; $week <= 8; $week++)
                            @php
                                $weeklyreport = isset($weeklyreports) ? $weeklyreports->where('week_number', $week)->first() : null;
                            @endphp
                            @if ($weeklyreport)  
                            <tr>
                                <td><strong>Week {{ $week }}</strong></td>
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
                            @endif
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                </table>
            </div>
        </div>
    </div>
</div> -->
<!-- Weekly Report Modal -->


<!-- Final Report Modal -->
@if($finalreport)
<div class="modal fade" id="finalReportModal" tabindex="-1" aria-labelledby="finalReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Final Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">❌</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="width: 30%;">Field</th>
                            <th scope="col" style="width: 70%;">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold bg-light">Introduction</td>
                            <td class="text-start">
                                <div class="p-3 border rounded bg-white text-wrap" style="word-break: break-word; max-width: 100%;">
                                    {{ $finalreport->introduction }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold bg-light">Training Plan</td>
                            <td class="text-start">
                                <div class="p-3 border rounded bg-white text-wrap" style="word-break: break-word; max-width: 100%;">
                                    {{ $finalreport->training_plan }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold bg-light">Overall Experience</td>
                            <td class="text-start">
                                <div class="p-3 border rounded bg-white text-wrap" style="word-break: break-word; max-width: 100%;">
                                    {{ $finalreport->overall_experiance }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold bg-light">Recommendations</td>
                            <td class="text-start">
                                <div class="p-3 border rounded bg-white text-wrap" style="word-break: break-word; max-width: 100%;">
                                    {{ $finalreport->recommendations }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold bg-light">Conclusion</td>
                            <td class="text-start">
                                <div class="p-3 border rounded bg-white text-wrap" style="word-break: break-word; max-width: 100%;">
                                    {{ $finalreport->conclusion }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold bg-light">Reference</td>
                            <td class="text-start">
                                <div class="p-3 border rounded bg-white text-wrap" style="word-break: break-word; max-width: 100%;">
                                    {{ $finalreport->reference }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold bg-light">Form Created At</td>
                            <td class="text-start">
                                <div class="p-3 border rounded bg-white text-wrap" style="word-break: break-word; max-width: 100%;">
                                    {{ isset($finalreport->created_at) ? $finalreport->created_at->format('d-M-Y') : 'N/A' }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
