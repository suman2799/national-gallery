<?php include ("dbconnection.php"); 
     if (isset ($_POST['submit'])) {
        $year = $_POST['year'];
        if(preg_match("/^[a-zA-Z- ']*$/",$year)){
            echo '<script>alert("Enter valid year!")</script>';
                die();
        }
        $sql = "SELECT GROUP_NAME , SUM(PRICE) as Value   FROM art_work,buy,of_group WHERE art_work.TITLE = buy.TITLE and art_work.TITLE = of_group.TITLE and  EXTRACT(YEAR FROM DATE) ='$year' group by GROUP_NAME;";
        $result = mysqli_query($con, $sql);
        $numrows = mysqli_num_rows($result);  
                if($numrows==0)  
                    {  
                    echo "<script>alert('NO RESULT!');window.location.href='report_4.php'</script>";
                    die();
                    }
        if (!$result) {
            echo "No data inserted. Error : " . mysqli_error($con);
        }
        while($row = mysqli_fetch_assoc($result))
        {
        $dataPoints[] = array("Country"=>$row['GROUP_NAME'], "y"=>$row['Value']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to National Gallery</title>

    <link href = "../css/style.css" rel="stylesheet"></link>
    <script>
        window.onload = function() 
        {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                subtitles: [{
                    text: " Database Range 2020-2022"
                }],
                data: [{
                    type: "pie",  // bar,doughnut,funnel,pyramid
                    yValueFormatString: "#,##0.\"\"",
                    indexLabel: "(Group-{Country})  ( rs.{y})",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
        chart.render();
        }
    </script>
</head>

<body>
    <header>
        <hi class="logo">NATIONAL GALLERY</hi>
        <input type="checkbox" id="nav-toggle" class="nav-toggle" />
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="report_1.php">Report 1</a></li>
                <li><a href="report_2.php">Report 2</a></li>
                <li><a href="report_3.php">Report 3</a></li>
                <li><a href="#" class="active-link">Report 4</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section class="container-color-tables">
            <h1>Report 4</h1>
            <div class="container">
                <h2>Generate a pie chart that displays the sales of each group for a given year.</h2>
                <form action = "" method = "POST" class="form-control form-artist">

                    <div class="col">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" name="year" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                    </div>

                    <div class="col">
                        <label for="start" class="form-label">Submit</label>
                        <button type="submit" name="submit" class="form-inputbar btn btn-view" id="btn-form-submit">Submit</button>
                    </div>

                </form>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </section>
        <hr>

    </main>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>