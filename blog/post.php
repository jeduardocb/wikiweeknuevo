<?php
include('header.html');
include('nav.html');
include('util.php');

$idBlog = $_GET['id'];

function getTitulo($idBlog)
{
  $con = conectar_bd();

  $sql = "SELECT titulo FROM blog WHERE id=$idBlog";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['titulo'];
  }

  desconectar_bd($con);
}

function getDescripcion($idBlog)
{
  $con = conectar_bd();

  $sql = "SELECT descripcion FROM blog WHERE id=$idBlog";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['descripcion'];
  }

  desconectar_bd($con);
}

function getDescripcion2($idBlog)
{
  $con = conectar_bd();

  $sql = "SELECT descripcion2 FROM blog WHERE id=$idBlog";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['descripcion2'];
  }

  desconectar_bd($con);
}

function getImagen($idBlog)
{
  $con = conectar_bd();

  $sql = "SELECT fotos_blog.nombre FROM fotos_blog
    WHERE fotos_blog.id_blog = $idBlog
    LIMIT 1";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['nombre'];
  }

  desconectar_bd($con);
}

function getImagen2($idBlog)
{
  $con = conectar_bd();

  $sql = "SELECT * FROM fotos_blog
  WHERE fotos_blog.id_blog = $idBlog
  ORDER BY id LIMIT 1 OFFSET 1";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['nombre'];
  }

  desconectar_bd($con);
}

function getSubtitulo($idBlog)
{
  $con = conectar_bd();

  $sql = "SELECT subtitulo FROM blog WHERE id=$idBlog";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['subtitulo'];
  }

  desconectar_bd($con);
}
?>
<div class="container">
  <div class="row">
    <!-- Latest Posts -->
    <main class="post blog-post col-lg-12">
      <div class="container">
        <div class="post-single">
          <div class="post-thumbnail"><img src="../images/blog/<?php getImagen($idBlog);  ?>" alt="<?php getImagen($idBlog);  ?>" class="img-fluid"></div>
          <div class="post-details">
            <div class="post-meta d-flex justify-content-between">
              <div class="category"><a href="#">Business</a><a href="#">Financial</a></div>
            </div>
            <h1><?php getTitulo($idBlog); ?><a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
            <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><span>John Doe</span></div>
              </a>
              <div class="d-flex align-items-center flex-wrap">
                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                <div class="views"><i class="icon-eye"></i> 500</div>
                <div class="comments meta-last"><i class="icon-comment"></i>12</div>
              </div>
            </div>
            <div class="post-body">
              <p class="lead"><?php getDescripcion($idBlog);  ?></p>
              <p> <img src="../images/<?php getImagen2($idBlog);  ?>" alt="../images/<?php getImagen2($idBlog);  ?>" class="img-fluid"></p>
              <h3><?php getSubtitulo($idBlog); ?></h3>
              <p><?php getDescripcion2($idBlog);  ?></p>
            </div>
            <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                <div class="text"><strong class="text-primary">Previous Post </strong>
                  <h6>I Bought a Wedding Dress.</h6>
                </div>
              </a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                <div class="text"><strong class="text-primary">Next Post </strong>
                  <h6>I Bought a Wedding Dress.</h6>
                </div>
                <div class="icon next"><i class="fa fa-angle-right"> </i></div>
              </a></div>
            <div class="post-comments">
              <header>
                <h3 class="h6">Post Comments<span class="no-of-comments">(3)</span></h3>
              </header>
              <div class="comment">
                <div class="comment-header d-flex justify-content-between">
                  <div class="user d-flex align-items-center">
                    <div class="image"><img src="img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title"><strong>Jabi Hernandiz</strong><span class="date">May 2016</span></div>
                  </div>
                </div>
                <div class="comment-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
              </div>
              <div class="comment">
                <div class="comment-header d-flex justify-content-between">
                  <div class="user d-flex align-items-center">
                    <div class="image"><img src="img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title"><strong>Nikolas</strong><span class="date">May 2016</span></div>
                  </div>
                </div>
                <div class="comment-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
              </div>
              <div class="comment">
                <div class="comment-header d-flex justify-content-between">
                  <div class="user d-flex align-items-center">
                    <div class="image"><img src="img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title"><strong>John Doe</strong><span class="date">May 2016</span></div>
                  </div>
                </div>
                <div class="comment-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
              </div>
            </div>
            <div class="add-comment">
              <header>
                <h3 class="h6">Leave a reply</h3>
              </header>
              <form action="#" class="commenting-form">
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="text" name="username" id="username" placeholder="Name" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="email" name="username" id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                  </div>
                  <div class="form-group col-md-12">
                    <textarea name="usercomment" id="usercomment" placeholder="Type your comment" class="form-control"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-secondary">Submit Comment</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php
include('footer.html');
?>