<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ONTICK | Download Ticket</title>

    <style>
        * {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body>
    <div style="text-align: center; margin-bottom: 25px;">
        <h1 style="margin-bottom: 50px;">{{ $event->title }}</h1>
        <img style="width: 350px;" src="{{ asset("storage/$event->image") }}" alt="">
    </div>

    <div style="margin-left: 170px;">
        <table>
            <tr style="height: 30px">
                <td> Lokasi </td>
                <td> : </td>
                <td> {{ $event->location }} </td>
            </tr>
            <tr style="height: 30px">
                <td> Tanggal </td>
                <td> : </td>
                <td> {{ $event->datetime }} </td>
            </tr>
            <tr style="height: 30px">
                <td> Jumlah Tiket </td>
                <td> : </td>
                <td> {{ $ticket->quantity }} </td>
            </tr>
            <tr style="height: 30px">
                <td> Total Harga </td>
                <td> : </td>
                <td> Rp{{ $ticket->price }} </td>
            </tr>
            <tr style="height: 30px">
                <td> Metode Pembayaran </td>
                <td> : </td>
                <td> {{ $ticket->payment_method }} </td>
            </tr>
            <tr style="height: 30px">
                <td> Status </td>
                <td> : </td>
                <td> Lunas </td>
            </tr>
        </table>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p style="text-align: center">ONTICK TIKETING APPS</p>
</body>

</html>
