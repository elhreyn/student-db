@extends('layouts.app')

@section('content')
    <h1 class="mt-5">Add New Student</h1>
    <form id="create-student-form">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address">
        </div>
        <button type="submit" class="btn btn-primary">Save Student</button>
    </form>

    <script>
        // Handle form submission to create a new student
        document.getElementById('create-student-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const studentData = {
                first_name: document.getElementById('first_name').value,
                last_name: document.getElementById('last_name').value,
                email: document.getElementById('email').value,
                address: document.getElementById('address').value
            };

            fetch('/api/students', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(studentData)
            })
            .then(response => response.json())
            .then(data => {
                alert('Student created successfully');
                window.location.href = '/';
            })
            .catch(error => console.log(error));
        });
    </script>
@endsection
