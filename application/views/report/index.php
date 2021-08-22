<!-- Begin Page Content -->
<div class="container-fluid mb-4">

    <div class="row">
        <div class="col-lg-7">

            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Sales Report</h1>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('report/generate'); ?>" method="post">
                        <div class="col-lg">
                            <div class="form-group row mb-0">
                                <label for="datepickerfrom" class="col-form-label col-4">From</label>
                                <input id="datepickerfrom" name="date_from" class="form-control form-control-sm col-8" value="<?= date('yy-m-d'); ?>">
                            </div>
                            <div class="form-group row mb-1">
                                <label for="datepickerto" class="col-form-label col-4">To</label>
                                <input id="datepickerto" name="date_to" class="form-control form-control-sm col-8" value="<?= date('yy-m-d'); ?>">
                            </div>
                            <div class="form-group row mb-1">
                                <label for="document" class="col-form-label col-4">Document</label>
                                <select id="document" name="document" class="form-control form-control-sm col-8">
                                    <option value="1">All</option>
                                    <option value="2">Faktur Penjualan</option>
                                    <option value="3">Delivery Order</option>
                                </select>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="outlet" class="col-4 col-form-label">Outlet</label>
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                    <select class="form-control form-control-sm col-8" id="outlet_id" name="outlet_id">
                                        <option value="">All</option>
                                        <?php foreach ($outlet as $o) : ?>
                                            <option value="<?= $o['id']; ?>"><?= $o['outlet']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php else : ?>
                                    <input class="form-control form-control-sm col-8" id="outlet" name="outlet" value="<?= $outlet_user['outlet']; ?>" readonly>
                                    <input class="form-control form-control-sm col-8" id="outlet_id" name="outlet_id" value="<?= $outlet_user['id']; ?>" hidden readonly>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right"><i class="fas fa-redo-alt"></i> Generate</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->