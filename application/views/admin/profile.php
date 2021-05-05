        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Selamat Datang <?= $welcome ?></h1>

          <div class="card col-md-5 mb-5">
            <div class="row no-gutters">

              <!-- <div class="col-md-3">
                  <img src="<?= base_url("assets/img/") . $user["image"] ?>" class="card-img pt-3 pb-3">
                </div>  -->

              <div class="col-md-8">
                <div class="card-body">

                  <h3 class="card-title"><?= $user["nama"] ?></h3>

                  <div>
                    <p class="card-text">
                      <i class="fas fa-fw fa-envelope"></i>
                      <?= $user["email"] ?>
                    </p>
                  </div>

                  <div>
                    <p class="card-text">
                      <i class="fas fa-fw fa-map-marker-alt"></i>
                      <?= $user["alamat"] ?>
                    </p>
                  </div>

                  <div>
                    <p class="card-text">
                      <i class="fas fa-fw fa-phone"></i>
                      <?= $user["nohp"] ?>
                    </p>
                  </div>

                  <div>
                    <p class="card-text">
                      <i class="fas fa-fw fa-registered"></i>
                      Member Since <?= $user["date_created"] ?>
                    </p>
                  </div>

                  <a class="btn btn-warning mt-3" href="<?= base_url('admin/edit') ?>">
                    <i class="fas fa-fw fa-user-edit fa-sm mr-2"></i>
                    <span>Edit Profile</span>
                  </a>

                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid