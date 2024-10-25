<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Portfolio Template">
    <meta name="author" content="Suvrat Jain">
    <title>Portfolio</title>
    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <link rel="stylesheet" href="css/style.css">
    <!-- Add jQuery and jQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            margin-bottom: 0;
        }
        .splash {
            text-align: center;
            color: white;
            background: url("bgs.jpg") no-repeat fixed center bottom;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .profile-image {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }
        .success {
            padding: 50px 0;
            background-color:blue;
        }
        .portfolio-container {
            padding: 50px 0;
        }
        .portfolio-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 550px;
            width: 250px;
            margin-bottom: 20px;
        }
        .portfolio-img {
            max-width: 100%;
            height: 400px;
            border-radius: 5px;
        }
        .footer-container {
            padding: 20px 0;
            background-color: #343a40;
            color: white;
        }
        #dialog-form {
            display: none;
        }
      
  
    </style>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#portfolio">Achievement</a></li>
                </ul> 
            </div>
        </div>
    </div>

    <div class="container-fluid splash" id="splash">
        <div class="container">
            <img src="womens.jpg" alt="Portrait of a Woman" class="profile-image"> 
            <h1>HELLO!</h1> 
            <h1 class="intro-text"><span class="lead" id="typed">I am Krishna Ajay</span></h1>
            <span class="continue"><a href="#about"><i class="fa fa-angle-down"></i></a></span>
        </div>
    </div>

    <!-- About Section -->
    <section class="success" id="about">
    <div class="container thin-container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About Me</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p class="content-text" style="text-align:justify;">Hey there! Driven by a passion for technology and a thirst for innovation, I’m an MCA student dedicated to integrating cutting-edge solutions to tackle real-world challenges.</p>
                </div>
                <div class="col-lg-4">
                    <p class="content-text">The only way to do great work is to love what you do." — Steve Jobs

</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <div class="container-fluid portfolio-container-holder content-section" id="portfolio">
        <div class="portfolio-container container">
            <h1 class="text-center">My Achievement<button class="btn btn-success" style="float: right;">+</button></h1>
            <hr class="star-portfolio">
            <div class="row">
                <?php
                // Include the database configuration file
                include 'config.php';

                // Fetch achievements
                $sql = "SELECT id, title, description, image FROM achievements";
                $result = $conn->query($sql);

                if ($result === false) {
                    echo "Error: " . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4 col-sm-6 col-xs-12 portfolio-card-holder" style="margin-bottom: 20px; padding-right: 15px;">';
                            echo '    <div class="portfolio-card">';
                            echo '        <h4 style="margin: 0; font-weight: bold; text-align: center; margin-bottom: 10px;">' . htmlspecialchars($row["title"]) . '</h4>';
                            echo '        <p style="flex-grow: 1; margin: 5px 0 15px 0; text-align: justify;">' . htmlspecialchars($row["description"]) . '</p>';
                            echo '        <img src="' . htmlspecialchars($row["image"]) . '" alt="Portfolio" class="img-responsive portfolio-img">';
                            echo '        <button class="btn btn-primary edit-button" data-id="' . $row['id'] . '" data-title="' . htmlspecialchars($row["title"]) . '" data-description="' . htmlspecialchars($row["description"]) . '" data-image="' . htmlspecialchars($row["image"]) . '" style="margin-top: 10px;">Edit</button>'; // Add this button
                            echo '    </div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No achievements found.";
                    }
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container footer-container">
            <div class="row footer-row">
                <div class="col-xs-12 text-center">
                    <address>
                        <p>© 2024 Krishna Ajay. All rights reserved.</p>
                    </address>
                </div>
            </div>
        </div>
    </footer>

    <!-- Popup Form -->
    <div id="dialog-form" title="Add/Edit Achievement/Skill" style="display:none;">
        <form>
            <fieldset>
                <input type="hidden" name="id" id="achievement_id">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="text ui-widget-content ui-corner-all">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="text ui-widget-content ui-corner-all"></textarea>
                <label for="image">Image URL</label>
                <input type="text" name="image" id="image" class="text ui-widget-content ui-corner-all">
            </fieldset>
        </form>
    </div>

    <!-- jQuery and Bootstrap scripts -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- Custom script for the dialog functionality -->
    <script>
     $(document).ready(function () {
        // Initialize dialog
        $("#dialog-form").dialog({
            autoOpen: false,
            modal: true,
            width: 500, // Optional: Specify width
            buttons: {
                Save: function () {
                    // Check if we are editing or adding new
                    var id = $("#achievement_id").val();
                    var url = id ? "edit_post.php" : "save.php"; // Determine the URL based on id
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            id: id,
                            title: $("#title").val(),
                            description: $("#description").val(),
                            image: $("#image").val()
                        },
                        success: function () {
                            location.reload(); // Reload page to see updates
                        }
                    });
                    $(this).dialog("close");
                },
                Cancel: function () {
                    $(this).dialog("close");
                }
            }
        });

        // Open the dialog for adding a new achievement
        $(".btn-success").click(function () {
            $("#achievement_id").val("");
            $("#title").val("");
            $("#description").val("");
            $("#image").val("");
            $("#dialog-form").dialog("open");
        });

        // Open the dialog for editing an achievement
        $(".edit-button").click(function () {
            var id = $(this).data("id");
            var title = $(this).data("title");
            var description = $(this).data("description");
            var image = $(this).data("image");

            $("#achievement_id").val(id);
            $("#title").val(title);
            $("#description").val(description);
            $("#image").val(image);
            $("#dialog-form").dialog("open");
        });
    });
    </script>
</body>
</html>
