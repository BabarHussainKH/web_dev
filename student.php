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
    class clg
    {
        var $Dep;
        var $students;
        var $professors;
        var $library;

        public function __construct($d, $s, $p, $l)
        {

            $this->Dep = $d;
            $this->students = $s;
            $this->professors = $p;
            $this->library = $l;
        }

        // public function set_Dep($d)
        // {
        //     $this->Dep = $d;
        // }

        // public function get_Dep()
        // {
        //     echo "<br> get_Dep() - clg ";
        //     return $this->Dep;
        // }

        // public function set_students($s)
        // {
        //     $this->students = $s;
        // }

        // public function get_students()
        // {
        //     return $this->students;
        // }

        // public function set_library($l)
        // {
        //     $this->library = $l;
        // }

        // public function get_library()
        // {
        //     return $this->library;
        // }

        function showDetails()
        {
            echo "<br> Department: $this->Dep";
            echo "<br> Professor: $this->professors ";
            echo "<br> Students: $this->students";
            echo "<br> Library: $this->library ";
            echo "<br> ----------------------------- ";
        }
    }

    class Uni extends clg
    {
        public function __construct($d, $s, $p, $l)
        {
           
            parent::__construct($d, $s, $p, $l);
        }

        function get_Dep()
        {
            // parent::get_Dep();
            echo "<br> get_Dep() - Uni ";
            return $this->Dep;
        }
    }

    $car1 = new clg("Fast", "15500", "2024", 5);
    $car1->showDetails();
    echo"<br>";
    $car2 = new Uni("MAJU", "1500", "2022", 3);
    $car2->showDetails();
    $car3 = new Uni("IBA", "1500", "2022", 3);
    $car3->showDetails();
    // echo "<br> Department: " . $car1->get_Dep();

    ?>

</body>

</html>
