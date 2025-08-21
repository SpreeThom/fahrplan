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
        <div style="max-height: 350px;overflow-y:auto;">
            <table class="table table-bordered table-striped mb-2">
                <thead>
                    <tr class="text-start">
                        <th>ID</th>
                        <th>Haltestelle/Bahnhof</th>
                    </tr>
                            <?php
                                foreach ($bahnhof as $item) {
                                    echo "<tr class='text-center'>";
                                    echo "<td>" . $item-> id . "</td>";
                                    echo "<td>" . $item-> name . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                </thead>
            </table>
        </div>
    </div>
</div>
