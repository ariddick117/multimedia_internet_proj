<?php 
    require_once '../load.php';
    confirm_logged_in();

    $users = getAllUsers();
    if(!$users){
        $message = 'We failed to get the user list.';
    }

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $delete_result = deleteUser($user_id);

        if(!$delete_result){
            $message = 'We failed to delete that user.';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <h2>Delete Users Below</h2>
    <?php echo !empty($message)?$message:'';?>
    <?php if($users):?>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>User Email</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php while($user = $users->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $user['user_id'];?></td>
                <td><?php echo $user['user_name'];?></td>
                <td><?php echo $user['user_email'];?></td>
                <td><a href="admin_deleteuser.php?id=<?php echo $user['user_id'];?>">Delete</a></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
    <?php endif;?>
</body>
</html>