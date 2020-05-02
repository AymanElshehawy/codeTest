 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title>Items List</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </head>
 <body>
 
 <div class="container">
   <h2>Show Last Five Items</h2>
   <table class="table table-bordered">
     <thead>
       <tr>
            <th>ID</th>
            <th>First Number</th>
            <th>Second Number</th>
            <th>Average</th>
            <th>Area</th>
            <th>Squared</th>
       </tr>
     </thead>
     <tbody>
        <?php 
            include 'Helper.php';
            $helper = new Helper();
            $rows = $helper->showRecordsAsHtml();
            if(!empty($rows)){
                foreach($rows as $key=>$row){
        ?>
            <tr>
                <td><?php echo $row['id'] ?> </td>
                <td><?php echo $row['first_number'] ?> </td>
                <td><?php echo $row['second_number'] ?> </td>
                <td><?php echo $row['average'] ?> </td>
                <td><?php echo $row['area'] ?> </td>
                <td><?php echo $row['squared'] ?> </td>
            </tr>
        <?php }} ?>
     </tbody>
   </table>
 </div>
 
 </body>
 </html>
 