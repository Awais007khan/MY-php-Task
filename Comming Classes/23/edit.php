<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require '../14.php';
$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'social'
);
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (!empty($_POST)) {
    require '../../Class 2/0.php';

    $sql =  "UPDATE posts SET title = ?, body = ?, status = ? WHERE id = $_GET[id]";

    $stmt = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $_POST['title'],
        $_POST['body'],
        $_POST['status']
    );

    mysqli_stmt_execute($stmt);
    header('Location: ../16.php');
    exit;
}

require '../17.php';

$result = mysqli_query(
    $connection,
    "SELECT * FROM posts WHERE user_id = $_SESSION[user_id] AND id = $_GET[id]"
);

$row = mysqli_fetch_assoc($result);

// Define $user_id if needed
$user_id = $_SESSION['user_id'];

mysqli_close($connection);
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
                <h1 class="h2">Update Post</h1>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['body'] ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form action="" method="post">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <div class="form-floating">
            <input name="title" class="form-control" id="floatingInputTitle" placeholder="Post Title" value="<?= $row['title'] ?>">
            <label for="floatingInputTitle">Post Title</label>
        </div>
        <div class="form-floating">
            <input name="status" class="form-control" id="floatingInputStatus" placeholder="Post status" value="<?= $row['status'] ?>">
            <label for="floatingInputStatus">Post status</label>
        </div>
        <div class="input-group">
            <textarea rows="5" name="body" class="form-control" placeholder="Body" aria-label="With textarea"><?= $row['body'] ?></textarea>
        </div>

        <br>
        <button class="btn btn-primary py-2" type="submit">Update Post</button>
    </form>
</main>
<?php
require '../18.php';
?>
