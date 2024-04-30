<?php

class Message
{

    private $message ="Welcome to my site";
    var $algo = "5EE54 Algo";
    var $time = "5:00 PM";

    public function __construct()
    {
        echo "<br><pre>  Constructor called <pre>";
        echo "<br> Message: $this->message ";
        echo "<br> Algo: $this->algo ";
        echo "<br> Time: $this->time ";
    }

    function setMessage($m)
    {
        $this->message = $m;
    }
    function getMessage()
    {
        return $this->message;
    }
}

$message = new Message();
$message->setMessage("Hello & good evening");
$m = $message->getMessage();
echo "<br><br>" . $m;

$message1 = new Message();
$message1->setMessage("Hello & good night");
$m = $message1->getMessage();
echo "<br><br>" . $m;
?>