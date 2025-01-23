<?php
ob_start();
SESSION_start();
if (isset($_SESSION['data'])) {
    $pageTitle = 'Home';
    include 'init.php';
?>
    <div class="d-none text-div mb-2 border border-primary p-2">
        <div class="mb-1">
            <input class="form-control label" type="text" placeholder="Label">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control" placeholder="Hint">
        </div >
        <div class="d-flex justify-content-start mb-1">
            <p>required?</p>
            <input type="checkbox" name="" id="" >
        </div>
        <div class="relevent_content d-flex justify-content-betwen mb-1">
            <select class="relevent" name="" id="" placeholder="relevent">
                <option value="0" disabled selected>choose question</option>
            </select>
            <select name="" id="">
                <option value="=">=</option>
                <option value="!=">!=</option>
                <option value=">=">>=</option>
                <option value="<="><=</option>
                <option value=">">></option>
                <option value="<"><</option>
            </select>
        </div>
    </div>

    <div class="d-none choise mb-2 border border-primary p-2">
        <span class=type></span>
        <input class=form-control type="text">
        <button class="deletechoise btn btn-danger"><i class="fa-solid fa-trash"></i></button>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-4 tools">
                <button class="text-input btn btn-primary mb-1">
                    <i class="fa-solid fa-font"></i>
                    <span>Text</span>
                </button>
                <button class="number-input btn btn-primary mb-1">
                    <i class="fa-solid fa-arrow-up-9-1"></i>
                    <span>Number</span>
                </button>

                <button class="date-input btn btn-primary mb-1">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Date</span>
                </button>
                <button class="selectone-input btn btn-primary mb-1">
                    <i class="fa-solid fa-list-ol"></i>
                    <span>Select One</span>
                </button>
                <button class="selectmultiple-input btn btn-primary mb-1">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Select Multiple</span>
                </button>
            </div>
            <div class="col-md-8 form">

            </div>
        </div>
    </div>

<?php

    include  $tplad . 'footer.php';
} else {
    header('location: index.php');
}
ob_end_flush();
?>