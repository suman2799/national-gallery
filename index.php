<?php include ("backend/dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to National Gallery</title>

    <link href = "css/style.css" rel="stylesheet"></link>
</head>

<body>
    <header>
        <hi class="logo">NATIONAL GALLERY</hi>
        <input type="checkbox" id="nav-toggle" class="nav-toggle" />
        <nav>
            <ul>
				<li><a href="index.php" class="active-link">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Notices</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section>
			<div class="home">				
				<div class="home-text">
					<h1>Welcome To <br> NATIONAL GALLERY</h1>
					<div class="home-btn">
						<button onclick="window.location.href='frontend/artist.php'" class="btn btn-home-login">Add Artist</button>
						<button onclick="window.location.href='frontend/artwork.php'" class="btn btn-home-login">Add Artwork</button>
						<button onclick="window.location.href='frontend/customer.php'" class="btn btn-home-login">Add Customer</button>
                        <button onclick="window.location.href='frontend/purchase.php'" class="btn btn-home-login">Purchase Artwork</button>
                        <button onclick="window.location.href='backend/report_1.php'" class="btn btn-home-login">Report 1</button>
                        <button onclick="window.location.href='backend/report_2.php'" class="btn btn-home-login">Report 2</button>
                        <button onclick="window.location.href='backend/report_3.php'" class="btn btn-home-login">Report 3</button>
                        <button onclick="window.location.href='backend/report_4.php'" class="btn btn-home-login">Report 4</button>
                    </div>
				</div>
			</div>
		</section>
        
    </main>

</body>
</html>