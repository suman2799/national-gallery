<?php include ("../backend/dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>NG | Purchase Artwork</title>

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
                <li><a href="customer.php">Customer</a></li>
                <li><a href="#" class="active-link">Purchase</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section class = "section-purchase">
            <div class="container">
                <h2>Purchase Artwork</h2>
                <form action = "../backend/purchase_form.php" method = "POST" class = "form-control form-purchase">

                    <div class="col">
                        <label for="cname" class="form-label">Customer Name</label>
                        <input name="cname" type="text" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="title" class="form-label">Art Title</label>
                        <input name="title" type="text" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="date" class="form-label">Date</label>
                        <input name="date" type="date" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="remark" class="form-label">Remark</label>
                        <input name="remark" type="text" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>

                    <div class="col">
                        <button type="submit" name="purchase_artwork" class="form-inputbar btn btn-view" id="btn-form-submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <hr>
    </main>

</body>
</html>