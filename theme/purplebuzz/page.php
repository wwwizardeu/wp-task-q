<?php
/**
 * @package purplebuzz
 */

get_header();
?>

<div id="article" class="c-article c-article--page u-my-4">
    <div class="o-wrap">
        <div class="o-row">

            <div class="o-col-8@md u-mx-auto">

                <h1 class="c-article__title">
                    <?php the_title(); ?>
                </h1>

                <div class="c-article__body">
                    <div class="c-entry">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php

get_footer();
