@extends('layouts.custom.app')
@section('title', 'Experience Form')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center fw-bold mb-4">Experience Form</h3>
            <div class="card shadow-lg p-4">
                <form action="{{ route('student.experiance-form.store') }}" method="post" id="experienceForm">
                    @csrf
                    
                    <div class="mb-4 text-center">
                        <h4>You are rating <span class="fw-bold text-primary">{{ $orgnization->name }}</span></h4>
                    </div>

                    <div class="mb-3">
                        <label for="overview" class="form-label fw-bold">Overview <span class="text-danger">*</span></label>
                        <textarea name="overview" id="overview" class="form-control p-3" rows="5" placeholder="Write your experience overview..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label fw-bold">Rating <span class="text-danger">*</span></label>
                        <select name="rating" class="form-select p-2" id="rating" required>
                            <option value="">Please select the rating (out of 5)</option>
                            <option value="1">⭐ 1 - Poor</option>
                            <option value="2">⭐⭐ 2 - Fair</option>
                            <option value="3">⭐⭐⭐ 3 - Good</option>
                            <option value="4">⭐⭐⭐⭐ 4 - Very Good</option>
                            <option value="5">⭐⭐⭐⭐⭐ 5 - Excellent</option>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-dark px-4 py-2 fw-bold" id="submitButton" disabled>Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('experienceForm');
        const requiredFields = form.querySelectorAll('[required]');
        const submitButton = document.getElementById('submitButton');

        function checkRequiredFields() {
            const allFilled = Array.from(requiredFields).every(field => field.value.trim() !== '');
            submitButton.disabled = !allFilled;
        }

        requiredFields.forEach(field => {
            field.addEventListener('input', checkRequiredFields);
        });

        checkRequiredFields();
    });
</script>

@endsection
