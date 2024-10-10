<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add New</title>
</head>

<body>
    <div class="add m-3">
        <a href="/index" class="btn btn-primary">Back</a>
    </div>
    <div class="row g-1">
        <div class="card col-lg-5 mt-2">
            <div class="form-section mx-3 my-2">
                <form action="{{ route('addnew.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation row g-3" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <input type="date" name="date" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <select id="type" name="type" class="form-select">
                            <option value="">New/Renew</option>
                            <option value="new">New</option>
                            <option value="renew">Renew</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" name="company" placeholder="Company Name">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="gst" placeholder="GST Number">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="contact" placeholder="Contact Person">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="contactno" placeholder="Contact Number">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="email" placeholder="Contact Email" required>
                    </div>
                    <div class="col-md-3">
                        <select name="type1" class="form-select">
                            <option value="">Self/Tally</option>
                            <option value="self">Self</option>
                            <option value="tally">Tally</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="totalamount" placeholder="Total Amount">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="receivedamount"
                                placeholder="Received Amount">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="payment" class="form-select">
                            <option value="">Payment Mode</option>
                            <option>Onlion</option>
                            <option>Cash</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="bdmname" placeholder="BDM Name">
                    </div>
                    <div class="col-12">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="remark" placeholder="Remark">
                        </div>
                    </div>
                    <div class="image col-md-6">
                        <input type="file" name="image[]" class="form-control" multiple>
                    </div>
            </div>
        </div>

        <div class="card col-lg-6 ms-2 mt-2 p-3">
            <div class="row">
                <div class="col-3">
                    <h5>Product</h5>
                </div>
                <div class="col-3">
                    <h5>Validity</h5>
                </div>
                <div class="col-3">
                    <h5>Total Amount</h5>
                </div>
                <div class="col-3">
                    <h5>Balance Amount</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox1" name="products[0][name]" value="Local Keyword SEO"
                            class="toggle-fields"> Local Keyword SEO
                    </label>
                </div>
                <div id="fields1" class="fields col-9" style="display: none;">
                    <select name="products[0][validity]">
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[0][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[0][balance_amount]" placeholder="balance_amount">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-3">
                    <label>
                        <input type="checkbox" id="checkbox2" name="products[1][name]" value="Virtual Tour"
                            class="toggle-fields"> Virtual Tour
                    </label>
                </div>
                <div id="fields2" class="fields col-9" style="display: none;">
                    <select name="products[1][validity]">
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[1][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[1][balance_amount]" placeholder="balance_amount">
                </div>
            </div>
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[2][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[2][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[3][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[3][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[4][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[4][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[5][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[5][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[6][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[6][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[7][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[7][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[8][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[8][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[9][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[9][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[10][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[10][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[11][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[11][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[12][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[12][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[13][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[13][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[14][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[14][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[15][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[15][balance_amount]" placeholder="balance_amount">
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
                        <option value="">Select Validity</option>
                        <option value="1 Month">1 Month</option>
                        <option value="3 Months">3 Months</option>
                        <option value="4 Months">4 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <input type="text" name="products[16][total_amount]" placeholder="total_amount">
                    <input type="text" name="products[16][balance_amount]" placeholder="balance_amount">
                </div>
            </div>
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

    {{-- <script>
        $(document).ready(function() {
            $('.toggle-fields').change(function() {
                if (this.checked) {
                    $('#fields' + this.id.slice(-1)).show();
                } else {
                    $('#fields' + this.id.slice(-1)).hide();
                }
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('.toggle-fields').change(function() {
                var checkboxId = this.id.replace('checkbox', '');
                $('#fields' + checkboxId).toggle(this.checked);
            });
        });
    </script>
</body>

</html>
