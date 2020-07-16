<html lang="en" itemscope="" itemtype="http://schema.org/Product" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta name="theme-color" content="#27323E">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> EASY MENU </title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles-mobile.css')}}">
    <!-- <link rel="stylesheet" href="../bonee-gallery.css">   -->
    <link rel="preload" href="styles.css" as="style">
    <link rel="preload" href="ui.js" as="script">

</head>

<body dir="rtl" class="body-mobile" style="overflow-x:hidden">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link href="{{asset('card.css')}}" rel="stylesheet">

<div class="social-box">
    <div class="container">
        <div class="row">

                <div class="col-lg-10 col-xs-12 text-center">
                    <div class="box">
                        <dl>
                            <dt>اسم الباقة</dt>
                            <dd>A large feline inhabiting Bodmin Moor.</dd>

                            <dt>وصف الباقة</dt>
                            <dd>A sea serpent.</dd>

                            <dt>المدة</dt>
                            <dd>A giant owl-like creature.</dd>
                            <dt>السعر</dt>
                            <dd>A giant owl-like creature.</dd>
                        </dl>
<hr>

                        <form role="form" action="" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        <div class="form-group">
                                            <label class="control-label"> هاتف المطعم </label>
                                            <input type="text" name="phone_number" class="form-control"
                                                   placeholder="هاتف المطعم" />
                                            <strong> يجب ان يكون الهاتف بصيغة +96600000000</strong>
                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> إيميل المطعم </label>
                                            <input type="text" name="email" class="form-control"
                                                   placeholder="إيميل المطعم" />
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label"> اكتب كود الإحالة</label>
                                            <input type="text" name=" seller_codes" class="form-control"
                                                   placeholder="اكتب كود الإحالة" />
                                            @if ($errors->has(' seller_code'))
                                                <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('seller_code') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"> اكتب الخصم إن وجد</label>
                                            <input type="text" name="coupons" class="form-control"
                                                   placeholder=" اكتب الخصم إن وجد" />
                                            @if ($errors->has('coupon'))
                                                <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('coupon') }}</strong>
                                            </span>
                                            @endif
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="margiv-top-10">
                                <div class="form-actions">
                                    <button type="submit" class="btn green" value="حفظ"
                                            onclick="this.disabled=true;this.value='تم الارسال, انتظر...';this.form.submit();">حفظ</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>







        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>

</html>
