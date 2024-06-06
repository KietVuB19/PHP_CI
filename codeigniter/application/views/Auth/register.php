<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
    <link rel="stylesheet" href="<?php echo site_url() . 'Css_fold/all.css'; ?>">
	<link rel="stylesheet" href="<?php echo site_url() . 'Css_fold/toast/toast.min.css'; ?>">
	
 </head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="logo.jpg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

							<?php echo form_open('Auth/registration_form');?>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="name">Full Name</label>
									<input id="name" name="name" type="text" class="form-control" value="" required autofocus>
									
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" name="email" type="email" class="form-control" value="" required autofocus>
									
								</div>

								<div class="mb-3">
								
                                    <label class="mb-2 text-muted" for="password">Passsword</label>
									<input id="password" name="password" type="password" class="form-control" required>
								  
								</div>

                                <div class="mb-3">
								
                                    <label class="mb-2 text-muted" for="password">Confirm Passsword</label>
									<input id="password" name="conPass" type="password" class="form-control"  required>
								  
								</div>

								<div class="d-flex align-items-center">
									<button type="submit" class="btn btn-primary ">
										Register
									</button>
								</div>
                                <?php echo form_close();?>

						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Have an account ? <a href="<?php echo site_url();?>Auth" class="text-dark"> Login</a>
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