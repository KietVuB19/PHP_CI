<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Login page</title>
	<link rel="stylesheet" href="<?php echo site_url() . 'Css_fold/all.css'; ?>">
	<link rel="stylesheet" href="<?php echo site_url() . 'Css_fold/toast/toast.min.css'; ?>">
	<script src= "<?php echo site_url();?> css_fold/toast/jqm.js"></script>
	<script src= "<?php echo site_url();?> css_fold/toast/toast.js"></script>
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="logo.jpg" alt="logo" width="100">
					</div>
					<?php if ($this->session->flashdata('msg')): ?>
						<p style="color: red; font-size:20px; text-align: center"><?= $this->session->flashdata('msg') ?></p>
					<?php endif; ?>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<?php echo form_open('Auth/login_form');?>
                           		<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Username</label>
									<input id="name" type="name" class="form-control" name="name" value="<?php echo set_value('name', $this->session->flashdata('name')); ?>" required autofocus>
									
								</div>

								<div class="mb-3">
								
                                    <label class="mb-2 text-muted" for="password">Passsword</label>
									<input id="password" type="password" class="form-control" name="password" value="<?php echo set_value('password', $this->session->flashdata('password')); ?>" required>
								  
								</div>

								<div class="d-flex align-items-center">
								
									<button type="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							<?php echo form_close();?>
                        </div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account ? <a href="<?php echo site_url('/Auth/register');?>" class="text-dark">Create one</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>