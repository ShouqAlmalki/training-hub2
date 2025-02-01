@extends('layouts.custom.app')
@section('title', 'Website Rating')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center fw-bold mb-4">Website Rating</h3>
            <div class="card shadow-lg p-4">
                <form action="{{ route('student.website-rating.store') }}" method="post" id="websiteRating">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="opinion" class="form-label fw-bold">
                            <h5>What is your opinion about our website? <span class="text-danger">*</span></h5>
                        </label>
                        <select name="opinion" id="opinion" required class="form-select p-3">
                            <option value="">🌟 Please select one of the following</option>
                            <option value="Excellent">🌟🌟🌟🌟🌟 Excellent</option>
                            <option value="Very Good">🌟🌟🌟🌟 Very Good</option>
                            <option value="Good">🌟🌟🌟 Good</option>
                            <option value="Needs Improvment">⚠️ Needs Improvement</option>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-dark px-4 py-2 fw-bold" id="submitButton" disabled>
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('websiteRating');
        const requiredFields = form.querySelectorAll('[required]');
        const submitButton = document.getElementById('submitButton');

        function checkRequiredFields() {
            const allFilled = Array.from(requiredFields).every(field => field.value.trim() !== '');
            submitButton.disabled = !allFilled;
        }

        requiredFields.forEach(field => {
            field.addEventListener('change', checkRequiredFields);
        });

        checkRequiredFields();
    });
</script>

@endsection
