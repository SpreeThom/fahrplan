<?php
/**
 * Eintrag für die Bahnhöfe und Haltestellen
 * thomas hempel 2025
 */
    get_header('start');
/** @var TYPE_NAME $bahnhof */
?>
<div class = "container">
    <h4 class ="text-center">Eintrag für die Bahnhöfe </h4>
    <hr>
    <div class = "row">
        <div style="max-height: 250px;overflow-y:auto;">
            <table class="table table-bordered table-striped mb-2">
                <thead>
                    <tr class="text-start">
                        <th>ID</th>
                        <th>Haltestelle/Bahnhof</th>
                        <th>Reihenfolge</th>
                    </tr>
                            <?php
                                foreach ($bahnhof as $item) {
                                    echo "<tr class='text-center'>";
                                    echo "<td>" . $item-> id . "</td>";
                                    echo "<td>" . $item-> name . "</td>";
                                    echo "<td>" . $item-> reihe . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                </thead>
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
                </div>
                <div class="col-md-6">
                    <label for="bhfReihe" class="form-label">Reihenfolge (Decimal)</label>
                    <input type="text" class="form-control" id="bhfReihe" name="bhfReihe"/>
                </div>
                <div class ="col-12 pb-md-3">
                    <button type="submit" class="btn btn-primary">Eintragen</button>
                </div>

            </form>
        </div>
            <div class = "col border border-dark border-start-0 border-1 m-0">
                <form class ="row g-3" method="post">
                    <div class="col-md-6">
                        <label for="search" class="form-label">Suchen</label>
                        <input type="text" class="form-control" id="search" name="search"/>
                    </div>
                    <div class ="col-12 pb-md-3">
                        <button type="submit" class="btn btn-primary">Suchen</button>
                    </div>
                </form>
            </div>

    </div>
</div>
