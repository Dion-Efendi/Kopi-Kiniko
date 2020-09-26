<?php
include 'components/fotonav.php';
?>
<!-- <div class="top-brands">
	<div class="container">
		<h2>Produk Terlaris</h2>
		<div class="grid_3 grid_5">
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
					<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
				</ul>
			<div id="myTabContent" class="tab-content">
				<div class="row">
					<?php
					$data = $koneksi->query("SELECT * FROM tbl_produk ORDER BY produk_stok");
					foreach ($data as $pecah) :
					?>
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile_top_brands_grids ">
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column mb-5">
									<div class="agile_top_brand_left_grid ">
										<div class="agile_top_brand_left_grid_pos">
													<img src="images/offer.png" alt=" " class="img-responsive" />
												</div>
										<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block">
													<div class="snipcart-thumb">
														<a href="#"><img width="200" height="200" title=" " alt=" " src="admin/dist/img/imgproduk/<?= $pecah['produk_foto'] ?>" /></a>
														<br>
														<h4><?= $pecah['produk_nama'] ?></h4>

														<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
														<p> Stok : <?= $pecah['produk_stok'] ?></p>
														<h4>Rp. <?= number_format($pecah['produk_harga']) ?></h4><br>
													</div>
													<div class="button" style="text-align: center;">
														<a href="?page=pages/produk/detail&iddetail=<?= $pecah['produk_id'] ?>" data-toggle="tooltip" title="Detail Produk" class="btn btn-warning mr-2"><i class="fa fa-"> Detail Produk</i></a>
														<a href="?page=pages/pemesan/view&idpesan=<?= $pecah['produk_id'] ?>" data-toggle="tooltip" title="Pesan Produk" class="btn btn-danger"><i class="fa fa-"> Pesan Produk</i></a>
													</div>

													<div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
																	<input type="hidden" name="amount" value="20.99" />
																	<input type="hidden" name="discount_amount" value="1.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
												</div>
											</figure>
										</div>
									</div>
									<br><br>
									</div>
								</div>
							</div>
						</div>
					<?php
					endforeach;
					?>
				</div>
			</div>
			</div>
		</div>
	</div>
</div> -->

<div class="top-brands">
	<div class="container">
		<h2>Produk Terlaris</h2>
		<!-- <div class="grid_3 grid_5"> -->
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<!-- <ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
					<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
				</ul> -->
			<div id="myTabContent" class="tab-content">
				<div class="row">
					<?php
					$data = $koneksi->query("SELECT * FROM tbl_produk ORDER BY produk_stok");
					foreach ($data as $pecah) :
					?>
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile_top_brands_grids ">
								<div class="col-md-4 top_brand_left">
									<!-- <div class="hover14 column mb-5"> -->
									<div class="agile_top_brand_left_grid ">
										<!-- <div class="agile_top_brand_left_grid_pos">
													<img src="images/offer.png" alt=" " class="img-responsive" />
												</div> -->
										<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block">
													<div class="snipcart-thumb">
														<a href="#"><img width="200" height="200" title=" " alt=" " src="admin/dist/img/imgproduk/<?= $pecah['produk_foto'] ?>" /></a>
														<br>
														<h4 style="font-family: open sans;"><?= $pecah['produk_nama'] ?></h4>
														<!-- <div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div> -->
														<p style="font-family: open sans;"> Stok : <?= number_format($pecah['produk_stok']) ?></p>
														<h4>Rp. <?= number_format($pecah['produk_harga'])  ?></h4><br>
													</div>
													<div class="button" style="text-align: center;">
														<a href="?page=pages/produk/detail&iddetail=<?= $pecah['produk_id'] ?>" data-toggle="tooltip" title="Detail Produk" class="btn btn-warning mr-2"><i class="fa fa-"> Detail Produk</i></a>
														<a href="?page=pages/produk/pesan&idpesan=<?= $pecah['produk_id']; ?>" class="btn btn-primary">Pesan</a>
													</div>

													<!-- <div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
																	<input type="hidden" name="amount" value="20.99" />
																	<input type="hidden" name="discount_amount" value="1.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div> -->
												</div>
											</figure>
										</div>
									</div>
									<br><br>
									<!-- </div> -->
								</div>
							</div>
						</div>
					<?php
					endforeach;
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- </div> -->
</div>