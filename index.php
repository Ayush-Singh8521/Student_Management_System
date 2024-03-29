<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body bgcolor="SlateBlue">
    <div class="outer-container">
        <!-- Main Container -->
        <div class="container">
            <h4>&copy;RUAS Student Management System</h4>
            <img src="logo.png" height="60" width="200" alt="RUAS Logo">
            <!-- Insert Data Form -->
            <h4>Insert Student Data:</h4>
            <form action="index.php" method="post">
                <input type="text" name="Name" placeholder="Name">
                <input type="text" name="Reg_Number" placeholder="Reg_Number">
                <div class="form-group">
                    <label for="Branch_Name"><h4>Branch:<h4></label>
                    <select id="Branch_Name" name="Branch_Name" required>
                        <option value="" disabled selected>Select your branch</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                        <option value="Information Science and Engineering">Information Science and Engineering</option>
                        <option value="Artificial Intelligence and Machine Learning">Artificial Intelligence and Machine Learning</option>
                        <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                    </select>
                </div>
                <input type="text" name="Contact_Number" placeholder="Contact_Number">
                <input type="email" name="your_email" placeholder="Email">
                <textarea name="Address" rows="7" placeholder="Your Address"></textarea>
                <section id="fee" class="section">
                    <p style="font-size: 20px; color: white;">Fee Payment-> </p>
                    <label for="paymentID"<p style="font-size: 20px; color: white;">Payment ID:</p></label>
                    <input type="text" id="paymentID" name="paymentID">
                    <label for="Name"<p style="font-size: 20px; color: white;">Amount:</p></label>
                    <input type="text" id="amount" name="amount">
                    <input type="submit" value="Submit" id="submit">
                </section>
            </form>
        </div>
        <!-- Search Form -->
        <form action="" method="post" class="search-form">
            <input type="text" name="searchReg_Number" placeholder="Enter Reg_Number to search">
            <input type="submit" value="Search">
        </form>
        <!-- Delete Form -->
<form action="" method="post" class="delete-form">
    <input type="text" name="deleteReg_Number" placeholder="Enter Reg_Number to delete">
    <input type="submit" value="Delete">
</form>
<!-- Update Form -->
 <!-- Update Container -->
 <div class="container">
            <h4>Update Student Data:</h4>
            <form action="index.php" method="post">
                <input type="text" name="updateReg_Number" placeholder="Reg_Number to update">
                <input type="text" name="updatedName" placeholder="Updated Name">
                <select id="updatedBranch_Name" name="updatedBranch_Name" required>
                        <option value="" disabled selected>Select your branch to update</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                        <option value="Information Science and Engineering">Information Science and Engineering</option>
                        <option value="Artificial Intelligence and Machine Learning">Artificial Intelligence and Machine Learning</option>
                        <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                        </select><br><br>
                <input type="text" name="Contact_NO" placeholder="Contact_NO">
                <input type="text" name="Update_Email" placeholder="Update_Email">
                <input type="submit" value="Update" id="submit-update">
            </form>

        <!-- Output Container -->
        <div class="output-container">
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laptop";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form for inserting data is submitted
    if (isset($_POST['Name']) && isset($_POST['Reg_Number']) && isset($_POST['Branch_Name']) && isset($_POST['Contact_Number']) && isset($_POST['your_email']) && isset($_POST['Address']) && isset($_POST['paymentID']) && isset($_POST['amount'])) {
        $Name = $_POST['Name'];
        $Reg_Number = $_POST['Reg_Number'];
        $Branch_Name = $_POST['Branch_Name'];
        $Contact_Number = $_POST['Contact_Number'];
        $your_email = $_POST['your_email']; 
        $Address = $_POST['Address'];
        $paymentID = $_POST['paymentID'];
        $amount = $_POST['amount'];

        $sql = "INSERT INTO laptop (`sno.`,`Name`, `Reg_Number`, `Branch_Name`, `Contact_Number`, `your_email`, `Address`, `paymentID`, `amount`)
                VALUES (NULL,'$Name', '$Reg_Number', '$Branch_Name', '$Contact_Number', '$your_email', '$Address', '$paymentID', '$amount')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Check if form is submitted for search
    if (isset($_POST['searchReg_Number'])) {
        $searchReg_Number = $_POST['searchReg_Number'];
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to search for details based on Reg_Number
            $sql = "SELECT * FROM laptop WHERE Reg_Number='$searchReg_Number'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<h2>Student Details:</h2>";
                    echo "<p><strong>Name:</strong> " . $row["Name"]. "</p>";
                    echo "<p><strong>Reg_Number:</strong> " . $row["Reg_Number"]. "</p>";
                    echo "<p><strong>Branch_Name:</strong> " . $row["Branch_Name"]. "</p>";
                    echo "<p><strong>Contact_Number:</strong> " . $row["Contact_Number"]. "</p>";
                    echo "<p><strong>Email:</strong> " . $row["your_email"]. "</p>";
                    echo "<p><strong>Address:</strong> " . $row["Address"]. "</p>";
                    echo "<p><strong>Payment ID:</strong> " . $row["paymentID"]. "</p>";
                    echo "<p><strong>Amount:</strong> " . $row["amount"]. "</p>";
                }
            } else {
                echo "No results found for Reg_Number: $searchReg_Number";
            }
        }
    }
    // Check if form is submitted for deletion
    if (isset($_POST['deleteReg_Number'])) {
        $deleteReg_Number = $_POST['deleteReg_Number'];
       $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // SQL query to delete the row based on Reg_Number
        $sql = "DELETE FROM laptop WHERE Reg_Number='$deleteReg_Number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record with Reg_Number: $deleteReg_Number deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
     
    }
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laptop";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted for updating
    if (isset($_POST['updateReg_Number']) && isset($_POST['updatedName']) && isset($_POST['updatedBranch_Name']) && isset($_POST['Contact_NO'])  && isset($_POST['Update_Email'])) {
        $updateReg_Number = $_POST['updateReg_Number'];
        $updatedName = $_POST['updatedName'];
        $updatedBranch_Name = $_POST['updatedBranch_Name'];
        $Contact_NO = $_POST['Contact_NO'];
        $Update_Email=$_POST['Update_Email'];

        // SQL query to update the row based on Reg_Number
        $sql = "UPDATE laptop SET Name='$updatedName', Branch_Name='$updatedBranch_Name', Contact_Number='$Contact_NO',your_email='$Update_Email' WHERE Reg_Number='$updateReg_Number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record with Reg_Number: $updateReg_Number updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    // Close the connection
    $conn->close();
}
?>
