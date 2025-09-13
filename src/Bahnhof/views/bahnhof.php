<?php
/**
 * Eintrag für die Bahnhöfe und Haltestellen
 * thomas hempel 2025
 */
//header("Location: /bahnhof");

    get_header('start');
/** @var TYPE_NAME $bahnhof */
/** @var TYPE_NAME $suche */
/** @var TYPE_NAME $fahrplan */
?>
<div class = "container">
    <h4 class ="text-center">Eintrag für die Bahnhöfe </h4>
    <hr>
    <div class = "row">
        <div style="max-height: 250px;overflow-y:auto;">
            <table class="table table-bordered table-striped mb-2">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Haltestelle/Bahnhof</th>
                        <th>Nummer</th>
                    </tr>
                </thead>

                            <?php
                                foreach ($bahnhof as $item) {
                                    echo "<tr class='text-center' style='font-size:.75em'>";
                                    echo "<td>" . $item-> id . "</td>";
                                    echo "<td>" . $item-> name . "</td>";
                                    echo "<td class ='text-danger' >" . $item-> h_nr . "</td>";
                                    echo "</tr>";
                                }
                            ?>

            </table>
        </div>
    </div>
    <hr>
    <div class = "row">
        <div class ="col border border-dark border-1 m-0">
            <form class ="row g-3" method="post">
                <div class="col-md-6">
                    <label for="bhfName" class="form-label">Bahnhofs-Name</label>
                    <input type="text" class="form-control" id="bhfName" name="bhfName" placeholder="Bahnhofs-Name"/>
                    <label for="h_nummer" class="form-label">interne Bahnhof-Nummer</label>
                    <input type="text" class="form-control" id="h_nummer" name="h_nummer"/>
                </div>
                <div class ="col-12 pb-md-3">
                    <button type="submit" class="btn btn-primary">Eintragen</button>
                </div>

            </form>
        </div>
            <div class = "col border border-dark border-1">
                <form class ="row g-3" method="post">
                    <div class="col-md-6">
                        <label for="bhfsearch" class="form-label">Suchen</label>
                        <input type="text" class="form-control" id="bhfsearch" name="bhfsearch"/>
                    </div>
                    <div class ="col-12 pb-md-3">
                        <button type="submit" class="btn btn-primary">Suchen</button>
                    </div>
                </form>
                <div class = "col">
                    <table  class="table table-bordered table-striped mb-2">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Haltestelle</th>
                                <th>Nummer</th>
                            </tr>
                        </thead>
                        <tbody class = "text-center">

                            <?php
                            if(!empty($suche)){
                            foreach ($suche as $item)
                            {
                                echo "<tr>";
                                echo "<td>" . $item['id'] . "</td>";
                                echo "<td>" . $item['name'] . "</td>";
                                echo "<td class = 'text-danger fw-bolder '>" . $item['h_nr'] . "</td>";
                                echo "</tr>";
                            }
                            }else{
                                echo "<tr>";
                                echo "<td> --</td>";
                                echo "<td> Es wurde nichts gefunden!</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <hr>
    <div class = "row">
        <div class ="col-8 border border-dark border-1 m-0">
            <h6 class=" text-center text-success p-3">Fahrplan eintragen! </h6>
            <form class="row g-3" method="post">
                <div class="col-md-4">
                    <label for="zugID" class="form-label">Zug-ID</label>
                    <input type="text" class="form-control" id="zugID" name="zugID" placeholder="0"/>
                </div>
                <div class="col-md-4">
                    <label for="halteID" class="form-label">Haltestellen - ID</label>
                    <input type="text" class="form-control" id="halteID" name="halteID" placeholder="0"/>
                </div>
                <div class="col-md-4">
                    <label for="rfolge" class="form-label">Reihenfolge Bhf</label>
                    <input type="text" class="form-control" id="rfolge" name="rfolge" placeholder="0"/>
                </div>
                <div class="col-md-4">
                    <label for="ank" class="form-label">Ankunft</label>
                    <input type="time" class="form-control" id="ank" name="ank" placeholder="0"/>
                </div>
                <div class="col-md-4">
                    <label for="abf" class="form-label">Abfahrt</label>
                    <input type="time" class="form-control" id="abf" name="abf" placeholder="0"/>
                </div>
                <div class="col-12 pb-md-3">
                    <button type="submit" class="btn btn-outline-success">Eintragen/Update</button>
                </div>
            </form>

        </div>
        <div class="col-4 border border-dark border-1 bg-warning">
            <div style="max-height: 200px; overflow-y:auto;" >
                <table  class="table table-bordered table-striped  mb-2">
                    <thead>
                        <tr class="text-center" style="font-size:.9em;">
                            <th>ID</th>
                            <th>Haltestelle</th>
                            <th>Ankunft</th>
                            <th>Abfahrt</th>
                            <th>Folge</th>
                        </tr>
                    </thead>
                    <tbody class="text-start ">
                    <?php
                    if(empty($fahrplan)){
                        echo " <div class='text-center'>Keine Daten vorhanden!</div>";
                    }else {

                        foreach ($fahrplan as $key) {
                            echo "<tr style='font-size:.75em;'>";
                            echo "<td>" . $key['id'] . "</td>";
                            echo "<td >" .$key['bahnhof'] ."</td>";
                            echo "<td>" .$key['Ankunft']."</td>";
                            echo "<td>" .$key['Abfahrt'] ."</td>";
                            echo "<td>" .$key['reihe'] ."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <form class ="row g-3" method="post">
                <div class="col-md-6">
                    <label for = "theID" class="form-label">ID</label>
                    <input type="text" class="form-control" id="theID" name="theID"/>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="loadID" name="loadID" />
                        <label class="form-check-label" for="loadID"><span class="fw-bold">Laden</span> </label>
                    </div>
                    <div class="col-md-12 pb-md-2 p-md-1">
                        <button type="submit" class="btn btn-primary">Laden</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<hr>
    <a href = "/fahrplan">Zurück</a>
    <?php get_footer() ?>
</div>


