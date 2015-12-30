<div id="top-stuff">
    
    <row class="search-bar" centered>
        <column cols="6">
            <form method="get" action="<?php echo base_url('search');?>" class="forms">
                <div class="btn-append">
                    <input type="text" name="b" placeholder="Search" />
                    <span>
                        <button class="btn">Go</button>
                    </span>
                </div>
            </form>    
        </column>
    </row>
    
</div>

<row id="display-area" centered>
    <column cols="2">
        <ul class="list-flat nav-list">
            <a href="<?php echo base_url();?>">
                <li class="nav-item">HOME</li>
            </a>
            <?php
                foreach($categories as $category):
                    echo '<a href='.base_url('category/'.$category['book_category']).'>';
                    echo '<li class="nav-item">'.strtoupper($category['book_category']).'</li>';
                    echo '</a>';
                endforeach
            ?>
        </ul>
    </column>
    <column cols="8">
        <blocks cols="4">
            <?php
            foreach($query as $element):
                if($element['book_is_available'] == 1) {
                    echo '<div class="product-item">';
                    echo '<h4>'.$element['book_name'].'</h4>';
                    echo '<p>by '.$element['book_author'].'</p>';
                    echo '<img src="'.base_url($element['book_image']).'"/>';
                    echo '<p>'.$element['book_description'].'</p>';
                    echo '<em>'.$element['book_category'].'</em>';
                    echo '<br><em><s>Rs.'.$element['book_mrp'].'</s></em>';
                    echo '<br><em>Rs.'.$element['book_price'].'</em>';
                    echo '</div>';   
                } else {
                    echo '<div class="product-item">';
                    echo '<h4>Book Unavailable</h4>';
                    echo '</div>';
                }
            endforeach;
            ?>
        </blocks>
    </column>
</row>
<?php 
    if(isset($links)) {
        echo '<row centered>';
        echo '<column cols="8" offset="2">'.$links.'</column>';
        echo '</row>'; 
    }
?>