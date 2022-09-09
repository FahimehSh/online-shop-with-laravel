<html dir="rtl">
<body>
<p>سلام {{$user->first_name. ' '.$user->last_name}} عزیز</p>
<p>سفارش شما با موفقیت ثبت شد.</p>
<p>مبلغ تراکنش: {{number_format($order->total_price)}} تومان</p>
<p>کد پیگیری تراکنش: {{$order->transaction->tracking_code}}</p>
<p>از خرید شما متشکریم.</p>
<p>فروشگاه آنلاین</p>
</body>
</html>
