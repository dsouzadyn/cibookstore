<nav class="grey">
    <div class="container">
        <div class="nav-wrapper">
            <a href="<?php echo base_url();?>" class="brand-logo">bookkad</a>
            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <?php
                    foreach($navdata as $navitem):
                        echo '<li><a href="'.$navitem['link'].'">'.$navitem['text'].'</a></li>';
                    endforeach;
                ?>
            </ul>
            <ul class="side-nav" id="mobile-menu">
                <?php
                    foreach($navdata as $navitem):
                        echo '<li><a href="'.$navitem['link'].'">'.$navitem['text'].'</a></li>';
                    endforeach;
                ?>
            </ul>
        </div>
    </div>
  </nav>