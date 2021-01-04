<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
//Notifikasi
if($this->session->flashdata('sukses')){ ?>
  <script type="text/javascript">
    swal("Berhasil", "Data Berhasil ditambah", "success");
  </script>
<?php } elseif ($this->session->flashdata('terhapus')) { ?>
 <script type="text/javascript">
    swal("Berhasil", "Data telah dihapus", "success");
  </script>
<?php } elseif ($this->session->flashdata('teredit')) { ?>
  <script type="text/javascript">
    swal("Berhasil", "Data telah diubah", "success");
  </script>
<?php }elseif($this->session->flashdata('notif')){ ?>
<script type="text/javascript">
    swal("Terkirim", "<?php echo $this->session->flashdata('notif'); ?>", "success");
  </script>
<?php }elseif($this->session->flashdata('gagal')){ ?>
<script type="text/javascript">
    swal("Gagal", "<?php echo $this->session->flashdata('gagal'); ?>", "error");
  </script>
<?php } ?>
</div>
      <!-- /content area -->


      <!-- Footer -->
      <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
          <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
          </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-footer">
          <span class="navbar-text">
            &copy; 2020. <a href=""></a>
          </span>          
        </div>
      </div>
      <!-- /footer -->

    </div>
    <!-- /main content -->

  </div>
  <!-- /page content -->

</body>
</html>