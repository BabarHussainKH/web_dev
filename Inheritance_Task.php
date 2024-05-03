<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Mobile Devices</h1>
    <?php
    class Mobile
    {
        public $name;
        public $price;
        public $color;
        public $year;
        public $model;
        public function __construct($name, $price, $color, $year, $model)
        {
            $this->name = $name;
            $this->price = $price;
            $this->color = $color;
            $this->year = $year;
            $this->model = $model;
        }
        function showDetails()
        {
            echo "<br> Name: $this->name ";
            echo "<br> Year: $this->year ";
            echo "<br> Model: $this->model ";
            echo "<br> Color: $this->color ";
            echo "<br> Price: $this->price ";
        }

    }
    class Huawei extends Mobile{

        public function __construct($name, $price, $color, $year, $model)
        {
            $this->name = $name;
            $this->price = $price;
            $this->color = $color;
            $this->year = $year;
            $this->model = $model;
        }
        function showDetails()
        {
            echo "<br> Name: $this->name ";
            echo "<br> Year: $this->year ";
            echo "<br> Model: $this->model ";
            echo "<br> Color: $this->color ";
            echo "<br> Price: $this->price ";
        }
    }
    class OnePlus extends Mobile{

        public function __construct($name, $price, $color, $year, $model)
        {
            parent::__construct($name, $price, $color, $year, $model);
        }
        function showDetails()
        {
            parent::showDetails();
        }
    }
    $device = new Mobile("Samsung",100000,"Black","2022","Galaxy S20");
    $device->showDetails();
    echo"<br><br>";
    $device1 = new Mobile("Iphone",250000,"Grey","2024","15 Pro Max");
    $device1->showDetails();
    echo"<br><br>";
    $huawei = new Huawei("Huawei",70000,"Silver","2021","P10 Lite");
    $huawei->showDetails();
    echo"<br><br>";
    $one = new OnePlus("One Plus",90000,"White","2023","9");
    $one->showDetails();
    ?>
</body>

</html>