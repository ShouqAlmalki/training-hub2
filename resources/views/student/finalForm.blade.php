
@extends('layouts.custom.app')
@section('title', 'Final Form')
@section('content')
     <div class="container py-2">
        <div class="row justify-content-center">
          <h3>Final Form</h3>
          <div class="card p-3">
            <form action="{{ route('student.final-form.store') }}" method="post" id="finalForm">
              @csrf
              <div class="row">
                  <div class="col-md-6 mt-3 mb-2">
                      <label for="introduction">introduction <span class="required">*</span></label>
                      <input type="text" name="introduction" id="introduction" class="form-control" required>
                  </div>
                  <div class="col-md-6 mt-3 mb-2">
                    <label for="training_plan">Training Plan <span class="required">*</span></label>
                    <input type="text" name="training_plan" id="training_plan" class="form-control" required>
                  </div>
                  <div class="col-md-6 mt-3 mb-2">
                    <label for="overall_experiance">Overall Experiance <span class="required">*</span></label>
                    <input type="text" name="overall_experiance" id="overall_experiance" class="form-control" required>
                  </div>
                  <div class="col-md-6 mt-3 mb-2">
                    <label for="recommendations">Recommendations <span class="required">*</span></label>
                    <input type="text" name="recommendations" id="recommendations" class="form-control" required>
                  </div>
                  <div class="col-md-6 mt-3 mb-2">
                    <label for="conclusion">Conclusion <span class="required">*</span></label>
                    <input type="text" name="conclusion" id="conclusion" class="form-control" required>
                  </div>
                  <div class="col-md-6 mt-3 mb-2">
                    <label for="reference">Reference</label>
                    <input type="text" name="reference" id="reference" class="form-control">
                  </div>
              </div>
              <button type="submit" class="btn bg-gradient-dark mt-3" id="submitButton" disabled>Submit</button>
          </form>
          </div>
        </div>
      </div>
      
      <script>
            document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('finalForm');
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