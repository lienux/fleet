<?php
    if (isset($data_detail)) {
        foreach ($data_detail as $row) {
            $id = $row['id'];
            $name = $row['name'];
            $jk = $row['jk'];
            $no_sim = $row['nomor_sim'];
        }
        $link_do = 'driver/doUpdate/'.$id;
        $btn_value = 'Update';
    }else{
        $name = '';
        $jk = '';
        $no_sim = '';
        $link_do = 'driver/doSimpan';
        $btn_value = 'Simpan';
    }
?>
<?php echo form_open($link_do); ?>
    <div class="card rounded-lg">
        <div class="card-header">Form Data Kendaraan</div>
        <div class="card-body">            
            <div class="form-row">
                <div class="col-lg-12 row">
                    <label class="col-md-2">Nama Pengemudi</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtNama" value="<?=$name;?>" type="text" placeholder="Nama Pengemudi" />
                        </div>
                    </div>                        
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">Jenis Kelamin</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="custom-select" name="txtJK">
                                <option selected>Choose...</option>
                                <option value="0">Laki-laki</option>
                                <option value="1">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">No SIM</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtSIM" value="<?=$no_sim;?>" type="text" placeholder="Nomor SIM" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?php echo base_url();?>driver" class="btn btn-secondary">Batal</a>
            <input class="btn btn-primary" type="submit" value="<?=$btn_value;?>" />
        </div>
    </div>
</form>
