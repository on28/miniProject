main::start("example.csv");
class main  {
static public function start($filename) {
        $records = csv::getRecords($filename);
        $table = html::generateTable($records);
    }
}

class html
{
    public static function generateTable($records) {

$css = <<<CSS
<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-0lax{text-align:left;vertical-align:top}
</style>
CSS;


    $first = true;

    echo $css;

    echo "<table class=\"tg\">" . PHP_EOL;

    foreach ($records as $record) {


        if ($first) {

            $fields = array_keys($record);

            self::generateRow($fields, true);
            $first = false;
    }
    $fields = array_values($record);

    self::generateRow($fields);

    }

    echo "</table" . PHP_EOL;

        }


        public static function generateRows(array $fields, $header = false){

            echo "<tr>" . PHP_EOL;

            $o = "<td \"tg-0lax\">";
            $c = "</td>";


            if ($header){
            $o = "<th \"tg-0lax\">";
            $c = "</th>";
            }
            foreach ($fields as $field){
            echo $o . $field . $c . PHP_EOL;
            }
            echo "</tr>" . PHP_EOL;

    }

}

class csv
{


