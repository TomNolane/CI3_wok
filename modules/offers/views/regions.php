<?php
$this->load->model('offers_model', 'offers');
$offer = $this->offers->offer($offer_id);
?>
<ol class="breadcrumb">
  <li><a href="/offers">Офферы</a></li>
  <li class="active">Регионы<?php if (isset($offer['title'])) echo ' «'.$offer['title'].'»'; ?></li>
</ol>
