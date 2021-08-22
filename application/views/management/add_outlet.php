<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-7">

            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h5 mb-0 text-gray-800">Add New Outlet</h1>
                        <a href="<?= base_url('management/outlet') ?>" class="float-rigth" class="d-none d-sm-inline-block"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="outlet">Outlet</label>
                            <input type="text" class="form-control form-control-user" id="outlet" name="outlet" value="<?= set_value('outlet'); ?>" autofocus>
                            <?= form_error('outlet', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control form-control-user" id="address" name="address"><?= set_value('address'); ?></textarea>
                            <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fas fa-save"></i> Add Outlet
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->