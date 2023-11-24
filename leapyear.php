<form method="POST">
    <label name="Leap year">Please enter year</label>
    <input type="text" name="leap_year">
    <input type="submit" name="sub">
</form>
<?php
if (isset($_POST['sub'])) {
    $year = $_POST['leap_year'];
    if ($year % 400 == 0) {
        echo "$year is a leap year";
    } elseif ($year % 100 == 0) {
        echo "$year is a not leap year";
    } elseif ($year % 4 == 0) {
        echo "$year is a leap year ";
    } else {
        echo "$year Not a leap year";
    }
}
?>