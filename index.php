<?php
            $keywords = @$_GET["keywords"];
            
            $servername = "localhost";
            $username = "username";
            $password = "";
            $dbname = "test";

            $conn = new mysqli($servername, $username, $password, $dbname); // 创建连接
            // 检测连接
            if ($conn->connect_error) {
                die("连接失败：" . $conn->connect_error);
            }
            //echo "连接成功";

            $sql = " SELECT * FROM tbd_goods WHERE name LIKE '%$keywords%' ";
            $result = $conn->query($sql);
?>

<html>
	<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="lib/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>首页</title>
	</head>
	<body>
        <div style="text-align:center; margin-top:50px">
            <div style="display:inline">
            <form action="index.php" method="get">
                <input type="text" name="keywords" value="<?php echo $keywords ?>" class="form-control" style="width: 385px; display:inline">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
            <form action="add.html" method="get">
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </form>
            </div>
            <p></p>
            <table id="table" class="table table-bordered table-condensed" style="width:500px; margin: 0 auto">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $result->fetch_row()) {
                            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]<td><a href='delete.php?id=$row[0]'>Delete</a>
                                 &nbsp;&nbsp;&nbsp;<a href='#' data-toggle='modal' data-target='#myModal' 
                                 onclick=\"popOut($row[0], '$row[1]', $row[2])\">Edit</a></td></td></tr>";
                        }
                    ?>
                </tobody>
            </table>
        </div>

        <form action="update.php" method="get">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                        <h4 class="modal-title" id="myModalLabel">请输入新的内容</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idInput" name="id">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" name="name">
                        <label for="priceInput">Price</label>
                        <input type="number" class="form-control" id="priceInput" name="price">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </div>
        </form>

        <script>
            function popOut(id, name, price) {
                
                $("#idInput").val(id);   
                $("#nameInput").val(name);
                $("#priceInput").val(price);
            }

        </script>
	</body>
</html>