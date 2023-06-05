<?php
    include ("dbconnection.php"); 

    if (isset ($_POST['add_artist'])) {
        $aname = $_POST['aname'];
        $style_of_art = $_POST['style_of_art'];
        $birth_place = $_POST['birth_place'];
        $age = $_POST['age'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $year = $_POST['year'];
        $type = $_POST['type'];
        $group = $_POST['group'];
        /*NAME SHOULD CONTAIN ALPHABET AND WHITE SPACE*/
        if(!preg_match("/^[a-zA-Z- ']*$/",$aname)){
            echo "<script>alert('Name must contains only letter and whitespace!');window.location.href='../frontend/artist.php'</script>";

                die();
        }

        /* CHECK FOR STRING SHOULD NOT CONTAIN ONLY NUMBER BUT CAN HOLD ALPHANUMERIC */
        if(preg_match("/^[0-9- ']*$/",$style_of_art)){
            echo "<script>alert('Please enter valid style!');window.location.href='../frontend/artist.php'</script>";

                die();
        }

        if(preg_match("/^[0-9- ']*$/",$birth_place)){
            echo "<script>alert('Please enter valid address!');window.location.href='../frontend/artist.php'</script>";

                die();
        }
        
        /*AGE VALIDATION*/
        if($age > 100 || $age <= 0){
            echo "<script>alert('Enter valid age!');window.location.href='../frontend/artist.php'</script>";

            die();
        }

        if(preg_match("/^[0-9- ']*$/",$title)){
            echo "<script>alert('Please enter valid title!');window.location.href='../frontend/artist.php'</script>";

                die();
        }
        if(preg_match("/^[0-9- ']*$/",$type)){
            echo "<script>alert('Please enter valid type!');window.location.href='../frontend/artist.php'</script>";

                die();
        }
        if(preg_match("/^[0-9- ']*$/",$group)){
            echo "<script>alert('Please enter valid group!');window.location.href='../frontend/artist.php'</script>";

                die();
        }
        $query = "SELECT ANAME FROM artist where ANAME = '$aname'";
        $res1 = mysqli_query($con,$query);  
        $numrows = mysqli_num_rows($res1);  
        if($numrows!=0)  
            {  
                echo "<script>alert('Name already exist!');window.location.href='../frontend/artist.php'</script>";

                die();
                }
                $query = "SELECT TITLE FROM art_work where TITLE = '$title'";
                $res1 = mysqli_query($con,$query);  
                $numrows = mysqli_num_rows($res1);  
                if($numrows!=0)  
                    {  
                    echo "<script>alert('This artwork already exist!');window.location.href='../frontend/artist.php'</script>";

                    die();
                    }
        $sql = "INSERT INTO artist (`ANAME`, `STYLE_OF_ART`, `BIRTH_PLACE`, `AGE`) VALUES ('$aname','$style_of_art','$birth_place','$age');";
        $sql .= "INSERT INTO art_work (`TITLE`, `PRICE`, `YEAR`, `TYPE`, `ANAME`) VALUES ('$title','$price','$year','$type', '$aname');";
        $sql .= "INSERT INTO art_group(`GROUP_NAME`) VALUES ('$group');";
        $sql .= "INSERT INTO of_group(`TITLE`, `GROUP_NAME`) VALUES ('$title', '$group');";
        /*RUN MULTIPLE QUERTY */
        $res = mysqli_multi_query($con, $sql);
        if (!$res) {
            echo "No data inserted. Error : " . mysqli_error($con);
        } else {
            echo "<script>alert('Artist added Successfully!');window.location.href='../frontend/artist.php'</script>";

        }
    }
?>