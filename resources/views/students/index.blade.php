@extends('layouts.app')

@section('content')
    <h2>Students List</h2>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="studentsTableBody">
            <!-- Data will be injected by AJAX -->
        </tbody>
    </table>
    <a href="/student/create" class="btn btn-primary">Add Student</a>

    <script>
        // Fetch students data from the API
        fetch('/api/students')
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById('studentsTableBody');
                data.forEach(student => {
                    let row = `
                        <tr>
                            <td>${student.name}</td>
                            <td>${student.email}</td>
                            <td>
                                <a href="/student/${student.id}" class="btn btn-info">View</a>
                                <a href="/student/${student.id}/edit" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" onclick="deleteStudent(${student.id})">Delete</button>
                            </td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            });

        // Function to delete student
        function deleteStudent(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                fetch(`/api/students/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }).then(response => {
                    if (response.ok) {
                        location.reload();  // Reload the page to update the list
                    }
                });
            }
        }
    </script>
@endsection
