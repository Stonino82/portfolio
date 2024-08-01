<?php 
/*
 * Template Name: Archive Template
 * description: Archive Template
 */
	get_header(); ?>
	<main class="container container-archive">
		<section class="presentation opacityOnScroll ">
			<div class="presentation__header">
                <?php get_template_part( 'template-parts/logo' ); ?>
			</div>

			<div class="presentation__central">
				<div class="presentation__headlines">
					
                    <?php if ( is_category() || is_tax('portfolio_category') ) : ?>
                        <ul class="chip-list">
                            <li>
                                <!-- Get category without link -->
                                <?php if ( is_category() ) : ?>
                                <span class="chip chip__blog--category"><i class="fa-solid fa-feather-pointed"></i>Blog Category</span>
                                <?php elseif ( is_tax('portfolio_category') ) : ?>
                                <span class="chip chip__portfolio--category"><i class="fa-solid fa-folder-open"></i>Portfolio Category</span>
                                <?php endif ?>
                            </li>
                        </ul>
                        <h1 class="text-heading-1 text-gradient margin-block-100"><?php single_term_title( '', true ); ?></h1>

                    <?php elseif ( is_tag() || is_tax('portfolio_tag') ) : ?>
                        <ul class="chip-list">
                            <li>
                                <!-- Get category without link -->
                                <?php if ( is_tag() ) : ?>
                                <span class="chip chip__blog--tags"><i class="fa-solid fa-feather-pointed"></i>Blog Tag</span>
                                <?php elseif ( is_tax('portfolio_tag') ) : ?>
                                <span class="chip chip__portfolio--tags"><i class="fa-solid fa-folder-open"></i>Portfolio Tag</span>
                                <?php endif ?>
                            </li>
                        </ul>
                        <h1 class="text-heading-1 text-gradient margin-block-100"><?php single_term_title( '', true ); ?></h1>
                    <?php endif ?>

				</div>

                <div class="presentation__description">
                    <?php the_archive_description( '<h2 class="text-md-body-1 fw-regular">', '</h2>' ); ?>
                </div>
			</div>

			<div class="presentation__links">
                <?php get_template_part( 'template-parts/presentation-links' ); ?>
			</div>
		</section><!-- /presentation -->

        <section class="right-side">
        
            <?php if ( get_post_type() === 'post' ) : ?>
            <section class="blog">
                <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    <?php antoninolattene_post_thumbnail(); ?>
                    <div class="article__description">
                        <h3 class="project__title text-heading-5"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h3>
                        <small><?php antoninolattene_posted_on(); antoninolattene_posted_by();?></small>
                        <ul class="chip-list">
                            <?php $categories = get_the_category();
                            if( $categories ): ?>
                                <?php foreach( $categories as $category ): ?>
                                <li>
                                    <!-- Get category without link -->
                                    <!-- <span class="chip chip__blog--category"><?php echo $category->cat_name . ' '; ?></span> -->
                                    <a class="chip chip__blog--category" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                                        <?php echo $category->name; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php $tags = get_the_tags(); if( $tags ): ?>
                                <?php foreach( $tags as $tag ): ?>
                                <li>
                                    <!-- Get tags without links  -->
                                    <!-- <span class="chip chip__blog--tags"><?php echo $tag->name; ?></span> -->
                                    <a class="chip chip__blog--tags" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
                                        <?php echo $tag->name; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <p><?php the_excerpt(); ?></p>
                        <?php
                        // get_template_part( 'template-parts/content', get_post_type() );
                        ?>
                    </div>
                </article>
                <?php endwhile; ?>
            </section>
            <?php endif; ?>

            <?php if ( get_post_type() === 'portfolio' ) : ?>
            <section class="portfolio">
                <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    <?php antoninolattene_post_thumbnail(); ?>
                    <div class="article__description">
                            <h3 class="project__title text-heading-5"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h3>
                            <small><?php antoninolattene_posted_on(); antoninolattene_posted_by();?></small>
                            <ul class="chip-list">
                                <?php $categories = get_the_terms( $post->ID, 'portfolio_category' );
                                if( $categories ): ?>
                                    <?php foreach( $categories as $category ): ?>
                                    <li>
                                        <!-- Get category without link -->
                                        <!-- <span class="chip chip__portfolio--category"><?php echo $category->name; ?></span> -->
                                        <a class="chip chip__portfolio--category" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                                            <?php echo $category->name; ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <?php $tags = get_the_terms( get_the_ID(), 'portfolio_tag' ); if( $tags ): ?>
                                    <?php foreach( $tags as $tag ): ?>
                                    <li>
                                        <!-- Get tags without links  -->
                                        <!-- <span class="chip chip__portfolio--tags"><?php echo $tag->name; ?></span> -->
                                        <a class="chip chip__portfolio--tags" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
                                            <?php echo $tag->name; ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <p><?php echo get_the_excerpt(); ?></p>
                            <?php
                            // get_template_part( 'template-parts/content', get_post_type() );
                            ?>
                    </div>
                </article>
                <?php endwhile; ?>
            </section>
            <?php endif; ?>

            <?php get_footer(); ?>
        </section>
	</main>
