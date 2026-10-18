<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Using PHP Variables, arrays and operators</title>
    <!-- add other meta -->
</head>
<body>
    <h1>PHP Variables, Arrays and operators</h1>
    <?php
    $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    echo "<p>The days of the week in English are: <br> $days[0], $days[1], $days[2], $days[3], $days[4], $days[5], $days[6]</p>";
    $days[0] = "Dimanche";
    $days[1] = "Lundi";
    $days[2] = "Mardi";
    $days[3] = "Mercredi";
    $days[4] = "Jeudi";
    $days[5] = "Vendredi";
    $days[6] = "Samedi";
    echo "<p>The days of the week in French are: <br> $days[0], $days[1], $days[2], $days[3], $days[4], $days[5], $days[6]</p>";
    ?>
</body>
</html>