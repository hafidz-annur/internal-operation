<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Receipt List
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Receipt List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <table id="myTable" class="display table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead class="text-center">
            <tr>
                <th width="1%">No</th>
                <th width="10%" class="bg-primary text-white">Receipt ID</th>
                <th width="5%">Invoice ID</th>
                <th width="5%">Students Name</th>
                <th width="5%">Program</th>
                <th width="5%">Payment Method</th>
                <th width="5%">Amount</th>
                <th width="5%">Total Price</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php $i=1; foreach($receipt as $r) : ?>
            <tr>
                <td><?=$i;?></td>
                <td style="cursor:pointer"
                    onclick="window.location='<?=base_url('finance/receipt/student/view/'.$r['receipt_num']);?>'">
                    <?=$r['receipt_id'];?>
                </td>
                <td><?=$r['inv_id'];?></td>
                <td class="text-left"><?=$r['st_firstname'].' '.$r['st_lastname'];?></td>
                <td class="text-left"><?=$r['prog_program'];?></td>
                <td><?=$r['receipt_mtd'];?></td>
                <td class="text-right">Rp. <?=number_format($r['receipt_amount']);?></td>
                <td class="text-right">Rp. <?=number_format($r['inv_totpridr']);?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>