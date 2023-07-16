<?php require __DIR__ . "/../includes/header.php"; ?>

<?php if (!isset($_SERVER["HTTP_REFERER"])) {
    header("Location: ../index.php");
    exit;
} ?>

<div class="container m-auto w-50 m-5">
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=Ad-nCrw-bOJ2TdhKGnhQsRk786NaS810Nie-nXW9NPLI53yHqTzE1hf5DIMYGK2yDB_fGZAN4PQwgwsu&currency=USD">
    </script>
    <!-- Set up a container element for the button -->
    <h1 class="display-3 my-4">Pay to Book Your Room</h1>
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $_SESSION["price"]; ?>' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {

                    window.location.href = '../index.php';
                });
            }
        }).render('#paypal-button-container');
    </script>
</div>
<?php require __DIR__ . "/../includes/footer.php"; ?>