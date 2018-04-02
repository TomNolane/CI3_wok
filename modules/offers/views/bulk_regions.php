<?php
$this->load->model('offers_model', 'offers');
$offer = $this->offers->offer($offer_id);
?>

<ol class="breadcrumb">
  <li><a href="/offers">Офферы</a></li>
  <li class="active">Регионы<?php if (isset($offer['title'])) echo ' «'.$offer['title'].'»'; ?></li>
</ol>

<form method="post">
<?php
if (!empty($regions))
foreach($regions as $region)
{
  echo '<div class="checkbox"><label><input type="checkbox" name="regions[]" value="'.$region['region_id'].'" checked> '.$region['name'].'</label></div>';
}
?>
<button type="submit" class="btn btn-success">Добавить</button>
</form>