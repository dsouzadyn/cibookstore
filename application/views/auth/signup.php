<row></row>
<row centered>
    <column cols="6"><h6 style="text-align:center;letter-spacing:1.4px;">Sign Up</h6></column>
</row>
<row centered>
    <column cols="8">
        <?php echo form_open('auth/signup', array('class'=>'forms')); ?>
        <?php echo $error; ?>
    </column>
</row>
<row centered>
    <column cols="8">
        <section>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" required>
        </section>
    </column>
</row>
<row centered>
    <column cols="8">
        <section>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" required>
        </section>
    </column>
</row>
<row centered>
    <column cols="8">
        <section>
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </section>
    </column>
</row>
<row centered>
    <column cols="8">
        <section>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </section>
    </column>
</row>

<row centered>
    <column cols="8">
        <section>
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" required>
        </section>
    </column>
</row>
<row centered>
    <column cols="8">
        <section>
            <label for="email">Email id</label>
            <input type="email" name="email"/>
        </section>
    </column>
</row>
<row centered>
    <column cols="8">
        <section>
            <button style="width:100%;" type="primary" name="submit" value="submit">Sign Up</button>
        </section>
    </column>
</row>