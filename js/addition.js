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
                alert("Invalid Code! Please try again.");
            }
        },
        error: function() {
            alert("Server error! Please try again.");
        }
    });
}
