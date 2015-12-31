<div class="row">
    <?php echo form_open('auth/verifylogin', array('class'=>'col s12')); ?>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="text" name="username" class="validate"/>
                <label for="username">Username</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="password" name="password" class="validate"/>
                <label for="password">Password</label>    
            </div>
        </div>
        <div class="row">
            <button name="submit" type="submit" class="col s12 m6 offset-m3 l4 offset-l4 btn">Login</button>
        </div>
        <div class="row">
            <a class="col s12 m6 offset-m3 l4 offset-l4 btn" href="<?php echo base_url('signup');?>">Register</a>
        </div>
    </form>
</div>


