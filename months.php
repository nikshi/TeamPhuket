<div class="post-lists">
    <h2>Months</h2>
    <ul class="nav nav-tabs">
        <li><a href="months.php">January(2)</a></li>
        <li><a href="months.php">March(7)</a></li>
        <li><a href="#">September(1)</a></li>
        <li><a href="#">Octomber(4)</a></li>
        <li><a href="#">November(5)</a></li>
        <li><a href="#">Octomber(4)</a></li>
        <li><a href="#">November(5)</a></li>
        <li><a href="#">Octomber(4)</a></li>
        <li><a href="#">November(5)</a></li>
        <li><a href="#">Octomber(4)</a></li>
        <li><a href="#">November(5)</a></li>
    </ul>
</div>

<?php

require 'config.php';
$monthQuery = "SELECT title FROM posts WHERE MONTH(date) = 12 AND YEAR(date) = 2014";
$arr = $con->query($monthQuery);
var_dump($arr->fetch_all());
?>