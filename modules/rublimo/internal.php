<?php require 'header.php'; ?>

<!--link href="/templates/rublimo/css/lk.css" rel="stylesheet" media="screen"-->

<div class="clearfix">&nbsp;</div>

<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php require 'internal-sidebar.php'; ?>
			<div class="clearfix">&nbsp;</div>
		</div>
		<div class="col-sm-9">
			<?php
			if ($this->uri->segment(1) == 'about') require 'internal-about.php';
			elseif ($this->uri->segment(1) == 'contacts') require 'internal-contacts.php';
			elseif ($this->uri->segment(1) == 'faq') require 'internal-faq.php';
			elseif ($this->uri->segment(1) == 'info') require 'internal-info.php';
			
			elseif ($this->uri->segment(1) == 'zaim-card') {require 'internal-zaim-card.php'; require 'internal-zaim-button.php';}
			elseif ($this->uri->segment(1) == 'zaim-qiwi') {require 'internal-zaim-qiwi.php'; require 'internal-zaim-button.php';}
			elseif ($this->uri->segment(1) == 'zaim-yandex') {require 'internal-zaim-yandex.php'; require 'internal-zaim-button.php';}
			elseif ($this->uri->segment(1) == 'zaim-contact') {require 'internal-zaim-contact.php'; require 'internal-zaim-button.php';}
			elseif ($this->uri->segment(1) == 'zaim-bank') {require 'internal-zaim-bank.php'; require 'internal-zaim-button.php';}
			
			elseif ($this->uri->segment(1) == 'oferta') require 'internal-oferta.php';
			elseif ($this->uri->segment(1) == 'agree') require 'internal-agree.php';
			elseif ($this->uri->segment(1) == 'soglasie') require 'internal-soglasie.php';
			elseif ($this->uri->segment(1) == 'rules') require 'internal-rules.php';
			?>
		</div>
	</div>
</div>

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>

<?php require 'footer.php'; ?>