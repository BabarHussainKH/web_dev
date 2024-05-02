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
            $this->$version = $v;

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
            echo "<br> Capacity: $this->version";
            echo "<br> ----------------------------- ";
        }
    }


    // $v1 = new Vehicle();
    // $v1->set_capacity(5);
    // $v1->set_name("Honda Civic");
    // $v1->set_model("2024");
    

    $v1 = new computer("Hilux", "Revo", "2024", 5);
    $v2 = new computer("Mercedeez", "Revo", "2024", 5);
    $v3 = new computer("Mehran", "Revo", "2024", 5);
    $v1->showDetails();
    $v2->showDetails();
    $v3->showDetails();
 


    class Car extends Vehicle{
        public function __construct($n, $m, $y, $c){
            echo "<br> Car() - constructor ";
            parent::__construct($n, $m, $y, $c);

            // $this->model = $m;
            // $this->name = $n;
            // $this->year = $y;
            // $this->capacity = $c;


            // echo "<br> Name: $this->name ";
            // echo "<br> Year: $this->year ";
            // echo "<br> Model: $this->model ";
            // echo "<br> Capacity: $this->capacity ";
            // echo "<br> ----------------------------- ";
        }

        function get_name(){
            // parent::get_name();
            echo "<br> get_name() - Car ";
            return $this->name;
        }

    }

    $car1 = new Car("Hilux", "Revo", "2024", 5);
    echo "<br> Name: " . $car1->get_name();
    // echo "<br> Capacity: " . $car1->get_capacity();

    ?>

</body>

</html>