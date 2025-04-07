<!DOCTYPE html>
<html>

<head>
    <title>New Appointment Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2C3E50;
            text-align: center;
        }

        .info {
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888;
            text-align: center;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 300px;
            /* Ensures logo is responsive */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logo Section -->
        {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/admin/logo/comprehensive-orthopedic-physical-therapy-logo-somerset-nj-300x138.png'))) }}"
            alt="Comprehensive Orthopedic Physical Therapy Logo" class="logo"> --}}



        <!-- Title -->
        <h1>New Appointment Request</h1>

        <!-- Greeting -->
        <p>Hello, <strong>Coptnj Team</strong></p>

        <!-- Appointment Details -->
        <div class="info">
            <p><span class="label">Name:</span> {{ $details['name'] ?? 'N/A' }}</p>
            <p><span class="label">Email:</span> {{ $details['email'] ?? 'N/A' }}</p>
            <p><span class="label">Phone:</span> {{ $details['phone'] ?? 'N/A' }}</p>
            <p><span class="label">Appointment Date:</span> {{ $details['date'] ?? 'N/A' }}</p>
            <p><span class="label">Service Time:</span> {{ $details['service_time'] ?? 'N/A' }}</p>
            <p><span class="label">Service Reference:</span> {{ $details['service_refer'] ?? 'N/A' }}</p>
            <p><span class="label">Prefer Location for Visit :</span>
                {{ $details['prefer_location_for_visit'] ?? 'N/A' }}</p>
            <p><span class="label">Message:</span> {{ $details['message'] ?? 'N/A' }}</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ now()->year }} Comprehensive Orthopedic Physical Therapy. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
