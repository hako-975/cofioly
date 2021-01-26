<div class="container">
	<div class="row my-2">
		<div class="col-lg">
			<button class="btn btn-primary" data-toggle="modal" data-target="#addImageModal" type="button"><i class="fas fa-fw fa-plus"></i> Gambar</button>
		</div>
	</div>
	<div class="row my-2">
		<?php foreach ($gallery as $image): ?>
			<div class="col-lg-3 m-2 p-0 border border-dark rounded text-center">
				<a href="<?= base_url('assets/img/img_galleries/') . $image['img_gallery']; ?>" class="enlarge">
					<img width="200" height="200" src="<?= base_url('assets/img/img_galleries/') . $image['img_gallery']; ?>" alt="<?= $image['img_gallery']; ?>">
				</a>
				<br>
				<button type="button" data-target="#editImageModal<?= $image['id_gallery']; ?>" data-toggle="modal" class="btn btn-success"><i class="fas fa-fw fa-edit"></i> Ubah</button>
				<a href="<?= base_url('gallery/deleteImage/') . $image['id_gallery']; ?>" data-nama="<?= $image['img_gallery']; ?>" class="btn-hapus btn btn-danger m-2"><i class="fas fa-fw fa-trash"></i> Hapus</a> 
			</div>
			<!-- Modal -->
			<div class="modal fade" id="editImageModal<?= $image['id_gallery']; ?>" tabindex="-1" role="dialog" aria-labelledby="editImageModalLabel<?= $image['id_gallery']; ?>" aria-hidden="true">
			  <div class="modal-dialog">
			    <form action="<?= base_url('gallery/editImage/') . $image['id_gallery']; ?>" method="post" enctype="multipart/form-data">
			    	<div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="editImageModalLabel<?= $image['id_gallery']; ?>">Edit Image - <?= $image['img_gallery']; ?></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <div class="text-center">
				            <a href="<?= base_url('assets/img/img_galleries/') . $image['img_gallery']; ?>" class="enlarge rounded check_enlarge_add_img_gallery">
				              <img style="width: 70%" src="<?= base_url('assets/img/img_galleries/') . $image['img_gallery']; ?>" class="check_add_img_gallery img-thumbnail rounded" alt="profile">
				            </a>
				        </div>
				        <div><small>Click image to zoom</small></div>
				        <div class="custom-file my-3">
				            <input type="file" class="custom-file-input img_gallery" name="img_gallery">
				            <label class="custom-file-label">Choose Profile Image</label>
				        </div>
			        </div>
			        <div class="modal-footer">
			            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
			            <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
			        </div>
				    </div>
			    </form>
			  </div>
			</div>

		<?php endforeach ?>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('gallery/addImage'); ?>" method="post" enctype="multipart/form-data">
    	<div class="modal-content">
	        <div class="modal-header">
		        <h5 class="modal-title" id="addImageModalLabel"><i class="fas fa-fw fa-plus"></i> Gambar</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	        </div>
		    <div class="modal-body">
		        <div class="text-center">
		            <a href="<?= base_url('assets/img/img_properties/upload_image.png'); ?>" class="enlarge rounded check_enlarge_add_img_gallery">
		              <img style="width: 70%" src="<?= base_url('assets/img/img_properties/upload_image.png'); ?>" class="check_add_img_gallery img-thumbnail rounded" alt="profile">
		            </a>
		        </div>
		        <div><small>Click image to zoom</small></div>
		        <div class="custom-file my-3">
		            <input type="file" class="custom-file-input img_gallery" name="img_gallery">
		            <label class="custom-file-label">Choose Profile Image</label>
		        </div>
	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
	            <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
	        </div>
	    </div>
    </form>
  </div>
</div>