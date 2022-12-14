<style>
    @import url(https://fonts.googleapis.com/css?family=Fredoka+One);




        ::selection { background: #bdc0e8; }
        ::-moz-selection { background: #bdc0e8; }
        ::-webkit-selection { background: #bdc0e8; }

        br { display: block; line-height: 1.6em; } 

        article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
        ol, ul { list-style: none; }

        input, textarea { 
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        outline: none; 
        }

        blockquote, q { quotes: none; }
        blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
        strong, b { font-weight: bold; }
        em, i { font-style: italic; }

        table { border-collapse: collapse; border-spacing: 0; }
        img { border: 0; max-width: 100%; }

        h1 {
        font-family: 'Fredoka One', Helvetica, Tahoma, sans-serif;
        color: #fff;
        text-shadow: 1px 2px 0 #92c67d;
        font-size: 3.5em;
        line-height: 1.1em;
        padding: 6px 0;
        font-weight: normal;
        text-align: center;
        }


        /* page structure */
        #w {
        display: block;
        width: 600px;
        margin: 0 auto;
        }

        #title {
        display: block;
        width: 100%;
        background: #92c67d;
        padding: 10px 0;
        -webkit-border-top-right-radius: 6px;
        -webkit-border-top-left-radius: 6px;
        -moz-border-radius-topright: 6px;
        -moz-border-radius-topleft: 6px;
        border-top-right-radius: 6px;
        border-top-left-radius: 6px;
        }

        #page {
        display: block;
        background: #fff;
        padding: 15px 0;
        -webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
        -moz-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        /** cart table **/
        #cart {
        display: block;
        border-collapse: collapse;
        margin: 0;
        width: 100%;
        font-size: 1.2em;
        color: #444;
        }
        #cart thead th {
        padding: 8px 0;
        font-weight: bold;
        text-align: center;
        }

        #cart thead th.first {
        width: 175px;
        }
        #cart thead th.second {
        width: 45px;
        }
        #cart thead th.third {
        width: 230px;
        }
        #cart thead th.fourth {
        width: 130px;
        }
        #cart thead th.fifth {
        width: 20px;
        }

        #cart tbody td {
        text-align: center;
        margin-top: 4px;
        }

        tr.productitm {
        height: 65px;
        line-height: 65px;
        border-bottom: 1px solid #d7dbe0;
        }


        #cart tbody td img.thumb {
        vertical-align: bottom;
        border: 1px solid #ddd;
        margin-bottom: 4px;
        }

        .qtyinput {
        width: 33px;
        height: 22px;
        border: 1px solid #a3b8d3;
        background: #dae4eb;
        color: #616161;
        text-align: center;
        }

        tr.totalprice, tr.extracosts {
        height: 35px;
        line-height: 35px;
        }
        tr.extracosts {
        background: #e4edf4;
        }

        .remove {
        /* http://findicons.com/icon/261449/trash_can?id=397422 */
        cursor: pointer;
        position: relative;
        right: 12px;
        top: 5px;
        }


        .light {
        color: #888b8d;
        text-shadow: 1px 1px 0 rgba(255,255,255,0.45);
        font-size: 1.1em;
        font-weight: normal;
        }
        .thick {
        color: #272727;
        font-size: 1.7em;
        font-weight: bold;
        }


        /** submit btn **/
        tr.checkoutrow {
        background: #cfdae8;
        border-top: 1px solid #abc0db;
        border-bottom: 1px solid #abc0db;
        }
        td.checkout {
        padding: 12px 0;
        padding-top: 20px;
        width: 100%;
        text-align: right;
        }


        /* https://codepen.io/guvootes/pen/eyDAb */
        #submitbtn {
        width: 150px;
        height: 35px;
        outline: none;
        border: none;
        border-radius: 5px;
        margin: 0 0 10px 0;
        font-size: 1.3em;
        letter-spacing: 0.05em;
        font-family: Arial, Tahoma, sans-serif;
        color: #fff;
        text-shadow: 1px 1px 0 rgba(0,0,0,0.2);
        cursor: pointer;
        overflow: hidden;
        border-bottom: 1px solid #0071ff;
        background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #66aaff), color-stop(100%, #4d9cff));
        background-image: -webkit-linear-gradient(#66aaff, #4d9cff);
        background-image: -moz-linear-gradient(#66aaff, #4d9cff);
        background-image: -o-linear-gradient(#66aaff, #4d9cff);
        background-image: linear-gradient(#66aaff, #4d9cff);
        }
        #submitbtn:hover {
        background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #4d9cff), color-stop(100%, #338eff));
        background-image: -webkit-linear-gradient(#4d9cff, #338eff);
        background-image: -moz-linear-gradient(#4d9cff, #338eff);
        background-image: -o-linear-gradient(#4d9cff, #338eff);
        background-image: linear-gradient(#4d9cff, #338eff);
        }
        #submitbtn:active {
        border-bottom: 0;
        background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #338eff), color-stop(100%, #4d9cff));
        background-image: -webkit-linear-gradient(#338eff, #4d9cff);
        background-image: -moz-linear-gradient(#338eff, #4d9cff);
        background-image: -o-linear-gradient(#338eff, #4d9cff);
        background-image: linear-gradient(#338eff, #4d9cff);
        -webkit-box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
        -moz-box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
        box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
        }
</style>
<body>
  <div id="w">
    <header id="title">
      <h1>Belanja Anda</h1>
    </header>
    <div id="page">
      <table id="cart">
        <thead>
          <tr>
            <th class="first">Photo</th>
            <th class="fourth">Harga Produk</th>
            <th class="third">Nama_produk</th>
            <th class="fifth">&nbsp;</th>
            <th class="second">Qty</th>
            <th class="second">Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <!-- shopping cart contents -->
          <?php $harga_total = 0 ?>
          <?php foreach($data_cart as $dc): ?>
            <?php if($dc['status'] == null): ?>
          <tr class="productitm">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td><img src="<?= $dc['foto_produk'] ?>" class="thumb"></td>
            <td>Rp. <?= number_format($dc['harga_produk'], 0,',','.'); ?></td>
            <td><?= $dc['nama_produk']; ?></td>
            <td><a href="<?= base_url('cart/delete/'.$dc['id_produk']) ?>"><span class="remove"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></span></a></td>
            <td><input type="text" value="<?= $dc['quantity'] ?>" class="qtyinput"></td>
            <td>Rp. <?= number_format($dc['total_harga'], 0,',','.'); ?></td>
          </tr>
            <?php endif ?>
          <?php endforeach ?>
          
          <!-- Diambil dari tabel ongkir -->
          <tr class="extracosts">
            <td class="light">Shipping &amp; Tax</td>
            <td colspan="2" class="light"></td>
            <td>$35.00</td>
            <td>&nbsp;</td>
          </tr>
          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2"><span class="thick">Rp. <?= number_format(array_sum(array_column($data_cart,'total_harga')), 0,',','.'); ?></span></td>
          </tr>
          
          <!-- checkout btn -->
          <tr class="checkoutrow">
            <td colspan="5" class="checkout"><a href="<?= base_url('checkout') ?>" id="submitbtn"><button>Checkout</button></a></td>
            <td colspan="5" class="checkout"><button id="submitbtn">update chart</button></td>

          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>