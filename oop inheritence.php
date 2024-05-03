<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inheritance in PHP</title>
</head>

<body>

    <?php
    echo "<br> <h1>Inheritance in PHP</h1> ";
    class Computer
    {
        var $model;
        var $name;
        var $year;
        var $vervion;
        public function __construct($n, $m, $y, $v)
        {
            echo "<br> computer  ";
            $this->model = $m;
            $this->name = $n;
            $this->year = $y;
            $this->version = $v;

        }

        public function set_model($m)
        {
            $this->model = $m;
        }
        public function get_model()
        {
            return $this->model;
        }
        public function set_name($n)
        {
            $this->name = $n;
        }
        public function get_name()
        {
            echo "<br> computer name ";
            return $this->name;
        }
        public function set_version($c)
        {
            $this->version = $v;
        }
        public function get_version()
        {
            return $this->version;
        }

        function showDetails()
        {
            echo "<br> Name: $this->name ";
            echo "<br> Year: $this->year ";
            echo "<br> Model: $this->model ";
            echo "<br> version: $this->version";
            echo "<br> ----------------------------- ";
        }
    }
    
    $v1 = new computer("Hp", "i5", "2020", "5th");
    $v2 = new computer("Dell", "i6", "2022", "7th");
    $v3 = new computer("Lenovo", "i7", "2024", "9th");
    $v1->showDetails();
    $v2->showDetails();
    $v3->showDetails();
    ?>
    </body>
    </html>