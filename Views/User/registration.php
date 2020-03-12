<div class="container">

    <?php if ( !isset($registration)  ): ?>
        <form method="POST" class="auth-form" id="registration-form">

            <?php
            if ( !empty($errors) ){
                foreach ($errors as $error){
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>' ;
                    break;
                }
            }
            ?>

            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="Password" id="Password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php elseif ($registration == true): ?>
        <div id="reg-success">
            <div class="alert alert-success" role="alert">Registration successful</div>
            <br>
            <a href="/user/auth">Log in</a>
        </div>
    <?php endif; ?>
</div>
