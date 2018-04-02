<?php
$this->load->model('offers_model', 'offers');
$offer = $this->offers->offer($offer_id);
$region = $this->offers->region($region_id);
?>
<ol class="breadcrumb">
  <li><a href="/offers">Офферы</a></li>
  <li><a href="/offers/regions/<?php echo $offer_id; ?>">Регионы<?php if (isset($offer['title'])) echo ' «'.$offer['title'].'»'; ?></a></li>
  <li class="active"><?php if (isset($region['name'])) echo $region['name'].'. '; ?>Города</li>
</ol>
