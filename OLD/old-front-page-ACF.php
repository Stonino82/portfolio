<?php get_header(); ?>

    <main class="container">
        <?php
            get_template_part( 'template-parts/presentation-section', null, [
                'title'                    => 'I shape stunning Experiences that resonate on a Human level',
                'description'              => 'Hey I\'m Tony, <strong class="text-highlight">👷🏻‍♂️ Product Designer</strong> based in Barcelona.<br>I solve <strong class="text-gradient">complex business challenges</strong> and meet <strong class="text-gradient">user needs</strong> through thoughtful design.<br>My process covers the entire product lifecycle, from <strong class="text-gradient">defining strategy</strong> to crafting <strong class="text-gradient">intuitive UX/UI</strong> and <strong class="text-gradient">scalable Design Systems</strong>, all grounded in a background of <strong class="text-gradient">Front-end development</strong>.',
                'show_breadcrumbs'         => false,
                'show_availability_button' => true,
            ] );
        ?>

        <div class="content">
            <section class="showcase">
                <!-- ACF -->
                <?php if( have_rows('projects') ): ?>
                    <?php while( have_rows('projects') ): the_row();
                        $full_project = get_sub_field('full_project');
                    ?>
                        <?php if( get_row_layout() == 'full_project' ): ?>
                            <?php while( have_rows('full_project') ): the_row();
                                
                                // Carga la plantilla del artículo, que se encargará de mostrar los datos.
                                get_template_part('template-parts/project-card');

                            ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- /ACF -->
                
            </section> <!-- /Showcase -->

            <?php get_footer(); ?>
        </div>
    </main>