<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('document/createfaktur'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create New</a>
    </div>

    <div class="row">
        <div class="col-lg">

            <div class="card p-4 mb-4">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" id="dataTable" style="width:100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Faktur</th>
                                <th>No. Faktur</th>
                                <th>Outlet</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->session->userdata('outlet_id') == 1) : ?>
                                <?php foreach ($faktur as $f) : ?>
                                    <tr>
                                        <td><?= $f['date_created']; ?></td>
                                        <td><?= $f['no_faktur']; ?></td>
                                        <td><?= $f['outlet']; ?></td>
                                        <td>
                                            <?php if ($f['status_id'] == 1) : ?>
                                                <a href="" class="badge badge-warning">requested</a>
                                            <?php elseif ($f['status_id'] == 2) : ?>
                                                <a href="" class="badge badge-success">approved</a>
                                            <?php else : ?>
                                                <a href="" class="badge badge-primary">delivered</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('document/detailfaktur/') . $f['no_faktur']; ?>" class="btn btn-sm text-info"><i class="fas fa-info-circle"></i> Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>

                                <?php foreach ($faktur_user as $fu) : ?>
                                    <tr>
                                        <td><?= $fu['date_created']; ?></td>
                                        <td><?= $fu['no_faktur']; ?></td>
                                        <td><?= $fu['outlet']; ?></td>
                                        <td>
                                            <?php if ($fu['status_id'] == 1) : ?>
                                                <a href="" class="badge badge-warning">requested</a>
                                            <?php elseif ($fu['status_id'] == 2) : ?>
                                                <a href="" class="badge badge-success">approved</a>
                                            <?php else : ?>
                                                <a href="" class="badge badge-primary">delivered</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('document/detailfaktur/') . $fu['no_faktur']; ?>" class="btn btn-sm text-info"><i class="fas fa-info-circle"></i> Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



</div>
<!-- /.container-fluid -->