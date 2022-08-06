<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<input type="submit" value="Kembali" class="btn"></input>

    <div class="row">
      <div class="col-75">
        <div class="container">
          <form action="<?= base_url('checkout/postcheckout') ?>" method="POST">
            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> <?= $this->session->userdata('nama_pelanggan'); ?></label>
                <label for="email"><i class="fa fa-envelope"></i> <?= $this->session->userdata('email'); ?></label>
                <label for="adr"><i class="fa fa-address-card-o"></i> <?= $this->session->userdata('telepon_pelanggan'); ?></label>
                <input style="height:200px;"rows="10"type="text" id="adr" name="address" placeholder="542 W. 15th Street">

    
                <div class="row">
                  <div class="col-50">

                  </div>
                  <div class="col-50">

                  </div>
                </div>
              </div>
    
              <div class="col-50">
                <h3>Transaksi</h3>
                <label for="fname">Total Harga</label>
                <input type="text" value="<?= array_sum(array_column($data_cart,'total_harga')) ?>" readonly id="cname" name="total_harga" >
                <label for="cname">Tanggal</label>
                <input type="date" value="<?= date('Y-m-d') ?>" readonly id="cname" name="date" >
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Nama Kota</label>
                <select name="id_ongkir" id=""> 
                <?php foreach ($data_ongkir as $do) :?>
                <option value="<?= $do['id_ongkir']?>"><?= $do['nama_kota'] ?></option>
                <?php endforeach;?>
                </select> 

                <!-- Bikinnya nnti kayak gini ya gy buat dropdown -->
                <!-- DONE  -->


                <label for="ccnum">Alamat Rumah</label>
                <input type="text" id="ccnum" name="alamat" placeholder="alamat Rumah Anda">

                <!-- truss nnti untuk field ongkir sesuai ama value id ongkir yang dipilih dari nama kota -->
                
              </div>
              
            </div>
            <label>
              <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <input type="submit" name="submit" value="Continue to checkout" class="btn">
          </form>
        </div>
      </div>

      <!-- display aja cart sebelumnya tapi tanpa foto -->
      <div class="col-25">
        <div class="container">
          <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
          <?php foreach($data_cart as $dc) :?>
          <p><a href="#"><?= $dc['nama_produk']; ?></a> <span style="position:center;"><?= $dc['quantity']; ?></span><span class="price">Rp. <?= number_format($dc['total_harga'],0, '.', ','); ?></span></p>
          <?php endforeach ?>
          <hr>

          <!-- untuk total tambahin dari ongkir gy -->
          <!-- tapi kalau ribet ngk usah buaang aja fieldnya -->
          <p>Total <span class="price" style="color:black"><b>Rp. <?= number_format(array_sum(array_column($data_cart,'total_harga')), 0,',','.'); ?></b></span></p>
        </div>
      </div>
    </div>
