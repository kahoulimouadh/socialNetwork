<?php $title = "Profil d'utilisateur"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Profil de <?= e($user->pseudo) ?></h3>
            </div>
            <div class="panel-body">       
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?= get_avatar_url($user->email) ?>" alt="image de profil de <?= e($user->pseudo) ?>" class="img-circle"/><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong><?= strtoupper(e($user->pseudo)); ?></strong><br>
                        <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a>
                    </div>
                </div>
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
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Ville <span class="text-danger">*</span></label>
                        <input type="text" name="city" id="city" class="form-control" required="required">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Pays <span class="text-danger">*</span></label>
                        <input type="text" name="country" id="country" class="form-control" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="sex">Sexe <span class="text-danger">*</span></label>
                        <select class="form-control" name="sex" id="sex">
                          <option value="H">Homme</option>
                          <option value="F">Femme</option>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="github">Github</label>
                      <input type="text" name="github" id="github" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="available_fot_hire">
                          <input type="checkbox" name="available_fot_hire" id="available_fot_hire"/>
                          Disponible pour emploi?
                        </label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="bio">Biographie<span class="text-danger">*</span></label>
                        <textarea name="bio" id="bio" rows="6" cols="40" class="form-control" placeholder="j'aime la programmation..."></textarea>
                    </div>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary" name="update" value="Valider">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->
</div>

<?php include('partials/_footer.php'); ?>
