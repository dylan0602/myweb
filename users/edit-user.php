<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thông tin thành viên</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>
    <div class="container">
      <div class="row">
        <?php
        require_once("../config.php");

        if (isset($_POST["save"])) {
          $id_user = $_POST["id_user"];
          $name = $_POST["name"];
          $email = $_POST["email"];
          $level = $_POST["level"];
          $sql = "update users set name = '$name', email = '$email', level = '$level' where id = $id_user";
          mysqli_query($db, $sql);
          $success = "Thành công!";
        }

        $id = "";
        $name = "";
        $email = "";
        $level = "";
        if (isset($_GET["id"])) {
          //thực hiện việc lấy thông tin user
          $id = $_GET["id"];
          $sql = "select * from users where id = $id";
          $query = mysqli_query($db, $sql);
          while ( $data = mysqli_fetch_array($query) ) {
            $name = $data["name"];
            $email = $data["email"];
            $level = $data["level"];
          }
        }
    ?>
        <h3> Thông tin thành viên</h3>
        <form method="POST" name="fr_update">
          <table class="table">
            <caption>Danh sách thành viên đã đăng ký</caption>
              <input type="hidden" name="id_user" value="<?php echo $id; ?>">
              <tr><td>Họ tên : </td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td></tr>
              <tr><td>Địa chỉ email : </td><td><input type="text" name="email" value="<?php echo $email; ?>"/></td></tr>
              <tr>
                <td>Cấp độ : </td>
                <td>
                  <select name="level">
                    <option value="1" <?php echo ($level == 1)?"selected":""; ?>>Administrator</option>
                    <option value="2" <?php echo ($level == 2)?"selected":""; ?>>Member</option>
                  </select>
                </td>
              </tr>
              <tr><td colspan="2"><input type="submit" name="save" value="Lưu thông tin"></td></tr>
          </table>
           <div style = "font-size:11px; color: green; margin-top:10px; text-align: center;" ><?php echo isset($success) ? $success : ''; ?></div>
        </form>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  

</body></html>
