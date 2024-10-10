<!-- resources/views/invoice.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice</h1>
    <table>
        <tr>
            <th>Transaction ID:</th>
            <td>{{ $update->txnid }}</td>
        </tr>
        <tr>
            <th>Amount Paid:</th>
            <td>INR {{ $update->payment }}</td>
        </tr>
        <tr>
            <th>Cab Details:</th>
            <td>{{ $update->cab }}, <small>{{ $update->cabname }}</small></td>
        </tr>
        <tr>
            <th>Payer Name:</th>
            <td>{{ $update->name }}</td>
        </tr>
        <tr>
            <th>Contact:</th>
            <td>{{ $update->phone }}</td>
        </tr>
    </table>
</body>
</html>
