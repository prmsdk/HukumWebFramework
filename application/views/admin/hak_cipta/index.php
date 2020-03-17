<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Data Hak Cipta</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="zmdi zmdi-home"></i> HakCiptaApp</a></li>
                        <li class="breadcrumb-item active">Hak Cipta</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-6 pt-4">
                                    <h2><strong>Data</strong> Hak Cipta </h2>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#largeModal">TAMBAH DATA</button>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Judul</th>
                                            <th>Nama</th>
                                            <th>Kewarganegaraan</th>
                                            <th>status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Judul</th>
                                            <th>Nama</th>
                                            <th>Kewarganegaraan</th>
                                            <th>status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($hak_cipta as $cipta ) { 
                                    $jenis = $this->db->query("SELECT nama FROM jenis_karya WHERE id = '$cipta->id_jenis'")->row();?>
                                        <tr>
                                            <td style="width: 40px;"><?=$no++?>.</td>
                                            <td><?=$jenis->nama?></td>
                                            <td><?=$cipta->judul?></td>
                                            <td><?=$cipta->nama_pencipta?></td>
                                            <td><?=$cipta->kewarganegaraan?></td>
                                            <td><?=$cipta->status_trs?></td>
                                            <td style="width: 70px;">
                                                <a class="btn btn-primary btn-sm px-2" href="<?=base_url()?>admin/hak_cipta/edit/<?=$cipta->id?>"><i class="zmdi zmdi-edit"></i></a>
                                                <a class="btn btn-danger btn-sm" href="<?=base_url()?>admin/hak_cipta/delete/<?=$cipta->id?>"><i class="zmdi zmdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url('admin/hak_cipta/save')?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Tambah Data</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="id_user">Pilih Calon Pemilik Hak Cipta :</label>
                    <select required id="id_user" name="id_user" class="form-control show-tick" aria-describedby="id_userId">
                        <option>-- Please select --</option>
                        <?php foreach ($user as $u ) { ?>
                        <option value="<?=$u->id?>"><?=$u->nama?></option>
                        <?php }?>
                    </select>
                    <small id="id_userId" class="text-muted">Pilih platform yang anda gunakan pada portfolio.</small>
                </div>

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input required type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul . ." aria-describedby="judulId">
                    <small id="judulId" class="text-muted">Masukkan dengan menggunakan huruf tanpa tanda baca</small>
                </div>

                <div class="form-group">
                    <label for="uraian">Uraian</label>
                    <textarea required name="uraian" id="uraian" class="form-control" placeholder="Masukkan uraian . ." aria-describedby="uraianId"></textarea>
                    <small id="uraianId" class="text-muted">Masukkan uraian karya lebih dari 30 karakter</small>
                </div>

                <hr>

                <div class="form-group">
                    <label for="nama_pencipta">Nama Pencipta</label>
                    <input required type="text" name="nama_pencipta" id="nama_pencipta" class="form-control" placeholder="Masukkan nama_pencipta . ." aria-describedby="nama_penciptaId">
                    <small id="nama_penciptaId" class="text-muted">Masukkan dengan menggunakan huruf tanpa tanda baca</small>
                </div>

                <?php
                    echo $country;
                ?>

                <div class="form-group">
                    <label for="alamat_pencipta">Alamat Pencipta</label>
                    <textarea required name="alamat_pencipta" id="alamat_pencipta" class="form-control" placeholder="Masukkan Alamat Pencipta . ." aria-describedby="alamat_penciptaId"></textarea>
                    <small id="alamat_penciptaId" class="text-muted">Masukkan alamat pencipta lebih dari 30 karakter</small>
                </div>

                <hr>

                <h5 class="font-weight-bolder">Lengkapi Dokumen Diri Anda :</h5>
                <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingOne_1">
                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">Atas Nama Perusahaan </a> </h4>
                        </div>
                        <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                            <div class="panel-body"> 
                                <small>File <strong>Scan NPWP Perusahaan</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="npwp_prs" name="npwp_prs">
                                    <label class="custom-file-label" for="npwp_prs">Scan NPWP Perusahaan</label>
                                </div>

                                <small>File <strong>Scan Akta Perusahaan</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="akta_prs" name="akta_prs">
                                    <label class="custom-file-label" for="akta_prs">Scan Akta Perusahaan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group my-3">
                    <small>File <strong>Scan NPWP</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" name="npwp" id="npwp">
                        <label class="custom-file-label" for="npwp">Scan NPWP Anda</label>
                    </div>
                    <small>File <strong>Scan KTP</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" name="ktp" id="ktp">
                        <label class="custom-file-label" for="ktp">Scan KTP</label>
                    </div>
                </div>

                <hr>

                <h5 class="font-weight-bolder">Lengkapi Persyaratan Pengajuan Hak Cipta Anda :</h5>

                <div class="form-group my-3">
                    <small>File <strong>Scan Surat Kuasa</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" name="surat_kuasa" id="surat_kuasa">
                        <label class="custom-file-label" for="surat_kuasa">Scan Surat Kuasa Anda</label>
                    </div>

                    <small>File <strong>Scan Surat Pernyataan Keaslian</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" name="surat_pernyataan" id="surat_pernyataan">
                        <label class="custom-file-label" for="surat_pernyataan">Scan Surat Pernyataan Keaslian</label>
                    </div>

                    <small>File <strong>Scan Surat Pengalihan Hak</strong> yang diunggah haruslah kurang dari 1 MB, format file (pdf/jpg)</small>
                    <small>Dokumen ini diperlukan jika nama pencipta dan pemegang hak cipta berbeda</small>
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" name="surat_pernyataan" id="surat_pernyataan">
                        <label class="custom-file-label" for="surat_pernyataan">Scan Surat Pengalihan Hak Anda</label>
                    </div>

                    <div class="form-group">
                        <label for="jenis_karya">Pilih Jenis Karya :</label>
                        <select required id="jenis_karya" name="id_jenis" class="form-control show-tick" aria-describedby="jenis_karyaId">
                            <option value="">-- Please select --</option>
                            <?php foreach ($jenis_karya as $karya ) { ?>
                            <option value="<?=$karya->id?>"><?=$karya->nama?></option>
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

                    <small>File <strong>Scan Contoh Karya/Ciptaan</strong> yang diunggah haruslah kurang dari 20 MB, format file (pdf/jpg)</small>
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" name="file_ciptaan" id="file_ciptaan">
                        <label class="custom-file-label" for="file_ciptaan">Scan Contoh Karya/Ciptaan</label>
                    </div>
                </div>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-success">
                        <input type="radio" name="status_trs" id="status_trs_ya" value="DISETUJUI">
                        Telah Disetujui
                    </label>
                    <label class="btn btn-danger active">
                        <input type="radio" name="status_trs" id="status_trs_tidak" value="DALAM PROSES" checked>
                        Belum Disetujui
                    </label>
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

<script>
    $('input[type="file"]').change(function(e){
        var container = $(this).attr('id');
        var fileName = $('#' + container).val().replace('C:\\fakepath\\', "");
        $(this).next('.custom-file-label').html(fileName);
    });
</script>