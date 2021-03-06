<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-5 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-tags mt-1"></i>&nbsp;&nbsp; Corporate
                </div>
            </nav>
        </div>
        <div class="col-md-7 ">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <ol class="breadcrumb bg-white shadow border">
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/home');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('bizdev/corporate/');?>">Corporate</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>

<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card shadow card-sticky">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/img/corporate.png');?>" alt="client management" width="50%">
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <h5>Corporate Profile</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <h6><i class="icofont-building-alt"></i>&nbsp; Corporate
                        <div class="float-right">
                            <a href="<?=base_url('bizdev/corporate/');?>" class="btn btn-sm btn-info"><i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </h6>
                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Corporate Name <i class="text-danger font-weight-bold">*</i>
                                </label>
                                <input name="corp_name" type="text" class="form-control form-control-sm"
                                    placeholder="Corporate Name">
                                <?=form_error('corp_name', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Industry
                                </label>
                                <input name="corp_industry" type="text" class="form-control form-control-sm"
                                    placeholder="Corporate Industry">
                                <?=form_error('corp_industry', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Corporate Mail
                                </label>
                                <input name="corp_mail" type="text" class="form-control form-control-sm"
                                    placeholder="Corporate Mail">
                                <?=form_error('corp_mail', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Office Number
                                </label>
                                <input name="corp_phone" type="text" class="form-control form-control-sm"
                                    placeholder="Office Number">
                                <?=form_error('corp_phone', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram
                                </label>
                                <input name="corp_insta" type="text" class="form-control form-control-sm"
                                    placeholder="@username">
                                <?=form_error('corp_insta', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Website
                                </label>
                                <input name="corp_site" type="text" class="form-control form-control-sm"
                                    placeholder="Website">
                                <?=form_error('corp_site', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label>Approach Status
                                </label>
                                <select name="approachStatus" id="approachStatus">
                                    <option data-placeholder="true"></option>
                                    <option value="Approach">Approach</option>
                                    <option value="Not Yet">Not Yet</option>
                                </select>
                                <?=form_error('approachStatus', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div> -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Region
                                </label>
                                <input name="corp_region" type="text" class="form-control form-control-sm"
                                    placeholder="Region">
                                <?=form_error('corp_region', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address
                                </label>
                                <textarea name="corp_address" class="form-control form-control-sm" placeholder="Address"
                                    rows="4"></textarea>
                                <?=form_error('corp_address', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                    </div>

                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Corporate PIC</label>
                            <button class="float-right btn btn-warning add_more_button"><i
                                    class="fas fa-plus-square"></i>&nbsp; Add PIC</button>
                        </div>
                        <div class="container mt-3" id="pic">
                            <div class="row p-0">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Full Name</small>
                                        <input type="text" name="corpdetail_fullname[]"
                                            class="form-control form-control-sm" placeholder="Name" rows="4">
                                        <?=form_error('corpdetail_fullname[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>E-mail</small>
                                        <input type="text" name="corpdetail_mail[]" class="form-control form-control-sm"
                                            placeholder="E-mail" rows="4">
                                        <?=form_error('corpdetail_mail[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Linkedin</small>
                                        <input type="text" name="corpdetail_linkedin[]"
                                            class="form-control form-control-sm" placeholder="Linkedin" rows="4">
                                        <?=form_error('corpdetail_linkedin[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <small>Phone Number</small>
                                        <input type="text" name="corpdetail_phone[]"
                                            class="form-control form-control-sm" placeholder="Phone Number" rows="4">
                                        <?=form_error('corpdetail_phone[]', '<small class="text-danger">', '</small>');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>&nbsp;
                            Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
<script>
// new SlimSelect({
//     select: '#approachStatus',
//     placeholder: 'Select approach status',
//     allowDeselect: true,
//     deselectLabel: '<span class="text-danger">✖</span>'
// });

$(document).ready(function() {
    var max_fields_limit = 5; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(
        e) { //click event on add more fields button having class add_more_button
        e.preventDefault();
        if (x < max_fields_limit) { //check conditions
            x++; //counter increment
            $('#pic').append(
                '<div class="row">' +
                '<div class="line" style="margin-top:15px; margin-bottom:35px; width:"50%; "></div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Full Name</small>' +
                ' <input type="text" name="corpdetail_fullname[]" class="form-control form-control-sm" placeholder="Name" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>E-mail</small>' +
                '<input type="text" name="corpdetail_mail[]" class="form-control form-control-sm" placeholder="E-mail" rows="4">' +
                '</div>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Linkedin</small>' +
                '<input type="text" name="corpdetail_linkedin[]" class="form-control form-control-sm" placeholder="Linkedin" rows="4">' +
                '</div>' +
                '</div>' +

                ' <div class="col-md-3">' +
                '<div class="form-group">' +
                '<small>Phone Number</small>' +
                '<input type="text" name="corpdetail_phone[]" class="form-control form-control-sm" placeholder="Phone Number" rows="4">' +
                '</div>' +
                '</div>' +

                '<button style="position:absolute; right:20px; margin-top:23px;" class="btn btn-sm btn-danger remove_field float-right"><i class="fas fa-times-circle"></i>&nbsp; Remove</button>' +

                '</div>'
            ); //add input field
        }
    });
    $('#pic').on("click", ".remove_field", function(
        e) { //user click on remove text links
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>