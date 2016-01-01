
<div class="row">

      <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
        <ul class="collection with-header">
            <li class="collection-header"><h5>Popular Categories</h5></li>
            <a href="<?php echo base_url();?>" class="collection-item">All</a>
            <?php
                foreach($categories as $category):
                    echo '<a href='.base_url('category/'.$category['book_category']).' class="collection-item">';
                    echo strtoupper($category['book_category']);
                    echo '</a>';
                endforeach
            ?>
        </ul>
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->
      </div>

      <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
        <!-- Teal page content

              This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->
          
            <div class="row">
                
                <form method="get" action="<?php echo base_url('search');?>" class="col s12">
                    <div class="row card-panel">
                        <div class="input-field">
                            <input placeholder="Type in something..." type="text" name="b" class="validate col l8 offset-l2"/>
                            <button class="btn waves-effect waves-light col s4 l3 offset-s1 offset-l2">Search<i class="material-icons right">send</i></button>
                            <a href="<?php echo base_url('signup');?>"class="btn amber waves-effect waves-light col s4 l3 offset-s2 offset-l2">Create A Free Ad</a>
                        </div>
                    </div>
                </form>
            </div>
          <?php
            if($query) {
                echo '<div class="row">';
                foreach($query as $element):
                    if($element['book_is_available'] == 1) {
                        
                        echo '<div class="col s12 m6 l3">';
                        echo '<div class="card large hoverable">';
                        echo '<div class="card-image">';
                        echo '<img src="'.base_url($element['book_image']).'"/>';
                        echo '<span class="card-title">'.$element['book_name'].'</span>';
                        echo '</div>';
                        echo '<div class="card-content">';
                        echo '<p>'.word_limiter($element['book_description'], 16).'</p>';
                        if($element['book_category'] != 'other') {
                            echo '<p><div class="chip">'.$element['book_category'].'</div></p>';    
                        } else {
                            echo '<p><div class="chip">'.$element['other_cat'].'</div></p>';    
                        }
                        echo '<br><em><s>Rs.'.$element['book_mrp'].'</s></em>';
                        echo '<br><em>Rs.'.$element['book_price'].'</em>';
                        echo '<br>'.$element['contact_email'];
                        echo '<p><div class="chip">'.strtoupper($element['city']).'</div></p>';
                        echo '</div>';
                        echo '<div class="card-action">';
                        echo '<button data-target="modal'.$element['id'].'" class="btn modal-trigger">Details</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        
                        
                        echo '<div id="modal'.$element['id'].'" class="modal modal-fixed-footer">';
                        echo '<div class="modal-content">';
                        echo '<div class="row">';
                        echo '<div class="col s12 l6">';
                        echo '<h4>'.$element['book_name'].'</h4>';
                        echo '<p>'.$element['book_description'].'</p>';
                        if($element['book_category'] != 'other') {
                            echo '<p><div class="chip">'.$element['book_category'].'</div></p>';    
                        } else {
                            echo '<p><div class="chip">'.$element['other_cat'].'</div></p>';    
                        }
                        
                        echo '<br><em><s>Rs.'.$element['book_mrp'].'</s></em>';
                        echo '<br><em>Rs.'.$element['book_price'].'</em>';
                        echo '<br>'.$element['contact_email'];
                        echo '<br>'.$element['contact_number'];
                        echo '<p><div class="chip">'.strtoupper($element['city']).'</div></p>';
                        echo '</div>';
                        echo '<div class="col s12 l6">';
                        echo '<img class="materialbox" width="180" src="'.base_url($element['book_image']).'"/>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="modal-footer">';
                        echo '<a href="#!" class="modal-action modal-close waves-effect waves-green btn">Close</a>';
                        echo '</div>';
                        echo '</div>' ;                     
                        
                        /*echo '<div class="product-item">';
                        echo '<h4>'.$element['book_name'].'</h4>';
                        echo '<p>by '.$element['book_author'].'</p>';
                        
                        echo '<p>'.$element['book_description'].'</p>';
                        echo '<em>'.$element['book_category'].'</em>';
                        echo '</div>';*/   
                    } else {
                        echo '<div class="product-item">';
                        echo '<h4>Book Unavailable</h4>';
                        echo '</div>';
                    }
                endforeach;
                echo '</div>';
                }
            ?>
          <?php 
                if(isset($links)) {
                    echo '<div class="row">';
                    echo $links;
                    echo '</div>'; 
                }
          ?>
      </div>

    </div>
          


