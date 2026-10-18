<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>

    <?php
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["firstname"])) {
        $err_msg = "";
        $firstname = $_POST["firstname"];
        $lastname  = $_POST["lastname"];
        $age       = $_POST["age"];

        // First name validation
        if (trim($firstname) == "") {
            $err_msg .= "<p>Please enter your first name.</p>";
        } else {
            $firstname = sanitize_input($firstname);
            if (!preg_match("/^[a-zA-Z]{2,20}$/", $firstname)) {
                $err_msg .= "<p>Only letters (2-20 characters) are allowed in first name.</p>";
            }
        }

        // Last name validation
        if (trim($lastname) == "") {
            $err_msg .= "<p>Please enter your last name.</p>";
        } else {
            $lastname = sanitize_input($lastname);
            if (!preg_match("/^[a-zA-Z]{2,20}$/", $lastname)) {
                $err_msg .= "<p>Only letters (2-20 characters) are allowed in last name.</p>";
            }
        }

        // Age validation: must be numeric, between 0 and 99
        if (trim($age) == "" || !is_numeric($age) || $age < 0 || $age > 99) {
            $err_msg .= "<p>Please enter a valid age between 0 and 99.</p>";
        } else {
            $age = sanitize_input($age);
        }

        // Species validation
        if (!isset($_POST["species"])) {
            $err_msg .= "<p>Please select a species.</p>";
        } else {
            $species_code = sanitize_input($_POST["species"]);
            $species_map = ["M" => "Human", "D" => "Dwarf", "E" => "Elf", "H" => "Hobbit"];
            $species = isset($species_map[$species_code]) ? $species_map[$species_code] : "Unknown";
        }

        // Tours checkboxes (updated to "1 Day Tour")
        $tours = array();
        if (isset($_POST["accom"])) $tours[] = "One-Day Tour";
        if (isset($_POST["4day"])) $tours[] = "Four-Day Tour";
        if (isset($_POST["10day"])) $tours[] = "10 Day Tour";
        $tour_string = !empty($tours) ? implode(" and ", $tours) : "None";

        // Food and Party Size validation
        $food = sanitize_input($_POST["food"]);
        $partysize = $_POST["partysize"];
        
        // Party size validation: must be numeric and minimum 1
        if (trim($partysize) == "" || !is_numeric($partysize) || $partysize < 1) {
            $err_msg .= "<p>Please enter a valid party size of at least 1.</p>";
        } else {
            $partysize = sanitize_input($partysize);
        }

        // Display errors or success message
        if ($err_msg != "") {
            echo "<div style='color:red;'>$err_msg</div>";
            echo "<p><a href='register.html'>Return to Form</a></p>";
        } 
        else {
            echo "<p>Welcome $firstname $lastname!<br />";
            echo "You are now booked on the $tour_string<br />";
            echo "Species: $species<br />";
            echo "Age: $age<br />";
            echo "Meal Preference: $food<br />";
            echo "Number of travellers: $partysize</p>";
        }
    }
    else {
        header("location:register.html");
        exit();
    }
    ?>
</body>
</html>