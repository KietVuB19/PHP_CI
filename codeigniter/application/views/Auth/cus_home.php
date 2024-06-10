<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home</title>
    <h1>Home page USER: <?php echo $this->session->userdata('log_in_name'); ?></h1>
</head>

<body>
	<div class="card-footer py-3 border-0">
		<div class="text-center">
		<a href="<?php echo site_url('/Auth/logout/');?>" class="text-dark">Log out</a>
		</div>
	</div>
</body>
</html>