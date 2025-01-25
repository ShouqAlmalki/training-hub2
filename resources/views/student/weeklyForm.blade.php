
@extends('layouts.custom.app')
@section('title', 'Weekly Form')
@section('content')
     <div class="container py-2">
        <div class="row justify-content-center">
          <h3>Weekly Form</h3>
          <div class="card p-3">
            @if ($weeklyreport && $weeklyreport->week_number == 8)
              <div class="card-body" style="text-align: center; padding: 50px;">
                <h4>You have already submitted all weekly reports,<br> Please waite for your supervisor response.</h4>
                <br><a href="{{ route('student.dashboard') }}" class="btn btn-primary">Back to dashboard</a>
              </div>
            @else
            <form action="{{ route('student.weekly-form.store') }}" method="post" id="weeklyForm">
              @csrf
              <div class="row">
                  <div class="col-md-12 mt-3 mb-2">
                      <label for="week_number">Week Number <span class="required">*</span></label>
                      <select name="week_number" id="week_number" class="form-control" required>
                          <option value="">Please select week number</option>
                          @if (!$weeklyreport)
                            <option value="1">Week 1</option>
                            <option value="2">Week 2</option>
                            <option value="3">Week 3</option>
                            <option value="4">Week 4</option>
                            <option value="5">Week 5</option>
                            <option value="6">Week 6</option>
                            <option value="7">Week 7</option>
                            <option value="8">Week 8</option>
                          @elseif ($weeklyreport->week_number == 1)
                            <option value="2">Week 2</option>
                            <option value="3">Week 3</option>
                            <option value="4">Week 4</option>
                            <option value="5">Week 5</option>
                            <option value="6">Week 6</option>
                            <option value="7">Week 7</option>
                            <option value="8">Week 8</option>
                          @elseif ($weeklyreport->week_number == 2)
                            <option value="3">Week 3</option>
                            <option value="4">Week 4</option>
                            <option value="5">Week 5</option>
                            <option value="6">Week 6</option>
                            <option value="7">Week 7</option>
                            <option value="8">Week 8</option>
                          @elseif ($weeklyreport->week_number == 3)
                            <option value="4">Week 4</option>
                            <option value="5">Week 5</option>
                            <option value="6">Week 6</option>
                            <option value="7">Week 7</option>
                            <option value="8">Week 8</option>
                          @elseif ($weeklyreport->week_number == 4)
                            <option value="5">Week 5</option>
                            <option value="6">Week 6</option>
                            <option value="7">Week 7</option>
                            <option value="8">Week 8</option>
                          @elseif ($weeklyreport->week_number == 5)
                            <option value="6">Week 6</option>
                            <option value="7">Week 7</option>
                            <option value="8">Week 8</option>
                          @elseif ($weeklyreport->week_number == 6)
                            <option value="7">Week 7</option>
                            <option value="8">Week 8</option>
                          @elseif ($weeklyreport->week_number == 7)
                            <option value="8">Week 8</option>
                          @endif
                      </select>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h4>Topics <span class="required">*</span></h4>
                      <div class="row">
                            <div class="col-md-12 mt-3">
                                <input type="text" class="form-control" name="topics[]" placeholder="Topic 1" required>
                            </div>
                            <div class="col-md-12 mt-3">
                              <input type="text" class="form-control" name="topics[]" placeholder="Topic 2" required>
                          </div>
                          <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="topics[]" placeholder="Topic 3" required>
                        </div>
                        <div class="col-md-12 mt-3">
                          <input type="text" class="form-control" name="topics[]" placeholder="Topic 4" required>
                        </div>
                      <div class="col-md-12 mt-3">
                        <input type="text" class="form-control" name="topics[]" placeholder="Topic 5" required>
                      </div>
                      </div>  
                    </div>  
                  </div>  
                </div>

                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h4>Skills <span class="required">*</span></h4>
                      <div class="row">
                          <div class="col-md-12 mt-3">
                              <input type="text" class="form-control" name="skills[]" placeholder="Skill 1" required>
                          </div>
                          <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="skills[]" placeholder="Skill 2" required>
                        </div>
                        <div class="col-md-12 mt-3">
                          <input type="text" class="form-control" name="skills[]" placeholder="Skill 3" required>
                      </div>
                      <div class="col-md-12 mt-3">
                        <input type="text" class="form-control" name="skills[]" placeholder="Skill 4" required>
                    </div>
                    <div class="col-md-12 mt-3">
                      <input type="text" class="form-control" name="skills[]" placeholder="Skill 5" required>
                  </div>
                      </div>  
                    </div>  
                  </div>
                </div> 
              </div>
              <button type="submit" class="btn bg-gradient-dark mt-3" id="submitButton" disabled>Submit</button>
          </form>
          @endif
          </div>
        </div>
      </div>
      
      <script>
            document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('weeklyForm');
        const requiredFields = form.querySelectorAll('[required]');
        const submitButton = document.getElementById('submitButton');

        // Function to check if all required fields are filled
        function checkRequiredFields() {
            const allFilled = Array.from(requiredFields).every(field => field.value.trim() !== '');
            submitButton.disabled = !allFilled; // Enable button if all fields are filled
        }

        // Add event listeners to all required fields
        requiredFields.forEach(field => {
            field.addEventListener('input', checkRequiredFields);
        });

        // Initial check
        checkRequiredFields();
    });
      </script>
@endsection