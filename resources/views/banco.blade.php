<!DOCTYPE html>
<html>
<head>
    <title>Bàn cờ</title>
    <style>
        table { border-collapse: collapse; }
        td {
            width: 40px;
            height: 40px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Bàn cờ {{ $n }} x {{ $n }}</h2>
    <a href="/">Về trang chủ</a>

    <table>
        @for ($i = 0; $i < $n; $i++)
            <tr>
                @for ($j = 0; $j < $n; $j++)
                    <td style="background: {{ ($i+$j)%2==0?'#fff':'#000' }}"></td>
                @endfor
            </tr>
        @endfor
    </table>
</body>
</html>