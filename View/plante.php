
<?php
require_once('../Model/plant.php');
require_once ('../config/conn.php');
require_once '../Model/utilisateurs.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleClient.css">
    <title>Document</title>
    <style>
        body {
            background-color: #132A13;
            color: aliceblue;
            margin-top: 2rem;
        }

        .sec1 h1 {
            font-size: 3.5vw;
            width: 24vw;
            color: black;
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
        .count{
            color: white;
            padding: 0px 6px;
            background-color: red;
            border-radius: 40px;
        }
        .panier{
            position: fixed;
            right: 40px;
        }
        /* nav */ 
        nav{
            
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
        .nav__menu{
            position: absolute;
            right:10rem;
    }

        .nav__list{
        padding-top: 25px;
        list-style: none;
        display: flex;
        gap: 3rem;
        align-items: center;
       
        }
        .nav__list a{
            color: white;
            cursor: pointer;
        }
        .nav__list a :hover{
            color: green;
            
        }
        .nav__list .nav__item a :hover{
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

        .search form input {
            margin-top: 20px;
            width: 100%;
            height: 40px;
            border-radius: 40px 0 0 40px ;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 18px;
            outline: none;
            border: 1px solid white;
        }
        .searchbtn{

            border: 1px solid white;
        }
        .search i {
            color: #132A13;
            position: absolute;
            top: 26px;
            left: 10px;
            font-size: 1.2rem;
        }

        .button--flex {
        display: inline-flex;
        background-color: #132A13;
        align-items: center;
        column-gap: 0.5rem;
        border-radius: 40px 0 0 40px ;
        
        }
        .col img{
            margin-top: 40px;
        }

        
    </style>

</head>
<body>
    <header style="background-color:  #ffffff50; height:80px; width:100%; position:absolute;  top:0;">
        <nav class="nav container" >
                <a href="client.php" class="nav__logo">
                    <img src="plantes/logo.png" alt="logo">
                </a> 
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li >
                            <a href="plant.php"  style="font-size: 20px ; ">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="blog.php"  style="font-size: 20px;">Blog</a>
                        </li>


                      <li >
                     

                    <!-- <div class="logo" style="height: 40px;display: flex;justify-content: space-between; padding:40px ; margin-top:0px; color:black"></div> -->

                    </div>   
            </nav>
    </header>
    <section class="sec1" style="margin-top: 80px;">
        
        <div class="container text-center">
            <div class="row">
                <div class="col" style="margin-top: 7vw;">
                    <h1 class="text-left" style="color:white">
                        Grow Your Own <span style="color: #4F772D;">Favourite</span> plant
                    </h1>
                    <p class="mb-4 opacity-70 text-left mt-2" style="color:white">
                        We help you plant your first plant and create your own beautiful garden with our plant collection.
                    </p>
                    <button type="button" class="btn btn-block mb-4 btn-hover">
                        Learn more
                    </button>
                </div>
                <div class="col">
                    <img src="plantes/o.png" alt="Image de plantes">
                </div>
            </div>
        </div>
    </section>
    <!-- ... ________________ ... -->
    <section class="sec2 d-flex justify-content-center mt-5">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="border:1px solid white; border-radius:20px; width:37%;">
            <div class="d-flex" style="gap:20px">
                <form method="get"  class="d-flex justify-content-center" role="search">
                    <a class="navbar-brand" href="?view_all" style="color:white">View All</a>

                    <div style="display: flex; ">
                    <select name="categorie" id="categorieSelect" style="border-radius: 5px; height:38px ; background-color: transparent; color:white" onchange="submitForm()">
                        <option style="color: black" value="all">Toutes les catégories</option>
                        <?php
                        $categoriesQuery = $conn->query("SELECT DISTINCT idCategorie, nomCategorie FROM categories");
                        $categories = $categoriesQuery->fetch_all(MYSQLI_ASSOC);
                        foreach ($categories as $category) {
                            echo '<option style="color: black" value="' . $category['idCategorie'] . '">' . $category['nomCategorie'] . '</option>';
                        }
                        ?>
                    </select>

                    </div>
                </form>
                <form method="get" class="d-flex justify-content-center">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" id="searchInput" style="height: 40px;background-color: transparent; color:white;border-radius: 5px ;">
                    <button class=" searchbtn btn-success"name="search_but" type="sumbit" style=" border-radius: 0 40px  40px 0; height:40px ; background-color: transparent">GO</button>
                </form>

            </div>
        </nav>
    </section>
    <section class="sec3">
    <div class="container mt-5">
        <?php
        // ... (autres parties du code)

        // Partie qui récupère les plantes en fonction des filtres et les affiche
        $limit = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        if (isset($_GET['view_all'])) {
            $plantesQuery = $conn->query("SELECT * FROM plantes LIMIT $start, $limit");
        } elseif (isset($_GET['search_but'])) {
            $nomPlante = $_GET['search'];
            $plantesQuery = $conn->query("SELECT * FROM plantes WHERE nomPlante LIKE '%$nomPlante%'");
        } else {
          
            $categoryFilter = (isset($_GET['categorie']) && $_GET['categorie'] != 'all') ? "WHERE idCategorie = {$_GET['categorie']}" : "";

            // Mettez à jour la requête pour inclure le filtre de catégorie
            $plantesQuery = $conn->query("SELECT * FROM plantes $categoryFilter LIMIT $start, $limit");
        }

        // Partie qui parcourt les résultats et affiche les plantes
        $counter = 0;
        if (mysqli_num_rows($plantesQuery) > 0) {
            while ($plante = $plantesQuery->fetch_assoc()) {
            }
        } else {
            echo "<script>alert('La plante n'existe pas')</script>";
        }
        ?>
    </div>
    <?php
    // Affichage de la pagination en bas de la section
    $result = $conn->query("SELECT COUNT(idPlante) AS total FROM plantes");
    $row = $result->fetch_assoc();
    $total_pages = ceil($row["total"] / $limit);

    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }
    echo '</ul>';
    echo '</nav>';
    ?>
</section>
<section class="sec3">
    <div class="container mt-5">
        <?php

        // Partie qui récupère les plantes en fonction des filtres et les affiche
        $limit = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        if (isset($_GET['view_all'])) {
            $plantesQuery = $conn->query("SELECT * FROM plantes LIMIT $start, $limit");
        } elseif (isset($_GET['search_but'])) {
            $nomPlante = $_GET['search'];
            $plantesQuery = $conn->query("SELECT * FROM plantes WHERE nomPlante LIKE '%$nomPlante%'");
        } else {
            // Récupère la catégorie sélectionnée
            $categoryFilter = (isset($_GET['categorie']) && $_GET['categorie'] != 'all') ? "WHERE idCategorie = {$_GET['categorie']}" : "";

            // Mettez à jour la requête pour inclure le filtre de catégorie
            $plantesQuery = $conn->query("SELECT * FROM plantes $categoryFilter LIMIT $start, $limit");
        }

        // Partie qui parcourt les résultats et affiche les plantes
        $counter = 0;
        if (mysqli_num_rows($plantesQuery) > 0) {
            while ($plante = $plantesQuery->fetch_assoc()) {
                // ... (autres parties du code pour afficher chaque plante)
            }
        } else {
            echo "<script>alert('La plante n'existe pas')</script>";
        }
        ?>
    </div>
    <?php
    // Affichage de la pagination en bas de la section
    $result = $conn->query("SELECT COUNT(idPlante) AS total FROM plantes");
    $row = $result->fetch_assoc();
    $total_pages = ceil($row["total"] / $limit);

    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }
    echo '</ul>';
    echo '</nav>';
    ?>
</section>


        <!-- ... (Pagination) ... -->

        <?php
        $result = $conn->query("SELECT COUNT(idPlante) AS total FROM plantes");
        $row = $result->fetch_assoc();
        $total_pages = ceil($row["total"] / $limit);

        echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination">';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }
        echo '</ul>';
        echo '</nav>';
        ?>
    </section>

    <script>
        function submitForm() {
            document.getElementById('categorieSelect').form.submit();
        }

        function searchPlants() {
            document.getElementById('categorieSelect').form.submit();
        }
    </script>
</body>
</html>
