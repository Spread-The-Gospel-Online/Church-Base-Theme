<?php
$church_info_fields = array(
	'name'      => get_option('church_info_name'),
	'telephone' => get_option('church_info_telephone'),
	'email'     => get_option('church_info_email'),
	'address'   => get_option('church_info_address'),
);

$church_info_items = array();
foreach ($church_info_fields as $church_info_key => $church_info_value) {
	if ($church_info_value) {
		$church_info_items[$church_info_key] = $church_info_value;
	}
}
?>

<script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "Church",
    "url": <?= wp_json_encode(home_url('/')) ?>
    <?php foreach ($church_info_items as $church_info_key => $church_info_value) { ?>,
        "<?= $church_info_key ?>": <?= wp_json_encode($church_info_value) ?>
    <?php } ?>
}</script>
