
<?php $title = "Profil d'utilisateur"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Profil de <?= e($_SESSION['pseudo']) ?></h3>
            </div>
            <div class="panel-body">
              image <br />
              pseudo <br />
              adresse <br />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Cpmléter mon profil</h3>
            </div>
            <div class="panel-body">
              <?php include('partials/_errors.php'); ?>
              <form autocomplete="off" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nom <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="john" required="required">
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>



    </div><!-- /.container -->
</div>

<?php include('partials/_footer.php'); ?>
