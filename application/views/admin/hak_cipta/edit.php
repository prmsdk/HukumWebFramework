<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Data Portfolio</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="zmdi zmdi-home"></i> TumbasApp</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/hak_cipta">Hak Cipta</a></li>
                        <li class="breadcrumb-item active">Edit Hak Cipta</li>
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
                  <h2><strong>Edit</strong> Hak Cipta </h2>
                </div>

                <div class="body">
                <?php foreach ($hak_cipta as $cipta ) { ?>
                  <form action="<?=base_url('admin/hak_cipta/update')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$cipta->id?>">
                    <div class="form-group">
                      <label for="id_user">Calon Pemilik Hak Cipta :</label>
                      <select id="id_user" name="id_user" class="form-control show-tick" aria-describedby="id_userId" readonly>
                          <option>-- Please select --</option>
                          <?php foreach ($user as $u ) { ?>
                          <option value="<?=$u->id?>" <?php echo $cipta->id_user == $u->id? "selected" : "" ; ?>><?=$u->nama?></option>
                          <?php }?>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="judul">Judul</label>
                      <input value="<?=$cipta->judul?>" type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul . ." aria-describedby="judulId">
                      <small id="judulId" class="text-muted">Masukkan dengan menggunakan huruf tanpa tanda baca</small>
                  </div>

                  <div class="form-group">
                      <label for="uraian">Uraian</label>
                      <textarea name="uraian" id="uraian" class="form-control" placeholder="Masukkan uraian . ." aria-describedby="uraianId"><?=$cipta->uraian?></textarea>
                      <small id="uraianId" class="text-muted">Masukkan uraian karya lebih dari 30 karakter</small>
                  </div>

                  <hr>

                  <div class="form-group">
                      <label for="nama_pencipta">Nama Pencipta</label>
                      <input value="<?=$cipta->nama_pencipta?>" type="text" name="nama_pencipta" id="nama_pencipta" class="form-control" placeholder="Masukkan nama_pencipta . ." aria-describedby="nama_penciptaId">
                      <small id="nama_penciptaId" class="text-muted">Masukkan dengan menggunakan huruf tanpa tanda baca</small>
                  </div>

                  <div class="form-group">
                      <label for="kewarganegaraan d-block">Kewarganegaraan</label><br>
                      <input readonly value="<?=$cipta->kewarganegaraan?>" type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control d-inline w-50" placeholder="Masukkan nama_pencipta . ." aria-describedby="nama_penciptaId">
                      <button type="button" class="btn btn-primary font-weight-bold py-2 px-3" data-toggle="modal" data-target="#largeModal">Ubah</button>
                      
                  </div>

                  <?php
                      // echo $country;
                  ?>

                  <div class="form-group">
                      <label for="alamat_pencipta">Alamat Pencipta</label>
                      <textarea name="alamat_pencipta" id="alamat_pencipta" class="form-control" placeholder="Masukkan Alamat Pencipta . ." aria-describedby="alamat_penciptaId"><?=$cipta->alamat_pencipta?></textarea>
                      <small id="alamat_penciptaId" class="text-muted">Masukkan alamat pencipta lebih dari 30 karakter</small>
                  </div>

                  <hr>

                  <h5 class="font-weight-bolder">Lengkapi Dokumen Diri Anda :</h5>
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Dokumen</th>
                              <th>Status</th>
                              <th>Download</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody class="text-center">
                          <tr>
                              <td>1. </td>
                              <td class="text-left">Scan NPWP</td>
                              <?php if($cipta->npwp != '' || $cipta->npwp != null){ ?>
                              <td><span class="badge badge-pill badge-success">Scan NPWP sudah diunggah</span></td>
                              <td><a href="<?=base_url()?>admin/hak_cipta/download/npwp/<?=$cipta->npwp?>" class="badge badge-pill badge-primary">Download File</a></td>
                              <?php }else{ ?>
                              <td><span class="badge badge-pill badge-danger">Scan NPWP belum diunggah</span></td>
                              <td></td>
                              <?php }?>
                              <td><button type="button" class="badge badge-pill badge-warning font-weight-bold py-1 px-2" data-toggle="modal" data-target="#npwpModal">Ubah</button></td>
                          </tr>
                          <tr>
                              <td>2. </td>
                              <td class="text-left">Scan KTP</td>
                              <?php if($cipta->ktp != '' || $cipta->ktp != null){ ?>
                              <td><span class="badge badge-pill badge-success">Scan KTP sudah diunggah</span></td>
                              <td><a href="<?=base_url()?>admin/hak_cipta/download/ktp/<?=$cipta->ktp?>" class="badge badge-pill badge-primary">Download File</a></td>
                              <?php }else{ ?>
                              <td><span class="badge badge-pill badge-danger">Scan KTP belum diunggah</span></td>
                              <td></td>
                              <?php }?>
                              <td><button type="button" class="badge badge-pill badge-warning font-weight-bold py-1 px-2" data-toggle="modal" data-target="#ktpModal">Ubah</button></td>
                          </tr>
                          <tr>
                              <td>3. </td>
                              <td class="text-left">Scan NPWP Perusahaan</td>
                              <?php if($cipta->npwp_prs != '' || $cipta->npwp_prs != null){ ?>
                              <td><span class="badge badge-pill badge-success">Scan NPWP Perusahaan sudah diunggah</span></td>
                              <td><a href="<?=base_url()?>admin/hak_cipta/download/npwp_prs/<?=$cipta->npwp_prs?>" class="badge badge-pill badge-primary">Download File</a></td>
                              <?php }else{ ?>
                              <td><span class="badge badge-pill badge-danger">Scan NPWP Perusahaan belum diunggah</span></td>
                              <td></td>
                              <?php }?>
                              <td><button type="button" class="badge badge-pill badge-warning font-weight-bold py-1 px-2" data-toggle="modal" data-target="#npwp_prsModal">Ubah</button></td>
                          </tr>
                          <tr>
                              <td>4. </td>
                              <td class="text-left">Scan Akta Perusahaan</td>
                              <?php if($cipta->akta_prs != '' || $cipta->akta_prs != null){ ?>
                              <td><span class="badge badge-pill badge-success">Scan Akta Perusahaan sudah diunggah</span></td>
                              <td><a href="<?=base_url()?>admin/hak_cipta/download/akta_prs/<?=$cipta->akta_prs?>" class="badge badge-pill badge-primary">Download File</a></td>
                              <?php }else{ ?>
                              <td><span class="badge badge-pill badge-danger">Scan Akta Perusahaan belum diunggah</span></td>
                              <td></td>
                              <?php }?>
                              <td><button type="button" class="badge badge-pill badge-warning font-weight-bold py-1 px-2" data-toggle="modal" data-target="#akta_prsModal">Ubah</button></td>
                          </tr>
                      </tbody>
                  </table>

                  <h5 class="font-weight-bolder">Lengkapi Persyaratan Pengajuan Hak Cipta Anda :</h5>

                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>Status</th>
                        <th>Download</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <tr>
                        <td>1. </td>
                        <td class="text-left">Scan Surat Kuasa</td>
                        <?php if($cipta->surat_kuasa != '' || $cipta->surat_kuasa != null){ ?>
                        <td><span class="badge badge-pill badge-success">Scan Surat Kuasa sudah diunggah</span></td>
                        <td><a href="<?=base_url()?>admin/hak_cipta/download/surat_kuasa/<?=$cipta->surat_kuasa?>" class="badge badge-pill badge-primary">Download File</a></td>
                        <?php }else{ ?>
                        <td><span class="badge badge-pill badge-danger">Scan Surat Kuasa belum diunggah</span></td>
                        <td></td>
                        <?php }?>
                        <td><button type="button" class="badge badge-pill badge-warning font-weight-bold py-1 px-2" data-toggle="modal" data-target="#surat_kuasaModal">Ubah</button></td>
                      </tr>
                      <tr>
                        <td>2. </td>
                        <td class="text-left">Scan Surat Pernyataan</td>
                        <?php if($cipta->surat_pernyataan != '' || $cipta->surat_pernyataan != null){ ?>
                        <td><span class="badge badge-pill badge-success">Scan Surat Pernyataan sudah diunggah</span></td>
                        <td><a href="<?=base_url()?>admin/hak_cipta/download/surat_pernyataan/<?=$cipta->surat_pernyataan?>" class="badge badge-pill badge-primary">Download File</a></td>
                        <?php }else{ ?>
                        <td><span class="badge badge-pill badge-danger">Scan Surat Pernyataan belum diunggah</span></td>
                        <td></td>
                        <?php }?>
                        <td><button type="button" class="badge badge-pill badge-warning font-weight-bold py-1 px-2" data-toggle="modal" data-target="#surat_pernyataanModal">Ubah</button></td>
                      </tr>
                      <tr>
                        <td>3. </td>
                        <td class="text-left">Scan Surat Hak Pengalihan</td>
                        <?php if($cipta->surat_hak_pengalihan != '' || $cipta->surat_hak_pengalihan != null){ ?>
                        <td><span class="badge badge-pill badge-success">Scan Surat Hak Pengalihan sudah diunggah</span></td>
                        <td><a href="<?=base_url()?>admin/hak_cipta/download/surat_hak_pengalihan/<?=$cipta->surat_hak_pengalihan?>" class="badge badge-pill badge-primary">Download File</a></td>
                        <?php }else{ ?>
                        <td><span class="badge badge-pill badge-danger">Scan Surat Hak Pengalihan belum diunggah</span></td>
                        <td></td>
                        <?php }?>
                        <td><button type="button" class="badge badge-pill badge-warning font-weight-bold py-1 px-2" data-toggle="modal" data-target="#surat_hak_pengalihanModal">Ubah</button></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="form-group my-3">
                      
                      <hr>

                      <div class="form-group">
                          <label for="jenis_karya">Pilih Jenis Karya :</label>
                          <select id="jenis_karya" name="id_jenis" class="form-control show-tick" aria-describedby="jenis_karyaId">
                              <option value="">-- Please select --</option>
                              <?php foreach ($jenis_karya as $karya ) { ?>
                              <option value="<?=$karya->id?>" <?php echo $cipta->id_jenis == $karya->id? "selected" : "";?>><?=$karya->nama?></option>
                              <?php }?>
                          </select>
                          <small id="jenis_karyaId" class="text-muted">Pilih Jenis Karya/Ciptaan yang akan diajukan pendaftaran hak cipta.</small>
                      </div>

                      <?php foreach ($jenis_karya as $karya ) { ?>
                          <div id="<?=$karya->id?>" class="box_jenis">
                              <div class="alert alert-info mb-2">
                                  Keterangan : <br><?=$karya->keterangan?>
                              </div>
                              <div class="alert alert-success mb-2">
                                  Contoh Karya : <br><?=$karya->contoh_file?>
                              </div>
                              <div class="alert alert-warning">
                                  Format File : <?=$karya->format_file?>
                              </div>
                          </div>
                      <?php } ?>

                      <script>
                          $("#jenis_karya").change(function () {
                              $(this).find("option:selected").each(function () {
                              var optionValue = $(this).attr("value");
                              if (optionValue) {
                                  $(".box_jenis").not("#" + optionValue).hide();
                                  $("#" + optionValue).show();
                              } else {
                                  $(".box_jenis").hide();
                              }
                              });
                          }).change();
                      </script>

                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Status</th>
                            <th>Download</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1. </td>
                            <td class="text-left">Scan Contoh Karya</td>
                            <?php if($cipta->file_ciptaan != '' || $cipta->file_ciptaan != null){ ?>
                            <td><span class="badge badge-pill badge-success">Scan Contoh Karya sudah diunggah</span></td>
                            <td><a href="<?=base_url()?>admin/hak_cipta/download/file_ciptaan/<?=$cipta->file_ciptaan?>" class="badge badge-pill badge-primary">Download File</a></td>
                            <?php }else{ ?>
                            <td><span class="badge badge-pill badge-danger">Scan Contoh Karya belum diunggah</span></td>
                            <td></td>
                            <?php }?>
                            <td><button type="button" class="badge badge-pill badge-warning font-weight-bold py-1 px-2" data-toggle="modal" data-target="#file_ciptaanModal">Ubah</button></td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-sm btn-success">
                          <input type="radio" value="DISETUJUI" name="status_trs" id="status_trs_ya" autocomplete="off" <?php echo $cipta->status_trs == 'DISETUJUI'?"checked" : ""?>>
                          Telah Disetujui
                      </label>
                      <label class="btn btn-sm btn-danger">
                          <input type="radio" value="DALAM PROSES" name="status_trs" id="status_trs_tidak" autocomplete="off" <?php echo $cipta->status_trs != 'DISETUJUI'?"checked" : ""?>>
                          Belum Disetujui
                      </label>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-primary font-weight-bold">SIMPAN DATA</button>
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

<!-- COUNTRY MODAL -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_country')?>" method="post">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <?php echo $country; ?>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END COUNTRY MODAL -->

<!-- ==================================================== =================================================== -->

<!-- NPWP MODAL -->
<div class="modal fade" id="npwpModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_file/npwp')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <small>File <strong>Scan NPWP</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                <div class="custom-file mb-2">
                    <input required type="file" class="custom-file-input" name="npwp" id="npwp">
                    <label class="custom-file-label" for="npwp">Scan NPWP Anda . .</label>
                </div>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END NPWP MODAL -->

<!-- KTP MODAL -->
<div class="modal fade" id="ktpModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_file/ktp')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <small>File <strong>Scan KTP</strong> yang diunggah haruslah kurang dari 500KB, format file (pdf/jpg)</small>
                <div class="custom-file mb-2">
                    <input required type="file" class="custom-file-input" name="ktp" id="ktp">
                    <label class="custom-file-label" for="ktp">Scan KTP . .</label>
                </div>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END KTP MODAL -->

<!-- NPWP PERUSAHAAN MODAL -->
<div class="modal fade" id="npwp_prsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_file/npwp_prs')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <small>File <strong>Scan NPWP Perusahaan</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                <div class="custom-file">
                    <input required type="file" class="custom-file-input" id="npwp_prs" name="npwp_prs">
                    <label class="custom-file-label" for="npwp_prs">Scan NPWP Perusahaan . .</label>
                </div>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END NPWP PERUSAHAAN MODAL -->

<!-- AKTA PERUSAHAAN MODAL -->
<div class="modal fade" id="akta_prsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_file/akta_prs')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <small>File <strong>Scan Akta Perusahaan</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                <div class="custom-file">
                    <input required type="file" class="custom-file-input" id="akta_prs" name="akta_prs">
                    <label class="custom-file-label" for="akta_prs">Scan Akta Perusahaan . .</label>
                </div>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END AKTA PERUSAHAAN MODAL -->

<!-- ==================================================== =================================================== -->

<!-- SURAT KUASA MODAL -->
<div class="modal fade" id="surat_kuasaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_file/surat_kuasa')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <small>File <strong>Scan Surat Kuasa</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                <div class="custom-file mb-2">
                    <input required type="file" class="custom-file-input" name="surat_kuasa" id="surat_kuasa">
                    <label class="custom-file-label" for="surat_kuasa">Scan Surat Kuasa Anda . .</label>
                </div>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END SURAT KUASA MODAL -->

<!-- SURAT PERNYATAAN MODAL -->
<div class="modal fade" id="surat_kuasaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_file/surat_kuasa')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <small>File <strong>Scan Surat Kuasa</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                <div class="custom-file mb-2">
                    <input required type="file" class="custom-file-input" name="surat_kuasa" id="surat_kuasa">
                    <label class="custom-file-label" for="surat_kuasa">Scan Surat Kuasa Anda . .</label>
                </div>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END SURAT PERNYATAAN MODAL -->

<!-- SURAT PENGALIHAN HAK MODAL -->
<div class="modal fade" id="surat_hak_pengalihanModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_file/surat_hak_pengalihan')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <small>File <strong>Scan Surat Pengalihan Hak</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                <small>Dokumen ini diperlukan jika nama pencipta dan pemegang hak cipta berbeda</small>
                <div class="custom-file mb-2">
                    <input required type="file" class="custom-file-input" name="surat_hak_pengalihan" id="surat_hak_pengalihan">
                    <label class="custom-file-label" for="surat_hak_pengalihan">Scan Surat Pengalihan Hak Anda . .</label>
                </div>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END SURAT PENGALIHAN HAK MODAL -->

<!-- ===================================================== ===================================================== -->

<!-- CONTOH KARYA MODAL -->
<div class="modal fade" id="file_ciptaanModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/update_file/file_ciptaan')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?=$cipta->id?>">
                <small>File <strong>Scan Contoh Karya/Ciptaan</strong> yang diunggah haruslah kurang dari 20 MB, format file (pdf/jpg)</small>
                <div class="custom-file mb-2">
                    <input required type="file" class="custom-file-input" name="file_ciptaan" id="file_ciptaan">
                    <label class="custom-file-label" for="file_ciptaan">Scan Contoh Karya/Ciptaan . . </label>
                </div>
            </div>
            <div class="modal-footer mb-3">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END CONTOH KARYA MODAL -->

<script>
    $('input[type="file"]').change(function(e){
        var container = $(this).attr('id');
        var fileName = $('#' + container).val().replace('C:\\fakepath\\', "");
        $(this).next('.custom-file-label').html(fileName);
    });
</script>