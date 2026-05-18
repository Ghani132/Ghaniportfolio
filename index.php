    <?php
    //DATABASE CONNECTION 
    include 'db.php';

    //FETCH DATA
    $query = "SELECT * FROM about LIMIT 1";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    $skills_query = "SELECT * FROM skills";
    $skills_result = mysqli_query($conn, $skills_query);

    $projects_query = "SELECT * FROM projects";
    $projects_result = mysqli_query($conn, $projects_query);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Professional Portfolio</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <nav>
            <div class="container nav-flex">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
                <button id="darkModeBtn">Toggle Mode</button>
            </div>
        </nav>

        <!-- HOME SECTION -->
        <section id="home" class="hero">
            <div class="hero-content">
                <img src="images/<?php echo $data['profile_pic']; ?>" class="profile-img" alt="Profile">
                <h1><?php echo $data['name']; ?></h1>
                <p>Software Engineer</p>
                <a href="#projects" class="btn">View My Work</a>
            </div>
        </section>

        <!-- ABOUT SECTION -->
        <section id="about">
            <div class="container">
                <h2 class="section-title">About Me</h2>
                <div class="card">
                    <p><?php echo $data['bio']; ?></p>
                </div>
            </div>
        </section>

        <!-- SKILLS SECTION -->
        <section id="skills">
            <div class="container">
                <h2 class="section-title">My Skills</h2>
                <div class="grid-container">
<?php while($skill = mysqli_fetch_assoc($skills_result)) { ?>
    <div class="card skill-card">
        <h3><?php echo htmlspecialchars($skill['skill_name']); ?></h3>
    </div>
<?php } ?>
                </div>
            </div>
        </section>

        <!-- PROJECTS SECTION -->
        <section id="projects">
            <div class="container">
                <h2 class="section-title">My Projects</h2>
                <div class="grid-container">
                    <?php while($project = mysqli_fetch_assoc($projects_result)) { ?>
                        <div class="card project-card">
                            <div class="card-text">
                                <h3><?php echo $project['title']; ?></h3>
                                <p><?php echo $project['description']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

    <!-- CONTACT SECTION -->
        <section id="contact">
            <div class="container">
                <h2 class="section-title">Get In Touch</h2>
                <div class="card">
                    <p>Feel free to reach out.</p>
                    <p>abdulghani1254@yahoo.com</p>
                </div>
            </div>
        </section>


        <script>
            // Select the button
            const btn = document.getElementById("darkModeBtn");
            btn.onclick = function() {
                document.body.classList.toggle("dark-mode");
            };
        </script>
    </body>
    </html>