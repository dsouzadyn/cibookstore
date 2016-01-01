<?php echo $error;?>


<div class="row">
    <?php echo form_open_multipart('new/create', array('class'=>'forms'));?>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="text" name="title" class="validate" required>
                <label for="title">Book Title</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="text" name="author" class="validate" required>
                <label for="author">Author</label>
            </div>
        </div>
        
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="number" name="edition" min="1" max="100" class="validate">
                <label for="edition">Edition</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="tel" name="number" class="validate" required>
                <label for="number">Contact Number</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <textarea rows="4" name="description" class="materialize-textarea" required></textarea>
                <label for="description">Description</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="number" step="0.01" name="mrp" class="validate" required>
                <label for="mrp">MRP</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="number" step="0.01" name="price" class="validate" required>
                <label for="price">Price</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <select name="category" required multiple>
                <?php
                        foreach($sel_categories as $category):
                            echo '<option value="'.$category['value'].'">'.$category['text'].'</option>';
                        endforeach;
                ?>
                </select>
                <label>Select Category</label>
            </div>
        </div>
    
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="text" name="other" class="validate">
                <label for="other">Other</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <input type="text" name="city" class="validate">
                <label for="city">City</label>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s12 m6 offset-m3 l4 offset-l4">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="userfile" accept="image/*" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Max File Dimensions 1024 by 1024 pixels">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 offset-m3 l4 offset-l4">
                <button name="submit" type="submit" class="col s12 m6 offset-m3 l4 offset-l4 btn">Create Post</button>
            </div>
        </div>
    </form>
</div>
