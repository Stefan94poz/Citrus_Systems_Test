<?php require('./templates/header.php'); ?>
    <body class="admin">
        <div class="row">
            <secttion class="admin-panel col-md-2">
                <div class="admin-panel-wrap">
                    <h2>Welcome <?php echo $_SESSION["user"];?></h2>
                        <ul>
                            <li><a href="page-admin-comments.php"><i class="fas fa-comments"></i>Comments</a></li>
                            <li><a href="page-admin-products.php"><i class="fas fa-shopping-bag"></i></i>Products</a></li>
                        </ul>
                </div>
            </secttion><!-- .admin-panel -->
            <section class='admin-panel-content col-md-10'>
                <div class="admin-panel-wrap-contet">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; foreach (get_data("SELECT * FROM comments ORDER BY id DESC") as $val): ?>
                                <tr class="data-section" id="item-<?php echo $counter +=1;?>">   
                                    <td><?php echo $counter;?></td>
                                    <td><?php echo $val['name'] . PHP_EOL?></td>
                                    <td><?php echo $val['email'] . PHP_EOL?></td>
                                    <td><?php echo $val['comment'] . PHP_EOL?></td>
                                    <td><?php echo $val['status'] . PHP_EOL?></td>
                                    <td>
                                        <button class="edit-button">Edit</button>
                                        <form action="comments.php" method="post">
                                            <input type="hidden" name="comment-id" value="<?php echo $val['id'];?>">
                                            <?php if ($val['status'] == 'pending'): ?>
                                                <button type="submit" class="publish-button" name='publish-comment'class="publish-comment">Publish</button>
                                            <?php endif;?>
                                        </form>
                                        
                                    </td>
                                </tr>
                                <tr class="edit-section" id="item-<?php echo $counter;?>">   
                                    <td><?php echo $counter;?></td>
                                    <form action="comments.php" method="post">
                                        <td><input type="text" name="name" value="<?php echo $val['name'] . PHP_EOL?>"></td>
                                        <td><input type="text" name="email" value="<?php echo $val['email'] . PHP_EOL?>"></td>
                                        <td><input type="text" name="comment" value="<?php echo $val['comment'] . PHP_EOL?>"></td>
                                        <td><?php echo $val['status'] . PHP_EOL?></td>
                                        <td>
                                            <input type="hidden" name="comment-id" value="<?php echo $val['id'];?>">
                                            <button type="submit" class='edit-button' name="edit-comment" type="edit-comment">Edit</button>
                                            <button type="submit" class='delete-button' name="delete-comment" type="delete-comment">Delete</button> 
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section><!-- .admin-panel-content -->
        </div>
        

