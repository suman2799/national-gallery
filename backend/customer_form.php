<?php
    include ("dbconnection.php"); 

        if (isset ($_POST['add_customer'])) {
        $cname = $_POST['cname'];
        $address= $_POST['address'];

        if(!preg_match("/^[a-zA-Z- ']*$/",$cname)){
            echo "<script>alert('Name must contains only letter and whitespace!');window.location.href='../frontend/customer.php'</script>";
            die();
        }
        if(preg_match("/^[0-9- ']*$/",$address)){
            echo "<script>alert('Please enter valid address!');window.location.href='../frontend/customer.php'</script>";
            die();
        }
        /*CHCEK FOR DUPLICATE ROW ON THE BASIS OF QUERY*/
        $query = "SELECT CNAME FROM customer where CNAME = '$cname'";
        $res1 = mysqli_query($con,$query);  
        $numrows = mysqli_num_rows($res1);  
        if($numrows!=0)  
            {  
                    echo "<script>alert('Name already exist!');window.location.href='../frontend/customer.php'</script>";
                die();
                }
        /*CHCEK FOR FINAL OUTCOME */
        $sql = "INSERT INTO customer (`CNAME`,`TOTAL_AMOUNT_SPENT`, `ADDRESS`) VALUES ('$cname','$amount','$address');";
        $res = mysqli_query($con, $sql);
        if (!$res) {
            echo "No data inserted. Error : " . mysqli_error($con);
        } else {
            echo "<script>alert('Registration Successfully!');window.location.href='../frontend/customer.php'</script>";
        }
    }
?>