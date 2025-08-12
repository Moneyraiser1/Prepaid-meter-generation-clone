<?php

    function BuyData(){
        global $db;
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){

            $m_number = $_POST['m_number'];
            $e_amount = $_POST['amount'];
            $n_units = $_POST['n_units'];
            $pmeth = $_POST['pmeth'];

            if(empty($_POST['m_number']) || empty($_POST['amount']) || empty($_POST['n_units']) || empty($_POST['pmeth'])){
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Inputs should not be Empty</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
      
                </div>';
                header('refresh: 3, form.php');
                exit();
            }else{

                $code = random_int(1000000, 9999999);
                $updateQuery = $db->prepare('INSERT INTO prepaid(metre_name,electricity_amount,no_unit,metre_code) VALUES(:mn, :ea, :nu, :mc)');

                $updateQuery->bindParam(':mn', $m_number, PDO::PARAM_STR);
                $updateQuery->bindParam(':ea', $e_amount, PDO::PARAM_STR);
                $updateQuery->bindParam(':nu', $n_units, PDO::PARAM_STR);
                $updateQuery->bindParam(':mc', $code, PDO::PARAM_STR);

              if ($updateQuery->execute()) {

                
                $fetchQuery = $db->query("SELECT * FROM prepaid WHERE status = 'unused'");
                $fetchQuery->execute();
                $data = $fetchQuery->fetchAll(PDO::FETCH_ASSOC);

                foreach($data as $datas){

                    echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Code transaction successful!</strong> Your meter code is: "'.$datas['metre_code'].'"
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                } else {
                    echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Failed to update record!</strong> Please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }


                }
        }
    }


    


?>