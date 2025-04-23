@extends('layouts.app')

@section('content')
    <h1 class="mt-5">Edit Student</h1>
    <form id="edit-student-form">
        @csrf
        @method('PUT')
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
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

    <script>
        const studentId = {{ $student->id }};

        // Fetch student data and populate form fields
        fetch(`/api/students/${studentId}`)
            .then(response => response.json())
            .then(student => {
                document.getElementById('first_name').value = student.first_name;
                document.getElementById('last_name').value = student.last_name;
                document.getElementById('email').value = student.email;
                document.getElementById('address').value = student.address;
            })
            .catch(error => console.log(error));

        // Handle form submission to update student details
        document.getElementById('edit-student-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const studentData = {
                first_name: document.getElementById('first_name').value,
                last_name: document.getElementById('last_name').value,
                email: document.getElementById('email').value,
                address: document.getElementById('address').value
            };

            fetch(`/api/students/${studentId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(studentData)
            })
            .then(response => response.json())
            .then(data => {
                alert('Student updated successfully');
                window.location.href = '/';
            })
            .catch(error => console.log(error));
        });
    </script>
@endsection
