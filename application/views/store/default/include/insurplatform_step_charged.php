<script id="insurplatform-step-charged" type="text/html">
	<div class="row">
		{{#data}}
		<div class="col-12 col-md-8">
			<div class="insurance-product">
				<h4 class="h4">Chọn quyền lợi bảo hiểm</h4>
				<div class="text mb-2">QUYỀN LỢI CƠ BẢN (LUÔN ĐƯỢC ÁP DỤNG)</div>

				<div class="package-main">
					<div class="package">
						<div class="form-check form-check-card">
							<input class="form-check-input" type="checkbox" value="" id="checkBox1">
							<label class="form-check-label" for="checkBox1">
								<h4 class="text">Bồi thường chi phí y tế, tử vong cho nạn nhân</h4>
								<div class="text">150,000,000 ₫/người/vụ</div>
							</label>
						</div>
					</div>
					<div class="package">
						<div class="form-check form-check-card">
							<input class="form-check-input" type="checkbox" value="" id="checkBox2">
							<label class="form-check-label" for="checkBox2">
								<h4 class="text">Bồi thường cho tài sản của nạn nhân</h4>
								<div class="text">100,000,000 ₫/người/vụ</div>
							</label>
						</div>
					</div>
				</div>

				<hr>

				<div class="text mb-2">QUYỀN LỢI MỞ RỘNG (TUỲ CHỌN THÊM)</div>
				<div class="text mb-2">Giá X đ/người ngồi (X = STBH * 0,1%)</div>
				<div class="box-insurance-product mb-3">
					<div class="text mb-2">Bồi thường chi phí y tế, tử vong cho người ngồi trên xe</div>
					<div class="package-main">
						<div class="package">
							<div class="form-check form-check-button">
								<input class="form-check-input" type="checkbox" value="" id="checkBox1">
								<label class="form-check-label" for="checkBox1">
									<div class="text">10,000,000 ₫/vụ</div>
								</label>
							</div>
						</div>
						<div class="package">
							<div class="form-check form-check-button">
								<input class="form-check-input" type="checkbox" value="" id="checkBox2">
								<label class="form-check-label" for="checkBox2">
									<div class="text">50,000,000 ₫/vụ</div>
								</label>
							</div>
						</div>
						<div class="package">
							<div class="form-check form-check-button">
								<input class="form-check-input" type="checkbox" value="" id="checkBox2">
								<label class="form-check-label" for="checkBox2">
									<div class="text">100,000,000 ₫/vụ</div>
								</label>
							</div>
						</div>
					</div>
				</div>

				<div class="group-radio">
					<label class="label-group-radio">Mục đích sử dụng <span class="red">*</span></label>
					<div class="item-radio">
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="radioBusiness1"
								name="radioBusiness" value="0">
							<label class="custom-control-label" for="radioBusiness1">Kinh doanh</label>
						</div>
					</div>
					<div class="item-radio">
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="radioBusiness2"
								name="radioBusiness" value="1">
							<label class="custom-control-label" for="radioBusiness2">Không kinh
								doanh</label>
						</div>
					</div>
				</div>

				<div class="group-radio">
					<label class="label-group-radio">Chuyên chở <span class="red">*</span></label>
					<div class="item-radio">
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="radioBusiness1"
								name="radioBusiness" value="0">
							<label class="custom-control-label" for="radioBusiness1">Kinh doanh</label>
						</div>
					</div>
					<div class="item-radio">
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="radioBusiness2"
								name="radioBusiness" value="1">
							<label class="custom-control-label" for="radioBusiness2">Không kinh
								doanh</label>
						</div>
					</div>
				</div>

				<div class="group-input-number mb-3">
					<label class="label-group-input mb-0">Số chổ ngồi <span class="red">*</span></label>
					<p class="sub-text mb-3">
						< 6 nếu chọn loại xe là Chở người và hàng hoá</p>
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="button" class="btn btn-first">
										<span class="bi bi-dash"></span>
									</button>
								</div>
								<input type="number" class="form-control" value="2">
								<div class="input-group-append">
									<button type="button" class="btn btn-last">
										<span class="bi bi-plus"></span>
									</button>
								</div>
							</div>
				</div>

				<div class="group-radio">
					<label class="label-group-radio">Thời hạn <span class="red">*</span></label>
					<div class="item-radio">
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" id="radioBusiness1"
								name="radioBusiness" value="0">
							<label class="custom-control-label" for="radioBusiness1">1 năm</label>
						</div>
					</div>
					<div class="item-radio">
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="radioBusiness2"
								name="radioBusiness" value="1">
							<label class="custom-control-label" for="radioBusiness2">2 năm</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="insurance-product-info">
				<h3 class="h4 mb-3">Tổng hợp quyền lợi từ gói bảo hiểm đã chọn</h3>
				<div class="list-feature">
					<div class="feature">
						<div class="label"><span class="bi bi-bookmarks"></span> Mục đích sử dụng</div>
						<div class="value">Không kinh doanh</div>
					</div>
					<div class="feature">
						<div class="label"><span class="bi bi-bookmarks"></span> Chuyên chở</div>
						<div class="value">Người</div>
					</div>
					<div class="feature">
						<div class="label"><span class="bi bi-bookmarks"></span> Số chổ ngồi</div>
						<div class="value">2</div>
					</div>
					<div class="feature">
						<div class="label"><span class="bi bi-bookmarks"></span> Thời hạn</div>
						<div class="value">1 Năm</div>
					</div>
				</div>

				<div class="list-packages">
					<div class="package package-title">
						<div class="label">QUYỀN LỢI CƠ BẢN</div>
						<div class="value">SỐ TIỀN BẢO HIỂM (STBH)</div>
					</div>
					<div class="package">
						<div class="label">
							Bồi thường chi phí y tế, tử vong cho nạn nhân
						</div>
						<div class="value">150,000,000 <u>đ</u>/người/vụ</div>
					</div>
					<div class="package">
						<div class="label">
							Bồi thường cho tài sản của nạn nhân
						</div>
						<div class="value">100,000,000 <u>đ</u>/vụ</div>
					</div>
					<div class="package package-title">
						<div class="label">QUYỀN LỢI MỞ RỘNG (TUỲ CHỌN THÊM)</div>
						<div class="value"></div>
					</div>
					<div class="package">
						<div class="label">
							Bồi thường chi phí y tế, tử vong cho người ngồi trên xe
						</div>
						<div class="value">100,000,000 <u>đ</u>/vụ</div>
					</div>
				</div>

				<div class="fee-total">
					<strong>Phí cần đóng</strong>
					<span class="fee">1.031.600 <u>đ</u></span>
				</div>

				<button class="btn btn-choose-insur" type="button">Chọn mua</button>
			</div>
		</div>
		{{/data}}
	</div>
</script>

