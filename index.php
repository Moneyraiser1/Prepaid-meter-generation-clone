<?php

include 'inc/functions.php'; 
include 'inc/header.php';
include 'config/config.php';



?>

<style>
    .btn-primary, .btn-danger, .btn-success {
    width: 100px; /* Adjust size as needed */
    height: 100px;
    border-radius: 50% !important;
    font-size: 20px;
    text-align: center;
    padding: 10px;
}
</style>
    <div class="container mt-2">
        <div class="row justify-content-center ">
            <div class="col-md-5">
                <div class="card meter-card shadow">
                    <div class="card-body text-center p-4">
                    <a class="text-center" href="Buying/form.php">Buy electricity here</a>
                        <h4 class="card-title">Prepaid Meter</h4>
                        <input type="text" id="meterInput" class="form-control text-center mb-3" placeholder="Enter Code" readonly name="screen">
                        <div class="keypad">
                            <div class="row">
                                <div class="col-4">
                                <button class="btn btn-primary mb-2 shadow rounded-circle display-6" onclick="appendNumber(1)">1</button>
                            
                                </div>
                                <div class="col-4">
                                <button class="btn btn-primary shadow mb-2 rounded-circle display-6" onclick="appendNumber(2)">2</button>
                            
                                </div>
                                <div class="col-4">
                                <button class="btn btn-primary shadow mb-2 rounded-circle display-6" onclick="appendNumber(3)">3</button><br>
                            
                                </div>
                                <div class="col-4">
                                <button class="btn btn-primary shadow mb-2 rounded-circle display-6" onclick="appendNumber(4)">4</button>
                            
                                </div>
                                <div class="col-4">
                                <button class="btn btn-primary shadow mb-2 rounded-circle display-6" onclick="appendNumber(5)">5</button>
                        
                                </div>
                                <div class="col-4">
                                <button class="btn btn-primary shadow mb-2 rounded-circle display-6" onclick="appendNumber(6)">6</button><br>
                            
                                </div>
                                <div class="col-4">
                                <button class="btn btn-primary shadow mb-2 rounded-circle display-6" onclick="appendNumber(7)">7</button>
                        
                                </div>
                                <div class="col-4">
                                <button class="btn btn-primary mb-2 shadow rounded-circle display-6" onclick="appendNumber(8)">8</button>
                        
                                </div>
                                <div class="col-4">
                                <button class="btn btn-primary mb-2 shadow rounded-circle display-6" onclick="appendNumber(9)">9</button><br>
                                
                                </div>
                                
                                <div class="col-4">
                                <button class="btn btn-danger mb-2 shadow rounded-circle display-6" onclick="backspace()">⌫</button>
                                </div>

                                <div class="col-4">
                                <button class="btn btn-primary mb-2 shadow rounded-circle display-6" onclick="appendNumber(0)">0</button>
                                </div>
                                <div class="col-4">
                                <button class="btn btn-danger mb-2 shadow rounded-circle display-6" onclick="clearInput()">C</button><br>
                                </div>
            
                                <div class="col-md-12">
                                    <button class="btn btn-success" onclick="submitCode()">✔ Submit</button>
                                </div>

                                
                            </div>
                        </div>
                        <?php 
                        global $db;

                        $fetchQuery = $db->query("SELECT * FROM prepaid WHERE status = 'unused'");
                        $fetchQuery->execute();
                        $data = $fetchQuery->fetchAll(PDO::FETCH_ASSOC);
 
                        foreach ($data as $row):
                        ?>
                        
                    </div>
                    
                        <div class="alert alert-success alert-dismissible fade show mx-4" role="alert" >
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                            <?= $row['metre_code'] ?>
                            <?php endforeach; ?>
                        </div>
                </div>
               

              
            </div>
        </div>
    </div>
    <!-- <script src="js/addition.js"></script> -->

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<script>
    function appendNumber(num) {
    document.getElementById('meterInput').value += num;
}
function clearInput() {
    document.getElementById('meterInput').value = '';
}
function backspace() {
    let input = document.getElementById('meterInput');
    input.value = input.value.slice(0, -1);
}function submitCode() {
    var meterCode = document.getElementById("meterInput").value;

    $.ajax({
        type: "POST",
        url: "process.php",
        data: { screen: meterCode },
        success: function(response) {
            if (response.trim() === "SUCCESS") {
                alert("Code accepted! Electricity credited.");
                $("#meterInput").val(""); // Clear input field
            } else if (response.trim() === "ALREADY USED") {
                alert("Code accepted! Electricity credited.");
            } else {
                alert("Code accepted! Electricity credited.");;
            }
        },
        error: function() {
            alert("Server error! Please try again.");
        }
    });
}

</script>