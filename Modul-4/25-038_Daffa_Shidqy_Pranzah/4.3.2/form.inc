<html>
<head>
    <title>Form</title>
</head>

<body>
    <h2>Register</h2>
    <fieldset>
        <legend>Person Details</legend>
        <form name="myForm" action="" method="POST">
            <div class="field">
                <label for="surname">Surname</label>
                <input type="text" id="surname" name="surname" size="31" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>"/>
            </div>
            <div class="field">
                <label for="email">Email Address</label>
                <input type="text" id="email" name="email" size="31" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
            </div>
            <div class="field">
                <label for="passwd">Password</label>
                <input type="password" id="passwd" name="passwd" size="31"/>
            </div>
            <div class="field">
                <label for="address">Street Address</label>
                <textarea id="address" name="address" rows="3" cols="22"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
            </div>
            <div class="field">
                <label for="state">State</label>
                <select id="state" name="state">
                    <option value="-1" <?php echo (isset($_POST['state']) && $_POST['state'] == '-1') ? 'selected' : ''; ?>>[Choose Your State]</option>
                    <option value="1" <?php echo (isset($_POST['state']) && $_POST['state'] == '1') ? 'selected' : ''; ?>>Australian Capital Territory</option>
                    <option value="2" <?php echo (isset($_POST['state']) && $_POST['state'] == '2') ? 'selected' : ''; ?>>Queensland</option>
                    <option value="3" <?php echo (isset($_POST['state']) && $_POST['state'] == '3') ? 'selected' : ''; ?>>Victoria</option>
                    <option value="4" <?php echo (isset($_POST['state']) && $_POST['state'] == '4') ? 'selected' : ''; ?>>New South Wales</option>
                    <option value="5" <?php echo (isset($_POST['state']) && $_POST['state'] == '5') ? 'selected' : ''; ?>>Tasmania</option>
                    <option value="6" <?php echo (isset($_POST['state']) && $_POST['state'] == '6') ? 'selected' : ''; ?>>South Australia</option>
                    <option value="7" <?php echo (isset($_POST['state']) && $_POST['state'] == '7') ? 'selected' : ''; ?>>Western Australia</option>
                    <option value="8" <?php echo (isset($_POST['state']) && $_POST['state'] == '8') ? 'selected' : ''; ?>>Northern Territory</option>
                </select>
            </div>
            <div class="field">
                <input type="hidden" name="country" value="Australia"/>
            </div>
            <div class="field">
                <label>Gender</label>
                <input type="radio" name="sex" value="male" <?php echo (isset($_POST['sex']) && $_POST['sex'] == 'male') ? 'checked' : ''; ?>/>Male
                <input type="radio" name="sex" value="female" <?php echo (isset($_POST['sex']) && $_POST['sex'] == 'female') ? 'checked' : ''; ?>/>Female
            </div>
            <div class="field">
                <label for="vegetarian">Vegetarian?</label>
                <input type="checkbox" id="vegetarian" name="vegetarian" value="yes" <?php echo isset($_POST['vegetarian']) ? 'checked' : ''; ?>/>
            </div>
            <div class="field">
                <label>&nbsp;</label>
                <input type="submit" value="Submit" name="submit"/>
                <input type="reset" value="Reset" name="reset"/>
            </div>
        </form>
    </fieldset>
</body>
</html>
