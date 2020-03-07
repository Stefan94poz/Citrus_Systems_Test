<?php require('./templates/header.php'); ?>
    <body class="admin">
        <div class="row">
            <secttion class="admin-panel col-md-2">
                <div class="admin-panel-wrap">
                    <h2>Welcome <?php echo $_SESSION["user"];?></h2>
                        <ul>
                            <li><a href="page-admin-comments.php"><i class="fas fa-comments"></i>Comments</a></li>
                            <li><a href="page-admin-products.php"><i class="fas fa-shopping-bag"></i>Products</a></li>
                        </ul>
                </div>
            </secttion><!-- .admin-panel -->
            <section class='admin-panel-content col-md-10'>
                <div class="admin-panel-wrap-contet">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="add-product">   
                                <td>Add Product</td>
                                <form action="product.php" method="post" enctype="multipart/form-data">
                                    <td><input type="text" name="title" ></td>
                                    <td><input type="text" name="short_desc" ></td>
                                    <td><input type="file" name="image" id="image"></td>
                                    <td>
                                        <button type="submit" class="edit-button" name="add-product">Add</button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                    <?php  if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?>
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; foreach (get_data("SELECT * FROM products ORDER BY id DESC") as $val): ?>
                                <tr class="data-section" id="item-<?php echo $counter +=1;?>">   
                                    <td><?php echo $counter;?></td>
                                    <td><?php echo $val['title'] . PHP_EOL?></td>
                                    <td><?php echo $val['short_desc'] . PHP_EOL?></td>
                                    <td><img class="admin-product-thumbnail"src='<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/public/img/' . $val['image'] . PHP_EOL;?>' alt="" ></td>
                                    <td>
                                        <button class="edit-button">Edit</button>
                                    </td>
                                </tr>
                                <tr class="edit-section" id="item-<?php echo $counter;?>">   
                                    <td><?php echo $counter;?></td>
                                    <form action="product.php" method="post" enctype="multipart/form-data">
                                        <td><input type="text" name="title" value="<?php echo $val['title'] . PHP_EOL?>"></td>
                                        <td><input type="text" name="short_desc" value="<?php echo $val['short_desc'] . PHP_EOL?>"></td>
                                        <td><input type="file" name="image" id="image"></td>
                                        <td>
                                            <input type="hidden" name="product-id" value="<?php echo $val['id'];?>">
                                            <button type="submit" class="edit-button" name="edit-product">Edit</button>
                                            <button type="submit" class="delete-button" name="delete-product">Delete</button>
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section><!-- .admin-panel-content -->
        </div>
