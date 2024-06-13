<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home</title>
    <h1>Home page ADMIN: <?php echo $this->session->userdata('log_in_name'); ?></h1>
	<h1>Time : <?php echo time(); ?></h1>
	
	<link rel="stylesheet" href="<?php echo site_url() . 'Css_fold/table.css'; ?>">
</head>

<body>
	<h1>List Account</h1>
	<?php echo form_open('Auth/admin_home');?>
		<div class ="search_box">
			<input type="text" name = "search" placeholder="Search name" value="<?php echo isset($search)?$search:'';?>">
			<button type="submit">Search</button>
		</div>
	<?php echo form_close();?>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name </th>
				<th>Email</th>
				<th>Password</th>
				<th>Roles</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($users)): ?>
				<?php foreach ($users as $user):?>
					<tr>
						<td><?php echo $user['id']; ?></td>
						<td><?php echo $user['name']; ?></td>
						<td><?php echo $user['email']; ?></td>
						<td><?php echo $user['password']; ?></td>
						<td><?php echo $user['roles']; ?></td>
						<?php if ($user['status'] == "1"): ?>
							<td>Active</td>
						<?php else: ?>
							<td>Disable</td>
						<?php endif ?>
						<td><a href= "<?php echo site_url('/Auth/change_status/'.$user['id']); ?>">Change status</a></td>
					</tr>
				<?php endforeach ;?>
			<?php else: ?>
				<tr>
					<td colspan =7>No user</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo site_url('/Auth/logout/');?>" class="text-dark">Log out</a>
	</div>
</body>
</html>