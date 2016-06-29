<?php
require_once 'session.php';
?>
<html>
<head>
    <title>rp</title>
<head/>
<body>
    <h1>Welcome <?php echo $login_session; ?></h1> 
    <h2><a href = "logout.php">Sign Out</a></h2>
    <ul>
        <li><a href="raw.php?h=1">RAW Disciplines Data by 56 Cat 1H2016</a></li>
        <li><a href="raw.php?h=2">RAW Disciplines Data by 56 Cat 2H2016 (FC)</a></li>
        <li><a href="sub.php?h=1&d=Creative">RAW Creative 1H2016</a></li>
        <li><a href="sub.php?h=2&d=Creative">RAW Creative 2H2016 (FC)</a></li>
        <li><a href="sub.php?h=1&d=Display">RAW Display 1H2016</a></li>
        <li><a href="sub.php?h=2&d=Display">RAW Display 2H2016 (FC)</a></li>
        <li><a href="sub.php?h=1&d=Facebook">RAW Facebook 1H2016</a></li>
        <li><a href="sub.php?h=2&d=Facebook">RAW Facebook 2H2016 (FC)</a></li>
        <li><a href="sub.php?h=1&d=Instagram">RAW Instagram 1H2016</a></li>
        <li><a href="sub.php?h=2&d=Instagram">RAW Instagram 2H2016 (FC)</a></li>
        <li><a href="sub.php?h=1&d=VDO">RAW VDO 1H2016</a></li>
        <li><a href="sub.php?h=2&d=VDO">RAW VDO 2H2016 (FC)</a></li>
        <li><a href="sub.php?h=1&d=YouTube">RAW YouTube 1H2016</a></li>
        <li><a href="sub.php?h=2&d=YouTube">RAW YouTube 2H2016 (FC)</a></li>
        <li><a href="part2.php">Part2</a></li>
    </ul>
</body>
</html>