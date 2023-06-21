<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        table,
        th,
        td,
        tr {
            border: 1px solid black;

            border-collapse: collapse;
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;

            src: url("https://gdr-technologies.com/assets/admin/fonts/feather-font/Calibri/Calibri.ttf") format('truetype');
        }

        td b {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;

            src: url("https://gdr-technologies.com/assets/admin/fonts/feather-font/Calibri/Calibri.ttf") format('truetype');
        }


        body {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;

            src: url("https://gdr-technologies.com/assets/admin/fonts/feather-font/Calibri/Calibri.ttf") format('truetype');

        }
    </style>
</head>

<body>

    <table class="pdf_table" style="border:1px solid black;text-align: center;font-size:12px;" width="100%" border="1">

        <tr>
            <th style="padding: 9px;font-size: 16px;font-weight: revert; background-color : yellow;" colspan="8">POLICY REPORT</th>
        </tr>
        <tr>
            <td colspan="8" style="padding : 5px;"><br></td>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Policy Owner :- </strong> @foreach($customer as $val)
                <?php if ($policy[0]['customer'] == $val['id']) { ?>
                    {{$val['first_name']}} {{$val['last_name']}}
                <?php      } ?>
                @endforeach
            </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Company :-</strong> {{$policy[0]['company']}} </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Product :- </strong> @foreach($product as $val)
                <?php if ($policy[0]['product'] == $val['product_id']) { ?>
                    {{$val['product_name']}}
                <?php   } ?>
                @endforeach
            </th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Type of Policy :- </strong> Annually </th>
        </tr>


        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Expire Date :- </strong> {{$policy[0]['expire_date']}}</th>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong>Renewal Date :- </strong>{{$policy[0]['renewal_date']}} </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Beneficiaries :- </strong> {{$policy[0]['beneficiaries']}} </th>

            @if($policy[0]['vehicle'] != NULL)
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong> Vehicle Number :-</strong> {{$policy[0]['vehicle']}}
                @else
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"><strong> Vehicle Number :-</strong>{{$policy[0]['vehicle']}}
                @endif
            </th>
        </tr>


        <tr>
            <td colspan="8" style="padding : 5px;"><br></td>
        </tr>
        <tr>
            <th style="padding: 9px;font-size: 16px;font-weight: revert; background-color : yellow;" colspan="8">PAYMENT DETAILS</th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Premium :- </strong> {{$policy[0]['premium']}} </th>


            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong> Payment Date :- </strong> {{$policy[0]['payment_date']}}
            </th>
        </tr>

        <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Payment Mode :- </strong>{{$policy[0]['payment_mode']}}</th>


            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <strong> Remark :- </strong>{{$policy[0]['remark']}}
            </th>
        </tr>

        <tr>
            <td colspan="8" style="padding : 5px;"><br></td>
        </tr>
        <tr>
            <th style="padding: 9px;font-size: 16px;font-weight: revert; background-color : yellow;" colspan="8">DOCUMENTS</th>
        </tr>



        <?php foreach($temp as $img){
             ?>
            <tr>
            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px; " colspan="4"> <strong>Document  :- </strong></th>


            <th style="text-align:left;font-size: 16px; width: 50%; padding : 5px;" colspan="4"> <img src="<?php echo $img ?>" alt="" style="width: 150px; height: 150px;">
            </th>
        </tr>
      <?php   } ?>
        
        
      
      

    </table>
</body>

</html>