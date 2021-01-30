<div class="alert alert-success mt-4 <?php if($this->session->flashdata('alert_true')==''){echo 'collapse';}else{echo '';};?>" role="alert">
    <?php echo $this->session->flashdata('item');?>
</div>

<a href="<?php echo base_url();?>vehicle/tambah" class="btn btn-outline-primary">Tambah</a>
<div class="card mb-4 mt-2">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        List Vehicle
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Flat No</th>
                        <th>Jenis</th>
                        <th>No Mesin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($data_vehicle as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?php echo $row['flat_no'];?></td>
                        <td><?= $row['jenis_kendaraan'];?></td>
                        <td><?= $row['nomor_mesin'];?></td>
                        <td><a href="<?php echo base_url('vehicle/delete/'.$row['id']);?>">Hapus</a></td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Alhamdulillah...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var flashdata_alert = <?php $this->session->flashdata('alert_true');?>
    if (flashdata_alert!='') {
        $('#exampleModal').show();
    }
</script> -->