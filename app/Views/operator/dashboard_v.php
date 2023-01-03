<?= $this->extend("layout/app") ?>

<?= $this->section("content") ?>

<div class="card">
  <div class="card-header">
    Hello! <?= session()->get('name') ?>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>You are Logged In as <?= session()->get('role') ?></p>
      <a href="<?= site_url('logout') ?>" class="btn btn-primary">Logout</a>
    </blockquote>
  </div>
</div>

<?= $this->endSection() ?>