<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" id="page-wrapper">
	<div class="row">
		<?php foreach ($relayList as $relay): ?>
		<div class="col-md-3 col-sm-6 col-6">
			<div class="card">
				<img id="img-d-<?= $relay['id'] ?>" src="<?= SITE_PATH ?><?= $relay['status'] == 1 ? '/view/vendor/img/switch-on.png' : '/view/vendor/img/switch-off.png' ?>" class="card-img-top relays" style="cursor: pointer;">
				<div class="card-body text-center">
					<h5 class="card-title"><?= $relay['name'] ?></h5>
				</div>
			</div>
		</div>
		<?php endforeach ?>
	</div>
	<script>
		var SITE_PATH = '<?= SITE_PATH ?>';
	</script>
</main>