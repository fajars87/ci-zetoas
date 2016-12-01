<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() ?>admin/kategori">Kategori</a></li>
        <li class="active">Tambah Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">

            <!-- Your Page Content Here -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tambah Kategori</h3>
                    <?php echo validation_errors(); ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" name="form1" method="post" action="<?php echo base_url() ?>admin/kategori/tambah">
                <!-- judul -->
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" class="form-control" name="name" placeholder="Name ...">
                </div>

                <div class="box-footer">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->