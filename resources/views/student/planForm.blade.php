
@extends('layouts.custom.app')
@section('title', 'Plan Form')
@section('content')
     <div class="container py-2">
        <div class="row justify-content-center">
          <h3>Plan Form</h3>
          <div class="card p-3">
            <form action="{{ route('student.plan-form.store') }}" method="post" id="planForm">
              @csrf
              <div class="row">
                <div class="col-md-6 mt-3 mb-2">
                  <label for="start_date">Start Date <span class="required">*</span></label>
                  <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="end_date">End Date <span class="required">*</span></label>
                  <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="week-1">Week 1 <span class="required">*</span></label>
                  <input type="text" class="form-control" id="week-1" name="week_1" required>
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="week-2">Week 2 <span class="required">*</span></label>
                  <input type="text" class="form-control" id="week-2" name="week_2" required>
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="week-3">Week 3 <span class="required">*</span></label>
                  <input type="text" class="form-control" id="week-3" name="week_3" required>
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="week-4">Week 4 <span class="required">*</span></label>
                  <input type="text" class="form-control" id="week-4" name="week_4" required>
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="week-5">Week 5 <span class="required">*</span></label>
                  <input type="text" class="form-control" id="week-5" name="week_5" required>
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="week-6">Week 6 <span class="required">*</span></label>
                  <input type="text" class="form-control" id="week-6" name="week_6" required>
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="week-7">Week 7</label>
                  <input type="text" class="form-control" id="week-7" name="week_7">
                </div>
                <div class="col-md-6 mt-3 mb-2">
                  <label for="week-8">Week 8</label>
                  <input type="text" class="form-control" id="week-8" name="week_8">
                </div>
                <div class="col-md-12 mt-3 mb-2">
                  <label for="training_tybe">Training Type <span class="required">*</span></label>
                  <select name="training_tybe" id="training_tybe" class="form-control" required>
                    <option value="">Please select your training type</option>
                    <option value="online">Online</option>
                    <option value="hybrid">Hybrid</option>
                    <option value="onsite">Onsite</option>
                  </select>
                </div>
                <!-- Additional Fields (hidden by default) -->
                <div id="organizationFields" style="display: none;">
                  <div class="col-md-12 mt-3 mb-2">
                    <label for="organization_name">Organization Name <span class="required">*</span></label>
                    <select name="organization_name" id="organization_name" class="form-control" required>
                      <option value="">Select Organization</option>
                      @foreach ($organizations as $organization)
                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <h4 class="mt-2 mb-2">Organization Supervisor Info</h4>
                  <div class="col-md-12 mt-3 mb-2">
                    <label for="supervisor_name">Supervisor Name <span class="required">*</span></label>
                    <input type="text" id="supervisor_name" name="supervisor_name" class="form-control" required>
                  </div>
                  
                  <div class="col-md-12 mt-3 mb-2">
                    <label for="supervisor_email">Supervisor Email <span class="required">*</span></label>
                    <input type="email" id="supervisor_email" name="supervisor_email" class="form-control" required>
                  </div>
                  
                  <div class="col-md-12 mt-3 mb-2">
                    <label for="supervisor_phone">Supervisor Phone <span class="required">*</span></label>
                    <input type="tel" id="supervisor_phone" name="supervisor_phone" class="form-control" required>
                  </div>
                  
                  <div class="col-md-12 mt-3 mb-2">
                    <label for="supervisor_department">Supervisor Department <span class="required">*</span></label>
                    <input type="text" id="supervisor_department" name="supervisor_department" class="form-control" required>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn bg-gradient-dark mt-3" id="submitButton">Submit</button>
            </form>
          </div>
      </div>
      </div>


      <script>
        // Get the form, button, training type element, and organization fields
const form = document.getElementById('planForm',);
const submitButton = document.getElementById('submitButton');
const trainingTypeSelect = document.getElementById('training_tybe');
const organizationFields = document.getElementById('organizationFields');
const organizationName = document.getElementById('organization_name');
const supervisorName = document.getElementById('supervisor_name');
const supervisorEmail = document.getElementById('supervisor_email');
const supervisorPhone = document.getElementById('supervisor_phone');
const supervisorDepartment = document.getElementById('supervisor_department');

// Function to check if all required fields are filled and toggle the organization fields requirement
function checkRequiredFields() {
  let allFieldsFilled = true;

  // Get all required fields
  const requiredFields = document.querySelectorAll('input[required], select[required]');
  
  // Check if any required field is empty
  requiredFields.forEach(function(field) {
    if (!field.value.trim()) {
      allFieldsFilled = false;
    }
  });

  // Show or hide the organization fields based on training type
  if (trainingTypeSelect.value === 'hybrid' || trainingTypeSelect.value === 'onsite') {
    organizationFields.style.display = 'block';

    // Make organization info fields required if training type is hybrid or onsite
    organizationName.setAttribute('required', 'true');
    supervisorName.setAttribute('required', 'true');
    supervisorEmail.setAttribute('required', 'true');
    supervisorPhone.setAttribute('required', 'true');
    supervisorDepartment.setAttribute('required', 'true');
  } else {
    organizationFields.style.display = 'none';

    // Remove the 'required' attribute if training type is online
    organizationName.removeAttribute('required');
    supervisorName.removeAttribute('required');
    supervisorEmail.removeAttribute('required');
    supervisorPhone.removeAttribute('required');
    supervisorDepartment.removeAttribute('required');
  }

  // Enable/Disable submit button based on field values
  if (allFieldsFilled || trainingTypeSelect.value === 'online') {
    submitButton.disabled = false;  // Enable the submit button
  } else {
    submitButton.disabled = true;   // Disable the submit button
  }
}

// Call the function on form input changes
form.addEventListener('input', checkRequiredFields);

// Call the function when the training type is changed
trainingTypeSelect.addEventListener('change', checkRequiredFields);

// Initial check when the page loads
checkRequiredFields();
      </script>

      
@endsection