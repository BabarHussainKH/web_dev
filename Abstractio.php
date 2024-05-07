<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstraction in PHP</title>
</head>

<body>
    <h2>Abstracion in PHP</h2>
    <?php

    abstract class Employee
    {
        public $empID;
        public $empName;
        public $roll;

        public function __construct($empID, $empName, $roll)
        {
            $this->empID = $empID;
            $this->empName = $empName;
            $this->roll = $roll;

        }

        public function test()
        {
            echo "Employee- test()";
        } // complete funciton
        public abstract function calculateSalary(); // incomplete function
    
    }


    interface PermanentEmployee
    {
        public function calculateBonus($b);
    }

    interface ContractEmployee
    {
        public function hourlySalary();
    }

    // Multiple Inheritance in PHP
    /*
    class A{}
    class B{}
    class C extends A B{}
    
    interface A1{}
    interface B1{}
    class C1 implements A B{}
    */

    class EmployeeManager extends Employee implements PermanentEmployee
    {
        public $salary;

        public function __construct($id, $n, $roll, $sal)
        {
            parent::__construct($id, $n, $roll);
            $this->salary = $sal;

        }
        public function calculateSalary()
        {
            /*
                logic to calculate salary
            */
            var_dump( $this);
            echo "<br>  ";
            echo "<br>  ";
            echo "<br>  ";
            $this->salary = (Float) $this->salary * 1.4;
            $grossSal = $this->salary + $this->calculateBonus(200000);
            return $this->salary;
        }

        public function calculateBonus($b)
        {
            $this->salary;
        }
    }


    class EmployeeDeveloper extends Employee implements ContractEmployee
    {
        public $hours;
        public $hoursRate;


        public function __construct($id, $n, $roll, $hours, $hoursRate)
        {
            parent::__construct($id, $n, $roll);
            $this->hours = $hours;
            $this->hoursRate = $hoursRate;

        }
        public function calculateSalary()
        {
            var_dump( $this);
         return $this->hourlySalary();
        }

        public function hourlySalary()
        {   
            return ($this->hoursRate *$this->hours);
        }
      
    }
    $empManager = new EmployeeManager(43, "Ahmed", "Team Lead", 350000);
    echo $empManager->calculateSalary();

    $empDeveloper = new EmployeeDeveloper(43, "Ahmed", "Team Lead", 132, 4000);
    echo $empDeveloper->calculateSalary();


    ?>




</body>

</html>