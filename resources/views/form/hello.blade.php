<!--This is a blade template that goes in email message to site administrator-->
<?php
use Illuminate\Support\Facades\Input;
//get the first name
$name = Input::get('name');
$email = Input::get ('email');
$message = Input::get ('message');
?>

<h1>Vous avez été contacté par :  </h1><br>

<p>
    <strong> Nom : </strong> <?php echo ($name); ?><br>
    <strong> Email : </strong> <?php echo ($email);?><br>
        <strong> Contenu du message : </strong> <?php echo ($message);?><br>

</p>