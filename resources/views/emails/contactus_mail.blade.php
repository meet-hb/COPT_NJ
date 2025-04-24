<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <style>
        /* Reset styles for email clients */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #00bfb3;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
            color: #333333;
        }

        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .footer {
            background-color: #f4f4f4;
            color: #666666;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        @media screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
            }

            .content h1 {
                font-size: 20px;
            }

            .content p {
                font-size: 14px;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center" style="padding: 20px;">
                <!-- Email Container -->
                <div class="email-container">
                    <!-- Header -->
                    <div class="header">
                        <img src="https://coptnj.com/storage/configuration/main_logo.png" alt="Company Logo">
                        <h1>New Contact Request</h1>
                    </div>
                    <!-- Content -->
                    <div class="content">
                        <h3>Hello, COPTNJ Team</h3>
                        <p><b class="label">Name:</b> {{ $details['name'] ?? 'N/A' }}</p>
                        <p><b class="label">Email:</b> {{ $details['email'] ?? 'N/A' }}</p>
                        <p><b class="label">Phone:</b> {{ $details['phone'] ?? 'N/A' }}</p>
                        <p><b class="label">Subject:</b> {{ $details['subject'] ?? 'N/A' }}</p>
                        <p><b class="label">Message:</b> {{ $details['message'] ?? 'N/A' }}</p>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <p>&copy; {{ now()->year }} Comprehensive Orthopedic Physical Therapy. All rights reserved.
                        </p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
