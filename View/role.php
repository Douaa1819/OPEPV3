

<?php
session_start();
require_once '../config/conn.php';
require_once '../Model/roles.php';
require_once '../controller/role.php';

$roleModel = new RoleModel($connection);
$roleController = new RoleController($roleModel);
$roleController->traiterFormulaireRole();
$userId = $_GET['id']; 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>role</title>
</head>

<body style="background-color: #31572C  ">
    <section class="sec1 ">
        <div class="overlay" id="overlay"></div>
        <!-- Section: Design Block -->
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5 mt-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color:aliceblue; font-size: 3.2vw;">
                        The best offer <br />
                    </h1>
                    <p class="mb-4 opacity-70" style="color:aliceblue; font-size: 1.2vw;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Temporibus, expedita iusto veniam atque, magni tempora mollitia
                        dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                        ab ipsum nisi dolorem modi. Quos?
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass" style="width: 28vw;">
                        <div class="card-body px-4 py-5 px-md-5">

                            <!-- --------------------------------------------------Form_Role -------------------------------------------->
                            <form method="post" class="d-flex flex-column justify-content-center  "  >
                              <label for="role">Sélectionnez un rôle :</label>
                             <select name="role" id="role" style="height: 2.5vw;">
                               <option value="client">Client</option>
                                 <option value="admin">Admin</option>
                                </select>

                                            <button type="submit" name="submitRole" class="btn btn-block mb-4 mt-4" style="color:white; background-color: #31572C; width: 12vw">Terminer</button>
                                        </form>
                            <!-- ------------------------------------------------------Fin ------------------------------------------------------------->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="javascripte.js"></script>
</body>

</html>