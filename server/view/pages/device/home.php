<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" id="page-wrapper">
	<div class="row">
		<div class="col-12 col-sm-6">
			<a href="<?= SITE_PATH ?>/?mod=device&act=insert" class="btn btn-success mb-3">Thêm</a>

			<?php foreach ($deviceList as $device): ?>
			<div class="card" style="width: 18rem;">
			  <img src="<?= SITE_PATH ?>/view/vendor/img/nodemcu.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title"><?= $device['name'] ?></h5>
    			<h6 class="card-subtitle mb-2 text-muted">Loại MCU: NodeMCU</h6>
    			<p>Token: <b><?= $device['token'] ?></b></p>
    			<p><a href="<?= SITE_PATH ?>/?mod=device&act=update&id=<?= $device['id'] ?>" class="btn btn-primary mr-3">Sửa</a><a href="<?= SITE_PATH ?>/?mod=device&act=delete&id=<?= $device['id'] ?>" class="btn btn-danger">Xóa</a></p>
			  </div>
			</div>
			<br>
			<?php endforeach ?>
		</div>
	</div>
</main>