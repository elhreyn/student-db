@extends('layouts.app')

@section('content')
    <h2>Edit Student</h2>
    <form id="editStudentForm">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        <button type="submit" class="btn btn-warning">Update Student</button>
    </form>

    <script>
        let studentId = window.location.pathname.split('/').pop();

        fetch(`/api/students/${studentId}`)
            .then(response => response.json())
            .then(student => {
                document.getElementById('name').value = student.name;
                document.getElementById('email').value = student.email;
            });

        document.getElementById('editStudentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;

            fetch(`/api/students/${studentId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ name, email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = `/student/${studentId}`;  // Redirect to student details page
                } else {
                    alert('Failed to update student');
                }
            });
        });
    </script>
@endsection
