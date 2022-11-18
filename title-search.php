<html> <!-- title-search.php -->
    <head>
        <title>Find your Music</title>
        <h1>Find your Music</h1>
        <hr> <br>

        <style>
            .a {
                font-family: 'Courier New';
                font-size: 20;
                padding-right: 50px;
            }
        </style>
    </head>
    <body>

        <form action="title-search.php" method="POST">
            <input type="text" size="30" name="search_kw" placeholder="type your thinks...">
            <input type="submit" value="Search">
        </form>

        <br><br>
        <h2>The result: </h2>
    <?php   

/*
//sql injection
        if (isset($_POST['search_kw'])) {
            require_once 'connect-selectdb.php';
            $keyword = $_POST['search_kw'];
//          $keyword = trim($keyword);
            $new_kw = str_replace(" ", "%' OR s_id LIKE '%", $keyword);

            $query = "SELECT * FROM songs";
            $query = "SELECT * FROM songs WHERE s_id LIKE '%$new_kw%'";
            //echo "<br>SQL: ", $query;

            $result = $conn->query($query) or die("Query failed: " . $conn->error);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                     echo "- Song id: " . $row["s_id"] . 
                          "<br>- Name: " . $row["s_name"].
                          "<hr>" ;
                    }
                }
                else{
                    echo "<b>Type again please babies!</b>";
                }
            }
*/

//module for avoiding SQL injection 
        if (isset($_POST['search_kw'])) {
            require_once 'connect-selectdb.php';
            $keyword = $_POST['search_kw'];
            $keyword = trim($keyword);
            $new_kw = str_replace(" ", "1' OR s_id LIKE '1=1", $keyword);

            $query = "SELECT * FROM songs";
            $query = "SELECT * FROM songs WHERE s_id LIKE '%$new_kw%'";
            //echo "<br>SQL: ", $query;

            $result = $conn->query($query) or die("Query failed: " . $conn->error);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                     echo "- Song id: " . $row["s_id"] . 
                          "<br>- Name: " . $row["s_name"].
                          "<hr>" ;
                    }
                }
                else{
                    echo "<b>Type again please babies!</b>";
                }
            }
                

            /*       echo <<<_DEL_TITLE_FORM
                    <form class = 'a' action="title-manager.php" method="POST" >
                    <pre>
                    Mã bài viết $row[ma_bviet]
                        Tiêu đề $row[tieude]
                    Tên bài hát $row[ten_bhat]
                    Mã thể loại $row[ma_tloai]
                        Tóm tắt $row[tomtat]
                    <hr>
                    </pre>
                </form>
               _DEL_TITLE_FORM;
            */         
    ?>
</body>
</html>