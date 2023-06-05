<?php include ("../backend/dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>NG | Add Customer</title>

    <link href = "../css/style.css" rel="stylesheet"></link>
</head>

<body>
    <header>
        <hi class="logo">NATIONAL GALLERY</hi>
        <input type="checkbox" id="nav-toggle" class="nav-toggle" />
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
				<li><a href="artist.php">Artist</a></li>
                <li><a href="artwork.php">Artwork</a></li>
                <li><a href="#" class="active-link">Customer</a></li>
                <li><a href="purchase.php">Purchase</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section class = "section-customer">
            <div class="container">
                <h2>Add New Customer</h2>
                <form action = "../backend/customer_form.php" method = "POST" class="form-control form-customer">

                    <div class="col">
                        <label for="cname" class="form-label">Customer Name</label>
                        <input name="cname" type="text" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="address" class="form-label">Address</label>
                        <input name="address" type="text" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>

                    <div class="col">
                            <button type="submit" name="add_customer" class="form-inputbar btn btn-view" id="btn-form-submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <hr>
    </main>

</body>
</html>