<?php
/* home.php */

get_header('start');
?>

    <div class="container bg-secondary bg-opacity-25 mb-2">
        <h4 class = "text-center p-1">Datenbank - Auslesen-Probe </h4>
        <p class="bg-color-ground">Einbinden der CSS</p>
   <div class = "m-3 pt-1">
        <li> <a href="/zug">züge Eintragen</a> </li>
        <li> <a href="/notion">Anzeigen</a> </li>
        <li> <a href="/bahnhof">Eintrag für die Bahnhöfe</a> </li>
        <li> <a href="/timetable"> Eintrag für den Fahrplan</a> </li>
        <li> <a href="/strecke">Eintrag Streckendaten</a> </li>
        <li> <a href="/station">Eintrag für die D-Zug Haltestellen</a> </li>
        <div class = "border border-success rounded p-1 mb-2">
            <li> <a href="/regiobahn">Eintrag für die Personen-Züge</a> </li>
            <li> <a href="/pzug">Personen Zug - Fahrplan eintragen</a> </li>
        </div>
   </div>
        <hr>
    </div>
<?php get_footer(); ?>