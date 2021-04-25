<br><br>
<div class="row">
  	<div class="col-xl-12">
	  	<h3><?=isset($title) ? $title : ""?></h3>
	</div>
</div>
<div class="row"> 
	<div class="col-md-12">
		<?=(isset($notification) ? (!empty($notification) ? $notification : '' ) : '') ?>
	</div>     
</div>
<div class="row">
  	<div class="col-xl-12">
    	<form role="form" action="<?=isset($form_url) ? $form_url : '#'?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							Personal Information
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>Profile Picture </label>
										<input type="file" class="form-control-file" id="profile-picture" name="profile-picture" accept=".jpg,.jpeg,.JPG,.JPEG,.PNG,.png,.bmp">
										<span class="text-danger"><?=form_error('profile-picture')?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>First Name <span class="text-danger">*</span></label>
										<input name="first-name" class="form-control" placeholder="First Name" value="<?=isset($post['first-name']) ? $post['first-name'] : ""?>">
										<span class="text-danger"><?=form_error('first-name')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Middle Name </label>
										<input name="middle-name" class="form-control" placeholder="Middle Name" value="<?=isset($post['middle-name']) ? $post['middle-name'] : ""?>">
										<span class="text-danger"><?=form_error('middle-name')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Last Name <span class="text-danger">*</span></label>
										<input name="last-name" class="form-control" placeholder="Last Name" value="<?=isset($post['last-name']) ? $post['last-name'] : ""?>">
										<span class="text-danger"><?=form_error('last-name')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							Login Information
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>Email Address <span class="text-danger">*</span></label>
										<input type="email" name="email-address" class="form-control" placeholder="Email Address" value="<?=isset($post['email-address']) ? $post['email-address'] : ""?>">
										<span class="text-danger"><?=form_error('email-address')?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>Password <span class="text-danger">*</span></label>
										<input type="password" name="password" class="form-control" placeholder="Password">
										<span class="text-danger"><?=form_error('password')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Repeat Password <span class="text-danger">*</span></label>
										<input type="password" name="repeat-password" class="form-control" placeholder="Repeat Password">
										<span class="text-danger"><?=form_error('repeat-password')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							Number Information
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>Mobile Number <span class="text-danger">*</span></label>
										<input name="mobile-no" class="form-control" placeholder="Mobile Number" value="<?=isset($post['mobile-no']) ? $post['mobile-no'] : ""?>">
										<span class="text-danger"><?=form_error('mobile-no')?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>Date of Birth <span class="text-danger">*</span></label>
										<input type="date" name="dob" class="form-control" placeholder="Date of Birth" value="<?=isset($post['dob']) ? $post['dob'] : ""?>">
										<span class="text-danger"><?=form_error('dob')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Place of Birth <span class="text-danger">*</span></label>
										<input name="pob" class="form-control" placeholder="Place of Birth" value="<?=isset($post['pob']) ? $post['pob'] : ""?>">
										<span class="text-danger"><?=form_error('pob')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Gender <span class="text-danger">*</span></label>
										<?=isset($gender) ? $gender : ""?>
										<span class="text-danger"><?=form_error('gender')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							Address Information
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>House No./Unit no./Building <span class="text-danger">*</span></label>
										<input name="house-no" class="form-control" placeholder="House No./Unit no./Building" value="<?=isset($post['house-no']) ? $post['house-no'] : ""?>">
										<span class="text-danger"><?=form_error('house-no')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Street <span class="text-danger">*</span></label>
										<input name="street" class="form-control" placeholder="Street" value="<?=isset($post['street']) ? $post['street'] : ""?>">
										<span class="text-danger"><?=form_error('street')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Barangay<span class="text-danger">*</span></label>
										<input name="barangay" class="form-control" placeholder="Barangay" value="<?=isset($post['barangay']) ? $post['barangay'] : ""?>">
										<span class="text-danger"><?=form_error('barangay')?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>City <span class="text-danger">*</span></label>
										<input name="city" class="form-control" placeholder="City" value="<?=isset($post['city']) ? $post['city'] : ""?>">
										<span class="text-danger"><?=form_error('city')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>State/Province <span class="text-danger">*</span></label>
										<?=isset($province) ? $province : ""?>
										<span class="text-danger"><?=form_error('province')?></span>
									</div>
								</div>
								<!-- <div class="col-xl-4">
									<div class="form-group">
										<label>Country/Region <span class="text-danger">*</span></label>
										<?=isset($country) ? $country : ""?>
										<span class="text-danger"><?=form_error('country')?></span>
									</div>
								</div> -->
							</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>Postal Code <span class="text-danger">*</span></label>
										<input name="postal-code" class="form-control" placeholder="Postal Code" value="<?=isset($post['postal-code']) ? $post['postal-code'] : ""?>">
										<span class="text-danger"><?=form_error('postal-code')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							Work Information
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>Source of Funds <span class="text-danger">*</span></label>
										<?=isset($sof) ? $sof : ""?>
										<span class="text-danger"><?=form_error('sof')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Nature of Work <span class="text-danger">*</span></label>
										<?=isset($now) ? $now : ""?>
										<span class="text-danger"><?=form_error('now')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							Business Information
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>Business Types <span class="text-danger">*</span></label>
										<?=isset($biz_type) ? $biz_type : ""?>
										<span class="text-danger"><?=form_error('biz-type')?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<div class="form-group">
										<label>Upload Documents <span class="text-danger">*</span></label>
										<input type="file" class="form-control-file" id="files" name="files[]" accept=".jpg,.jpeg,.JPG,.JPEG,.PNG,.png,.bmp,.docx,.doc,.pdf" multiple>
										<span class="text-danger">Please upload the ff. files:<br></span>
										<label class="biz-type-desc text-danger">Valid ID's and DTI or Mayor's Permit</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							Identification
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>ID Types <span class="text-danger">*</span></label>
										<?=isset($id_type) ? $id_type : ""?>
										<span class="text-danger"><?=form_error('id-type')?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>ID Number <span class="text-danger">*</span></label>
										<input name="id-no" class="form-control" placeholder="ID Number" value="<?=isset($post['id-no']) ? $post['id-no'] : ""?>">
										<span class="text-danger"><?=form_error('id-no')?></span>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label>Expiration Date <span class="text-danger">*</span></label>
										<input type="date" name="exp-date" class="form-control" placeholder="Expiration Date" value="<?=isset($post['exp-date']) ? $post['exp-date'] : ""?>">
										<span class="text-danger"><?=form_error('exp-date')?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>ID Photo Front <span class="text-danger">*</span></label>
										<input type="file" class="form-control-file" id="id-front" name="id-front" accept=".jpg,.jpeg,.JPG,.JPEG,.PNG,.png,.bmp">
										<span class="text-danger"><?=form_error('id-front')?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label>ID Photo Back <span class="text-danger">*</span></label>
										<input type="file" class="form-control-file" id="id-back" name="id-back" accept=".jpg,.jpeg,.JPG,.JPEG,.PNG,.png,.bmp">
										<span class="text-danger"><?=form_error('id-back')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-xl-4">
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
					</div>
				</div>
			</div><br><br><br>
		</form>
  	</div>
</div>