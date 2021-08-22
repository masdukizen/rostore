<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-7">

            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h5 mb-0 text-gray-800">Edit Product</h1>
                        <a href="<?= base_url('management/product') ?>" class="float-rigth" class="d-none d-sm-inline-block"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="product">Product</label>
                            <input type="text" class="form-control form-control-user" id="product" name="product" value="<?= $product_data['product']; ?>">
                            <?= form_error('product', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control form-control-user" id="price" name="price" value="<?= $product_data['price']; ?>">
                            <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="type">Document Type</label>
                            <select type="text" class="form-control form-control-user" id="type" name="type" style="text-transform: capitalize;">
                                <?php foreach ($type as $t) : ?>
                                    <?php if ($t['id'] == $product_data['type_id']) : ?>
                                        <option value="<?= $t['id']; ?>" selected><?= $t['type']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $t['id']; ?>"><?= $t['type']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->