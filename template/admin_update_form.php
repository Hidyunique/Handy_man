	<!-- Job Form -->
							<form action="admin.php" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

								
								<fieldset>
									<label>Edit Profile <span class="required"></span></label>
									<small class="description">Modify your account </small>
								</fieldset> 
								
								<!-- Job Information Fields -->
								<fieldset class="fieldset-job_title">
									<label for="job_title">Firstname</label>
									<div class="field">
										<input type="text" class="form-control" name="firstname" id="job_title" placeholder="e.g. firstname" />
									</div>
								</fieldset>

								<fieldset class="fieldset-job_location">
									<label for="job_location">Surname </label>
									<div class="field">
										<input type="text" class="form-control" name="surname" id="job_location" placeholder="e.g. surname" />
										
									</div>
								</fieldset>

								<!-- <fieldset class="fieldset-job_location">
									<label for="job_location">Company Address </label>
									<div class="field">
										<input type="text" class="form-control" name="address" id="job_location" placeholder="e.g. company address" />
										
									</div>
								</fieldset> -->

								<fieldset class="fieldset-company_logo">
									<label for="company_logo">Photo </label>
									<div class="field">
										<input type="file" class="form-control" name="company_logo" onchange="preview_img(event)" />
										<small class="description">Max. file size: 50 MB. Allowed images: jpg, gif, png.</small>
										<div>
											<img id="company_logo" width="100px" height="100px" />
										</div>
									</div>
								</fieldset>



								<div class="spacer"></div>

								<p>
									<input type="submit" name="update" class="btn btn-primary" value="Update Account  &rarr;" />
								</p>

							</form>
							<!-- Job Form / End -->