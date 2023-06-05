<?php include ("../backend/dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>NG | Add Artist</title>

    <link href = "../css/style.css" rel="stylesheet"></link>
</head>

<body>
    <header>
        <hi class="logo">NATIONAL GALLERY</hi>
        <input type="checkbox" id="nav-toggle" class="nav-toggle" />
        <nav>
            <ul>
				<li><a href="../index.php">Home</a></li>
                <li><a href="#" class="active-link">Artist</a></li>
                <li><a href="artwork.php">Artwork</a></li>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="purchase.php">Purchase</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-lable"> 
            <span></span>
        </label>
    </header>

    <main>
        <section class = "section-artist">
            <div class="container">
                <h2>Add New Artist</h2>
                <form action = "../backend/artist_form.php" method = "POST" class="form-control form-artist">

                    <div class="col">
                        <label for="aname" class="form-label">Name</label>
                        <input type="text" name="aname" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="style_of_art" class="form-label">Style of Art</label>
                        <input name="style_of_art" type="text" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="birth_place" class="form-label">Birth Place</label>
                        <input name="birth_place" type="text" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="age" class="form-label">Age</label>
                        <input name="age" type="number" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                    </div>
                    <div class="col">
                    </div>

                    <hr>
                    <h2>Add New Artwork</h2>

                    <div class="col">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-inputbar" required/>
                    </div>
                    
                    <div class="col">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" type="number" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="year" class="form-label">Year</label>
                        <input name="year" type="number" class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="type" class="form-label">Type</label>
                        <input name="type" type="text"class="form-inputbar" required/>
                    </div>

                    <div class="col">
                        <label for="type" class="form-label">Group</label>
                        <input name="group" type="text"class="form-inputbar" required/>
                    </div>

                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>

                    <div class="col">
                        <button type="submit" name="add_artist" class="form-inputbar btn btn-view" id="btn-form-submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <hr>
        
    </main>

</body>
</html>