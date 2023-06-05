<?php include ("dbconnection.php"); 
    if (isset ($_POST['submit'])) {
        $year = $_POST['year'];
        if(preg_match("/^[a-zA-Z- ']*$/",$year)){
            echo '<script>alert("Enter valid year!")</script>';
                die();
        }
        $sql = "SELECT EXTRACT(MONTH FROM DATE) as Month , SUM(PRICE) as Value   FROM art_work,buy WHERE art_work.TITLE = buy.TITLE and  EXTRACT(YEAR FROM DATE) ='$year' group by Month;";
        $result = mysqli_query($con, $sql);
        $numrows = mysqli_num_rows($result);  
                if($numrows==0)  
                    {  
                    echo "<script>alert('NO RESULT!');window.location.href='report_3.php'</script>";
                    die();
                    }
        if (!$result) {
            echo "No data inserted. Error : " . mysqli_error($con);
        }
        while($row = mysqli_fetch_assoc($result))
        {
        $dataPoints[] = array("Country"=>$row['Month'], "y"=>$row['Value']);
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
                    type: "bar",  // bar,doughnut,funnel,pyramid
                    yValueFormatString: "#,##0.\"\"",
                    indexLabel: "(Month-{Country})  ( rs.{y})",
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
                <li><a href="#" class="active-link">Report 3</a></li>
                <li><a href="report_4.php">Report 4</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section class="container-color-tables">
            <h1>Report 3</h1>
            <div class="container">
                <h2>Generate a bar graph that displays the sales in each moth for a given year.</h2>
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