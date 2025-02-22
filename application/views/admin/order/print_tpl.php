<? header("Content-Type: text/html; charset=UTF-8"); ?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?= $title ?></title>

<style type="text/css">
body {
 background-color: #fff;
 font-family: Lucida Grande, Verdana, Sans-serif;
 color: #4F5155;
}


.content{
 margin: 40px 10px 0px 10px;
}

.greek{
    background-color: #ECF6FF;
}

.german{
    background-color: #FFFFEA;
}

.english{
    background-color: #FFEAEF;
}

.general{
    background-color: #EEEEEE;
}

.odd td{
    background-color: #F5F5F5;
}

.even td{
    background-color: #FFFFFF;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

img {
    border: 0px;
}

h1 {
 color: #000;
 border-bottom:5px solid #C3D9FF;

 width:100%;
 padding:1em 0em .5em;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

table
{
	color:#000;
	background:#FFF;
	border-collapse:collapse;
	width:100%;
	border:5px solid #C3D9FF;
}

thead
{

}

thead th
{
	padding:1em 1em .5em;
 	border-bottom:1px dotted #356AA0;
 	font-size:100%;
 	text-align:left;
}



thead tr
{

}

td
{
	padding:.5em 1em;
}

tbody tr.odd td
{
	background:transparent url('<?= base_url() ?>theme/images/tr_bg.png') repeat top left;
}

tfoot
{
    border-top:1px dotted #356AA0;
}

tfoot td
{

	padding-bottom:1.5em;
}

tfoot tr
{

}


* html tr.odd td
{
	background:#FFF;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?= base_url() ?>theme/images/tr_bg.png', sizingMethod='scale');
}

#middle
{
	background-color:#FFF;
}

.user_code
{
    font-size: 105%;
    margin: 1em 0em;
}

.user_code strong
{
    font-size: 120%;
}

.user_stars
{
    font-size: 105%;
    margin: 1em 0em;
}

.user_stars strong
{
    font-size: 200%;
    color: #FF7400;
}


</style>
</head>
<body>
<div class="content">

<?php $sum=0; ?>

<h1><?= $this->lang->line('main_invoice_title') ?></h1>
<p>
    <?= $this->lang->line('main_invoice_company_details') ?>
</p>
<p>
    <?= $this->lang->line('main_invoice_personal_details') ?>
</p>
<div class="user_info">
<?= @$user['user_name'] ?><br />
<?= @$user['user_surname'] ?><br />
<?= @$user['user_address'] ?><br />
<?= @$user['user_zip'] ?><br />
<?= @$user['user_country'] ?><br />
<?= @$user['user_phone'] ?>
</div>
<div class="user_code">
	<?= $this->lang->line('main_invoice_password_for_future_shopping'); ?> <strong><?= @$user['user_code'] ?></strong>
</div>
<div class="user_stars">
	<?= $this->lang->line('main_invoice_your_points'); ?> <strong><?= @$user['user_stars'] ?></strong>
</div>

<table>
<col>
<col id="middle">
<col>
<thead>

	<tr><th><?= $this->lang->line('main_invoice_product'); ?></th><th><?= $this->lang->line('main_invoice_quantity'); ?></th><th><?= $this->lang->line('main_invoice_price') ?></th></tr>
</thead>
<tbody>
<?php foreach($products as $product):?>
    <tr>
    <td><?= $product['title_'.$lang] ?></td>
    <td><?= $product['quantity'] ?></td>
    <td><?= $product['price_'.$lang]*$product['quantity']; ?> <?= $this->lang->line("main_currency") ?></td>

    </tr>

<?php $sum += $product['price_'.$lang]*$product['quantity']; ?>
<?php endforeach; ?>
</tbody>
<tfoot>
    <tr><td><?= $this->lang->line('main_invoice_total'); ?></td><td></td><td><?= $sum; ?> <?= $this->lang->line("main_currency") ?></td></tr>
</tfoot>
</table>

</div>
</body>
</html>
