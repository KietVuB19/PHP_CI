<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home</title>
    <h1>Home page ADMIN</h1>
	<link rel="stylesheet" href="<?php echo site_url() . 'Css_fold/table.css'; ?>">
</head>

<body>
	<h1>List Account</h1>
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
					</tr>
				<?php endforeach ;?>
			<?php else: ?>
				<tr>
					<td colspan =5>No user</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo site_url();?>Auth" class="text-dark">Log out</a>
	</div>
</body>
</html>