<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encapsulation in PHP</title>
</head>

<body>

    <?php
    echo "<br> <h1>Encapsulation in PHP</h1> ";
    class Vehicle
    {
        public $model;
        private $name;
        protected $year;
        public $capacity;
        public function __construct($n, $m, $y, $c)
        {
            echo "<br> Vehicle() - constructor ";
            $this->model = $m;
            $this->name = $n;
            $this->year = $y;
            $this->capacity = $c;

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
            echo "<br> get_name() - Vehicle ";
            return $this->name;
        }
        public function set_capacity($c)
        {
            $this->capacity = $c;
        }
        public function get_capacity()
        {
            return $this->capacity;
        }

        function showDetails()
        {
            echo "<br> Name: $this->name ";
            echo "<br> Year: $this->year ";
            echo "<br> Model: $this->model ";
            echo "<br> Capacity: $this->capacity ";
            echo "<br> ----------------------------- ";
        }
    }


    // $v1 = new Vehicle();
    // $v1->set_capacity(5);
    // $v1->set_name("Honda Civic");
    // $v1->set_model("2024");
    

    // $v1 = new Vehicle("Hilux", "Revo", "2024", 5);
    // $v2 = new Vehicle("Mercedeez", "Revo", "2024", 5);
    // $v3 = new Vehicle("Mehran", "Revo", "2024", 5);
    // $v1->showDetails();
    // $v2->showDetails();
    // $v3->showDetails();
 


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
            return parent::get_name();
        }

        function get_year(){
            // parent::get_name();
            echo "<br> get_year() - Car ";
            return $this->year;
        }

    }

    $car1 = new Car("Hilux", "Revo", "2024", 5);
    echo "<br> Name: " . $car1->get_name();
    echo "<br> Year: " . $car1->get_year();
    // echo "<br> Capacity: " . $car1->get_capacity();

    ?>

</body>

</html>