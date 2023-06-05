<?php
    include ("dbconnection.php"); 

    if (isset ($_POST['add_artwork'])) {
        $aname = $_POST['aname'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $year = $_POST['year'];
        $type = $_POST['type'];
        $group = $_POST['group'];

        if(!preg_match("/^[a-zA-Z- ']*$/",$aname)){
            echo "<script>alert('Name must contains only letter and whitespace!');window.location.href='../frontend/artwork.php'</script>";
            die();
        }
        if(preg_match("/^[0-9- ']*$/",$title)){
            echo '<script>alert("")</script>';
            echo "<script>alert('Please enter valid title!');window.location.href='../frontend/artwork.php'</script>";
            die();
        }
        if(preg_match("/^[0-9- ']*$/",$type)){
            echo "<script>alert('Please enter valid type!');window.location.href='../frontend/artwork.php'</script>";
            die();
        }
        if(preg_match("/^[0-9- ']*$/",$group)){
            echo "<script>alert('Please enter valid group!');window.location.href='../frontend/artwork.php'</script>";
                die();
        }
        $result = mysqli_query($con, "SELECT * FROM artist WHERE `aname` = '$aname'");
        $num_rows = mysqli_num_rows($result);
        if (!$num_rows) {
            echo "<script>alert('Artist does not exist!');window.location.href='../frontend/artwork.php'</script>";
            die();
        } else {                
            $sql = "INSERT INTO art_work (`TITLE`, `PRICE`, `YEAR`, `TYPE`, `ANAME`) VALUES ('$title','$price','$year','$type', '$aname');";
            /*$sql .= "INSERT INTO art_group(`GROUP_NAME`) VALUES ('$group');";*/
            $sql .= "INSERT INTO of_group(`TITLE`, `GROUP_NAME`) VALUES ('$title', '$group');";
            $res = mysqli_multi_query($con, $sql);
            if (!$res) {
                echo "No data inserted. Error : " . mysqli_error($con);
            } else {
                echo "<script>alert('Artwork added Successfully!');window.location.href='../frontend/artwork.php'</script>";
            }
        }
    }
?>