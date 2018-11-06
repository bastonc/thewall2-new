@if ($status=='congratulations')
    <?php $color="#55aa55" ?>
@endif
@if ($status=='warn')
    <?php$color="#aa5555" ?>
@endif

     <?php
    $token = $data[0]['token'];
    $urlprogramm="/programm/?p=".$token;
     ?>
<head>
    <meta http-equiv="refresh" content="5;{{$urlprogramm}}">
</head>>


<body text="#f0ffff">
<center>
    <table width="100%" height="100%" border="0">
        <tr>
            <td align="center">
<table width="30%" height="30%">
    <tr>
        <td align="center" bgcolor={{$color}} valign="middle">
            Ваша адреса електронноi пошти направлена до дипломного менеджера.
            <br>
            Очiкуйте диплом на пошту.
            <br>
            Дякуемо за участь
            <br>
            <a href="{{url('/')}}">Повернутись на головну</a>

        </td>
    </tr>

</table>
        </td>
        </tr>
    </table>
</center>
</body>