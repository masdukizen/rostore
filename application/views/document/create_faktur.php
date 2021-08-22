<!-- Begin Page Content -->
<input type="hidden" id="base_path" value="<?php echo base_url('document'); ?>">

<div class="container-fluid mb-4">

    <div class="row">
        <div class="col-lg">

            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Add Faktur Penjualan</h1>
                        <a href="<?= base_url('document') ?>" class="float-rigth" class="d-none d-sm-inline-block"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('document/createfaktur'); ?>" method="post">
                        <div class="col-lg">
                            <div class="form-group row mb-0">
                                <label for="no_faktur" class="col-form-label col-2">No. Faktur</label>
                                <input id="no_faktur" name="no_faktur" class="form-control form-control-sm col-3" value="F001-">
                                <div class="col-4"></div>
                                <label for="date" class="col-form-label col-1">Date</label>
                                <input id="date" name="date" class="form-control form-control-sm col-2" value="<?= date('d M Y H:i:s'); ?>" readonly>
                            </div>
                            <div class="form-group row mb-1">
                                <label for="outlet" class="col-2 col-form-label">Account Name</label>
                                <?php if ($user['role_id'] == 1) : ?>
                                    <select class="form-control form-control-sm col-3" id="outlet_id" name="outlet_id">
                                        <?php foreach ($outlet as $o) : ?>
                                            <option value="<?= $o['id']; ?>"><?= $o['outlet']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php else : ?>
                                    <input id="outlet" name="outlet" class="form-control form-control-sm col-3" value="<?= $outlet_user['outlet']; ?>" readonly>
                                    <input id="outlet_id" name="outlet_id" class="form-control form-control-sm col-3" value="<?= $outlet_user['id']; ?>" hidden>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <!-- <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> Request</button> -->

                        </div>
                        <div class="table-responsive">
                            <table id="autocomplete_table" class="table table-striped text-center" style="width:100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            <button type="button" class="btn btn-sm btn-success" id="addNew"><i class="fas fa-plus"></i> Add</button>
                                        </th>
                                        <th>No.</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="1" class="text-right">SUB TOTAL</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr id="row_1">
                                        <th id="delete_1" scope="row" class="delete_row">
                                            <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </th>
                                        <th>1</th>
                                        <td>
                                            <input type="text" data-field-name="name" class="form-control form-control-sm autocomplete_txt" id="auto_product_1" name="product[]" autocomplete="off" autofocus>
                                            <input type="hidden" data-field-name="productid" class="form-control form-control-sm" id="product_id_1" name="product_id[]" autocomplete="off">
                                            <input type="hidden" data-field-name="price" class="form-control form-control-sm" id="price_1" name="price[]" autocomplete="off">
                                            <?= form_error('product[]', '<small class="text-danger">', '</small>'); ?>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" id="qty" name="qty[]" value="1">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> Request</button>
                        </div>
                    </form>
                </div>

                <input type="hidden" id="total-row" value="1">

            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->