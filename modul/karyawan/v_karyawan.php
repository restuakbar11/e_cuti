		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Karyawan</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="index.php?page=karyawan_tambah" class="btn btn-success">Tambah</a>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="10%">NPP</th>
											<th width="10%">Nama</th>
											<th width="5%">Telepon</th>
											<th width="10%">Divisi</th>
											<th width="10%">Akses</th>
											<th width="10%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM employee ORDER BY nama_emp ASC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. $data['npp'] .'</td>';
												echo '<td class="text-center">'. $data['nama_emp'] .'</td>';
												echo '<td class="text-center">'. $data['telp_emp'] .'</td>';
												echo '<td class="text-center">'. $data['divisi'] .'</td>';
												echo '<td class="text-center">'. $data['hak_akses'] .'</td>';
												echo '<td class="text-center">
													  <a href="#myModal" data-toggle="modal" data-id="'.$data['npp'].'" data-remote-target="#myModal .modal-body" class="btn btn-primary btn-xs">Detail</a>
													  <a href="index.php?page=karyawan_edit&npp='. $data['npp'] .'" class="btn btn-warning btn-xs">Edit</a>';?>
													  <a href="karyawan_hapus.php?npp=<?php echo $data['npp'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['nama_emp'];?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
												<?php
													  echo '</td>';
												echo '</tr>';												
												$i++;
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
							
			<!-- Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
	<h4 class="modal-title" id="myModalLabel">Detail Karyawan</h4>
</div>
						<div class="modal-body">
							<div class="detail-data"></div>
						</div>
						<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
					</div>
				</div>
			</div>    
		</div><!-- /.panel -->
	</div><!-- /.col-lg-12 -->

	<script type="text/javascript">
		$(document).ready(function(){

        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'fungsi/getKaryawan.php',
                data :  'rowid='+ rowid ,
                success : function(data){
                $('.detail-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });


    });
	</script>
	