
<style>
  @import url(https://fonts.googleapis.com/css?family=Fjalla+One);

* {
  margin-right: auto;
  /* line-height: normal */
}

ul {
  Background-color: #4b4b4b;
  height: 100px;
  text-align: center;
  border-bottom:solid #92C67D;
  border-width: 12px;
  list-style-type: none;
  word-spacing: 30px;
  margin-top: 0px;
  line-height: normal
  }

a {
   color: #92C67D;
   font-family: Fjalla One;
   font-size: 40px;
   text-decoration: none;
   
 
   }

li {
  display:inline-block;
  margin-top: 30px;
  
}

a:active {
    color: #719861;
}

a:hover {
    color: #87D877;
}

i {
  margin-top:20px;
  color: whiteSmoke;
  font-size: 50px;
  float: center;
  margin-left: 590px
}

</style>
<link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"></link>

  <ul style="color: #92c67d">
    <li style="color: #92c67d;"><a href="<?= base_url(''); ?>">HOME</a></li>
    <li><a href="/forum">FORUM</a></li>
    <li><a href="/shop">SHOP</a></li>
    <li><a href="<?= base_url('admin'); ?>">MANAGE</a></li>
  </ul>
</div>