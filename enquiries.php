<?php

require "db_connect.php";

$sql = "SELECT * FROM enquiries
        ORDER BY date_submitted DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>View Enquiries</title>

<link rel="stylesheet" href="style.css">

</head>


<body>


<header>

<h1>Submitted Enquiries</h1>

</header>


<main>

<section>

<h2>Visitor Enquiries</h2>


<table>

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Service</th>

<th>Message</th>

<th>Date</th>

</tr>


<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" .
        htmlspecialchars($row["enquiry_id"]) .
        "</td>";

        echo "<td>" .
        htmlspecialchars($row["visitor_name"]) .
        "</td>";

        echo "<td>" .
        htmlspecialchars($row["email"]) .
        "</td>";

        echo "<td>" .
        htmlspecialchars($row["service"]) .
        "</td>";

        echo "<td>" .
        htmlspecialchars($row["message"]) .
        "</td>";

        echo "<td>" .
        htmlspecialchars($row["date_submitted"]) .
        "</td>";

        echo "</tr>";

    }

} else {

    echo "
    <tr>
        <td colspan='6'>
        No enquiries found.
        </td>
    </tr>
    ";

}

?>

</table>


<br>

<a href="index.html">
Return Home
</a>


</section>

</main>

</body>

</html>

<?php

$conn->close();

?>
