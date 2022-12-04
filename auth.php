<?php 

session_start();



	if (!isset($_SESSION['username'])){


    if(isset($_POST['login'])){
        //var_dump($_POST);
        
        include_once('config/db.php');

        $login = $_POST['login'];
        $pass = md5($_POST['pass']);
            
        $result = mysqli_query($link, "SELECT * FROM `users` WHERE login='$login' AND password='$pass'") or die(mysqli_error($link));
        //var_dump($result);
        if (mysqli_num_rows($result) > 0){
			
            echo 'Создаем сессию';
			foreach ($result as $result){
				//var_dump($result);
				$_SESSION['username'] = $result['login'];
                $_SESSION['admin'] = $result['admin'];
                $_SESSION['user_id'] = $result['id'];
			}
        } else {
            echo 'Ошибка авторизации';
            
        }

    } else {
		
		echo '<form action="" method="post">
			<input type="text" name="login" id="">
			<input type="password" name="pass" id="">
			<input type="submit" value="войти">
		</form>';
		
	}
			
	}	else {
		
		echo 'Вы уже авторизованы';
        echo ' Привет: ' . $_SESSION['username'] . " Права админа: " . $_SESSION['admin'];
		
	}

?> 
