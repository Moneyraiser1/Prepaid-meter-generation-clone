<?php
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    global $db;
    $screenInfo = $_POST['screen'];

    $fetchQuery = $db->prepare("SELECT * FROM prepaid WHERE metre_code = :screenInfo AND status = 'unused'");
    $fetchQuery->bindParam(':screenInfo', $screenInfo, PDO::PARAM_STR);
    $fetchQuery->execute();
    $data = $fetchQuery->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        $checkUsedQuery = $db->prepare("SELECT * FROM used_code WHERE meter_code = :screenInfo");
        $checkUsedQuery->bindParam(':screenInfo', $screenInfo, PDO::PARAM_STR);
        $checkUsedQuery->execute();
        $usedData = $checkUsedQuery->fetch(PDO::FETCH_ASSOC);

        if ($usedData) {
            echo "ALREADY USED";
        } else {
            $updateQuery = $db->prepare("UPDATE prepaid SET status = 'used' WHERE metre_code = :screenInfo AND status = 'unused'");
            $updateQuery->bindParam(':screenInfo', $screenInfo, PDO::PARAM_STR);
            $updateQuery->execute();

            if ($updateQuery->rowCount() > 0) {
                $insertQuery = $db->prepare("INSERT INTO used_code (meter_code) VALUES (:screenInfo)");
                $insertQuery->bindParam(':screenInfo', $screenInfo, PDO::PARAM_STR);
                $insertQuery->execute();

                // Delete after inserting
                $deleteQuery = $db->prepare("DELETE FROM prepaid WHERE metre_code = :screenInfo");
                $deleteQuery->bindParam(':screenInfo', $screenInfo, PDO::PARAM_STR);
                $deleteQuery->execute();

                echo "SUCCESS";
            } else {
                echo "ALREADY USED OR INVALID";
            }
        }
    } else {
        echo "INVALID";
    }
}
?>
