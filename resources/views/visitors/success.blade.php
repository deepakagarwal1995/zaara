<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Receipt</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .receipt-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .receipt-header .company-logo img {
            width: 100px;
        }

        .receipt-header .company-details {
            text-align: right;
        }

        .company-details h2 {
            margin: 0;
            font-size: 18px;
        }

        .booking-details {
            margin-bottom: 30px;
        }

        .booking-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .booking-details th,
        .booking-details td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .booking-details th {
            background-color: #f0f0f0;
            font-weight: 500;
        }

        .receipt-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .total-amount {
            font-size: 22px;
            color: #4CAF50;
        }

        .print-button {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .print-button i {
            margin-right: 8px;
        }

        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {

            .receipt-header,
            .receipt-footer {
                flex-direction: column;
                text-align: center;
            }

            .company-details {
                text-align: center;
                margin-top: 10px;
            }

            .print-button {
                width: 100%;
                justify-content: center;
            }
        }

        /* PRINT STYLES */
        @media print {
            body {
                background-color: #fff;
                margin: 0;
            }

            .receipt-container {
                box-shadow: none;
                max-width: 100%;
                border: none;
            }

            .receipt-header,
            .receipt-footer {
                flex-direction: row;
                justify-content: space-between;
            }

            .print-button {
                display: none;
            }

            /* Customize table appearance for printing */
            .booking-details th,
            .booking-details td {
                font-size: 14px;
                padding: 8px;
            }

            .total-amount {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    @php
        $package = '';
        $drop = '';
        if ($update->type == 'Local_Trip') {
            if ($update->package == 8) {
                $package = '<tr><th>Package:</th><td>8Hr 80 Kms</td></tr>';
            } elseif ($update->package == 12) {
                $package = '<tr><th>Package:</th><td>12Hr 120 Kms</td></tr>';
            }
        } else {
            $drop =
                '<tr><th>Drop City:</th><td>' .
                $update->plocation .
                '</td></tr>
    <tr><th>Drop Date:</th><td>' .
                $update->ddate .
                '</td></tr>';
        }
        $type = str_replace('_', ' ', $update->type);
    @endphp
    <div class="receipt-container">
        <h1>Booking Receipt</h1>

        <div class="receipt-header">
            <div class="company-logo">
                <img src="{{ config('app.url') }}/assets/images/Zaara-Logo.svg" alt="Zaara Logo">
            </div>
            <div class="company-details">
                <h2>Zaara Travels</h2>
                <address>Rani Garden Geeta Colony East Delhi 110031<br>
                    Email: info@zaaratravel.com<br>
                    Phone: +919933992786</address>
            </div>
        </div>

        <div class="booking-details">
            <h3>Booking Information</h3>
            <table>
                <tr>
                    <th>Booking ID:</th>
                    <td>{{ $update->id }}</td>
                </tr>
                <tr>
                    <th>Transaction Id:</th>
                    <td>{{ $update->txnid }}</td>
                </tr>
                <tr>
                    <th>Service Type:</th>
                    <td>{{ $type }}</td>
                </tr>
                @php
                    echo $package;
                @endphp
                <tr>
                    <th>Cab Name:</th>
                    <td>{{ $update->cab }}</td>
                </tr>
                <tr>
                    <th>Cab Type:</th>
                    <td>{{ $update->cabname }}</td>
                </tr>
                <tr>
                    <th>Pickup City:</th>
                    <td>{{ $update->plocation }}</td>
                </tr>
                <tr>
                    <th>Pickup Date:</th>
                    <td>{{ $update->pdate }} ({{ $update->ptime }})</td>
                </tr>
                @php
                    echo $drop;
                @endphp

                <tr>
                    <th>Amount Paid:</th>
                    <td>Rs {{ $update->payment }}</td>
                </tr>

            </table>
        </div>

        <div class="receipt-footer">
            <p class="total-amount">Total: Rs {{ $update->price }}</p>
            <button class="print-button" onclick="window.print()">
                <i class="fas fa-print"></i> Print Receipt
            </button>
        </div>
    </div>

</body>

</html>
