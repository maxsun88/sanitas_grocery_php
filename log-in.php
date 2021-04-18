<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
</head>
<body>
    <?php

        if(isset( $_POST['submit']))
        {

        $emailAddress = $_POST['email-address'];
        $password = $_POST['password'];
        
        $xmlDoc = new DOMDocument();
        $xmlDoc->load("xml_database/users.xml");

        $users = $xmlDoc->getElementsByTagName('user');

        foreach ($users AS $element)
            {
                $login_info = $element->getElementsByTagName('login')->item(0);
                if(strcasecmp($emailAddress, $login_info->getElementsByTagName('email')->item(0)->nodeValue) == 0)
                {
                    print 'Found email <br/>';
                    if($password == $login_info->getElementsByTagName('password')->item(0)->nodeValue)
                    {
                        print 'Right password <br/>';
                        if(strcasecmp('True', $login_info->getElementsByTagName('admin')->item(0)->nodeValue) == 0)
                        {
                            header("Location: backstore/product-management.php");
                            exit();
                        }
                        header("Location: index.php");
                        exit();
                    }
                }
            }
            echo "<script>alert('Wrong email or password');document.location='log-in.html'</script>";
        }
    ?>
</body>
</html>
