<!-- Begin Page Content -->
<div class="container-fluid mb-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('management/add_outlet'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Outlet</a>
    </div>

    <div class="row">
        <div class="col-lg">

            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Outlet has been <strong><?= $this->session->flashdata('message'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" id="dataTable" style="width:100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Outlet</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($allOutlet as $o) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $o['outlet']; ?></td>
                                    <td><?= $o['address']; ?></td>
                                    <td>
                                        <a href="<?= base_url('management/edit_outlet/' . $o['id']); ?>" class="badge badge-success">edit</a>
                                        <a href="#" class="badge badge-danger" onclick="deleteConfirm('<?= base_url('management/delete_outlet/' . $o['id']); ?>')">delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Delete Confirm Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure want to delete this item?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="btn-delete" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>