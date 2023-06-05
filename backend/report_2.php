<?php include ("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to National Gallery</title>

    <link href = "../css/style.css" rel="stylesheet"></link>
</head>

<body>
    <header>
        <hi class="logo">NATIONAL GALLERY</hi>
        <input type="checkbox" id="nav-toggle" class="nav-toggle" />
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="report_1.php">Report 1</a></li>
                <li><a href="#" class="active-link">Report 2</a></li>
                <li><a href="report_3.php">Report 3</a></li>
                <li><a href="report_4.php">Report 4</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section class="container-color-tables">
            <h1>Report 2</h1>
            <div class="container">
                <h2>Generate a report on procurement details within a given date range. The details should include artwork name, group, artist name, price, date of purchase and customer name. The report must be sorted accordingly to the group. The subtotal of each group needs to be displayed.</h2>
                <form action = "" method = "POST" class="form-control form-artist">
                    
                    <div class="col">
                        <label for="start" class="form-label">Start Date</label>
                        <input type="date" name="start" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="end" class="form-label">End Date</label>
                        <input type="date" name="end" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>

                    <div class="col">
                        <button type="submit" name="submit" class="form-inputbar btn btn-view" id="btn-form-submit">Submit</button>
                    </div>

            </div>

            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <th>TITLE</th>
                            <th>GROUP_NAME</th>
                            <th>ARTIST_NAME</th>
                            <th>PRICE</th>
                            <th>PURCHASE_DATE</th>
                            <th>CUSTOMER_NAME</th>
                        </tr>
                        <?php
                            if (isset ($_POST['submit'])) {
                                $start = $_POST['start'];
                                $end= $_POST['end'];
                                if($start > $end){
                                    echo "<script>alert('Starting date should be previous date from ending date');window.location.href='report_2.php'</script>";

                                    die();
                                }
                               /*TABLE GENERATE AFTER FIND ROWS */
                                $sql = "SELECT art_work.TITLE,of_group.GROUP_NAME,artist.ANAME, art_work.PRICE ,buy.DATE,buy.CNAME FROM artist,art_work, buy, of_group WHERE artist.ANAME = art_work.ANAME and art_work.TITLE = buy.TITLE and buy.TITLE = of_group.TITLE and buy.DATE BETWEEN  '$start' AND '$end' ORDER BY of_group.GROUP_NAME;";
                                $sql1= "SELECT of_group.GROUP_NAME,sum(art_work.PRICE) as value FROM art_work, buy, of_group WHERE art_work.TITLE = buy.TITLE and buy.TITLE = of_group.TITLE and buy.DATE BETWEEN  '$start' AND '$end' group BY of_group.GROUP_NAME;";
                                $result = mysqli_query($con, $sql);
                                $result1 = mysqli_query($con, $sql1);
                                $numrows = mysqli_num_rows($result); 
                                $numrows1 = mysqli_num_rows($result1); 

                                if($numrows==0 || $numrows1==0 ) {  
                                    echo "<script>alert('No Result!');window.location.href='report_2.php'</script>";
                                    die();
                                }
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                    <tr>
                                    <td>".$row["TITLE"]."</td>
                                    <td>".$row["GROUP_NAME"]."</td>
                                    <td>".$row["ANAME"]."</td>
                                    <td>".$row["PRICE"]."</td> 
                                    <td>".$row["DATE"]."</td> 
                                    <td>".$row["CNAME"]."</td>
                                    ";
                                }
                        ?>
                        <table class="center">            
                        <tr>
                            <th>GROUP_NAME</th>
                            <th>SELL_AMONUT</th>
                        <?php

                            while($row = $result1->fetch_assoc()) {
                                echo "
                                <tr>
            
                                <td>".$row["GROUP_NAME"]."</td>
                                <td>".$row["value"]."</td>
                                ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <hr>

    </main>
</body>