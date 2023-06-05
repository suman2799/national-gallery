<?php
    include ("dbconnection.php"); 

    if (isset ($_POST['purchase_artwork'])) {
        $cname = $_POST['cname'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $remark = $_POST['remark'];
        
        if(!preg_match("/^[a-zA-Z- ']*$/",$cname)){
            echo "<script>alert('Name must contains only letter and whitespace!');window.location.href='../frontend/purchase.php'</script>";
            die();
        }
        if(preg_match("/^[0-9- ']*$/",$title)){
            echo "<script>alert('Please enter valid title!');window.location.href='../frontend/purchase.php'</script>";
            die();
        }
        $result = mysqli_query($con, "SELECT * FROM customer, art_work WHERE `cname` = '$cname' AND `title` = '$title'");
        $num_rows = mysqli_num_rows($result);
        if (!$num_rows) {
            echo "<script>alert('Customer or Artwork does not exist.');window.location.href='../frontend/purchase.php'</script>";
            die();
        } else {                
            $sql = "INSERT INTO buy (`TITLE`, `CNAME`, `DATE`, `REMARK`) VALUES ('$title','$cname', '$date', '$remark');";
            $money =  "SELECT PRICE FROM art_work where TITLE = '$title'";
            $result = $con->query($money);
            $data = $result->fetch_assoc();
            $a = $data["PRICE"];
            $result = mysqli_query($con, "SELECT TITLE FROM buy WHERE `TITLE` = '$title'");
            $num_rows = mysqli_num_rows($result);
            if ($num_rows != 0) {
                echo "<script>alert('Artwork is already sold!');window.location.href='../frontend/purchase.php'</script>";
                die();
            }
            $update = "UPDATE customer SET TOTAL_AMOUNT_SPENT  = TOTAL_AMOUNT_SPENT + '$a' where CNAME = '$cname' ;";
            mysqli_query($con, $update);
            $res = mysqli_query($con, $sql);
            if (!$res) {
                echo "No data inserted. Error : " . mysqli_error($con);
            } else {
                echo "<script>alert('Artwork Purchased Successfully!');window.location.href='../frontend/artist.php'</script>";
            }
        }
    }
?>