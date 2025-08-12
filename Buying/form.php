<?php include '../inc/header.php'; ?>
<?php include '../config/config.php'; ?>
<?php include '../inc/functions.php'; ?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-7 border-rounded shadow">
            <h4 class="display-6 lead text-center">Buy prepaid Electricity here</h4>

            <form action="" method="post" class="form-control my-3">
                <div class="mb-3 mt-3">
                    <label for="m_number" class="form-label">Metre Number:</label>
                    <input type="text" class="form-control" id="m_number" placeholder="Enter Metre number" name="m_number">
                </div>
                
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount:</label>
                    <input type="text" class="form-control" id="amount" style="width: 50%;" placeholder="Enter Amount" name="amount" oninput="calculateUnits()">
                    
                    <label for="n_units" style="position: relative; left: 50%; top: -67px;" class="form-label">Number of Units:</label>
                    <input type="text" class="form-control" id="n_units" style="width: 50%; position: relative; top: -38px; float: right;" placeholder="Enter Number of Units" name="n_units" oninput="calculateAmount()">
                </div>
                
                <div class="mb-3">
                    <label for="pmeth" class="form-label">Payment Method:</label>
                    <input type="text" class="form-control" id="pmeth" placeholder="Enter Credit Card Number" name="pmeth">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
            </form>
            
            <a class="text-center" href="../index.php">load electricity here</a>
            <?php BuyData(); ?>
        </div>
    </div>
</div>

<script src="<?= APPUTL ?>/jquery/jquery.min.js"></script>
<script src="<?= APPUTL ?>/js/bootstrap.min.js"></script>

<script>
    const unitRate = 1000; // Example: 1 unit = 10 currency (adjust as per your tariff)

    function calculateUnits() {
        let amount = document.getElementById("amount").value;
        if (amount) {
            document.getElementById("n_units").value = (parseFloat(amount) / unitRate).toFixed(2);
        }
    }

    function calculateAmount() {
        let units = document.getElementById("n_units").value;
        if (units) {
            document.getElementById("amount").value = (parseFloat(units) * unitRate).toFixed(2);
        }
    }
</script>

</body>
</html>
