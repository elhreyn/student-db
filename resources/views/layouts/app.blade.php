<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="py-4">
            <h1 class="text-center">Student Management System</h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">Home</a>
                <a class="navbar-brand" href="/students">Students</a>
                <a class="navbar-brand" href="/student/create">Add Student</a>
            </nav>
        </header>
        
        @yield('content')  <!-- This is where the page content will be inserted -->
        
        <footer class="mt-5 py-4 text-center bg-light">
            <p>&copy; 2025 Student Management System</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
