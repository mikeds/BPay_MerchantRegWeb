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
    	<form role="form" action="<?=isset($form_url) ? $form_url : '#'?>" method="POST">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-12">
									<div class="form-group">
										<h5 style="line-height: 1.5em; text-align: center">An OTP has been sent to your registered mobile number.<br/><br/>
                                        Please enter the OTP below to verify your phone number.</h5>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<div class="form-group">
										<label for="exampleFormControlTextarea1"></label>
										<input name="otp-code" class="form-control" placeholder="OTP (One Time Password)" value="<?=isset($post['otp-code']) ? $post['otp-code'] : ""?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div id="dialog" title="Basic dialog"></div>
 
			<div class="row">
				<div class="col-xl-4">
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-warning"><b>SUBMIT</b></button>
					</div>
				</div>
			</div>
		</form>
  	</div>
</div>

