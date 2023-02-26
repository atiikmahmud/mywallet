<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly Income</title>
    <style>
        h3{
            text-align: center;
            padding: 10 px;
        }
        
        #emp{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #emp td,#emp th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #emp tr:nth-child(even){
            background-color: #EEEEEE;
        }
        #emp th{
            padding-top: 12 px;
            padding-bottom: 12 px;
            text-align: left;
            background-color: #000;
            color: #FFF;
        }
    </style>
</head>
<body>
    <h3>February Month Income Report-2023</h3>
    <table id="emp">
        <thead>
            <tr>
                <th>No. </th>
                <th>Title</th>
                <th>Purpose</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomeList as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ Str::limit($item->title, 20) }}</td>
                <td>{{ $item->categories->name }}</td>
                <td>{{ number_format($item->amount) }} Taka</span></td>
            </tr>                
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>Total Amount</td>
                <td>{{ number_format($incomeListSum) }} Taka</td>
            </tr>
        </tbody>
    </table>    
</body>
</html>