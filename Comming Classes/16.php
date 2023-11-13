<?php
require '14.php';
require '../Class 2/0.php';
require '17.php';

$result = mysqli_query(
	$connection,
	'SELECT * FROM posts WHERE user_id = '.$_SESSION['user_id']
);
// print_r($result);
// echo "<h1>{$_SESSION['user_id']}</h1>";
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1  style="text-decoration: none;"> Post</h1>
        <a  class="btn btn-primary"   href="23/1.php" role="button">Add Post</a>
        <!-- <h1 class="h2"><a href="23/1.php" style="text-decoration: none;">Add post</a></h1> -->
        
    </div>
    <!-- <h2>Section title</h2> -->
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col">Action</th> -->


                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    // print_r($row);
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['body'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <!-- <td><a href="23/update.php"</a>edit</a></td> -->
                        <td>
                            <a  class='btn btn-primary btn-sm' href="23/edit.php?id=<?= $row['id'] ?>">edit</a>
                            <a  class='btn btn-primary btn-sm' href="23/delete.php?id=<?= $row['id'] ?>">Delete</a>
                        </td>

                        
                    </tr>
                    <?php
                } // while

                mysqli_close($connection); // optional
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
require '18.php';
?>