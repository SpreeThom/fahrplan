<?php
/*
 * Webseite für Personenzüge eintragen und Bahnhöfe
 * hempel thomas 2025
 */
get_header('start');
?>
<div class="container bg-secondary bg-opacity-25 mb-2">
    <h4 class="text-center">Daten eintragen für Bahnhöfe und Personnenzüge!</h4>
    <hr>
    <div class="row">
        <div class="m-2 p-3">
           <li>
                <a href = "/fahrplan">Startseite</a>
           </li>
        </div>
        <p>Eintrag für Personen Züge und den Fahrplan</p>
        <hr>
            <div class="col-md-6 border border-dark border-1">
                <form class = "row g-3" method = "post">
                    <div class="col-md-4">
                        <label for="pzugID" class="form-label">Zug-ID</label>
                        <input type="text" class="form-control" id="pzugID" name="pzugID"/>
                    </div>
                    <div class="col-md-4">
                        <label for="bhfID" class="form-label">Bahnhof</label>
                        <input type="text" class="form-control" id="bhfID" name="bhfID"/>
                    </div>
                    <div class="col-md-4">
                        <label for="pzfolge" class="form-label">Reihenfolge</label>
                        <input type="text" class="form-control" id="pzfolge" name="pzfolge"/>
                    </div>
                    <div class="col-md-4">
                        <label for="pzank" class="form-label">Ankunft</label>
                        <input type="time" class="form-control" id="pzank" name="pzank" placeholder="0"/>
                    </div>
                    <div class="col-md-4">
                        <label for="pzabf" class="form-label">Abfahrt</label>
                        <input type="time" class="form-control" id="pzabf" name="pzabf" placeholder="0"/>
                    </div>
                    <div class="col-12 pb-md-3">
                        <button type="submit" class="btn btn-outline-success">Eintragen/Update</button>
                    </div>
                </form>
            </div>
        <div class="col-md-6">
            <p>Bahnhöfe Eintragen für Personenzüge</p>
            <hr>
            <div class="col-md-6">
                <form class="row g-1" method="post">
                    <div class="col">
                        <label for="bhfOrt" class="form-label">Bahnhof</label>
                        <input type="text" class="form-control" id="bhfOrt" name="bhfOrt"/>
                    </div>
                    <div class="col-12 pb-md-3">
                        <button type="submit" class="btn btn-outline-primary">Bhf-eintragen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- Container -->
<?php get_footer(); ?>
