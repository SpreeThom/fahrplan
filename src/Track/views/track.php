<?php
/*
 *
 */
get_header('start');
/** @var TYPE_NAME $halte */
/** @var TYPE_NAME $str */
/** @var TYPE_NAME $strecken */
?>
<div class="container">
<hr>
    <h5 class="text-center">Strecken Eintragen</h5>
    <a href = "/fahrplan/">Zur Startseite</a>
 <hr>
    <div class = "row">
        <div class = "col border border-dark border-1 p-1 mb-md-2">
            <div style = "max-height:250px; overflow-y:auto;">
                <table class = "table table-bordered table-striped mb-2">
                    <thead>
                        <tr class = "text-start">
                            <th>ID</th>
                            <th>Haltestelle</th>
                        </tr>
                    </thead>
                    <tbody class = "text-center">
                        <?php
                            foreach ($halte as $item){
                                echo "<tr>";
                                echo "<td>".$item['id']."</td>";
                                echo "<td>".$item['name']."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class = "col border border-dark border-1 p-1 mb-md-2">
            <div style = "max-height:250px; overflow-y:auto;">
                <table class = "table table-bordered table-striped mb-2">
                    <thead>
                    <tr class = "text-start">
                        <th>ID</th>
                        <th>Strecke</th>
                        <th>KBS</th>
                    </tr>
                    </thead>
                    <tbody class = "text-center">
                    <?php
                    foreach ($str as $item){
                        echo "<tr>";
                        echo "<td>".$item['str_id']."</td>";
                        echo "<td>".$item['name']."</td>";
                        echo "<td>".$item['str_kb']."</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class = "col border border-dark border-1 p-1 mb-md-2">
            <p class="p-2"> Strecke mit Bahnhöfe/Haltestellen</p>
            <form class="row " method = "POST">
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="anz" name="anz">
                        <label class="form-check-label" for="anz">
                            <span class="fw-bold" >Anzeigen</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="searchStr" name="searchStr"/>
                    <label for="searchStr" class="form-label">Strecke (ID)</label>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Suche</button>
                </div>
            </form>
            <hr>
            <div style = "max-height:250px; overflow-y:auto;">
                <table class = "table table-bordered table-striped mb-2">
                    <thead>
                    <tr class = "text-start">

                        <th>Haltestelle</th>
                        <th>ID-Haltestelle</th>
                        <th>Folge</th>
                    </tr>
                    </thead>
                    <tbody class = "text-center">
                    <?php
                    if(!empty($strecken)){
                    foreach ($strecken as $item){
                        echo "<tr>";
                        echo "<td>".$item['name']."</td>";
                        echo "<td>".$item['id']."</td>";
                        echo "<td>".$item['folge']."</td>";
                        echo "</tr>";
                    }
                    }else{
                        echo ' Kein Datensatz!';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class = "col border border-warning border-1 py-1 mb-md-2">
            <form class = "row g-3" method = "POST">
                <div class="col-md-6">
                    <label for="strID" class="form-label">Strecken ID</label>
                    <input type="text" class="form-control" id="strID" name="strID"/>
                </div>
                <div class="col-md-6">
                    <label for="halteID" class="form-label">Bahnhofs ID</label>
                    <input type="text" class="form-control" id="halteID" name="halteID"/>
                </div>
                <div class="col-md-6">
                    <label for="folgeID" class="form-label">Reihenfolge</label>
                    <input type="text" class="form-control" id="folgeID" name="folgeID"/>
                </div>
                <div class="col-12 pb-md-3">
                    <button type="submit" class="btn btn-primary">Senden</button>
                </div>
            </form>
            <?php
                if(!empty($strecken)){
                    echo "<p>Anzahl Datensatz ".count($strecken)."</p>";
                }

            ?>
        </div>
    </div>
</div>
 <?php get_footer() ?>

