<link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- https://getbootstrap.com/ -->
    <link href="<?=base_url('assets/css/templatemo-style.css');?>" rel="stylesheet">
<style>
    a{
        color: #92c67d;
    }
</style>
  <body>
  
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Tambahkan Kategori</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
            <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Nama Kategori
                    </label>
                    <input
                      id="nama_kategori"
                      name="nama_kategori"
                      type="text"
                      class="form-control validate"
                      value=" <?= set_value('nama_kategori'); ?>"
                      required
                    />
                  </div>
                  
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Tambahkan Kategori</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>




