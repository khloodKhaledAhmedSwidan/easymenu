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

                <div class="col-lg-12 col-xs-6">
                    <div class="box">
<form>
    <div class="form-group">
        <label class="control-label"> اسم الباقة </label>
        <input type="text" name="phone_number" class="form-control"
               value="{{$package->name_ar}}" />

    </div>
    <div class="form-group">
        <label class="control-label"> وصف الباقة </label>
        <input type="text" name="phone_number" class="form-control"
                value="{{$package->description_ar}}" />

    </div>
    <div class="form-group">
        <label class="control-label"> السعر </label>
        <input type="text" name="phone_number" class="form-control"
               value="{{$package->price}}" />

    </div>

    <div class="form-group">
        <label class="control-label"> المدة </label>
        <input type="text" name="phone_number" class="form-control"
               value="{{$package->duration}}" />

    </div>

</form>
                        <form role="form" action="" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">


                                        <form method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label"> اكتب coupon</label>
                                                <input type="text" id="coupon" name="coupons" class="form-control"
                                                       placeholder=" اكتب الخصم إن وجد" />
                                                @if ($errors->has('coupon'))
                                                    <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('coupon') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="form-actions">
                                                <input type="submit" id="checkCoupon" value="حفظ" class="btn btn green">

                                            </div>
                                        </form>




                                    </div>
                                </div>
                            </div>

                        </form>





                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="emailRest" class="col-form-label">ادخل الايميل الخاص بمطعمك </label>
                                                <input type="email" class="form-control" id="emailRest">
                                            </div>
                                            <div class="form-group">
                                                <label for="percentage" class="col-form-label">اكتب الخصم ان وجد</label>
                                                <input type="text" class="form-control" id="percentage">
                                            </div>
                                            <div class="form-group">
                                                <label for="percentage" class="col-form-label">اكتب كود الإحالة</label>
                                                <input type="text" class="form-control" id="percentage">
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="PayByBankChecked" name="PayByBank" checked>
                                                <label class="custom-control-label" for="PayByBank">الدفع عن طريق البنك </label>
                                            </div>


                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button"  class="btn btn-primary">ارسال طلب الاشتراك</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>







        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
$('#checkCoupon').on('click',function () {
    var coupon = $('#coupon').val();
    console.log(coupon);
    $.ajax({
        url:"{{route('check_coupon')}}",
        data:{coupon:coupon},
        type:'POST',
        dataType: 'json',
        success:function (data) {

            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
            })

        }
    });
});
    });




</script>

</body>

</html>
