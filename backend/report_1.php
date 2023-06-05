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
                <li><a href="#" class="active-link">Report 1</a></li>
                <li><a href="report_2.php">Report 2</a></li>
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
            <h1>Report 1</h1>
            <div class="container">
                <h2>Generate a report on available artworks with all details including prices. The report is to be sorted according to artists in a group.</h2>
                <table>
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>TITLE</th>
                            <th>YEAR</th>
                            <th>PRICE</th>
                            <th>TYPE</th>
                        </tr>
                        <?php
                
                            $sql = "SELECT artist.ANAME, art_work.TITLE , YEAR, PRICE, art_group.GROUP_NAME FROM artist, art_work, of_group, art_group WHERE artist.ANAME = art_work.ANAME and art_work.TITLE = of_group.TITLE and art_group.GROUP_NAME = of_group.GROUP_NAME ORDER by art_group.GROUP_NAME , artist.ANAME ;";$result = mysqli_query($con, $sql);
                            $numrows = mysqli_num_rows($result);  
                            if($numrows==0) {  
                                echo "<script>alert('NO RESULT!');window.location.href='index.php'</script>";
                                die();
                            }
                            while($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                                <td>".$row["ANAME"]."</td>
                                <td>".$row["TITLE"]."</td> 
                                <td>".$row["YEAR"]."</td>
                                <td>".$row["PRICE"]."</td> 
                                <td>". $row["GROUP_NAME"]."</td>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <hr>

    </main>
</body>