<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Adresse</th>
      <th scope="col">Ville</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($companies as $entreprise) :
        foreach ($cities as $row) :
            if ($row->name == $entreprise['city']) :
    ?>
    <tr>
      <th scope="row"><?php echo $entreprise['id']; ?></th>
      <td><?php echo $entreprise['name']; ?></td>
      <td><?php echo $entreprise['address']; ?></td>
      <td><?php echo $entreprise['city']; ?></td>
      <td><?php echo $entreprise['city']; ?></td>

    </tr>
    <?php endif;
        endforeach;
    endforeach;
    ?>

  </tbody>
</table>

<?= $this->endSection() ?>