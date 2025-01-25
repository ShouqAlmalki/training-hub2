
@extends('layouts.custom.app')
@section('title', 'Experience Form')
@section('content')
     <div class="container py-2">
        <div class="row justify-content-center">
          <h3>Experience Form</h3>
          <div class="card p-3">
            <form action="{{ route('student.experiance-form.store') }}" method="post" id="experienceForm">
              @csrf
              <div class="row">
                  <div class="col-md-12 mt-3 mb-2">
                      <h4>You are rating {{ $orgnization->name }}</h4>
                  </div>
                  <div class="col-md-12 mt-3 mb-2">
                    <label for="overview">Overview <span class="required">*</span></label>
                    <textarea name="overview" id="overview" class="form-control" required></textarea>
                  </div>
                  <div class="col-md-12 mt-3 mb-2">
                    <label for="rating">Rating <span class="required">*</span></label>
                    <select name="rating" class="form-control" id="rating" required>
                      <option value="">Please select the rating from 5</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
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
        const form = document.getElementById('experienceForm');
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