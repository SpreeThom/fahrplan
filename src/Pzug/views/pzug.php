<?php
/*
 * Webseite für Personenzüge eintragen und Bahnhöfe
 * hempel thomas 2025
 */
get_header('start');
/** @var TYPE_NAME $pZbahnhof */
/** @var TYPE_NAME $pzFahrplan */
/** @var TYPE_NAME $pID */
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
                        <input type="text" class="form-control" id="pzugID" name="pzugID"  placeholder="<?=$pID?>"/>
                    </div>
                    <div class="col-md-4">
                        <label for="pzbhf" class="form-label">Bahnhof</label>
                        <input type="text" class="form-control" id="pzbhf" name="pzbhf"/>
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
                <hr>
                <!-- Tabelle Fahrplan -->
                <div style = "max-height: 500px; overflow-y: auto;">
                    <table class="table table-bordered table-striped mb-2">
                        <thead>
                            <tr class="text-center" style="font-size:.9em;">
                                <th>ID</th>
                                <th>Bahnhof</th>
                                <th>Ankunft</th>
                                <th>Abfahrt</th>
                                <th>Folge</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                        <?php
                           if(empty($pzFahrplan)){
                               echo " <div class='text-center'>Keine Daten</div> ";
                           } else{
                               foreach($pzFahrplan as $key){
                                   echo "<tr style='font-size:.75em;'>";
                                   echo "<td>".$key['id']."</td>";
                                   echo "<td>".$key['Bahnhof']."</td>";
                                   echo "<td>".$key['ankunft']."</td>";
                                   echo "<td>".$key['abfahrt']."</td>";
                                   echo "<td>".$key['reihe']."</td>";
                               }
                           }
                        ?>
                        </tbody>
                    </table>
                </div>
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
            <hr>
            <div style = "max-height: 600px; overflow-y: scroll; overflow-x: hidden;">
                <table class="table table-bordered table-striped mb-2">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Bahnhof</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($pZbahnhof as $item){
                            echo "<tr class='text-center' style='font-size:1em'>";
                            echo "<td>" .$item['id']. "</td>";
                            echo "<td>" .$item['b_name']. "</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- Container -->
<?php get_footer(); ?>
