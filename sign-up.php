
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
</head>
<body>
    <?php

        if(isset( $_POST['submit']))
        {
            $title = $_POST['titleForm'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $streetAddress = $_POST['streetAddress'];
            $city = $_POST['city'];
            $postalCode = $_POST['postalCode'];

            $emailAddress = $_POST['emailAddress'];
            $confirmEmailAddress = $_POST['confirmEmailAddress'];
            if(!(strcasecmp($emailAddress, $_POST['confirmEmailAddress']) == 0))
            {
                echo "<script>alert('Email addresses do not match.');document.location='sign-up.html'</script>";
                exit();
            }
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            if(!($password == $_POST['confirmPassword']))
            {
                echo "<script>alert('Passwords do not match.');document.location='sign-up.html'</script>";
                exit();
            }

            //Writes to users.xml in xml_database folder
            $users_doc = new DOMDocument();
            $users_doc->preserveWhiteSpace = false;
            $users_doc->formatOutput = true;
            $users_doc->load("xml_database/users.xml");
            
            $users = $users_doc->getElementsByTagName('user');

            //Writes to Page9.xml
            $user_doc = new DOMDocument();
            $user_doc->preserveWhiteSpace = false;
            $user_doc->formatOutput = true;
            $user_doc->load("Page9.xml");
            print $user_doc->saveXML();

            foreach ($users AS $element)
            {
                $login_info = $element->getElementsByTagName('login')->item(0);
                if(strcasecmp($emailAddress, $login_info->getElementsByTagName('email')->item(0)->nodeValue) == 0)
                {
                    echo "<script>alert('Email address already in use.'); document.location='sign-up.html'</script>";
                    exit();
                }
            }

            //Writes to users.xml
            $new_user = $users_doc->createElement("user");
            $new_login = $users_doc->createElement("login");
            $new_email = $users_doc->createElement("email", $emailAddress);
            $new_password = $users_doc->createElement("password", $password);
            $new_admin = $users_doc->createElement("admin", "False");
            $new_login->appendChild($new_email);
            $new_login->appendChild($new_password);
            $new_login->appendChild($new_admin);
            $new_user->appendChild($new_login);
            $new_personal = $users_doc->createElement("personal");
            $new_title = $users_doc->createElement("title", $title);
            $new_firstName = $users_doc->createElement("firstName", $firstName);
            $new_lastName = $users_doc->createElement("lastName", $lastName);
            $new_streetAddress = $users_doc->createElement("streetAddress", $streetAddress);
            $new_city = $users_doc->createElement("city", $city);
            $new_postalCode = $users_doc->createElement("postalCode", $postalCode);
            $new_personal->appendChild($new_title);
            $new_personal->appendChild($new_firstName);
            $new_personal->appendChild($new_lastName);
            $new_personal->appendChild($new_streetAddress);
            $new_personal->appendChild($new_city);
            $new_personal->appendChild($new_postalCode);
            $new_user->appendChild($new_personal);
            
            $users_doc->getElementsByTagName('users')->item(0)->appendChild($new_user);

            $users_doc->save("xml_database/users.xml");

            //
            $new_user = $user_doc->createElement("user");
            $new_title = $user_doc->createElement("title", $title);
            $new_firstName = $user_doc->createElement("firstName", $firstName);
            $new_lastName = $user_doc->createElement("lastName", $lastName);
            $new_streetAddress = $user_doc->createElement("streetAddress", $streetAddress);
            $new_city = $user_doc->createElement("city", $city);
            $new_postalCode = $user_doc->createElement("postalCode", $postalCode);
            $new_user->appendChild($new_title);
            $new_user->appendChild($new_firstName);
            $new_user->appendChild($new_lastName);
            $new_user->appendChild($new_streetAddress);
            $new_user->appendChild($new_city);
            $new_user->appendChild($new_postalCode);

            $user_doc->getElementsByTagName('users')->item(0)->appendChild($new_user);

            $user_doc->save("Page9.xml");


            echo "<script>alert('Account created successfully.'); document.location='index.php'</script>";
            exit();
        }
    ?>
</body>
</html>
