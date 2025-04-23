@extends('layouts.app')

@section('content')
    <h2>Student Details</h2>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Name: <span id="studentName"></span></h5>
            <p class="card-text">Email: <span id="studentEmail"></span></p>
        </div>
    </div>

    <script>
        let studentId = window.location.pathname.split('/').pop();
        
        fetch(`/api/students/${studentId}`)
            .then(response => response.json())
            .then(student => {
                document.getElementById('studentName').textContent = student.name;
                document.getElementById('studentEmail').textContent = student.email;
            });
    </script>
@endsection
