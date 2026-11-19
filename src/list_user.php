<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__ . '/../config/database.php';

  // Así lo pide el profe

$sql = 'SELECT id, firstname, lastname, email, mobile_phone, photo_url 
        FROM users 
        WHERE firstname IS NOT NULL 
          AND firstname != \'\' 
        ORDER BY id';

$result = pg_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Usuarios</title>
</head>
<body>
<h1>Lista de usuarios</h1>

<table border="1" cellpadding="8">
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Mobile phone</th>
<th>Email</th>
<th>Status</th>
<th>Photo</th>
<th>Actions</th>

</tr>

<?php while ($row = pg_fetch_assoc($result)) { ?>
<tr>

<td><?php echo $row['firstname']; ?></td>
<td><?php echo $row['lastname']; ?></td>
<td><?php echo $row['mobile_phone']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><span style="color:green; font-weight:bold;">Active</span></td>
<td>
<?php if (!empty($row['photo_url'])) { ?>
<img src="<?php echo $row['photo_url']; ?>" width="30" height="30" style="object-fit:cover; border-radius:50%;">
<?php } else { ?>
<img src="photos/user_default.png" width="30" height="30" style="object-fit:cover; border-radius:50%;">
<?php } ?>
</td>
<td>
<a href="edit_user.php?id=<?php echo $row['id']; ?>">
   <img src="photos/icon_edit.png" alt="Editar" width="22" height="22" style="vertical-align:middle; cursor:pointer;">
</a>
&nbsp;&nbsp;
<a href="delete_user.php?id=<?php echo $row['id']; ?>" 
   onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?\n\n¡Esta acción no se puede deshacer!')">
   <img src="photos/icon_delete.png" alt="Eliminar" width="22" height="22" style="vertical-align:middle; cursor:pointer;">
</a>

</td>

</td>
</tr>
<?php } ?>
</table>
</body>
</html>