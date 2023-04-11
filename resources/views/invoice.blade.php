<!DOCTYPE html>
<html>
<head>
    <title>Invoice Viewer</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom CSS files here -->
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Invoice #12345/ {{ $invoice->invoice_no }}</h1>
            </div>
            <div class="col-md-6 text-right">
                <h2>Invoice Details</h2>
                <p>Amount: {{ $invoice->total }}</p>
                <p>Date: {{ $invoice->date }}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Customer Details</h2>
                <p>Customer: John Doe</p>
                <p>Email: john@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
            <div class="col-md-6 text-right">
                <h2>Payment Details</h2>
                <p>Payment Method: Credit Card</p>
                <p>Card Number: ** ** **** 1234</p>
                <p>Expiry Date: 03/25</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Invoice Items</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product 1</td>
                            <td>Product description</td>
                            <td>2</td>
                            <td>$50.00</td>
                            <td>$100.00</td>
                        </tr>
                        <tr>
                            <td>Product 2</td>
                            <td>Product description</td>
                            <td>1</td>
                            <td>$50.00</td>
                            <td>$50.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">Subtotal</td>
                            <td>$150.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Tax (10%)</td>
                            <td>$15.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Total</td>
                            <td>{{ $invoice->total }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS and other JS files here -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>