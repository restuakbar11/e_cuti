<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pengajuan Cuti</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

	<div class="row">
		<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Form Pengajuan Cuti</h3></div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3">Mulai Cuti</label>
							<div class="col-sm-4">
								<input type="date" name="mulai" id="mulai" class="form-control" >
								<input type="hidden" name="npp" id="npp" class="form-control" value="<?php echo $sess_admnpp;?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Akhir Cuti</label>
							<div class="col-sm-4">
								<input type="date" name="akhir" id="akhir" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Keterangan</label>
							<div class="col-sm-4">
								<textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" rows="3" ></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Pengganti Tugas</label>
							<div class="col-sm-4">
								<div class="queryPenggantiCuti"></div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button type="button" name="simpan" class="btn btn-success" onclick="javascript:simpan_cuti();">Simpan</button>

					</div>
				</div><!-- /.panel -->
			</form>
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
	tampil_pengganti_cuti();

});

function tampil_pengganti_cuti(){
	$.ajax({
	    type: "POST",
	    url: "fungsi/getPenggantiCuti.php",
	    success: function (result) {
	      $('.queryPenggantiCuti').html(result);
	    }

	});
}

function simpan_cuti(){
	tgl_mulai = document.getElementById('mulai').value;
	tgl_akhir = document.getElementById('akhir').value;
	npp = document.getElementById('npp').value;
	keterangan = document.getElementById('keterangan').value;
	pengganti = document.getElementById('pengganti').value;

	if (tgl_mulai == '') {
		alert('Tanggal Mulai Cuti Mohon diisi terlebih dahulu');
	}else if(tgl_akhir == ''){
		alert('Tanggal Akhir Cuti Mohon diisi terlebih dahulu');
	}else if(keterangan == ''){
		alert('Keterangan Mohon diisi terlebih dahulu');
	}else if(pengganti == ''){
		alert('Pengalihan Tugas Mohon diisi terlebih dahulu');
	}else{
	var checkstr = confirm('Yakin ingin mengajukan cuti?');
    if (checkstr == true) {
      $.ajax({

        type: "POST",
        url: "fungsi/f_pengajuan_cuti.php",
        data: "tgl_mulai=" +tgl_mulai+"&tgl_akhir=" +tgl_akhir+"&npp=" +npp+ "&keterangan=" +keterangan+ "&pengganti= "+pengganti ,
        dataType: "json",
        success: function (data) {
	        alert('r');
        }
      });
        //alert('pancing');
    } else {
      return false;
    }
	}
}
</script>
