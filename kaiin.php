<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>会員登録</title>
  <link rel="stylesheet" href="css/kaiin.css">
</head>

<body>

  <br>
  <button><a href="index.php">INDEX</a></button>
  <br>


  <div class="form-wrapper">
    <form action="kaiin_create.php" method="POST">
      <div class=form-box1>
        <table>
          <tr>

            <th> Name : </th>
            <td><input class="label" type="text" name="name"></td>

          </tr>
          <tr>

            <th> E - mail : </th>
            <td><input class="label" type="text" name="mail"></td>

          </tr>
          <tr>

            <th> Password : </th>
            <td><input class="label" type="text" name="password"></td>

          </tr>
          <tr>

            <th> ご住所 : </th>
            <td><input class="label" type="text" name="address"></td>

          </tr>
          <tr>

            <th> お仕事 : </th>
            <td>
              <input class="radio" type="text" name="work">
              <ul>
                <li><input type="radio" name="work" value="副業希望"> 副業希望 </li>
                <li><input type="radio" name="work" value="フリーランス"> フリーランス</li>
                <li><input type="radio" name="work" value="経験者/転職希望"> 経験者/転職希望</li>
                <li><input type="radio" name="field" value="未経験＆ブランクあり/転職希望"> 未経験＆ブランクあり/転職希望</li>
              </ul>
            </td>

          </tr>
          <tr>

            <th> 備考欄 : </th>
            <td><textarea class="label" type="text" name="bikou" placeholder="何かあればこちらにご記入を" cols="50" rows="10"></textarea></td>

          </tr>
        </table>

        <br>
        <div class="form-bt">
          <button>登録する</button>
          <!-- <button><a href="kaiin_create.php">登録する</a></button> -->
        </div>
        <br>
      </div>
    </form>
  </div>


</body>

</html>