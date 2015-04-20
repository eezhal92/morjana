<html>
<head>
    <style>
        #hor-minimalist-b
        {
            font-size: 12px;
            margin: 45px;
            border-collapse: collapse;
            text-align: left;
        }
        #hor-minimalist-b th
        {
            font-size: 14px;
            font-weight: normal;
            color: #000;
            padding: 10px 8px;
            background: #ccc;
            border: 1px solid #000;
        }
        #hor-minimalist-b td
        {
            border: 1px solid #000;
            color: #000;
            padding: 6px 8px;
        }
    </style>
</head>
<body>
    <table id="hor-minimalist-b">
        <thead>
           <tr>
                <td align="left" colspan="4"><b>Students Master Data</b></td>
            </tr>
            <tr></tr>
           <tr>
                <th>No.</th>   
                <th>First Name</th>   
                <th>Last Name</th>   
                <th>Gender</th>   
                <th>Address</th>   
                <th>Sub Distric</th>   
                <th>Village</th>   
                <th>Father</th>   
                <th>Mother</th>   
                <th>Univercity</th>   
                <th>Faculty</th>   
                <th>Major</th>   
                <th>Type</th>   
                <th>Status</th>   
                <th>Amount of Grant</th>   
           </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>  
            @foreach($students as $student)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->people->village->sub_district->name }}</td>
                <td>{{ $student->people->village->name }}</td>
                <td>{{ $student->father->full_name }}</td>
                <td>{{ $student->mother->full_name }}</td>
                <td>{{ $student->univercity->name }}</td>
                <td>{{ $student->major->faculty->name }}</td>
                <td>{{ $student->major->name }}</td>
                <td>{{ $student->type }}</td>
                <td>{{ $student->status }}</td>
                <td>{{ $student->amount_of_grant }}</td>
            </tr>
            <?php $i++ ?>
            @endforeach            
        </tbody>
    </table>
</body>
</html>