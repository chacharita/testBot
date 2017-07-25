<!DOCTYPE html>
<html lang="th">

<head>
    <title>Push Messages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .head-form h1 {
            padding-top: 30px;
            padding-bottom: 50px;
        }

        #myModal {
            margin-top: 100px;
        }

        .button-sc .button {
            margin-bottom: 30px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 head-form">
                <h1 align = "center">Push Massages</h1>
            </div>
            
            <div class="col-md-8 col-md-offset-2">
                <form action="select_member_filter.php" method="GET">
                    <div class="form-group">
                          <?php
                            $chAdd = curl_init();
                            curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_master');
                            curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
                            curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
                            "Content-Type: application/json",
                                                    )
                            );
                            $result = curl_exec($chAdd);
                            $err    = curl_error($chAdd);
                            curl_close($chAdd);

                            $de_line_mas = json_decode($result);
                            $count_line_mas = count($de_line_mas);
                        
                            ?>

                        <label>Line@</label><br>
                           <select name="token_line_mas">
                               <?php for($j=0;$j<$count_line_mas;$j++){ ?>
                                    <option  value="<?php echo $de_line_mas[$j]->access_token;  ?>" > <?php  echo $de_line_mas[$j]->line_name; ?></option>
                                <? } ?> 
                        
                    <?php
                                                    
                                                $chAdd = curl_init();
                                                curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_member');
                                                curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
                                                curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
                                                "Content-Type: application/json",
                                                                        )
                                                );
                                                $result = curl_exec($chAdd);
                                                $err    = curl_error($chAdd);
                                                curl_close($chAdd);
                                            
                                                $de = json_decode($result);
                                                $count = count($de);
                                               
                                                
                                                ?>
                                            
                                            <?php if($de_line_mas->id == $de->line_master_id){
                                                    for($i=0;$i<$count;$i++){ ?>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" value="<?php echo $de[$i]->user_id; ?>" name="mid[]"> <?php echo $de[$i]->member_name; echo "  "; echo $de[$i]->user_id; ?></label>
                                                        </div>
                                           <?php }}?>
                               

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>


</body>

</html>
