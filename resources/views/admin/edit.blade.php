<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit</title>
</head>

<body>
    <div class="add m-3">
        <a href="/index" class="btn btn-primary">Back</a>
    </div>
    <div class="row g-1">
        <div class="card col-lg-5 mt-2">
            <div class="form-section mx-3 my-2">
                <form action="{{ url('entry/' . $entries->id) }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation row g-3" novalidate>
                    @method('PATCH')
                    @csrf
                    <div class="col-md-6">
                        <input type="date" name="date" value="{{ $entries->date }}" class="form-control"
                            id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <select id="type" name="type" class="form-select">
                            <option value="">New/Renew</option>
                            <option value="new" {{ $entries->type == 'new' ? 'selected' : '' }}>New</option>
                            <option value="renew" {{ $entries->type == 'renew' ? 'selected' : '' }}>Renew</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" name="company" value="{{ $entries->company }}"
                            placeholder="Company Name">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" name="address" value="{{ $entries->address }}"
                            placeholder="Address">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="gst" value="{{ $entries->gst }}"
                            placeholder="GST Number">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="contact" value="{{ $entries->contact }}"
                            placeholder="Contact Person">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="contactno" value="{{ $entries->contactno }}"
                            placeholder="Contact Number">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="email" value="{{ $entries->email }}"
                            placeholder="Contact Email">
                    </div>
                    <div class="col-md-3">
                        <select name="type1" class="form-select">
                            <option value="">Self/Tally</option>
                            <option value="self" {{ $entries->type1 == 'self' ? 'selected' : '' }}>Self</option>
                            <option value="tally" {{ $entries->type1 == 'tally' ? 'selected' : '' }}>Tally</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="totalamount" value="{{ $totalAmount }}"
                                placeholder="Total Amount" readonly>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="receivedamount"
                                value="{{ $totalPayment }}" placeholder="Received Amount" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="payment" class="form-select">
                            <option value="">Payment Mode</option>
                            <option value="Onlion" {{ $entries->payment == 'Onlion' ? 'selected' : '' }}>Onlion
                            </option>
                            <option value="Cash" {{ $entries->payment == 'Cash' ? 'selected' : '' }}>Cash</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="bdmname" value="{{ $entries->bdmname }}"
                            placeholder="BDM Name">
                    </div>
                    <div class="col-12">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="remark"
                                value="{{ $entries->remark }}" placeholder="Remark">
                        </div>
                    </div>
                    <div class="image col-md-6">
                        <input type="file" name="image[]" class="form-control" multiple>
                    </div>
            </div>
        </div>
        <?php
        $all_products = ['Local Keyword SEO', 'Virtual Tour', 'Google Business Profile Management', 'Zonal Keyword SEO', 'Google Ads', 'Google Ads Recharge', 'Meta Ads Management', 'Facebook Ads Recharge', 'Social Media Management', 'Website Design', 'Custom Development', 'Website Amc', 'Product Photography', 'Domain', 'Hosting', 'QR Code', 'Web SEO', 'Others'];
        ?>
        <div class="card col-lg-6 ms-2 mt-2 p-3">
            <div class="row">
                <div class="col-3">
                    <h5>Product</h5>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-3">
                            <h5>Validity</h5>
                        </div>
                        <div class="col-3">
                            <h5>Total Amount</h5>
                        </div>
                        <div class="col-3">
                            <h5>Paid Amount</h5>
                        </div>
                        <div class="col-3">
                            <h5>New Amount</h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $count = 0;
            $selected_products = array();
            foreach($products as $product_db){
                $selected_products[] = $product_db->product_name;
            }
            foreach($all_products as $product){
                $checkbox_id = $count+1;
                $selected = false;
                $tot_amt = 0;
                $paid_amt = 0;
                $bal_amt = 0;
                $validity = '';
                foreach($products as $product_db){
                    if($product_db->product_name == $product){
                        $validity = $product_db->validity;
                        $selected = true;
                        $tot_amt = $product_db->total_amount;
                        $paid_amt = $product_db->paid_amount;
                        $bal_amt = $product_db->balance_amount;
                        break;
                    }
                }
            ?>
            <div class="row <?= $count > 0 ? 'mt-1' : '' ?>">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox<?= $checkbox_id ?>"
                            name="products[{{ $count }}][name]" value="{{ $product }}"
                            class="toggle-fields" <?= $selected ? 'checked' : '' ?>> {{ $product }}
                    </label>
                </div>
                <div id="fields<?= $checkbox_id ?>" class="fields col-9" style="display: none;">
                    <div class="row">
                        <select name="products[{{ $count }}][validity]" class="col-3">
                            <option selected>Select Validity</option>
                            <option {{ $validity == '1 Month' ? 'selected' : '' }}>1 Month</option>
                            <option {{ $validity == '3 Months' ? 'selected' : '' }}>3 Months</option>
                            <option {{ $validity == '4 Months' ? 'selected' : '' }}>4 Months</option>
                            <option {{ $validity == '6 Months' ? 'selected' : '' }}>6 Months</option>
                            <option {{ $validity == '12 Months' ? 'selected' : '' }}>12 Months</option>
                            <option {{ $validity == '24 Months' ? 'selected' : '' }}>24 Months</option>
                            <option {{ $validity == '36 Months' ? 'selected' : '' }}>36 Months</option>
                            <option {{ $validity == 'Lifetime' ? 'selected' : '' }}>Lifetime</option>
                        </select>
                        <input class="col-3" type="text" name="products[{{ $count }}][total_amount]"
                            value="{{ $tot_amt }}" placeholder="total_amount">
                        <input class="col-3" type="text" name="products[{{ $count }}][old_paid_amount]"
                            value="{{ $paid_amt }}" readonly>
                        <input class="col-3" type="text" name="products[{{ $count }}][paid_amount]"
                            value="" placeholder="">
                    </div>
                </div>
            </div>
            <?php
                $count++;
            } ?>
            <?php /*?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?>
            ?>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox3" name="products[2][name]"
                            value="Google Business Profile Management" class="toggle-fields"> Google Business Profile
                        Management
                    </label>
                </div>
                <div id="fields3" class="fields col-9" style="display: none;">
                    <select name="products[2][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[2][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[2][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox4" name="products[3][name]" value="Zonal Keyword SEO"
                            class="toggle-fields"> Zonal Keyword SEO
                    </label>
                </div>
                <div id="fields4" class="fields col-9" style="display: none;">
                    <select name="products[3][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[3][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[3][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox5" name="products[4][name]" value="Google Ads"
                            class="toggle-fields"> Google Ads
                    </label>
                </div>
                <div id="fields5" class="fields col-9" style="display: none;">
                    <select name="products[4][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[4][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[4][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox6" name="products[5][name]" value="Google Ads Recharge"
                            class="toggle-fields"> Google Ads Recharge
                    </label>
                </div>
                <div id="fields6" class="fields col-9" style="display: none;">
                    <select name="products[5][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[5][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[5][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox7" name="products[6][name]" value="Facebook"
                            class="toggle-fields"> Facebook
                    </label>
                </div>
                <div id="fields7" class="fields col-9" style="display: none;">
                    <select name="products[6][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[6][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[6][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox8" name="products[7][name]" value="Facebook Ads Recharge"
                            class="toggle-fields"> Facebook Ads Recharge
                    </label>
                </div>
                <div id="fields8" class="fields col-9" style="display: none;">
                    <select name="products[7][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[7][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[7][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox9" name="products[8][name]" value="Website"
                            class="toggle-fields"> Website
                    </label>
                </div>
                <div id="fields9" class="fields col-9" style="display: none;">
                    <select name="products[8][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[8][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[8][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox10" name="products[9][name]" value="Custom Development"
                            class="toggle-fields"> Custom Development
                    </label>
                </div>
                <div id="fields10" class="fields col-9" style="display: none;">
                    <select name="products[9][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[9][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[9][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox11" name="products[10][name]" value="Website Amc"
                            class="toggle-fields"> Website Amc
                    </label>
                </div>
                <div id="fields11" class="fields col-9" style="display: none;">
                    <select name="products[10][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[10][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[10][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox12" name="products[11][name]" value="Product Photography"
                            class="toggle-fields"> Product Photography
                    </label>
                </div>
                <div id="fields12" class="fields col-9" style="display: none;">
                    <select name="products[11][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[11][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[11][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox13" name="products[12][name]" value="Domain"
                            class="toggle-fields"> Domain
                    </label>
                </div>
                <div id="fields13" class="fields col-9" style="display: none;">
                    <select name="products[12][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[12][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[12][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox14" name="products[13][name]" value="Hosting"
                            class="toggle-fields"> Hosting
                    </label>
                </div>
                <div id="fields14" class="fields col-9" style="display: none;">
                    <select name="products[13][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[13][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[13][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox15" name="products[14][name]" value="QR Code"
                            class="toggle-fields"> QR Code
                    </label>
                </div>
                <div id="fields15" class="fields col-9" style="display: none;">
                    <select name="products[14][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[14][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[14][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox16" name="products[15][name]" value="Web SEO"
                            class="toggle-fields"> Web SEO
                    </label>
                </div>
                <div id="fields16" class="fields col-9" style="display: none;">
                    <select name="products[15][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[15][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[15][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox17" name="products[16][name]" value="Others"
                            class="toggle-fields"> Others
                    </label>
                </div>
                <div id="fields17" class="fields col-9" style="display: none;">
                    <select name="products[16][validity]">
                        <option selected>Select Validity</option>
                        <option>1 Month</option>
                        <option>3 Months</option>
                        <option>4 Months</option>
                        <option>6 Months</option>
                        <option>12 Months</option>
                    </select>
                    <input type="text" name="products[16][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[16][paid_amount]" placeholder="paid_amount">
                </div>
            </div>
            <?php */?>
        </div>
        <div class="col-lg-12">
            <div class="card action-btn text-center">
                <div class="card-body p-2">
                    <button type="reset" class="btn btn-warning waves-effect waves-light">Clear Form</button>
                    <button type="submit" class="btn btn-success m-0">Submit Form</button>
                </div>
            </div>
        </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        $(document).ready(function() {
            $('.toggle-fields').change(function() {
                var checkboxId = this.id.replace('checkbox', '');
                $('#fields' + checkboxId).toggle(this.checked);
            });
            var selected_products_string = '<?= implode(',', $selected_products) ?>';
            var selected_products = selected_products_string.split(",");
            console.log(selected_products);
            $('.toggle-fields').each(function() {
                var checkboxId = this.id.replace('checkbox', '');
                $('#fields' + checkboxId).toggle(this.checked);
            });

        });
    </script>
</body>

</html>
