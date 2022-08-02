<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Product - Dashboard HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- https://getbootstrap.com/ -->
    <link href="<?=base_url('assets/css/templatemo-style.css');?>" rel="stylesheet">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
            <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
              <div class="col-xl-6 col-lg-6 col-md-12">
              
                <form action="<?= base_url('produk/add'); ?>" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Nama Produk
                    </label>
                    <input
                      id="nama_produk"
                      name="nama_produk"
                      type="text"
                      class="form-control validate"
                      value="<?= set_value('nama_produk'); ?>"
                      required
                    />
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Link Foto Produk
                    </label>
                    <input
                      id="foto_produk"
                      name="foto_produk"
                      type="text"
                      class="form-control validate"
                      value="<?= set_value('foto_produk'); ?>"
                      required
                    />
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Deskripsi Produk</label>
                    <textarea
                      class="form-control validate"
                      id="deskripsi_produk"
                      name="deskripsi_produk"
                      rows="3"
                      value=" <?= set_value('deskripsi_produk'); ?>"
                      required
                    ></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Kategori Produk</label>
                    <select
                      class="custom-select tm-select-accounts"
                      id="id_kategori"
                      name="id_kategori"
                    >
                      <option selected>Select category</option>
                      <?php foreach ($data_kategori as $row) :?>
                      <option value=" <?= $row['id_kategori']?>"><?= $row['nama_kategori'] ?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="expire_date"
                            >Harga Produk
                          </label>
                          <input
                            id="harga_produk"
                            name="harga_produk"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Berat Produk
                          </label>
                          <input
                            id="berat_produk"
                            name="berat_produk"
                            type="text"
                            class="form-control validate"
                            value="<?= set_value('berat_produk'); ?>"
                            required
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Stok Produk
                          </label>
                          <input
                            id="stok_produk"
                            name="stok_produk"
                            type="text"
                            class="form-control validate"
                            value="<?= set_value('stok_produk'); ?>"
                            required
                          />
                        </div>
                  
                  
              </div>
              <div class="col-12">
                <button type="submit"name="submit" value="submit"class="btn btn-primary btn-block text-uppercase">Tambahkan Produk</button>
              </div>
              <div class="col-12" style="padding-top: 10px;">
                <button class="btn btn-primary btn-block text-uppercase">Kembali</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>
