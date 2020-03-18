<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Data Jenis Karya</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="zmdi zmdi-home"></i> TumbasApp</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/jenis_karya">Jenis Karya</a></li>
                        <li class="breadcrumb-item active">Edit Jenis Karya</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
          <div class="row clearfix">
            <div class="col-lg-12">
              <div class="card">
                <div class="header">
                  <h2><strong>Edit</strong> Jenis Karya </h2>
                </div>

                <div class="body">
                <?php foreach ($jenis_karya as $karya ) { ?>
                  <form action="<?=base_url('admin/jenis_karya/update')?>" method="post">
                    <input type="hidden" name="id" value="<?=$karya->id?>">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input value="<?=$karya->nama?>" type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama . ." aria-describedby="namaId">
                      <small id="namaId" class="text-muted">Masukkan dengan menggunakan huruf tanpa tanda baca</small>
                    </div>

                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan . ." aria-describedby="keteranganId"><?=$karya->keterangan?></textarea>
                      <small id="keteranganId" class="text-muted">Masukkan keterangan jenis karya lebih dari 30 karakter</small>
                    </div>

                    <div class="form-group">
                      <label for="contoh_file">Contoh File</label>
                      <textarea name="contoh_file" id="contoh_file" class="form-control" placeholder="Masukkan Contoh File . ." aria-describedby="contoh_fileId"><?=$karya->contoh_file?></textarea>
                      <small id="contoh_fileId" class="text-muted">Masukkan keterangan mengenai contoh file apa saja yang dapat menjadi acuan lebih dari 30 karakter</small>
                    </div>

                    <div class="form-group">
                      <label for="format_file">Format File</label>
                      <textarea name="format_file" id="format_file" class="form-control" placeholder="Masukkan format_file . ." aria-describedby="format_fileId"><?=$karya->format_file?></textarea>
                      <small id="format_fileId" class="text-muted">Masukkan Keterangan mengenai format file yang harus diupload lebih dari 30 karakter</small>
                    </div>

                    <div class="form-group mb-0 text-center">
                      <input type="submit" value="UPDATE DATA" class="btn btn-primary">
                      <button onclick="window.history.back()" class="btn btn-secondary p-2"><i class="zmdi zmdi-arrow-left"></i></button>
                    </div>
                  </form>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>