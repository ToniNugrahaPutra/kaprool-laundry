<div class="container-fluid">

  <h1 class="h3 mb-4 text-gray-800">Daftar User</h1>

  <div>
    <div>
      <strong>Catatan Role</strong>
      <ul>
        <li>Kode Role 1 : Admin</li>
        <li>Kode Role 2 : Member</li>
        <li>Kode Role 3 : Kurir</li>
      </ul>
    </div>
  </div>

  <?php if ($this->session->flashdata()) : ?>
    <div class="row mt-2">
      <div class="col-4">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong><?= $this->session->flashdata('message'); ?></strong>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <table class="table table-bordered table-hover" style="overflow-x: auto;">

    <tr class="thead-dark">
      <th>Nama</th>
      <th>Email</th>
      <th>Alamat</th>
      <th>No Hp</th>
      <th>Role</th>
      <th>Date Created</th>
      <th>Action</th>
    </tr>

    <?php foreach ($users_list as $u) : ?>
      <tr class="">
        <td><?php echo $u["nama"] ?></td>
        <td><?php echo $u["email"] ?></td>
        <td><?php echo $u["alamat"] ?></td>
        <td><?php echo $u["nohp"] ?></td>
        <td><?php echo $u["role_id"] ?></td>
        <td><?php echo $u["date_created"] ?></td>
        <td>
          <a href="<?= base_url() ?>admin/edit_user/<?= $u["id"] ?>" class="btn btn-outline-warning">Edit</a>
          <a href="<?= base_url() ?>admin/hapus_user/<?= $u["id"] ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin?');">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>
</div>