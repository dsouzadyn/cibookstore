<row></row>
<row centered>
    <column cols="6"><h6 style="text-align:center;letter-spacing:1.4px;"><?php echo $message; ?></h6></column>
</row>
<row centered>
    <column cols="6">
        <?php echo form_open('auth/verifylogin', array('class'=>'forms')); ?>
    </column>
</row>
<row centered>
    <column cols="6">
        <section>
            <label for="username">Username</label>
            <input type="text" name="username"/>
        </section>
    </column>
</row>
<row centered>
    <column cols="6">
        <section>
            <label for="email" name="password">Password</label>
            <input type="password" />
        </section>
    </column>
</row>
<row centered>
    <column cols="3">
        <button style="width:100%;" type="primary" name="submit" value="submit" outline upper>Log In</button>
    </column>
    <column cols="3">
        <a href="<?php echo site_url('signup');?>" class="btn" style="width:100%;" outline upper>Sign Up</a>
    </column>
</row>
</form>