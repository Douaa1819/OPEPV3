
<?php

require_once '../controller/BlogController.php';


//

var_dump($themes); // Ajoutez cette ligne pour déboguer

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styleBlog.css">
    <title>Document</title>
</head>
<style>


    .sec1 h1 {
        font-size: 3.5vw;
        width: 24vw;
        color: black;
        width: 40vw;
    }

    .sec1 p {
        font-size: 1.2vw;
        margin-top: 2rem;
        color: black;
    }

    .sec1 button {
        color: white;
        background-color: transparent;
        border: 2px solid white;
        width: 10vw;
        margin-top: 2rem;
    }

    .sec3 .card {
        height: 26vw;
        margin-bottom: 1.5rem;
        color: black;
        max-width: 19.5rem;
        background-color: white;
        text-align: center;
        padding: 10px;
        border-radius: 20px;
    }

    .card-img-custom {
        width: 40%;
        height: 10vw;
        object-fit: cover;
        border-radius: 8px;
    }

    .card-body {
        height: 100%;
    }

    .card-text {
        margin-bottom: 1rem;
        color: #4F772D;
        text-align: left;
    }

    .card-title {
        color: #4F772D;
        text-align: left;
    }

    .pagination {
        justify-content: center;


    }

    .count {
        color: white;
        padding: 0px 6px;
        background-color: red;
        border-radius: 40px;
    }

    .panier {
        position: fixed;
        right: 40px;
    }

    /* nav */
    nav {

        z-index: 1000;
        height: 50px;
    }

    .nav__logo img {
        width: 120px;
        padding-top: 10px;
    }

    .search {
        position: relative;
        width: 26%;
        left: 22%;
    }

    .nav__menu {
        position: absolute;
        right: 10rem;
    }

    .nav__list {
        padding-top: 25px;
        list-style: none;
        display: flex;
        gap: 3rem;
        align-items: center;


    }

    .nav__list a {
        color: white;
        cursor: pointer;
    }

    .nav__list a :hover {
        color: green;

    }

    .nav__list .nav__item a :hover {
        color: green;
    }

    .button--flex {
        display: inline-flex;
        align-items: center;
        column-gap: 0.5rem;
    }

    .navbar__button {
        position: absolute;
        background-color: red;
        border-radius: 0.35rem;
        font-size: 1.25rem;
    }
</style>


<body>
    <header style=" background-color: #132a137e; height:80px; width:100%; position:absolute;  top:0;">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="plantes/logo.png" alt="logo">
            </a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li>
                        <a href="client.php" style="font-size: 20px ; ">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="blog.php" style="font-size: 20px;">Blog</a>
                    </li>
                    <li>
                        <form method="post">
                            <button class=" btn ri-logout-box-r-line" style="font-size:27px;cursor: pointer; background-color: transparent; color:white" name="logout"></button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <section>
        <!-- Content of your blog here -->
        <?php foreach ($themes as $theme): ?>
        <section class="sec1 d-flex" style="width: 100%;">
            <div class="division1" style="width: 42%">
                <img src="plantes/<?php echo $theme['imageTh']; ?>.jpg" style="height: 45vw; width: 40vw; padding: 24px " alt="<?php echo $theme['nomTh']; ?>">
            </div>
            <div class="division2" style="width: 58%; padding: 24px ">
                <div>
                    <h1><?php echo $theme['nomTh']; ?></h1>
                    <p><?php echo $theme['descriptionTh']; ?></p>
                </div>
                <div class="division12" style="margin-top: 40px">
                    <a href="./article.php?id=<?php echo $theme['idTh']; ?>" style="text-decoration: none;">
                        <table>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px; width: 35vw; gap: 50px" class="d-flex">
                                    <img src="plantes/<?php echo $theme['imageTh']; ?>.jpg" style="height: 10vw; width: 10vw" alt="<?php echo $theme['nomTh']; ?>">
                                    <div class="d-flex flex-column">
                                        <h3 style="color: black;">Tout sur... <?php echo $theme['nomTh']; ?></h3>
                                        <div class="d-flex" style="align-items: center; gap: 10px">
                                            <a href="./article.php?id=<?php echo $theme['idTh']; ?>" name="idth" style="color: black; text-decoration: none;">En savoir plus</a>
                                            <svg width="14" height="12" viewBox="0 0 14 12" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M-4.97198e-07 6.77851L11.0896 6.77851L7.06538 10.8992L8.14044 12L14 6L8.14044 4.41415e-07L7.06538 1.10082L11.0896 5.22149L-3.61078e-07 5.22149L-4.97198e-07 6.77851Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </a>
                </div>
            </div>
        </section>
        <hr color="black" size="1">
    <?php endforeach; ?>
    </section>
</body>

</html>

    <?php include '../View/footer.php' ?>