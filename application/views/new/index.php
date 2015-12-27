<?php echo $error;?>
<row></row>
<row centered>
    <column cols="6"><h6 style="text-align:center;">Create a new book</h6></column>
</row>
<row centered>
    <column cols="6">
        <?php echo form_open_multipart('new/create', array('class'=>'forms'));?>
    </column>
</row>
<row centered>
    <column cols="6">
        <section>
            <label for="title">Book Title</label>
            <input type="text" name="title"/>
        </section>
    </column>
</row>
<row centered>
    <column cols="6">
        <section>            
            <label for="author">Author Name</label>
            <input type="text" name="author"/>
        </section>
    </column>
</row>
<row centered>
    <column cols="6">
        <section>
            <label for="description">Descrition</label>
            <textarea rows="4" name="description"></textarea>
        </section>
    </column>
</row>
<row centered>
    <column cols="6">
        <section>            
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price"/>
        </section>
    </column>
</row>
<row centered>
    <column cols="6">
        <section>
            <label for="category">Book Category</label>
            <select name="category">
                <option value="fiction">Fiction</option>
                <option value="nonfiction">Non Fiction</option>
                <option value="refrence">Refrence</option>
            </select>      
        </section>
    </column>
</row>
<row centered>
    <column cols="6">
        <section>
            <button style="width:100%;" type="primary" name="submit" value="submit">Create</button>
        </section>
    </column>
</row>
</form>