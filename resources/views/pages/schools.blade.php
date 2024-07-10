<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="Schools"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Schools"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <head>
            <title>Schools Management</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    padding: 20px;
                }
                .school-list, .add-school {
                    max-width: 1000px;
                    margin: 0 auto;
                    border: 1px solid #ccc;
                    padding: 20px;
                    background-color: #f9f9f9;
                    text-align: left;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    margin-bottom: 20px;
                }
                .school-list h2, .add-school h2 {
                    text-align: center;
                    color: #333;
                    margin-bottom: 20px;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    overflow: hidden;
                }
                table, th, td {
                    border: 1px solid #ccc;
                }
                th, td {
                    padding: 15px;
                    text-align: left;
                }
                th {
                    background-color: #007bff;
                    color: white;
                    font-weight: bold;
                }
                td {
                    background-color: #f9f9f9;
                }
                .form-group {
                    margin-bottom: 15px;
                }
                .form-group label {
                    display: block;
                    margin-bottom: 5px;
                    font-weight: bold;
                }
                .form-group input, .form-group select {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
                .form-group button {
                    background-color: #007bff;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                .form-group button:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
        <div class="school-list">
            <h2>Registered Schools</h2>
            <table>
                <thead>
                    <tr>
                        <th>School Name</th>
                        <th>District</th>
                        <th>Registration Number</th>
                        <th>Email</th>
                        <th>Representative</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school)
                        <tr>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->district }}</td>
                            <td>{{ $school->registration_number }}</td>
                            <td>{{ $school->email }}</td>
                            <td>{{ $school->representative }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="add-school">
            <h2>Add New School</h2>
            <form method="POST" action="{{ route('schools') }}">
                @csrf
                <div class="form-group">
                    <label for="schoolName">School Name</label>
                    <input type="text" id="schoolName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="district">District</label>
                    <input type="text" id="district" name="district" required>
                </div>
                <div class="form-group">
                    <label for="registrationNumber">Registration Number</label>
                    <input type="text" id="registrationNumber" name="registration_number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="representative">Representative</label>
                    <input type="text" id="representative" name="representative" required>
                </div>
                <div class="form-group">
                    <button type="submit">Add School</button>
                </div>
            </form>
        </div>
        </body>
        <x-footers.auth></x-footers.auth>
    </main>
    <x-plugins></x-plugins>
</x-layout>
