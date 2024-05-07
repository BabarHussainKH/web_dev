<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstraction in PHP</title>
</head>

<body>
    <h2>Abstracion in Banking</h2>
    <?php

// Abstract class Account
abstract class Account {
    protected $title;
    protected $accNo;
    protected $IBAN;
    protected $currency;

    public function __construct($title, $accNo, $IBAN, $currency) {
        $this->title = $title;
        $this->accNo = $accNo;
        $this->IBAN = $IBAN;
        $this->currency = $currency;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAccNo() {
        return $this->accNo;
    }

    public function getIBAN() {
        return $this->IBAN;
    }

    public function getCurrency() {
        return $this->currency;
    }
}

// Interface SavingAccount
interface SavingAccount {
    public function calculateInterestRate();
}

// Interface CurrentAccount
interface CurrentAccount {
    public function calculateInterestRate();
}

// Class Customer
class Customer extends Account implements SavingAccount, CurrentAccount {
    private $name;
    private $savingInterestRate;
    private $currentInterestRate;

    public function __construct($title, $accNo, $IBAN, $currency, $name, $savingInterestRate, $currentInterestRate) {
        parent::__construct($title, $accNo, $IBAN, $currency);
        $this->name = $name;
        $this->savingInterestRate = $savingInterestRate;
        $this->currentInterestRate = $currentInterestRate;
    }

    public function getName() {
        return $this->name;
    }

    public function calculateInterestRate() {
        return $this->savingInterestRate;
    }

    public function calculateCurrentInterestRate() {
        return $this->currentInterestRate;
    }
}

// Example usage
$customer = new Customer("Umar Usman", "123456789", "DE12345678901234567890", "PKR", "Umar", 0.05, 0.03);
echo "Account Title: " . $customer->getTitle() . "<br>";
echo "Account Number: " . $customer->getAccNo() . "<br>";
echo "IBAN: " . $customer->getIBAN() . "<br>";
echo "Currency: " . $customer->getCurrency() . "<br>";
echo "Customer Name: " . $customer->getName() . "<br>";
echo "Saving Interest Rate: " . $customer->calculateInterestRate() . "<br>";
echo "Current Interest Rate: " . $customer->calculateCurrentInterestRate() . "<br>";
?>



</body>

</html>