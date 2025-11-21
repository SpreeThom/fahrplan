<?php
/**
 * View für den Eintrag der Bahnhöfe international
 * Hempel Thomas 2025
 */
get_header('start');
/** @var TYPE_NAME $timetable */
/** @var TYPE_NAME $suche */
?>
<div class="container">
    <div class="row">
        <div class="mt-1 p-3">
            <li>
                <a href="/fahrplan">Startseite</a>
            </li>
        </div>
        <p> Eintrag für den Fahrplan -> Internationale und Schnellzüge!</p>
        <hr>
        <div class="col-md-6 border border-dark border-1">
            <h6 class="text-center text-success p-2"></h6>
            <form class="row g-3" method="post">
                <div class="col-md-4">
                    <label for="idZug" class="form-label">Zug-ID</label>
                    <input type="text" class="form-control" id="idZug" name="idZug"/>
                </div>
                <div class="col-md-4">
                    <label for="idStat" class="form-label">Bahnhof</label>
                    <input type="text" class="form-control" id="idStat" name="idStat"/>
                </div>
                <div class="col-md-4">
                    <label for="sfolge" class="form-label">Reihenfolge</label>
                    <input type="text" class="form-control" id="sfolge" name="sfolge"/>
                </div>

                <div class="col-12 pb-md-3">
                    <button type="submit" class="btn btn-outline-success">Eintragen/Update</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <p>Bahnhöfe Eintragen für die Schnellzüge</p>
            <hr>
            <div class="col-md-6">
                <form class="row g-1" method="post">
                        <div class="col">
                            <label for="statName" class="form-label">Bahnhof</label>
                            <input type="text" class="form-control" id="statName" name="statName"/>
                        </div>
                        <div class="col-12 pb-md-3">
                            <button type="submit" class="btn btn-outline-primary">Bhf-eintragen</button>
                        </div>
                </form>
                <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" >
                    Bahnhof-Suche
                </a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"  aria-expanded="true">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-center" id="offcanvasExampleLabel">Bahnhofs-Suche</h5>
                    </div>
                    <div class="offcanvas-body">

                        <div class="row">
                            <div class="col">
                                <form class="row g-1" method="post">
                                    <div class="col">
                                        <label for="statSearch" class="form-label">Bahnhof</label>
                                        <input type="text" class="form-control" id="statSearch" name="statSearch"/>
                                    </div>
                                    <div class="col-12 pb-md-3">
                                        <button type="submit" class="btn btn-outline-primary"  >Suche</button>
                                    </div>
                                </form>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name Bhf</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(empty($suche)){
                                           echo' Nichts gefunden!';
                                        }else {
                                            foreach ($suche as $value) {
                                                echo "<tr>";
                                                echo "<td>" . $value['id'] . "</td>";
                                                echo "<td>" . $value['name'] . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="row m-3">
        <div class="col-md-4 border border-dark border-1 bg-warning">
            <div style="max-height: 500px; overflow-y:auto;">
                <table class="table table-bordered table-striped mb-2">
                    <thead>
                        <tr class="text-center" style="font-size: .9em;">
                            <th>ID</th>
                            <th>Haltestelle</th>
                            <th>Ankunft</th>
                            <th>Abfahrt</th>
                            <th>Folge</th>
                        </tr>
                    </thead>
                        <tbody class="text-start">
                            <?php
                                if(empty($timetable)){
                                    echo "<div class='text-center'>Keine Daten!</div>";
                                }else{
                                    foreach($timetable as $key){
                                        echo "<tr style='font-size:.75em;'>";
                                        echo "<td>" . $key['id'] . "</td>";
                                        echo "<td >" .$key['station'] ."</td>";
                                        echo "<td>" .$key['ankunft']."</td>";
                                        echo "<td>" .$key['abfahrt'] ."</td>";
                                        echo "<td>" .$key['reihe'] ."</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<div class ="mt-3">
    <?php get_footer(); ?>
</div>
