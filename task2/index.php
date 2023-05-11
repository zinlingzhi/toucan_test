<?php
// Establish database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Get name parameter from POST request
$name = $_POST["name"];

// Prepare SQL statement to retrieve profiles and emails data
$sql = "SELECT p.Firstname, p.Surname, e.emailaddress
		FROM profiles p
		INNER JOIN emails e
		ON p.UserRefID = e.UserRefID
		WHERE p.Firstname LIKE '%$name%' AND p.Deceased = 0 AND e.Default = 1
		GROUP BY p.UserRefID, e.emailaddress
		HAVING COUNT(*) > 1";

// Execute SQL statement and retrieve results
$result = $conn->query($sql);

// Generate HTML output for results
if ($result->num_rows > 0) {
	echo "<table><tr><th>Firstname</th><th>Surname</th><th>Email Address</th></tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["Firstname"]."</td><td>".$row["Surname"]."</td><td>".$row["emailaddress"]."</td></tr>";
	}
	echo "</table>";
} else {
	echo "No results found.";
}

// Close database connection
$conn->close();
?>