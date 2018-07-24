<?PHP
   function ValidateEmail($email)
   {
      $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
      return preg_match($pattern, $email);
   }
   
   function ValidatePhone($phone) {
		$pattern ='/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/';
		return preg_match($pattern, $phone);   
   }
   
   if (isset($_POST['submit'])) {
	   
	   if ((ValidateEmail($_POST['e-mail'])) & (ValidatePhone($_POST['phone']))) {
	   		$name = $_POST['name'];
			$mail = $_POST['e-mail'];
			$phone = $_POST['phone'];
			if ( ($name != "") & ($phone != "") ) {
				$message = 'Клиент по имени '.$name.', телефоном '.$phone.', e-mail`ом '.$mail.' совершил заказ.';
				mail("ivan.log.ivan.log@gmail.com", "Новый заказ на сайте", $message); 
				mail($mail, "Вы оформили заказ на сайте topturnik.ru", "Спасибо Вам, что сделали заказ на сайте topturnik.ru Наш специалист свяжется с Вами в ближайшее время. 
				С уважением менеджер по работе с клиентами. Тел. +79881343692.");
				?>
				<div class="alert"><span>Спасибо Вам, что сделали заказ на сайте topturnik.ru<BR>Наш специалист свяжется с Вами в ближайшее время.<BR>
				С уважением менеджер по работе с клиентами интернет магазина Top Turnik по Краснодарскому краю </span></div>
<meta charset="utf-8" />

				<?
			} else {
				echo "<div class='alert'><span>Пожалуйста, заполните поле Имя и повторите попытку.</span></div>";
			}
	   } else {
		  echo "<div class='alert'><span>Поля заполнены неверно.</span></div>";
	   }
	   
	   
   }

?>