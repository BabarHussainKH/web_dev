<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking in PHP</title>
</head>

<body>
    <h2>Banking in PHP</h2>
    <?php

    abstract class Account
    {
        public $title;
        public $Acno;
        public $IBAN;
        public $Currency;

        public function __construct($t, $acno, $ibn, $c)
        {
            $this->title = $t;
            $this->Acno = $acno;
            $this->IBAN = $ibn;
            $this->Currency = $c;

        }

        public function test()
        {
            echo "Account- test()";
        }
        public abstract function calculateBalance();
    
    }

    interface Savingaccount
    {
        public function calculateInterance();
    }

    interface Currentaccount
    {
        public function balance();
    }

    class Customer extends Account implements Savingaccount
    {
        public $Balance;

        public function __construct($t, $acno, $ibn, $c, $bal)
        {
            parent::__construct($t, $acno, $ibn, $c);
            $this->Balance = $bal;

        }
        public function calculateBalance()
        {
            
            var_export( $this);
            
            return $this->calculateInterance();
           
            
        }

        public function calculateInterance()
        {
            return ($this->Balance * 1.5);
        }
    }


    class Customer1 extends Account implements Currentaccount
    {
        public $months;
        public $monthlyBal;


        public function __construct($t, $acno, $ibn, $c, $months, $monthlyBal)
        {
            parent::__construct($t, $acno, $ibn, $c);
            $this->months = $months;
            $this->monthlyBal = $monthlyBal;

        }
        public function calculateBalance()
        {
            var_export( $this);
         return $this->balance();
        }

        public function balance()
        {   
            return ($this->monthlyBal *$this->months);
        }

    }

    $custo = new customer("Wasim Ahmed", 0000001123456702, "PK65BAHL0000001123456702", "PKR", 500000);
    echo $custo->calculateBalance();
echo"<br>";
echo "<br>  ";
echo "<br>  ";
echo "<br>  ";
   $custo2 = new customer1("Wasim Ahmed", 0000001123456702, "PK65BAHL0000001123456702", "PKR", 12, 50000);
    echo $custo2->calculateBalance();


    ?>




</body>

</html>