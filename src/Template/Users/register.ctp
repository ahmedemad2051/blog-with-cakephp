<div class="col-md-6 col-md-offset-3 main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Blog</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					
						<?= $this->Form->create(false,['class'=>'form-horizontal','type'=>'file']) ?>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

				

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Click for Upload image</label>
							<div class="cols-sm-10">
								<div class="input-group">
									
									<input type="file"  name="file" id="username" />
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
						</div>
					
					<?= $this->Form->end(); ?>
				</div>
			</div>