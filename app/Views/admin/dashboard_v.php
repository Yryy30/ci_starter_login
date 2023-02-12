<?= $this->extend("layout/app") ?>

<?= $this->section("content") ?>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?= base_url('/admin') ?>" class="nav-link px-2 link-dark">Home</a></li>
          <li><a href="<?= base_url('/admin/listUser') ?>" class="nav-link px-2 link-dark">Users</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <?php $gbr = session()->get('profile_image') ?>
            <img src="<?= base_url('images/_profile/'.$gbr) ?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= site_url('logout') ?>">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="card">
      <div class="card-header">
        Hello! <?= session()->get('name') ?>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>You are Logged In as <?= session()->get('role') ?></p>
        </blockquote>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>