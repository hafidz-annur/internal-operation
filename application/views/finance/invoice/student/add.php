<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Add Invoice
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('finance/invoice/student/');?>"> Students
                            Program</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Invoice</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="row">
    <div class="col-md-3">
        <div class="card shadow mb-3">
            <div class="card-body text-center">
                <img src="https://image.freepik.com/free-vector/man-with-headphones-microphone-with-computer_113065-136.jpg"
                    alt="client management" width="70%">
                <h5>Stella</h5>
                <h6>Program Name</h6>
            </div>
        </div>
        <div class="card shadow card-sticky mb-3">
            <div class="card-body">
                <div class="form-group text-center">
                    <label>Current USD
                    </label>
                    <?php
                        $data = file_get_contents("https://kurs.web.id/api/v1/bi");
                        $json = json_decode($data, TRUE);
                        $rupiah = $json['jual'];
                    ?>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Rp.</span>
                        </div>
                        <input type="text" class="form-control" id="currentUSD" aria-describedby="basic-addon3"
                            value="<?=round($rupiah);?>">
                    </div>
                </div>
                <a href="https://www.bi.go.id/id/moneter/informasi-kurs/transaksi-bi/Default.aspx"
                    class="btn btn-sm btn-primary btn-block" target="_blank"><i class="fas fa-search"></i>&nbsp; Check
                    BI (Bank
                    Indonesia)</a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fas fa-dollar-sign"></i>&nbsp; &nbsp; Add Invoice </h6>
                <div class="text-right" style="margin-top:-30px;">
                    <select id="category" onChange="cFunction();">
                        <option value="usd">USD</option>
                        <option value="idr">IDR</option>
                        <option value="session">Session</option>
                    </select>
                </div>
                <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                <!-- With USD -->
                <div id="usd">
                    <form action="" method="post" name="usd">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Price</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input id="pcDollar" name="pcDollar" type="number"
                                                    class="form-control form-control-sm">
                                                <?=form_error('pcDollar', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input id="pcRupiah" name="pcRupiah" type="number"
                                                    class="form-control form-control-sm" readonly>
                                                <?=form_error('pcRupiah', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Early Bird</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input id="ebDollar" name="ebDollar" type="number"
                                                    class="form-control form-control-sm">
                                                <?=form_error('ebDollar', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input id="ebRupiah" name="ebRupiah" type="number"
                                                    class="form-control form-control-sm" readonly>
                                                <?=form_error('ebRupiah', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <label>Discount
                                </label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input id="dsDollar" name="dsDollar" type="number"
                                                    class="form-control form-control-sm">
                                                <?=form_error('dsDollar', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input id="dsRupiah" name="dsRupiah" type="number"
                                                    class="form-control form-control-sm" readonly>
                                                <?=form_error('dsRupiah', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Total Price</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input id="tpDollar" name="tpDollar" type="number"
                                                    class="form-control form-control-sm" readonly>
                                                <?=form_error('tpDollar', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input id="tpRupiah" name="tpRupiah" type="number"
                                                    class="form-control form-control-sm" readonly>
                                                <?=form_error('tpRupiah', '<small class="text-danger">', '</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <textarea id="tpWords1" name="tpWords" class="form-control form-control-sm"
                                        rows="1"></textarea>
                                    <?=form_error('tpWords', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <select id="paymentMethod" name="paymentMethod" onChange="paymentMethods();">
                                        <option data-placeholder="true"></option>
                                        <option value="Full Payment">Full Payment</option>
                                        <option value="Installment">Installment</option>
                                    </select>
                                    <?=form_error('paymentMethod', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input name="date" type="date" class="form-control form-control-sm">
                                    <?=form_error('date', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input id="dueDate" name="dueDate" type="date" class="form-control form-control-sm">
                                    <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="notes" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Terms and Condition</label>
                                    <textarea name="tnc" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row" id="steps">
                            <div class="col-md-12">
                                <button class="float-right btn btn-warning add_more_button"><i
                                        class="fas fa-plus-square"></i>&nbsp; Add Installment</button>
                            </div>
                            <div class="container mt-3" id="teacher">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <small>Status Name</small>
                                            <input type="text" name="statusName[]" class="form-control form-control-sm"
                                                value="Installment 1" readonly>
                                            <?=form_error('statusName[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <small>Due Date</small>
                                            <input type="date" name="dueDate[]" class="form-control form-control-sm">
                                            <?=form_error('dueDate[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <small>Percent</small>
                                            <input id="percent1" type="number" name="percent[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('percent[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <small>Amount ($)</small>
                                            <input id="amountDollar1" type="number" name="amountDollar[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('amountDollar[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <small>Amount (Rp)</small>
                                            <input id="amountRupiah1" type="number" name="amountRupiah[]"
                                                class="form-control form-control-sm">
                                            <?=form_error('amountRupiah[]', '<small class="text-danger">', '</small>');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End USD  -->

                <!-- With IDR -->
                <div id="idr">
                    <form action="" method="post" name="idr">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="pcRupiah1" name="pcRupiah" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('pcRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="dsRupiah1" name="dsRupiah" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('dsRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Price (Rp)</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="tpRupiah1" name="tpRupiah" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('tpRupiah', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <textarea id="tpWords2" name="tpWords" class="form-control form-control-sm"
                                        rows="1"></textarea>
                                    <?=form_error('tpWords', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input name="date" type="date" class="form-control form-control-sm">
                                    <?=form_error('date', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input name="dueDate" type="date" class="form-control form-control-sm">
                                    <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="notes" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Terms and Condition</label>
                                    <textarea name="tnc" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End IDR  -->

                <!-- With session -->
                <div id="session">
                    <form action="" method="post" name="idr">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Price/<small>Hours</small></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="priceHours" name="priceHours" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('priceHours', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Session</label>
                                    <div class="input-group input-group-sm">
                                        <input id="amount" name="session" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('session', '<small class="text-danger">', '</small>');?>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Duration/<small>Minute</small></label>
                                    <div class="input-group input-group-sm">
                                        <input id="duration" name="duration" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('duration', '<small class="text-danger">', '</small>');?>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-quote-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="Discount">
                                    <label>Discount</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="discount" name="discount" type="number"
                                            class="form-control form-control-sm">
                                        <?=form_error('discount', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input id="totalPrice" name="totalPrice" type="number"
                                            class="form-control form-control-sm" readonly>
                                        <?=form_error('totalPrice', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <textarea id="tpWords3" name="tpWords" class="form-control form-control-sm"
                                        rows="1"></textarea>
                                    <?=form_error('tpWords', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input name="date" type="date" class="form-control form-control-sm">
                                    <?=form_error('date', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input name="dueDate" type="date" class="form-control form-control-sm">
                                    <?=form_error('dueDate', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="notes" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('notes', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Terms and Condition</label>
                                    <textarea name="tnc" class="form-control form-control-sm" rows="6"></textarea>
                                    <?=form_error('tnc', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End session  -->
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script src="<?=base_url('assets/js/generate-number.js');?>"></script>
<script>
$('#usd').show();
$('#steps').hide();
$('#idr').hide();
$('#session').hide();

function cFunction() {
    let cat = $('#category').val();
    if (cat == "usd") {
        $('#usd').show();
        $('#idr').hide();
        $('#session').hide();
    } else if (cat == "idr") {
        $('#idr').show();
        $('#usd').hide();
        $('#session').hide();
    } else if (cat == "session") {
        $('#session').show();
        $('#usd').hide();
        $('#idr').hide();
    }
}

new SlimSelect({
    select: '#paymentMethod',
    placeholder: 'Select payment method ',
    allowDeselect: true,
    deselectLabel: '<span class="text-danger">✖</span>'
});


$('#currentUSD').keyup(function() {
    let USD = $('#currentUSD').val();
    let pc = $('#pcDollar').val();
    let eb = $('#ebDollar').val();
    let ds = $('#dsDollar').val();
    let tp = $('#tpDollar').val();
    let pcTot = USD * pc;
    let tpRupiah = USD * tpDollar;
    let ebTot = USD * eb;
    let dsTot = USD * ds;
    let tpTot = USD * tp;


    $('#pcRupiah').val(pcTot);
    $('#ebRupiah').val(ebTot);
    $('#dsRupiah').val(dsTot);
    $('#tpRupiah').val(tpTot);

    $('#tpWords1').text(capitalize(tpTot));

});

$('#pcDollar').keyup(function() {
    let USD = $('#currentUSD').val();
    let eb = $('#ebDollar').val();
    let ds = $('#dsDollar').val();
    let pc = $('#pcDollar').val();
    let pcTot = USD * pc;
    let tpDollar = pc - ds - eb;
    let tpRupiah = USD * tpDollar;

    $('#pcRupiah').val(pcTot);
    $('#tpDollar').val(tpDollar);
    $('#tpRupiah').val(tpRupiah);

    $('#tpWords1').text(capitalize(tpRupiah));
});

$('#ebDollar').keyup(function() {
    let USD = $('#currentUSD').val();
    let eb = $('#ebDollar').val();
    let ds = $('#dsDollar').val();
    let pc = $('#pcDollar').val();
    let ebTot = USD * eb;
    $('#ebRupiah').val(ebTot);

    let tpDollar = pc - ds - eb;
    let tpRupiah = USD * tpDollar;

    $('#tpDollar').val(tpDollar);
    $('#tpRupiah').val(tpRupiah);

    $('#tpWords1').text(capitalize(tpRupiah));
});

$('#dsDollar').keyup(function() {
    let USD = $('#currentUSD').val();
    let ds = $('#dsDollar').val();
    let eb = $('#ebDollar').val();
    let pc = $('#pcDollar').val();
    let dsTot = USD * ds;
    $('#dsRupiah').val(dsTot);

    let tpDollar = pc - ds - eb;
    let tpRupiah = USD * tpDollar;

    $('#tpDollar').val(tpDollar);
    $('#tpRupiah').val(tpRupiah);

    $('#tpWords1').text(capitalize(tpRupiah));
});

function paymentMethods() {
    let pm = $('#paymentMethod').val();
    if (pm == "Full Payment") {
        $('#steps').hide();
        $('#dueDate').prop("disabled", false);;
    } else {
        $('#steps').show();
        $('#dueDate').prop("disabled", true);;
    }
}

$('#percent1').keyup(function() {
    let USD = $('#currentUSD').val();
    let tpDollar = $('#tpDollar').val();
    let tpRupiah = $('#tpRupiah').val();
    let percent = $('#percent1').val();
    let amountDollar = (percent / 100) * tpDollar;
    let amountRupiah = amountDollar * USD;
    $('#amountDollar1').val(amountDollar.toFixed(1));
    $('#amountRupiah1').val(Math.round(amountRupiah));
});

$('#amountDollar1').keyup(function() {
    let USD = $('#currentUSD').val();
    let tpDollar = parseInt($('#tpDollar').val());
    let tpRupiah = $('#tpRupiah').val();
    let amountDollar = $('#amountDollar1').val();

    if ($(this).val() > tpDollar) {
        $(this).val(tpDollar);
    }

    let percent = (amountDollar / tpDollar) * 100;
    let amountRupiah = amountDollar * USD;
    $('#percent1').val(percent.toFixed(1));
    $('#amountRupiah1').val(Math
        .round(amountRupiah));
});


$(document).ready(function() {
    var max_fields_limit = 8; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    var sum = 0;
    $('.add_more_button').click(function(
        e) { //click event on add more fields button having class add_more_button
        e.preventDefault();
        if (x < max_fields_limit) { //check conditions
            x++; //counter increment
            $('#teacher').append(
                '<div class="row">' +
                '<div class="line" style="margin-top:15px; margin-bottom:35px; width:"50%; "></div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Status Name</small>' +
                ' <input type="text" name="statusName[]" class="form-control form-control-sm" value="Installment ' +
                x + '" readonly>' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Due Date</small>' +
                '<input type="date" name="dueDate[]" class="form-control form-control-sm" >' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Percent</small>' +
                '<input id="percent' + x +
                '" type="number" name="percent[]" class="form-control form-control-sm">' +
                '</div>' +
                '</div>' +

                ' <div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Amount ($)</small>' +
                '<input id="amountDollar' + x +
                '" type="number" name="1[]" class="form-control form-control-sm">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2">' +
                '<div class="form-group">' +
                '<small>Amount (Rp)</small>' +
                '<input id="amountRupiah' + x +
                '" type="number" name="amountRupiah[]" class="form-control form-control-sm">' +
                '</div>' +
                '</div>' +

                '<button style="position:absolute; left:20px; margin-top:22px;" class="btn btn-sm btn-danger remove_field float-right"><i class="fas fa-times-circle"></i></button>' +

                '</div>'
            ); //add input field

            $('#percent' + x).keyup(function() {
                let USD = $('#currentUSD').val();
                let tpDollar = $('#tpDollar').val();
                let tpRupiah = $('#tpRupiah').val();
                let percent = $('#percent' + x).val();
                let amountDollar = (percent / 100) * tpDollar;
                let amountRupiah = amountDollar * USD;
                $('#amountDollar' + x).val(amountDollar.toFixed(1));
                $('#amountRupiah' + x).val(Math.round(amountRupiah));
            });

            $('#amountDollar' + x).keyup(function() {
                let USD = $('#currentUSD').val();
                let tpDollar = $('#tpDollar').val();
                let tpRupiah = $('#tpRupiah').val();
                let amountDollar1 = $('#amountDollar1').val();
                let amountDollar = $('#amountDollar' + x).val();
                let percent = (amountDollar / tpDollar) * 100;
                let amountRupiah = amountDollar * USD;
                $('#percent' + x).val(percent.toFixed(1));
                $('#amountRupiah' + x).val(Math.round(amountRupiah));
            });

        }


    });
    $('#teacher').on("click", ".remove_field", function(
        e) { //user click on remove text links
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});

$('#pcRupiah1').keyup(function() {
    let pcRupiah = $('#pcRupiah1').val();
    let dsRupiah = $('#dsRupiah1').val();
    let tpRupiah = pcRupiah - dsRupiah;
    $('#tpRupiah1').val(tpRupiah);
    $('#tpWords2').text(capitalize(tpRupiah));
});

$('#dsRupiah1').keyup(function() {
    let pcRupiah = $('#pcRupiah1').val();
    let dsRupiah = $('#dsRupiah1').val();
    let tpRupiah = pcRupiah - dsRupiah;
    $('#tpRupiah1').val(tpRupiah);
    $('#tpWords2').text(capitalize(tpRupiah));
});

$('#duration').keyup(function() {
    let ph = $('#priceHours').val();
    let ss = $('#amount').val();
    let dr = $('#duration').val();
    let ds = $('#discount').val();

    let tpRupiah = (ph * ss) * (dr / 60) - ds;
    $('#totalPrice').val(tpRupiah);
    $('#tpWords3').text(capitalize(tpRupiah));
});

$('#discount').keyup(function() {
    let ph = $('#priceHours').val();
    let ss = $('#amount').val();
    let dr = $('#duration').val();
    let ds = $('#discount').val();

    let tpRupiah = (ph * ss) * (dr / 60) - ds;
    $('#totalPrice').val(tpRupiah);
    $('#tpWords3').text(capitalize(tpRupiah));
});
</script>