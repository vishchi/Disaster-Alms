    function checkPasswordStrength()
    {
        var passwordTextBox = document.getElementById("password");
        var label_alert=document.getElementById('lblalert');
        var password = passwordTextBox.value;
        var specialCharacters = "!£$%^&*_@#~?";
        var passwordScore = 0;



        // Contains special characters
        for (var i = 0; i < password.length; i++)
        {
            if (specialCharacters.indexOf(password.charAt(i)) > -1)
            {
                passwordScore += 20;
                break;
            }
        }

        // Contains numbers
        if (/\d/.test(password))
            passwordScore += 20;

        // Contains lower case letter
        if (/[a-z]/.test(password))
            passwordScore += 20;

        // Contains upper case letter
        if (/[A-Z]/.test(password))
            passwordScore += 20;

        if (password.length >= 8)
            passwordScore += 20;

        var strength = "";
        var backgroundColor = "red";

        if (passwordScore >= 100)
        {
            strength = "Very Strong";
            backgroundColor = "green";
        }
        else if (passwordScore >= 80)
        {
            strength = "Strong";
            backgroundColor = "brown";
        }
        else if (passwordScore >= 60)
        {
            strength = "Medium";
            backgroundColor = "orange";
        }
        else
        {
            strength = "Weak";
            backgroundColor = "red";
        }

        document.getElementById("lblMessage").innerHTML = strength;
        document.getElementById("lblMessage").style.color=backgroundColor;
        label_alert.style.display="block";
    }






