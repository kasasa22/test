    <x-layout bodyClass="g-sidenav-show bg-gray-200">
        <x-navbars.sidebar activePage="Challenges"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Challenges"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <head>
                <title>Challenges</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        padding: 20px;
                    }
                    .challenge-list, .new-challenge-form {
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
                    .challenge-list h2, .new-challenge-form h2 {
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
                    .status-open {
                        color: green;
                        font-weight: bold;
                    }
                    .status-closed {
                        color: red;
                        font-weight: bold;
                    }
                    .status-upcoming {
                        color: orange;
                        font-weight: bold;
                    }
                    .form-group {
                        margin-bottom: 15px;
                    }
                    .form-group label {
                        display: block;
                        margin-bottom: 5px;
                        font-weight: bold;
                    }
                    .form-group input, .form-group textarea, .form-group select {
                        width: 100%;
                        padding: 10px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        box-sizing: border-box;
                    }
                    .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
                        outline: none;
                        border-color: #007bff;
                        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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

            <div class="challenge-list">
                <h2>Challenges</h2>
                <table id="challengesTable">
                    <thead>
                        <tr>
                            <th>Challenge Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration (minutes)</th>
                            <th>Number of Questions</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($challenges as $challenge)
                            <tr>
                                <td>{{ $challenge->name }}</td>
                                <td>{{ $challenge->start_date }}</td>
                                <td>{{ $challenge->end_date }}</td>
                                <td>{{ $challenge->duration }}</td>
                                <td>{{ $challenge->number_of_questions }}</td>
                                <td class="status-{{ $challenge->status }}">{{ ucfirst($challenge->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="new-challenge-form">
                <h2>Create New Challenge</h2>
                <form id="newChallengeForm" method="POST" action="{{ url('/challenges') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Challenge Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration (minutes)</label>
                        <input type="number" id="duration" name="duration" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="number_of_questions">Number of Questions</label>
                        <input type="number" id="number_of_questions" name="number_of_questions" class="form-control" required>
                    </div>
                    <button type="submit">Create Challenge</button>
                </form>

            </div>

        </body>
        <x-footers.auth></x-footers.auth>
    </main>
    <x-plugins></x-plugins>
</x-layout>
