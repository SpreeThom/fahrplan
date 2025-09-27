<?php
/**
 * view für die strecken
 * thomas hempel 2025
 */
 get_header('start');
 ?>
<div class="container">
    <h3 class = "text-center bg-secondary-subtle text-black"><u>Erfassung der Strecken Daten!</u></h3>
    <hr>
    <div class="row">
        <div class="col-12 border border-dark border-1 m-0">
            <form class="row g-3" method="post">
                <div class="col-md-4">
                    <label for = "sname" class="form-label">Name der Strecke</label>
                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Name der Strecke">

                    <label for = "sbis" class="form-label">Strecke in der Oberlausitz</label>
                    <input type="text" class="form-control" id="sbis" name="sbis" placeholder="Strecke in Ol">
                </div>
                <div class="col-md-4">
                    <label for = "spic" class="form-label">Bild in der Oberlausitz</label>
                    <input type="text" class="form-control" id="spic" name="spic" placeholder="Pfad">


                    <label for = "picol" class="form-label">Ersatz für das Bild</label>
                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Pfad">
                </div>
                <div class ="col-md-8">
                    <div class="form-floating">
                        <textarea class="form-control" id="snotiz" name="snotiz" rows="8"></textarea>
                        <label for = "snotiz" class="form-label">Notiz</label>
                    </div>
                </div>
                <!-- Abfrage ob update -->
                <div class="col-md-6 border border-warning border-1 p-md-1">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sUpdate" id="sUpdate">
                            <label class="form-check-label" for="sUpdate"><span class="fw-bold">Update</span></label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="sID" class="form-label">ID</label>
                        <input type="text" class="form-control" id="sID" name="sID">
                    </div>
                </div>
                <div class="col-12 pb-md-3">
                    <button type="submit" class="btn btn-primary">Eintragen/Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



