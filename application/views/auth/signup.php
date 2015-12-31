<div class="row">
    <?php echo form_open('auth/signup', array('class'=>'forms')); ?>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="text" name="first_name" class="validate" required>
                <label for="first_name">First Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="text" name="last_name" class="validate" required>
                <label for="last_name">Last Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="text" name="username" class="validate" required>
                <label for="username">Username</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="password" name="password" class="validate" required>
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="password" name="cpassword" class="validate" required>
                <label for="cpassword">Confirm Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="email" name="email" class="validate" required>
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <button name="submit" type="submit" class="col s12 m6 offset-m3 l4 offset-l4 btn">Create Account</button>
        </div>
    </form>
</div>