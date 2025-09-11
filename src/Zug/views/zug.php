<?php
/**
 * Eintragen der Züge mit Umlauf und weiteren Daten
 */
get_header('start');
/** @var TYPE_NAME $zug */
/** @var TYPE_NAME $intern */
?>
<div class="container">
    <h4 class="text-center text-success">Zug  </h4>
    <hr>
    <div class="row">
        <div class = "col">
    <p>Eingetragene Züge</p>
    <div style="max-height:200px; overflow-y:auto;">
            <table class="table table-bordered table-striped mb-2">
                <thead>
                <tr class="text-start">
                    <th>ID </th>
                    <th> Nr</th>
                    <th>Jahr</th>
                    <th> Laufweg/über </th>
                </tr>
                <?php
                 foreach ($zug as $item) {
                     echo "<tr class = 'text-center'>";
                     echo "<td>" . $item->zug_id . "</td>";
                     echo "<td>" . $item->zug_nr . "</td>";
                     echo "<td class = 'text-success text-bg-warning fw-medium'>" . $item->zug_jahr . "</td>";
                     echo "<td>" . $item->zug_lw . "</td>";
                    echo "</tr>";
                    }
                ?>
                </thead>
            </table>
        </div>
        </div>
        <div class = "col">
            <p>Züge Intern Verkehrstage/Laufwege</p>
            <div style="max-height:200px; overflow-y:auto;">
             <table class="table table-bordered table-striped mb-2">
                <thead>
                <tr class="text-start">
                    <th>ID </th>
                    <th> Jahr</th>
                    <th>Laufweg</th>
                    <th>ZugID</th>
                </tr>
                <?php
                foreach ($intern as $key) {
                    echo "<tr class = 'text-center'>";
                    echo "<td>" . $key['i_id'] . "</td>";
                    echo "<td>" . $key['i_fpljahr'] . "</td>";
                    echo "<td class = 'text-success text-bg-warning' style='font-size: .8em '>" . $key['i_lw'] . "</td>";
                    echo "<td>" . $key['zugId'] . "</td>";
                    echo "</tr>";
                }
                ?>
                </thead>
            </table>
        </div>
        </div>
    </div>
    <hr>

    <div class = "text-center fst-italic fs-3 text-bg-info mb-2">Züge eintragen!</div>
    <hr>
    <div class="row ">
        <div class = "col border border-dark border-end border-1 m-0">
    <form class="row g-3" method="post" >
        <div class="col-md-6">
            <label for="zugNr" class="form-label">Nummer des Zuges (int)</label>
            <input type="text" class="form-control" id="zugNr" name="zugNr">
        </div>
        <div class="col-md-6">
            <label for="zugMg" class="form-label">Gattung mit Zug Nummer(Abk.)</label>
            <input type="text" class="form-control" id="zugMg" name="zugMg">
        </div>
        <!-- Textarea -->
        <div class="col-md-6">
            <label for="zugGt" class="form-label">Zug-gattung</label>
            <input type="text" class="form-control" id="zugGt" name="zugGt">
        </div>
        <div class="col-md-6">
            <label for="zugLw" class="form-label">Laufweg</label>
            <input type="text" class="form-control" id="zugLw" name="zugLw">
        </div>
        <!-- Abfrage ob zug Update -->
        <div class ="col-md-12 border border-warning border-1 p-md-3">
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="zugUpdate" name="zugUpdate">
                <label class="form-check-label" for="zugUpdate">
                    <span class="fw-bold" >Update Zug (id)</span>
                </label>
            </div>
        </div>
            <div class="col-md-2">
                <label for="upID" class="form-label">ID</label>
                <input type="text" class="form-control" id="upID" name="upID">
            </div>
        </div>
        <div class="col-12 pb-md-3">
            <button type="submit" class="btn btn-primary">Eintragen/Update</button>
        </div>
    </form>
        </div>
        <!-- intern Fahrplan eintragen -->
        <div class = "col border border-dark border-start-0 border-1 m-0">
            <form class="row g-3" method="post" >
            <div class="col-md-6">
                <label for="internFpl" class="form-label">Taschenfahrplan</label>
                <input type="text" class="form-control" id="internFpl" name="internFpl">
            </div>
            <div class="col-md-6">
                <label for = "internLw" class="form-label">Laufweg / über</label>
                <input type="text" class="form-control" id="internLw" name="internLw">
            </div>
                <div class="col-md-6">
                    <label for="zugGattung" class="form-label">Die Zug - Gattung</label>
                    <input type="text" class="form-control" id="zugGattung" name="zugGattung" placeholder="Eilzug">
                </div>
                <div class="col-12">
                    <label for="zugIntern" class="form-label">Notizen über den Zug (z.b. über ...)</label>
                    <textarea type="text" class="form-control" rows="3" id="zugIntern" name="zugIntern"></textarea>
                </div>
            <div class = "col-md-6">
                <label for="internTage" class="form-label">Verkehrstage</label>
                <input type = "text" class="form-control" id="internTage" name="internTage" />
            </div>
            <div class = "col-md-6">
                 <label for="internNicht" class="form-label">Verkehrt nicht am / von-bis</label>
                <input type = "text" class="form-control" id="internNicht" name="internNicht"/>
            </div>
            <div class = "col-md-6">
                <label for = "idZug" class="form-label">Zug aus Tabelle</label>
                <input type = "text" class="form-control" id="idZug" name="idZug"/>
            </div>
                <div class = "col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="internMitropa" name="internMitropa"/>
                    <label class="form-check-label" for="internMitropa">
                        Mitropa /Speisewagen
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="internBar" name="internBar"/>
                    <label class="form-check-label" for="internBar">
                        Getränkeabteil
                    </label>
                </div>
                </div>
                <div class="col-12 pb-md-3">
                    <button type="submit" class="btn btn-primary">Eintragen/Update</button>
                </div>
                </form>
        </div>
    </div>
</div>
<?php if(!empty($error)){
    var_dump($error);
} ?>

<?php get_footer(); ?>
