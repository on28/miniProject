main::start("example.csv");
class main  {
static public function start($filename) {
        $records = csv::getRecords($filename);
        $table = html::generateTable($records);
    }
}

class html {
    public static function generateTable($records) {
echo "<html><body><table>\n\n";
    $f = fopen("example.csv", "r");
    while (($records = fgetcsv($f)) !== false) {
    echo "<tr>";
        foreach ($records as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
    }
    fclose($f);
    echo "\n</table></body></html>";
    }
}

class csv {
    static public function getRecords($filename) {
        $file = fopen($filename,"r");
        $fieldNames = array();
        $count = 0;
        while(! feof($file))
        {
            $record = fgetcsv($file);
            if($count == 0) {
                $fieldNames = $record;
            } else {
                $records[] = recordFactory::create($fieldNames, $record);
            }
            $count++;
        }
        fclose($file);
        return $records;
    }
}

class record {
    public function __construct(Array $fieldNames = null, $values = null )
    {
        $record = array_combine($fieldNames, $values);
        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }
}

public function returnArray() {
    $array = (array) $this;
    return $array;
}

public function createProperty($name = 'first', $value = 'keith') {
        $this->{$name} = $value;
    }
}

