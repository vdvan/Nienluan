<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" id="page-wrapper">
	<div class="row">
		<div class="col-12">
			<form method="POST" action="<?=SITE_PATH?>/?mod=relay&act=update">
				<input type="hidden" class="form-control" name="id" value="<?= $relay['id'] ?>">
				<div class="form-group">
					<label for="relay-name">Tên thiết bị được điều khiển</label>
					<input type="text" class="form-control" id="relay-name" name="relay_name" value="<?= $relay['name'] ?>">
				</div>
				
				<div class="form-group">
					<label for="device-name">Pin</label>
					<input type="text" class="form-control" id="pin" name="pin" value="<?= $relay['pin'] ?>">
				</div>

				<div class="form-group">
					<label for="device-id">Thiết bị</label>
					<select class="form-control" id="device-id" name="device_id">
						<?php foreach ($deviceList as $device): ?>
						<option value="<?= $device['id'] ?>" <?= $device['id'] == $relay['device_id']  ? 'selected' : '' ?>>Id: <?= $device['id'] ?> - Tên: <?= $device['name'] ?></option>
						<? endforeach ?>
					</select>
				</div>
				
				<button type="submit" class="btn btn-primary" name="action">Lưu</button>
			</form>
		</div>
	</div>
</main>