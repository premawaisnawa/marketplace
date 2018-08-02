
  <div class="container">
    <h1>Pembelian Necklace Bahla</h1>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo site_url('Home/home_view/') ?>">Home</a>
      </li>
      <li>
        <a href="<?php echo site_url('Quotation/buyer_quotation_list/') ?>">Quotation List</a>
      </li>
      <li class="active">Quotation Detail</li>
    </ol>
    <div class="row">
      <div class="col-md-7 detail">
        <div class="block cover-container">
          <?php foreach($product as $p){ ?>

          <img src="<?php echo base_url('assets/supplier_upload/').$p->FileName;?>" alt="">
          <?php } ?>
        </div>
        <br>
Quotation id  : 1 <br>
Supplier Name : <?php echo $quotation[0]->CompanyName; ?><br>
Product Name  : <?php echo $quotation[0]->Name; ?><br>
Qty           : 10 <br><br>

        <p><?php echo $quotation[0]->Content; ?></p>
      </div>


      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="glyphicon glyphicon-comment"></span> Chat

            <div class="panel-body" >
              <ul class="chat" >
                <?php foreach ($quotation_detail as $qd): ?>
                  <?php if (!empty($qd->ProfilImage)): ?>
                    <?php $profil_image = $qd->ProfilImage; ?>
                  <?php else: ?>
                    <?php $profil_image = "user_without_profile_image.png"; ?>
                  <?php endif; ?>
                  <?php if ($this->session->userdata('buyer_id') == $qd->IdMember): ?>
                    <li class="right clearfix"><span class="chat-img pull-right">
                      <img src="<?php echo base_url('assets/supplier_upload/').$profil_image; ?>" alt="User Avatar" width="45" class="img-circle" />
                    </span>
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $qd->DateSend; ?></small>
                        <strong class="pull-right primary-font">Me</strong>
                      </div>
                      <p class="word-wrap">
                        <?php echo $qd->Message; ?>
                      </p>
                    </div>
                  </li>
                  <?php else: ?>
                    <li class="left clearfix"><span class="chat-img pull-left">
                      <img src="<?php echo base_url('assets/supplier_upload/').$profil_image; ?>" width="45" class="img-circle" />
                    </span>
                    <div class="chat-body clearfix">
                      <div class="header">
                        <strong class="primary-font"><?php echo $qd->CompanyName; ?></strong>
                        <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $qd->DateSend; ?></small>
                        </div>
                        <p class="word-wrap">
                          <?php echo $qd->Message; ?>
                        </p>
                      </div>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
                <div class="badan_chat word-wrap">

                </div>


          </ul>
        </div>
        <div class="panel-footer">
          <!-- <form class="" id="Simpan" action="<?php //echo base_url().'index.php/Quotation/add_quotation_detail'; ?>" method="post" > -->
          <div class="input-group">
              <input type="hidden" name="id_member" value="<?php echo $this->session->userdata('buyer_id'); ?>">
              <input type="hidden" name="id_quotation" value="<?php echo $quotation[0]->IdQuotation;; ?>">
            <input id="txt_message" onkeypress="return runScript(event)" type="text"  name="message" class="form-control input-sm " placeholder="Type your message here..." />
            <span class="input-group-btn">
              <a type="submit" id="addPesan" class="btn btn-warning btn-sm" id="btn-chat" >
                Send</a>
              </span>

            </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
  <script>
    // $(document).ready(function () {
    //   var a = $(".chat-room")[0].scrollHeight;
    //   $(".chat-room").delay(800).animate({
    //     scrollTop: a
    //   }, 500);
    // });
  </script>
  <script type="text/javascript">
  function runScript(e) {
      if (e.keyCode == 13) {
        // alert("test");
      e.preventDefault();
      var data = {
        'id_quotation'              : $('input[name=id_quotation]').val(),
          'id_member'              : $('input[name=id_member]').val(),
          'message'             : $('input[name=message]').val()
      };
      // lakukan proses ajax
      $.ajax({
          type        : 'POST',
          dataType:'html',
          url         : "<?php echo base_url().'index.php/Quotation/add_quotation_detail'; ?>",
          cache: false,
          data        :  data,
          success: function(response) {

              $(".badan_chat").append(response);
              $("#txt_message").val("");

          }

      });

  return false;
  }
  }
  </script>
  <script type="text/javascript">
    function reload_chat() {
      var data = {
        'id_quotation'              : $('input[name=id_quotation]').val()
      };
      $.ajax({
          type        : 'POST',
          dataType:'html',
          url         : "<?php echo base_url().'index.php/Quotation/get_quotation_detail_chat'; ?>",
          cache: false,
          data        :  data,
          success: function(response) {
              $(".badan_chat").append(response);
          }
      });
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      // alert('tes');
        setInterval(
          reload_chat
          , 1000
        );
       $("#addPesan").click(function(e){
        //  alert("test");
        // var url = $('#Simpan').attr('action');
         // ambil inputannya
         e.preventDefault();
         var data = {
           'id_quotation'              : $('input[name=id_quotation]').val(),
             'id_member'              : $('input[name=id_member]').val(),
             'message'             : $('input[name=message]').val()
         };
         // lakukan proses ajax
         $.ajax({
             type        : 'POST',
             dataType:'html',
             url         : "<?php echo base_url().'index.php/Quotation/add_quotation_detail'; ?>",
             cache: false,
             data        :  data,
             success: function(response) {

                 $(".badan_chat").append(response);
                 $("#txt_message").val("");

             }

         });
      });
    });
  </script>
