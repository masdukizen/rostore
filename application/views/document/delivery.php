<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('document/createdelivery'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create New</a>
    </div>

    <div class="row">
        <div class="col-lg">

            <div class="card p-4 mb-4">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" id="dataTable" style="width:100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal DO</th>
                                <th>No. DO</th>
                                <th>Outlet</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->session->userdata('outlet_id') == 1) : ?>
                                <?php foreach ($delivery as $d) : ?>
                                    <tr>
                                        <td><?= $d['date_created']; ?></td>
                                        <td><?= $d['no_do']; ?></td>
                                        <td><?= $d['outlet']; ?></td>
                                        <td>
                                            <?php if ($d['status_id'] == 1) : ?>
                                                <a href="" class="badge badge-warning">requested</a>
                                            <?php elseif ($d['status_id'] == 2) : ?>
                                                <a href="" class="badge badge-success">approved</a>
                                            <?php else : ?>
                                                <a href="" class="badge badge-primary">delivered</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('document/detaildelivery/') . $d['no_do']; ?>" class="btn btn-sm text-info"><i class="fas fa-info-circle"></i> Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>

                                <?php foreach ($delivery_user as $du) : ?>
                                    <tr>
                                        <td><?= $du['date_created']; ?></td>
                                        <td><?= $du['no_do']; ?></td>
                                        <td><?= $du['outlet']; ?></td>
                                        <td>
                                            <?php if ($du['status_id'] == 1) : ?>
                                                <a href="" class="badge badge-warning">requested</a>
                                            <?php elseif ($du['status_id'] == 2) : ?>
                                                <a href="" class="badge badge-success">approved</a>
                                            <?php else : ?>
                                                <a href="" class="badge badge-primary">delivered</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('document/detaildelivery/') . $du['no_do']; ?>" class="btn btn-sm text-info"><i class="fas fa-info-circle"></i> Detail</a>
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