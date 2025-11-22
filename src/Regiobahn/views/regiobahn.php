<?php
/**
 * Eintrag der Personenzüge Laufwege intern
 */
get_header('start');
?>
<div class="container p-2">
    <div class="row">
        <div class="mt-1 p-3">
            <li>
                <a href="/fahrplan">Startseite</a>
            </li>
        </div>
        <p> Eintrag für die Personen-Züge!</p>
    </div>
    <hr>
    <div class="col-md-6 border border-dark border-1 p-1">
        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label for="pzNr" class="form-label">Zug-Nummer</label>
                <input type="text" class="form-control" id="pzNr" name="pzNr"/>
            </div>
            <div class="col-md-6">
                <label for="pzMg" class="form-label">Zugnummer mit Kürzel</label>
                <input type="text" class="form-control" id="pzMg" name="pzMg"/>
            </div>
            <div class="col-md-6">
                <label for="pzLw" class="form-label">Laufweg</label>
                <input type="text" class="form-control" id="pzLw" name="pzLw"/>
            </div>
            <div class="col-md-6">
                <label for="pzUe" class="form-label">Laufweg-Via</label>
                <input type="text" class="form-control" id="pzUe" name="pzUe"/>
            </div>
            <div class="col-md-6">
                <label for="pzGt" class="form-label">Zug-Gattung</label>
                <input type="text" class="form-control" id="pzGt" name="pzGt"/>
            </div>
            <div class="col-md-6">
                <label for="pzBis" class="form-label">Vehrkehrs-Tage</label>
                <input type="text" class="form-control" id="pzBis" name="pzBis"/>
            </div>
            <div class="col-md-2">
                <label for="strID" class="form-label">Strecken-ID</label>
                <input type="text" class="form-control" id="strID" name="strID"/>
            </div>
            <div class="col-12 pb-md-3">
                <button type="submit" class="btn btn-outline-success">Eintragen/Update</button>
            </div>
        </form>
    </div>
</div>
 <?php get_footer(); ?>
