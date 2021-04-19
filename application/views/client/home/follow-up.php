<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-sign-in-alt mt-1"></i>&nbsp;&nbsp; Follow-Up
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('client/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Follow-up List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="20%" class="text-center">Students Name</th>
                <th width="30%" class="text-center">Follow-Up Date</th>
                <th width="10%" class="text-center">Follow-Up Date</th>
                <th width="30%" class="text-center">Notes</th>
                <th width="9%" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($follow as $f) : ?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$f['st_firstname']." ".$f['st_lastname'];?></td>
                <td>
                    <?php
                        if($f['prog_sub'])
                        { 
                            echo $f['prog_sub']." : ".$f['prog_program'];  
                        } else { 
                            echo $f['prog_program']; 
                        }
                    ?>
                </td>
                <td data-sort="<?=$f['flw_date'];?>" class="text-center">
                    <?=date('d F Y', strtotime($f['flw_date']));?>
                </td>
                <td><?=$f['flw_notes'];?></td>
                <td class="text-center">
                    <?php
                        if($f['flw_mark']=="0")
                        { 
                    ?>
                    <button class="btn btn-sm btn-info" data-id="<?=$f['flw_id'];?>" onclick="followMark(this)"
                        title="Not Yet"><i class="fas fa-clock"></i></button>
                    <?php
                        } else {
                    ?>
                    <a class="btn btn-sm btn-success" href="<?=base_url('client/home/follow_unmark/'.$f['flw_id']);?>"
                        title="Not Yet"><i class="fas fa-check"></i></a>
                    <?php
                        }
                    ?>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Mark  -->
<div class="modal fade" id="followUpNotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Follow Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('client/home/follow_mark');?>" method="post">
                    <input type="text" name="flw_id" id="flw_id" hidden>
                    <label>Notes</label>
                    <textarea name="flw_notes"></textarea>
                    <div class="float-right mt-2">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function followMark(mark) {
    let flw_id = mark.getAttribute('data-id')
    $("#followUpNotes").modal("show")
    $("#flw_id").val(flw_id)
}
</script>