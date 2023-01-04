<?= $this->extend("layout/app") ?>

<?= $this->section("content") ?>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?= base_url('/admin') ?>" class="nav-link px-2 link-dark">Home</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Users</a></li>
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
    <a href="<?= base_url('/admin/form-users') ?>" class="btn btn-primary">Add</a>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($users as $data): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['role'] ?></td>
                    <td>
                        <a href="<?= base_url('/admin/delete-users/'.$data['id']) ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
  </div>

<?= $this->endSection() ?>