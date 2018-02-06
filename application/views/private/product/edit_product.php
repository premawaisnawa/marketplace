
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone/css/dropzone.min.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone/css/basic.min.css') ?>" />


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="btn-group btn-breadcrumb">
    <a href="#" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-home"></i></a>
    <a href="<?php echo base_url('index.php/Product/product_view');?>" class="btn btn-default  btn-xs">Product</a>
    <a  class="btn btn-default  btn-xs active">Add Product</a>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Add New Product</h3>
        </div>
        <div class="box-body">
          <form method="post"  enctype="multipart/form-data" id="Simpan"  action="<?php echo base_url().'index.php/Product/edit_product'; ?>">
            <div class="form-group">
              <label class="control-label">Product Name</label>
              <input type="text" value="<?php echo $product[0]->Name ?>" name="product_name" id="product_name"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
            </div>
            <div class="form-group">
              <label for="">Product Category</label>
              <select class="form-control" name="product_category_code" id="product_category_code">
                <option value='0'>--Choose Product Category--</pilih>
                  <?php $i = 1; foreach($product_category as $pc){
                    if ($product[0]->ProductCategoryCode == $pc->Code) {
                      ?>
                      <option selected value="<?php echo $pc->Code?>"><?php echo $pc->ProductCategory?></option>
                      <?php
                    }else{
                      ?>
                      <option value="<?php echo $pc->Code?>"><?php echo $pc->ProductCategory?></option>
                      <?php
                    }
                    ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Product Sub Category</label>
                <select class="form-control" name="product_sub_category_code" id="product_sub_category_code">

                  <?php if (!empty($product_sub_category_tag)){
                    echo $product_sub_category_tag;
                  }?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Unit</label>
                <input type="text" value="<?php echo $product[0]->Unit ?>" name="unit" class="form-control" value="">
              </div>
              <div class="form-group">
                <label class="control-label">Price</label>
                <input type="text" name="price" value="<?php echo $product[0]->Price ?>" id="price"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
              </div>
              <div class="form-group">
                <label class="control-label">Supply Ability</label>
                <input type="text" name="supply_ability" value="<?php echo $product[0]->SupplyAbility ?>" id="supply_ability"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category name..."  class="form-control"  placeholder="">
              </div>
              <div class="form-group">
                <label for="">Period Supply Ability</label>
                <select class="form-control" name="period_supply_ability">
                  <option value="daily">Daily</option>
                  <option value="weekly">Weekly</option>
                  <option value="monthly">Monthly</option>
                  <option value="yearly">Yearly</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Product Description</label>
                <textarea class="form-control" rows="5" name="product_description" ><?php echo $product[0]->Name ?></textarea>
              </div>
              <div class="form-group">
                <label for="">Packaging & Delivery</label>
                <textarea class="form-control" rows="5" name="pkg_delivery" ><?php echo $product[0]->PkgDelivery ?></textarea>
              </div>
              <div class="co-md-12 "><label class="control-label ">Product Pictures</label></div>
              <?php foreach ($product as $p): ?>
              <div id="<?php echo "div".$p->IdProductPic; ?>" class="form-group col-lg-2 text-center">
                <!-- <img src="<?php //echo base_url().'assets/icon/upload-icon.png'?>" alt="" style="width: 100px"> -->
                <div class="form-group text-center">

                    <img src="<?php if (empty($p->FileName)) {
                      echo base_url().'assets/icon/upload-icon.png';
                    }else{
                      echo base_url().'assets/supplier_upload/'.$p->FileName;
                    }?>"  alt="" class="img-thumbnail" alt="Cinque Terre" width="200" >
                  </div>
                  <!--  -->
                  <!-- <input type="hidden" name="id_product_pic" id="id_product_pic" value="<?php //echo $p->IdProductPic; ?>"> -->

                  <button type="button" class="btn btn-danger" id="delete_pic" value="<?php echo $p->IdProductPic; ?>">Delete</button>
                </div>

                <?php endforeach; ?>
                <div class="form-group col-md-12">
                  <!-- <label class="control-label">Product Image</label> -->
                  <div class="dropzone" >
                    <div class="dz-message">
                      <h4> Click or Drop product picture here..<br>Max File Size 1,8 MB</h4>
                    </div>
                  </div>
                </div>





                <!-- <div class="form-group",>
                <label class="control-label">Product Image</label>
                <div class="dropzone">
                <div class="dz-message">
                <h4> Click or Drop product image here..</h4>
              </div>
            </div>
          </div> -->

          <!-- <div class="form-group">
          <label class="control-label">Description</label>
          <input type="text" name="description" id="description"  data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill out category description..."  class="form-control"  placeholder="">
        </div> -->
        <div class="form-group text-right col-md-12">
          <input type="hidden" name="id_product" value="<?php echo $product[0]->IdProduct ?>">
          <button type="submit" value="Validate" class="btn btn-default "><i class='glyphicon glyphicon-ok'></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>


