<?php
if (isset($_SESSION['data'])) {
?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-nav">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="nav-link  " href="home.php" tabindex="" aria-disabled="true">جديد <i class="fa-regular fa-square-plus"></i></a>
                </li>
                <li>
                    <a class="nav-link  " href="store.php" tabindex="" aria-disabled="true">الموجودات <i class="fa-solid fa-warehouse"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link  " href="admin/logout.php" tabindex="" aria-disabled="true">Log out <i class="fa-solid fa-right-from-bracket"></i></a>
                </li>
                <li class="nav-item dropdown me-auto">
                    <div class="nav-link">
                        <?php
                        $user = $_SESSION['data'];
                        echo "<h5 class='user-info'>"  . $user . " <i class='fa-solid fa-user-nurse'></i></h5>";
                        ?>
                    </div>
                </li>
            </ul>
        </div>


    </nav>

<?php

}

if (isset($_SESSION['adm'])) {
?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-nav">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link  " href="logout.php" tabindex="-1" aria-disabled="true">Log out</a>
                </li>
                <li class="nav-item dropdown me-auto">
                    <div class="nav-link" >
                        <?php
                        $adm = $_SESSION['adm'];
                        echo "<h5 class='user-info'>"  . $adm . " <i class='fa-solid fa-user-nurse'></i></h5>";
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

<?php
}

if (isset($_SESSION['pharm'])) {
?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-nav">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link  " href="../admin/logout.php" tabindex="-1" aria-disabled="true">Log out</a>
                </li>
                <li class="nav-item dropdown me-auto">
                    <div class="nav-link">
                        <?php
                        $pharm = $_SESSION['pharm'];
                        echo "<h5 class='user-info'>"  . $pharm . " <i class='fa-solid fa-user-nurse'></i></h5>";
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

<?php
}
