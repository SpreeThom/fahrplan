<?php

final class FileHelper
{

    /**
     * @param string $file
     * @return void
     */
    final public static function load_header(string $file): void
    {
        try {
            if (file_exists(__DIR__ . '/template' . $file)) {

                include __DIR__ . '/template' . $file;

            } elseif (file_exists(__DIR__ . $file)) {

                include __DIR__ . $file;

            } else {
                self:: load_error('header.php');
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    /**
     * @param $fehler
     * @return void
     */
    protected static function load_error($fehler): void
    {
        echo '<h1 style="color:red; text-align: center;"> Fehler beim Laden der Datei ... ' . $fehler . '</h1>';
    }

    /**
     * @param $file
     * @return void
     */
    final public static function load_footer($file): void
    {
        try {

            if (file_exists(__DIR__ . '/template' . $file)) {

                include __DIR__ . '/template' . $file;

            } elseif (file_exists(__DIR__ . $file)) {

                include __DIR__ . $file;

            } else {

                self:: load_error('footer.php');
            }
        } catch (Exception $e) {
            echo $e;
        }
    }
}