@extends('layouts.app')

@section('content')
    <h2>Create New Student</h2>
    <form id="createStudentForm">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        <button type="submit" class="btn btn-success">Create Student</button>
    </form>

    <script>
        document.getElementById('createStudentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;

            fetch('/api/students', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ name, email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '/students';  // Redirect to students list
                } else {
                    alert('Failed to create student');
                }
            });
        });
    </script>
@endsection
