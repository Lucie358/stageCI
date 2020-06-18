<?= $this->extend('layout') ?>
<?= $this->section('content_admin') ?>

<a class="btn btn-dark" href="/">Ajouter une offre de stage<img class="admin_icon ml-2" src="<?php echo base_url(); ?>/img/icons/plus.png" alt="edit"> </a>
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
                        <td> <a href="/"> <img class="admin_icon mr-1" src="<?php echo base_url(); ?>/img/icons/pencil.png" alt="edit"> </a>
                            <a href="/"><img class="admin_icon ml-1" src="<?php echo base_url(); ?>/img/icons/close.png" alt="edit"></a> </td>

                    </tr>
        <?php endif;
            endforeach;
        endforeach;
        ?>
    </tbody>
</table>

<?= $this->endSection() ?>