<div class="row">
  <ul class="collection col s12 l8 offset-l2">
    <?php
        foreach($query as $book):
            echo '<li class="collection-item avatar">';
            echo '<img src="'.$book['book_image'].'" alt="" class="circle">';
            echo '<span class="title">'.$book['book_name'].'</span>';
            echo '<p>';
            echo $book['book_description'].'<br>';
            if($book['book_category'] != 'other') {
                echo '<p><div class="chip">'.$book['book_category'].'</div></p>';    
            } else {
                echo '<p><div class="chip">'.$book['other_cat'].'</div></p>';    
            }

            echo '<br><em>MRP: <s>Rs.'.$book['book_mrp'].'</s></em>';
            echo '<br><em>Rs.'.$book['book_price'].'</em>';
            echo '<blockquote>';
            echo $book['contact_email'];
            echo '<br>'.$book['contact_number'];
            echo '<br><div>'.strtoupper($book['city']).'</div>';
            echo '</blockquote>';
            echo '</p>';
            echo '<a href="'.base_url('delete/'.$book['id']).'" class="secondary-content"><i class="material-icons">delete</i></a>';
            echo '</li>';
        endforeach;
      ?>
    
  </ul>
</div>
