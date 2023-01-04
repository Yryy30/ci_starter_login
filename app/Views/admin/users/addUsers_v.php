<?= $this->extend("layout/app") ?>

<?= $this->section("content") ?>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?= base_url('/admin') ?>" class="nav-link px-2 link-dark">Home</a></li>
          <li><a href="<?= base_url('/admin/list-users') ?>" class="nav-link px-2 link-dark">Users</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php base_url() ?><?= session()->get('profile_image') ?>" alt="mdo" width="32" height="32" class="rounded-circle">
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
    <form action="<?= base_url('/admin/add-users') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 col-sm-7">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3 col-sm-7">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3 col-sm-7">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3 col-sm-7">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="mb-3 col-sm-7">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role">
                <option value="admin">Admin</option>
                <option value="operator">Operator</option>
            </select>
        </div>
        <div class="mb-3 col-sm-7">
            <label for="formFile" class="form-label">Profile Image</label>
            <input class="form-control" type="file" name="profile_image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br><br>
  </div>

<?= $this->endSection() ?>