</section>



<script src= "<?php echo base_url('assets/dropzone/js/dropzone.min.js') ?>" ></script>
<script src= "<?php echo base_url('assets/dropzone/js/dropzone-amd-module.min.js') ?>" ></script>
<script type="text/javascript">
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#fotoview')
                    .attr('src', e.target.result)
                    .width(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
$(function(){
 $(document).click(function(event){
  var value=$(event.target).val();
  console.log(value);
  $.ajax({
   type:"POST",
   url: "<?php echo base_url('index.php/Product/remove_product_picture_edit') ?>",
   data:{id_product_pic:value},
   success: function(respond){
    var divPic = "#div"+value;
    $(divPic).remove();
   }
  })
 });
})
</script>
<script type="text/javascript">
$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('index.php/Product/generate_product_sub_category') ?>",
cache: false,
});

$("#product_category_code").change(function(){

var value=$(this).val();

$.ajax({
data:{product_category_code:value},
success: function(respond){
$("#product_sub_category_code").html(respond);
}
})


});
})
// var productCategoryNode = document.getElementById("product_category_code");
// var productSubCategoryNode = document.getElementById("product_sub_category_code");
// console.log(productCategoryNode);
// console.log(productSubCategoryNode);
//   function getProductSubCategory() {
//     var request = new XMLHttpRequest();
//
//     request.open("GET", "<?php echo base_url()."index.php/Product/get_product_sub_category"; ?>", false);
//     request.send();request.responseText;
//     console.log(request.responseText);
//     // productSubCategoryNode.innerHTML = request.responseText;
//     // request.onreadystatechange = function() {
//     //   if (request.readyState == 4 && request.status == 200) {
//     //     productSubCategoryNode.innerHTML = request.responseText;
//     //   }
//     //  };
//   }
//   productCategoryNode.addEventListener("change",getProductSubCategory);
</script>
<script type="text/javascript">
$("#Simpan").submit(function() {
  var category = $('#category').val();
  var description = $('#description').val();
  if (category == ''|| description==''){
    File_Kosong(); return false;
  }else{
    event.preventDefault();
    $.confirm({
      title: 'Confirmation',
      content: 'Are You Sure to Save?',
      type: 'blue',
      buttons: {
        Simpan: function () {
          $.LoadingOverlay("show");
          $("#Simpan").submit();
        },
        Batal: function () {

          $.alert('Data Tidak Disimpan...');
        },
      }
    });
  }

});
</script>
<script type="text/javascript">
$(document).ready(function(){
  var i = 1;
  Dropzone.autoDiscover = false;
  var accept = ".pdf,.png,.jpg,.JPEG";
  var foto_upload= new Dropzone(".dropzone",{
    url: "<?php echo base_url('index.php/Product/add_product_picture') ?>",
    maxFilesize: 2000,
    method:"post",
    acceptedFiles:accept,
    paramName:"userfiles",
    dictInvalidFileType:"Type file ini tidak dizinkan",
    addRemoveLinks:true,
    success: function(file,data){

      var data_array = data.split(',');
      var nama =data_array[0];
      var namafile =  nama.replace('"', '');
      var token =data_array[1];
      var tokenfile =  token.replace('"', '');
      var str = String(tokenfile);
      var res = str.substring(3, 10);
      $('<input>').attr({
        type: 'hidden',
        id: res,//a.token,
        class:tokenfile,
        name: 'file['+i+']',
        value: namafile
      }).appendTo('form');
      i++;
    }
  });

  foto_upload.on("addedfile", function(file) {
    if (!file.type.match(/image.*/)) {
      foto_upload.emit("thumbnail", file, "<?php echo base_url('assets/img/pdf.png') ?>");
    }
  });

  // mengupload
  foto_upload.on("sending",function(a,b,c){
    a.token=Math.random();
    var str = String(a.token);
    var res = str.substring(3, 10);
    c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
  });

  //hapus
  foto_upload.on("removedfile",function(a){
    var token=a.token;
    var str = String(a.token);
    var res = str.substring(3, 10);
    var namafile = $('#'+res).val();
    $('#'+res).remove();
    $.ajax({
      type:"post",
      data:{nama:namafile},
      url:"<?php echo base_url('index.php/Product/remove_product_picture') ?>",
      cache:false,
      dataType: 'json',
      success: function(){
        console.log("Foto terhapus");
      },
      error: function(){
        console.log("Error");

      }
    });
  });
});
</script>
