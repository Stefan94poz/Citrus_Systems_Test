<?php require('./templates/header.php'); ?>
<body class="home">
  <div class="container">
    <section class="products">
      <h1 class="text-center">Featured Products
      </h1>
      <div class="row">
        <?php 
        foreach (get_data("SELECT * FROM products ORDER BY id DESC LIMIT 9") as $val): ?>
            <div class="product col-md-4 ">
              <img src='<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/public/img/' . $val['image'] ;;?>' alt="">
                <div class="product-wrap">
                <h3 class="card-title">
                    <?php echo $val['title']; ?>
                </h3>
                <p class="card-desc">
                    <?php echo $val['short_desc']; ?>
                </p>   
              </div>
            </div><!-- .product <?php echo $val['id']; ?> --> 
        <?php endforeach; ?>
      </div> 
    </section><!-- .products --> 
    <secttion class="comments">
      <h1 class="text-center">Client Reviews</h1>
      <div class="row">
        <div class="col-md-6">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php  $first_slider = true; foreach(get_data("SELECT * FROM comments WHERE status = 'public' ORDER BY id DESC") as $val): ?>
                <div class="carousel-item <?php if($first_slider == true){ echo 'active'; $first_slider = false;}  ?>">
                  <h3 class="comment-content">
                    <i class="fas fa-quote-left">
                    </i>
                    <?php echo $val['comment'];?>
                    <i class="fas fa-quote-right">
                    </i>
                  </h3>
                  <p class="author-name">- 
                    <?php echo $val['name'];?>
                  </p>
                </div>
              <?php endforeach; ?>   
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">
                </span>
                <span class="sr-only">Previous
                </span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true">
                </span>
                <span class="sr-only">Next
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="add-comment" id="comment-section">
            <h2 class='text-center'>Add your review here
            </h2>
            <?php  if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?>
            <form action="comments.php" method="post">
              <input type="text" name="name" id="comment-name" placeholder="Name" >
              <input type="text" name="email" id="comment-email" placeholder="Email">
              <textarea name="comment" id="" cols="30" rows="10" placeholder="Add your comment here"></textarea>
              <button type="submit" name='add-comment'class="submit">Submit
              </button>
            </form>
          </div><!-- .add-comment --> 
        </div>
      </div>     
    </secttion><!-- .comments --> 
  </div>                
  <?php require('./templates/footer.php'); ?>
