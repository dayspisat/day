<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вход</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200&display=swap');

    * {
      font-weight: 900;
      /* Жирный шрифт */
      font-family: "Montserrat Alternates", sans-serif;
      /* Шрифт */
    }

    body {
      background-image: url(./img/index.png);
      background-position: center;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      width: 700px;
      height: 320px;
      background-color: #fff;
      border-radius: 40px;
      padding: 30px 50px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h2 {
      margin-bottom: 50px;
      font-size: xx-large;
    }

    button {
      font-size: x-large;
      background-color: #ff8080;
      border: none;
      padding: 12px 25px;
      border-radius: 40px;
      margin-bottom: 15px;
      cursor: pointer;
      width: 425px;
      height: 75px;
    }

    button:hover {
      background-color: #ff6969;
    }

    a {
      text-decoration: none;
      color: #000000;
    }

    /* Медиа-запросы для адаптивности */
    @media (max-width: 768px) {
      .container {
        width: 90%;
        height: auto;
        padding: 20px;
      }

      h2 {
        font-size: large;
        margin-bottom: 30px;
      }

      button {
        font-size: large;
        width: 100%;
        height: 60px;
        padding: 10px;
      }
    }

    @media (max-width: 480px) {
      h2 {
        font-size: medium;
        margin-bottom: 20px;
      }

      button {
        font-size: medium;
        height: 50px;
        padding: 8px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>ВЫБЕРИТЕ</h2>
    <a href="avtoriz.php"><button>АВТОРИЗАЦИЯ</button></a>
    <a href="registration.php"><button>РЕГИСТРАЦИЯ</button></a>
  </div>
</body>

</html>

</html>