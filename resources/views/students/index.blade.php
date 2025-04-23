@extends('layouts.app')

@section('content')
    <h1 class="mt-5">Students List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="student-list">
            <!-- Data will be injected here using JavaScript -->
        </tbody>
    </table>
    <a href="/students/create" class="btn btn-success mt-3">Add Student</a>

    <script>
        // Fetch students from the API and display them
        fetch('/api/students')
            .then(response => response.json())
            .then(data => {
                const studentList = document.getElementById('student-list');
                data.forEach(student => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${student.id}</td>
                        <td>${student.first_name}</td>
                        <td>${student.last_name}</td>
                        <td>${student.email}</td>
                        <td>
                            <a href="/students/${student.id}/edit" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger" onclick="deleteStudent(${student.id})">Delete</button>
                        </td>
                    `;
                    studentList.appendChild(row);
                });
            })
            .catch(error => console.log(error));

        // Function to handle deleting a student
        function deleteStudent(id) {
            if (confirm('Are you sure you want to delete this student?')) {
                fetch(`/api/students/${id}`, {
                    method: 'DELETE',
                })
                .then(response => response.json())
                .then(() => {
                    alert('Student deleted');
                    window.location.reload();
                })
                .catch(error => console.log(error));
            }
        }
    </script>
@endsection
