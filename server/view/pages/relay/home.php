<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" id="page-wrapper">
	<div class="row">
		<div class="col-12">
			<a href="<?=SITE_PATH?>/?mod=relay&act=insert" class="btn btn-success mb-3" style="color: white;">Thêm</a>
			<?php foreach ($relayList as $relay): ?>
			<div class="card">
				<div class="card-header">
					Relay - <?= $relay['id'] ?>
					<a href="<?= SITE_PATH ?>/?mod=relay&act=update&id=<?= $relay['id'] ?>" class="btn btn-primary" style="color: white;" >Sửa</a>
					<a href="<?= SITE_PATH ?>/?mod=relay&act=delete&id=<?= $relay['id'] ?>" class="btn btn-danger" style="color: white;">Xóa</a>
				</div>
				<div class="card-body">
					<h5 class="card-title">Thiết bị: <?= $relay['id'] ?> - Tên: <?= $relay['name'] ?> - Chân kết nối: <?= $relay['pin'] ?></h5>
				</div>
			</div>
			<br>
			<?php endforeach ?>
		</div>
	</div>
</main>