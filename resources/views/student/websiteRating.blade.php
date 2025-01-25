
@extends('layouts.custom.app')
@section('title', 'Website Rating')
@section('content')
     <div class="container py-2">
        <div class="row justify-content-center">
          <h3>Website Rating</h3>
          <div class="card p-3">
            <form action="{{ route('student.website-rating.store') }}" method="post" id="websiteRating">
              @csrf
              <div class="row">
                  <div class="col-md-12 mt-3 mb-2">
                    <label for="opinion"><h5>What is your opinion about our website ? <span class="required">*</span></h5></label>
                    <select name="opinion" id="opinion" required class="form-control">
                      <option value="">Please select one of the following</option>
                      <option value="Excellent">Excellent</option>
                      <option value="Very Good">Very Good</option>
                      <option value="Good">Good</option>
                      <option value="Needs Improvment">Needs Improvment</option>
                    </select>
                  </div>
              </div>
              <button type="submit" class="btn bg-gradient-dark mt-3" id="submitButton" disabled>Submit</button>
          </form>
          </div>
        </div>
      </div>
      
      <script>
            document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('websiteRating');
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