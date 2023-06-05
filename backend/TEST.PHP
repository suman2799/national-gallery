<?php
/*NAME SHOULD CONTAIN ALPHABET AND WHITE SPACE*/
        if(!preg_match("/^[a-zA-Z- ']*$/",$aname)){
            echo "<script>alert('Name must contains only letter and whitespace!');window.location.href='../frontend/artist.php'</script>";

                die();
        }

 /* CHECK FOR STRING SHOULD NOT CONTAIN ONLY NUMBER BUT CAN HOLD ALPHANUMERIC LIKE ADDRESS,TITLE ETC*/
        if(preg_match("/^[0-9- ']*$/",$style_of_art)){
            echo "<script>alert('Please enter valid style!');window.location.href='../frontend/artist.php'</script>";

                die();
        }


 /*AGE VALIDATION*/
        if($age > 100 || $age <= 0){
            echo "<script>alert('Enter valid age!');window.location.href='../frontend/artist.php'</script>";

            die();

 /*RUN MULTIPLE QUERTY */
        $res = mysqli_multi_query($con, $sql);


 
/*EMAIL VALIDATION*/
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Enter valid email id!');window.location.href='../frontend/customer_registration.php'</script>"; 
        }

/* PHONE NUMBER VALIDATION (ONLY NUMBER)*/
       if(!preg_match("/^[0-9- ']*$/",$phone) || strlen($phone) != 10){
            echo "<script>alert('INVALID PHONE NUMBER');window.location.href='../frontend/customer_registration.php'</script>"; 
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
 
?>
