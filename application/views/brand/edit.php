<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Brand</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('brand'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>
                    <div class="form-group row">
                        <label for="id_brand" class="col-sm-2 col-form-label">ID Brand</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_brand" name="id_brand" value=" <?= $data_brand['id_brand']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('id_brand') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_brand" class="col-sm-2 col-formlabel">Brand</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_brand" name="nama_brand" value=" <?= $data_brand['nama_brand']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_brand') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-2 col-formlabel">Jenis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jenis" name="jenis" value=" <?= $data_brand['jenis']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('jenis') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="asal" class="col-sm-2 col-formlabel">Asal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="asal" name="asal" value=" <?= $data_brand['asal']; ?>">
                            <small class="text-danger">
                                <?php echo form_error('asal') ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>