<row></row>
<row>
    <column cols="6" offset="2"><h2><?php echo 'Welcome, '.$username;?></h2></column>
</row>
<row centered>
    <column cols="8">
    
<table>
    <thead>
        <tr>
            <th>Book</th>
            <th>Author</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    <tbody>
        <?php 
            foreach($query as $book):
                echo '<tr>';
                echo '<td>'.$book['book_name'].'</td>';
                echo '<td>'.$book['book_author'].'</td>';
                echo '<td>'.$book['book_description'].'</td>';
                echo '<td>'.$book['book_price'].'</td>';
                if($book['book_is_available'] == 1) {
                    echo '<td><span class="label label-success">LIVE</span></td>';
                } else {
                    echo '<td><span class="label label-error">UNCONFIRMED</span></td>';
                }
                echo '<td><a href="'.base_url('delete/'.$book['id']).'">Delete</a></td>';
            endforeach;
        ?>
    </tbody>
</table>
    </column>
</row>