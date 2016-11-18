<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
          <div class="col-md-12">
              <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Artikel</h3>
	            <?php echo validation_errors(); ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="form1" method="post" action="<?php echo base_url() ?>admin/artikel/tambah">
                <!-- judul -->
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Judul ...">
                </div>

                <!-- ringkasan -->
                <div class="form-group">
                  <label>Ringkasan</label>
                  <textarea class="form-control" rows="3" name="ringkasan" placeholder="Ringkasan ..."></textarea>
                </div>

                <!-- isi -->
                <div class="form-group">
                  <label>Isi</label>
                    <div class="box-body pad">
                        <textarea id="editor1" name="isi" rows="10" cols="80"></textarea>
                    </div>
                </div>

                <!-- kategori -->
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="id_kategori" class="form-control">
                    <option value="1">Web Design</option>
                    <option value="2">Photography</option>
                  </select>
                </div>

                <!-- status -->
                <div class="form-group">
                  <label>Status</label>
                  <select name="status_artikel" class="form-control">
                    <option value="PUBLISHED">Publikasikan</option>
                    <option value="DRAFT">Simpan sebagai draft</option>
                  </select>
                </div>

                <!-- Id user -->
                <input name="id_user" type="hidden" id="id_user" value="<?php echo $user_det['id']; ?>"> 

                <div class="box-footer">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->