<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" id="page-wrapper">
	<div class="row">
		<div class="col-12">
			<form method="POST" action="<?=SITE_PATH?>/?mod=device&act=update">
				<input type="hidden" class="form-control" name="id" value="<?= $device['id'] ?>">
				<div class="form-group">
					<label for="device-name">Tên Thiết bị</label>
					<input type="text" class="form-control" id="device-name" name="device_name" value="<?= $device['name'] ?>">
				</div>

				<div class="form-group">
					<label for="device-type">Loại MCU</label>
					<select class="form-control" id="device-type" name="device_type">
						<option value="1" selected>NodeMCU</option>
					</select>
				</div>
				
				<button type="submit" class="btn btn-primary" name="action">Lưu</button>
			</form>
		</div>
	</div>
</main>