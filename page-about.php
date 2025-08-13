<?php get_header(); ?>

    <main class="container"  style="margin: 0 auto;">

        <div class="content">
            <section style="display: flex; flex-direction: column; width: 800px; height: max-content; gap: var(--size-400); padding-block: var(--size-800);">
                
                <p class="text-display-1">Display 1</p>
                <p class="text-display-2">Display 2</p>

                <hr style="margin-block: var(--size-500);">

                <h1>Heading 1</h1>
                <h2>Heading 2</h2>
                <h3>Heading 3</h3>
                <h4>Heading 4</h4>
                <h5>Heading 5</h5>
                <h6>Heading 6</h6>

                <hr style="margin-block: var(--size-500);">

                <p class="text-eyebrow">Eyebrow Text</p>
                <p>Este es un párrafo de cuerpo normal (text-body-md). Contiene <strong>texto en negrita</strong> para ver el peso de la fuente y también un <a href="#">enlace de ejemplo</a> para ver sus estilos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate accusamus animi distinctio.</p>
                <p class="text-body-sm">Este es un párrafo de cuerpo más pequeño (text-body-sm). Es útil para textos secundarios o con menor jerarquía. Lorem ipsum dolor sit amet.</p>
                
                <ul>
                    <li>Elemento de lista 1</li>
                    <li>Elemento de lista 2</li>
                    <li>Elemento de lista 3</li>
                </ul>

                <small>Texto pequeño (small/caption). Ideal para notas al pie o metadatos.</small>

                <hr style="margin-block: var(--size-500);">

            </section>
        </div>

    </main><!-- .container -->

<?php get_footer(); ?>