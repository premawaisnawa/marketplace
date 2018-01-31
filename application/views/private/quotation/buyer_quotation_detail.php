
  <div class="container">
    <h1>Pembelian Necklace Bahla initalize</h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">Home</a>
      </li>
      <li>
        <a>Quotation Detail</a>
      </li>
    </ol>
    <div class="row">
      <div class="col-md-7 detail">
        <div class="block cover-container">
          <?php foreach($product as $p){ ?>

          <img src="<?php echo base_url('assets/supplier_upload/').$p->FileName;?>" alt="">
          <?php } ?>
        </div>
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
                  <?php if ($this->session->userdata('id_buyer') == $qd->IdMember): ?>
                    <li class="right clearfix"><span class="chat-img pull-right">
                      <img src="http://placehold.it/50/55C1E7/fff&text=me" alt="User Avatar" width="60" class="img-circle" />
                    </span>
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $qd->DateSend; ?></small>
                        <strong class="pull-right primary-font"><?php echo $qd->CompanyName; ?></strong>
                      </div>
                      <div>
                        <?php echo $qd->Message; ?>
                      </div>
                    </div>
                  </li>
                  <?php else: ?>
                    <li class="left clearfix"><span class="chat-img pull-left">
                      <img src="<?php echo base_url('assets/supplier_upload/').$qd->ProfilImage ?>" width="55" class="img-circle" />
                    </span>
                    <div class="chat-body clearfix">
                      <div class="header">
                        <strong class="primary-font"><?php echo $qd->CompanyName; ?></strong> <small class="pull-right text-muted">
                          <span class="glyphicon glyphicon-time"></span><?php echo $qd->DateSend; ?></small>
                        </div>
                        <div>
                          <?php echo $qd->Message; ?>
                        </d>
                      </div>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
                <div class="badan_chat">

                </div>


          </ul>
        </div>
        <div class="panel-footer">
          <!-- <form class="" id="Simpan" action="<?php //echo base_url().'index.php/Quotation/add_quotation_detail'; ?>" method="post" > -->
          <div class="input-group">
              <input type="hidden" name="id_member" value="<?php echo $this->session->userdata('id_buyer'); ?>">
              <input type="hidden" name="id_quotation" value="<?php echo $quotation[0]->IdQuotation;; ?>">
            <input onkeypress="return runScript(event)" type="text"  name="message" class="form-control input-sm" placeholder="Type your message here..." />
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
    $(document).ready(function () {
      var a = $(".chat-room")[0].scrollHeight;
      $(".chat-room").delay(800).animate({
        scrollTop: a
      }, 500);
    });
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

          }

      });
  return false;
  }
  }
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
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

             }

         });


      });
    });
  </script>
