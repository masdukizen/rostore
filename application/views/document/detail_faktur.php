<!-- Begin Page Content -->
<div class="container-fluid mb-4">

    <div class="row">
        <div class="col-lg">

            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Detail Faktur Penjualan</h1>
                        <a href="<?= base_url('document') ?>" class="float-rigth" class="d-none d-sm-inline-block"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        <div class="col-lg">
                            <div class="form-group row mb-0">
                                <label for="nofaktur" class="col-form-label col-2">No. Faktur</label>
                                <input id="nofaktur" name="nofaktur" class="form-control form-control-sm col-3" value="<?= $faktur['no_faktur']; ?>" readonly>
                                <div class="col-4"></div>
                                <label for="date" class="col-form-label col-1">Date</label>
                                <input id="date" name="date" class="form-control form-control-sm col-2" value="<?= date("d M Y H:i:s ", strtotime($faktur['date_created'])); ?>" readonly>
                            </div>
                            <div class="form-group row mb-1">
                                <label for="outlet" class="col-2 col-form-label">Account Name</label>
                                <input id="outlet" name="outlet" class="form-control form-control-sm col-3" value="<?= $faktur['outlet']; ?>" readonly>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped text-center" style="width:100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Sent</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($detail_faktur as $df) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $df['product']; ?></td>
                                            <td><?= $df['price']; ?></td>
                                            <td><?= $df['qty']; ?></td>
                                            <td><?= $df['total_price']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="1" class="text-right"></th>
                                        <th>SUB TOTAL</th>
                                        <th></th>
                                        <?php foreach ($sum_item as $key) : ?>
                                            <th><?= $key['qty']; ?></th>
                                            <th><?= $key['total_price']; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="form-group">
                            <?php if ($df['status_id'] == 1) : ?>
                                <a href="<?= base_url('document/changestatus1/') . $df['no_faktur']; ?>" type="button" class="btn btn-warning float-right mr-2" id="btn-add-item"><i class="fas fa-exclamation-circle"></i> Requested</a>
                            <?php elseif ($df['status_id'] == 2) : ?>
                                <a href="<?= base_url('document/changestatus2/') . $df['no_faktur']; ?>" type="button" class="btn btn-success float-right mr-2 muted" id="btn-add-item"><i class="fas fa-paper-plane"></i> Approved</a>
                            <?php else : ?>
                                <a href="" type="button" class="btn btn-primary float-right mr-2 disabled" id="btn-add-item"><i class="fas fa-check"></i> Delivered</a>
                            <?php endif; ?>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->