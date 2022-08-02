<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Brand</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('brand'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Brand
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>ID Brand :</b><br><?= $data_brand['id_brand']; ?></a></h5>
                    <p class="card-text"><b>Brand :</b><br><?= $data_brand['nama_brand']; ?></p>
                    <p class="card-text"><b>Jenis :</b><br><?= $data_brand['jenis']; ?></p>
                    <p class="card-text"><b>Asal :</b><br><?= $data_brand['asal']; ?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>brand" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>