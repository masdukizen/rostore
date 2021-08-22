<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-7">

            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h5 mb-0 text-gray-800">Add New Account</h1>
                        <a href="<?= base_url('management') ?>" class="float-rigth" class="d-none d-sm-inline-block"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-user" id="username" name="username" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="outlet">Outlet</label>
                            <select type="text" class="form-control form-control-user" id="outlet" name="outlet">
                                <?php foreach ($outlet as $o) : ?>
                                    <option value="<?= $o['id']; ?>"><?= $o['outlet']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password1">Password</label>
                                <input type="password" class="form-control form-control-user" id="password1" name="password1">
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <label for="password1">Repeat Password</label>
                                <input type="password" class="form-control form-control-user" id="password2" name="password2">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fas fa-save"></i> Add Account
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->