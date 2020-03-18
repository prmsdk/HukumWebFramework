<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Data Jenis Karya</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="zmdi zmdi-home"></i> HakCiptaApp</a></li>
                        <li class="breadcrumb-item active">Jenis Karya</li>
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
                                    <h2><strong>Data</strong> Jenis Karya </h2>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#largeModal">TAMBAH DATA</button>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->session->flashdata('pesan');?>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($jenis_karya as $karya ) { ?>
                                        <tr>
                                            <td style="width: 40px;"><?=$no++?>.</td>
                                            <td><?=$karya->nama?></td>
                                            <td><?=$karya->keterangan?></td>
                                            <td style="width: 70px;">
                                                <a class="btn btn-primary btn-sm px-2" href="<?=base_url()?>admin/jenis_karya/edit/<?=$karya->id?>"><i class="zmdi zmdi-edit"></i></a>
                                                <a onclick="return confirm('Apakah anda yakin untuk menghapus data ini (<?=$karya->nama?>)?');" class="btn btn-danger btn-sm" href="<?=base_url()?>admin/jenis_karya/delete/<?=$karya->id?>"><i class="zmdi zmdi-delete"></i></a>
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
            <form action="<?=base_url('admin/jenis_karya/save')?>" method="post">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Tambah Data</h4>
            </div>
            <div class="modal-body"> 
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama . ." aria-describedby="namaId">
                    <small id="namaId" class="text-muted">Masukkan dengan menggunakan huruf tanpa tanda baca</small>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan . ." aria-describedby="keteranganId"></textarea>
                    <small id="keteranganId" class="text-muted">Masukkan keterangan jenis karya lebih dari 30 karakter</small>
                </div>

                <div class="form-group">
                    <label for="contoh_file">Contoh File</label>
                    <textarea name="contoh_file" id="contoh_file" class="form-control" placeholder="Masukkan Contoh File . ." aria-describedby="contoh_fileId"></textarea>
                    <small id="contoh_fileId" class="text-muted">Masukkan keterangan mengenai contoh file apa saja yang dapat menjadi acuan lebih dari 30 karakter</small>
                </div>

                <div class="form-group">
                    <label for="format_file">Format File</label>
                    <textarea name="format_file" id="format_file" class="form-control" placeholder="Masukkan format_file . ." aria-describedby="format_fileId"></textarea>
                    <small id="format_fileId" class="text-muted">Masukkan Keterangan mengenai format file yang harus diupload lebih dari 30 karakter</small>
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